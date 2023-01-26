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

    // vérifie si un utilisateur existe déjà dans une base de données 
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
    // Insert des données dans une table
    public function inserer($table, $data): bool
    {
        // On convertit l'objet en tableau
        $dataTab = get_object_vars($data);
        // On récupère les nom de champs dans les clés du tableau
        $fields = array_keys($dataTab);
        // On récupère les valeurs
        $values = array_values($dataTab);

        // On compte le nombre de champ
        $values_count = count($values);

        // On construit la chaine des paramètres ':p0,:p1,:p2,...'
        $params = [];
        foreach ($values as $key => $value) {
            array_push($params, ':p' . $key);
        }
        $params_str = implode(',', $params);

        // On prépare la requête
        $reqInsert = 'INSERT INTO ' . $table . '(' . implode(',', $fields) . ')';
        $reqInsert .= ' VALUES(' . $params_str . ')';
        $prepared = $this->conx->prepare($reqInsert);

        // On injecte dans la requête les données avec leur type.
        for ($i = 0; $i < $values_count; $i++) {
            $type = match (gettype($values[$i])) {
                'NULL' => PDO::PARAM_NULL,
                'integer' => PDO::PARAM_INT,
                'boolean' => PDO::PARAM_BOOL,
                default => PDO::PARAM_STR,
            };
            // On lie une valeur au paramètre :pX
            $prepared->bindParam(':p' . $i, $values[$i], $type);
        }

        // On exécute la requête.
        // Retourne TRUE en cas de succès ou FALSE en cas d'échec.
        return $prepared->execute();
    }

    // Met à jour une donnée dans une table
    public function maj($table, $data)
    {
    }

    // Retourne l'id de la dernière insertion par auto-incrément dans la base de données
    public function dernierIndex(): string
    {
        return $this->conx->lastInsertId();
    }
}
