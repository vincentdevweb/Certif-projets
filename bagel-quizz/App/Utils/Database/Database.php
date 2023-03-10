<?php

namespace PALLAS\App\Utils\Database;

use PDO, PDOException;

class PdoDb
{

    private static $connect = null;
    private PDO $conx;

    public function __construct()
    {

        global $conf;

        try {
            $this->conx = new PDO('mysql:host=' . $conf['db']['host'] . ';dbname=' . $conf['db']['database'], $conf['db']['user'], $conf['db']['password'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
    }

    public static function getInstance(): ?PdoDb
    {
        if (is_null(self::$connect)) {
            self::$connect = new PdoDb();
        }
        return self::$connect;
    }

    public function requete($sql, $fetchMethod = 'fetchAll')
    {
        try {
            $result = $this->conx->query($sql, PDO::FETCH_ASSOC)->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }

    //inserer un nouvel utilisateur
    public function inserer_new_user($username, $passwordHash)
    {

        $sql_new_user = "INSERT INTO users (pseudo, mdp) VALUES (:username, :pass)";

        $stmt = $this->conx->prepare($sql_new_user);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $passwordHash, PDO::PARAM_STR);

        $stmt->execute();
    }

        //inserer un nouveau score
        public function inserer_new_score($score, $user_id)
        {
    
            $sql_new_user = "INSERT INTO score (date_session, id_user, bonne_rep_user) VALUES (:D, :userid, :score)";
    
            $stmt = $this->conx->prepare($sql_new_user);
            $time = time();
    
            $stmt->bindParam(':D', $time, PDO::PARAM_INT);
            $stmt->bindParam(':userid', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':score', $score, PDO::PARAM_INT);
    
            $stmt->execute();
        }

    // v??rifie si un utilisateur existe d??j?? dans une base de donn??es 
    public function checkIfUserExists($pseudo)
    {
        $query = $this->conx->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
        $query->bindParam(':pseudo', $pseudo);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // recuperer mot de passe hasher de l'utilisateur
    public function recup_pass($pseudo)
    {
        $query = $this->conx->prepare("SELECT * FROM users WHERE pseudo=:pseudo");
        $query->bindParam(':pseudo', $pseudo);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user['mdp'];
    }
    // Insert des donn??es dans une table
    public function inserer($table, $data): bool
    {
        // On convertit l'objet en tableau
        $dataTab = get_object_vars($data);
        // On r??cup??re les nom de champs dans les cl??s du tableau
        $fields = array_keys($dataTab);
        // On r??cup??re les valeurs
        $values = array_values($dataTab);

        // On compte le nombre de champ
        $values_count = count($values);

        // On construit la chaine des param??tres ':p0,:p1,:p2,...'
        $params = [];
        foreach ($values as $key => $value) {
            array_push($params, ':p' . $key);
        }
        $params_str = implode(',', $params);

        // On pr??pare la requ??te
        $reqInsert = 'INSERT INTO ' . $table . '(' . implode(',', $fields) . ')';
        $reqInsert .= ' VALUES(' . $params_str . ')';
        $prepared = $this->conx->prepare($reqInsert);

        // On injecte dans la requ??te les donn??es avec leur type.
        for ($i = 0; $i < $values_count; $i++) {
            $type = match (gettype($values[$i])) {
                'NULL' => PDO::PARAM_NULL,
                'integer' => PDO::PARAM_INT,
                'boolean' => PDO::PARAM_BOOL,
                default => PDO::PARAM_STR,
            };
            // On lie une valeur au param??tre :pX
            $prepared->bindParam(':p' . $i, $values[$i], $type);
        }

        // On ex??cute la requ??te.
        // Retourne TRUE en cas de succ??s ou FALSE en cas d'??chec.
        return $prepared->execute();
    }

    // Met ?? jour une donn??e dans une table
    public function maj($table, $data)
    {
    }

    // Retourne l'id de la derni??re insertion par auto-incr??ment dans la base de donn??es
    public function dernierIndex(): string
    {
        return $this->conx->lastInsertId();
    }
}
