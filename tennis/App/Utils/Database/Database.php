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

    // Recupere les données de la BDD
    public function read($table, $id, $fetchMethod = 'fetchAll', $cible = 'id')
    {
        try {
            if ($cible != 'all') {
                $requete = "SELECT * FROM " . $table . " WHERE " . $cible . " = :id";
                $stmt = $this->conx->prepare($requete);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            } else {
                $requete = "SELECT * FROM " . $table;
                $stmt = $this->conx->prepare($requete);
            }
            $stmt->execute();
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }
    
    // recupère les données entre les plannings et les joueurs
    public function readjoinpxj($pid, $fetchMethod = "fetchAll")
    {
        try {
            $requete = "SELECT joueur.id AS jid,joueur.nom_j as nom FROM pj_mm JOIN joueur ON joueur.id = pj_mm.joueur_id WHERE planning_id = :id ";
            $stmt = $this->conx->prepare($requete);
            $stmt->bindParam(':id', $pid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }

    // FONTION POUR AFFICHER LE PLANNING ET JOUEUR 
    public function planning($fetchMethod = "fetchAll")
    {
        try {
            $requete = "SELECT planning.date, joueur.nom_j as joueur, terrain.libelle_t AS terrain, joueur.role FROM planning JOIN pj_mm ON pj_mm.planning_id = planning.id JOIN joueur ON joueur.id = pj_mm.joueur_id JOIN terrain ON terrain.id = planning.terrain_id ORDER BY planning.date ASC, joueur.role DESC ";
            $stmt = $this->conx->prepare($requete);
            $stmt->execute();
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            $message = 'Erreur ! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }

    // Insert des données dans une table
    public function inserer($table, $namevalue1, $namevalue2, $value1, $value2)
    {
        if (($table == 'joueur')) {
            $sql_new_user = "INSERT INTO " . $table . " (" . $namevalue1 . ", " . $namevalue2 . ") VALUES (:value1, :value2)";

            $stmt = $this->conx->prepare($sql_new_user);

            $stmt->bindParam(':value1', $value1, PDO::PARAM_STR);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_STR);
        }

        if ($table == 'planning') {
            $sql_new_user = "INSERT INTO " . $table . " (" . $namevalue1 . ", " . $namevalue2 . ", code_date) VALUES (:value1, :value2, :value3)";

            $stmt = $this->conx->prepare($sql_new_user);

            $value3 = time();

            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
            $stmt->bindParam(':value3', $value3, PDO::PARAM_INT);
        }

        if ($table == 'pj_mm') {
            $sql_new_user = "INSERT INTO " . $table . " (" . $namevalue1 . ", " . $namevalue2 . ") VALUES (:value1, :value2)";

            $stmt = $this->conx->prepare($sql_new_user);

            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
        }

        $stmt->execute();
    }

    //On Met à jour une donnée dans une table
    public function update($table, $id, $value1, $value2)
    {
        if ($table == "joueur") {
            $sql = "UPDATE " . $table . " SET nom_j = :value1, role = :value2 WHERE id = :id";
            $stmt = $this->conx->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':value1', $value1, PDO::PARAM_STR);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_STR);
        }
        if ($table == "planning") {
            $sql = "UPDATE " . $table . " SET date = :value1, terrain_id = :value2 WHERE id = :id";
            $stmt = $this->conx->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
        }
        return $stmt->execute();
    }

    //On Supprime une donnée dans une table
    public function delete($table, $id)
    {
        $sql = "DELETE FROM " . $table . " WHERE id = :id";
        $stmt = $this->conx->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletepxj($idj, $idp)
    {
        $sql = "DELETE FROM pj_mm WHERE joueur_id = :value1 AND planning_id = :value2";
        $stmt = $this->conx->prepare($sql);
        $stmt->bindParam(':value1', $idj, PDO::PARAM_INT);
        $stmt->bindParam(':value2', $idp, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //On recupere le mot de passe hasher de l'utilisateur
    public function recup_pass($utilisateur)
    {
        $query = $this->conx->prepare("SELECT * FROM user WHERE nom_u=:utilisateur");
        $query->bindParam(':utilisateur', $utilisateur);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user['mdp'];
    }
    // vérifie si un utilisateur existe déjà dans une base de données 
    public function checkIfJxPExists($id_joueur, $id_planning)
    {
        $query = $this->conx->prepare("SELECT joueur_id FROM pj_mm WHERE planning_id=:idp AND joueur_id=:idj");
        $query->bindParam(':idj', $id_joueur, PDO::PARAM_INT);
        $query->bindParam(':idp', $id_planning, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    //On Retourne l'id de la dernière insertion par auto-incrément dans la base de données
    public function dernierIndex(): string
    {
        return $this->conx->lastInsertId();
    }
}
