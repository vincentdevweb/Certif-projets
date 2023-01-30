<?php

namespace PALLAS\App\Utils\Database;

use PDO, PDOException;

class PdoDb
{
    // Singleton instance to prevent multiple database connections
    private static $usedb = null;

    // Database connection object
    private $conx;

    // Constructor to initiate a database connection
    public function __construct()
    {
        // Get the database configuration from the global scope
        global $conf;

        try {
            // Connect to the database using PDO and set the connection to UTF-8
            $this->conx = new PDO('mysql:host=' . $conf['db']['host'] . ';dbname=' . $conf['db']['database'], $conf['db']['user'], $conf['db']['password'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
            // Set the error mode to exceptions to handle any errors gracefully
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Display the error message and die
            $message = 'Error! ' . $e->getMessage() . '<hr />';
            die($message);
        }
    }

    
    //This method serves as the destructor for the class.
    //It is used to close the database connection and prevent any memory leaks.
    public function __destruct()
    {
    // Set the database connection to null
    $this->conx = null;
    }
    
    // Get the singleton instance of the class
    public static function getInstance(): ?PdoDb
    {
        if (is_null(self::$usedb)) {
            self::$usedb = new PdoDb();
        }
        return self::$usedb;
    }

    //Retrieve data from the database
    public function read($table, $id, $fetchMethod = 'fetchAll', $target = 'id')
    {
        try {
            // If the target is not set to all, fetch the data based on the given id
            if ($target != 'all') {
                $query = "SELECT * FROM " . $table . " WHERE " . $target . " = :id";
                $stmt = $this->conx->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            } else {
                // If the target is set to all, fetch all the data from the table
                $query = "SELECT * FROM " . $table;
                $stmt = $this->conx->prepare($query);
            }
            $stmt->execute();
            // Store the result in a variable
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            // Catch and display any errors
            $message = 'Error! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        // Return the result
        return $result;
    }

    // Function to retrieve data between schedules and players
    public function readjoinpxj($pid, $fetchMethod = "fetchAll")
    {
        try {
            // Prepare SQL statement to select data from the pj_mm and player tables
            $query = "SELECT joueur.id AS jid, joueur.nom_j as nom FROM pj_mm JOIN joueur ON joueur.id = pj_mm.joueur_id WHERE planning_id = :id";
            $stmt = $this->conx->prepare($query);
            // Bind the id parameter to prevent SQL injection
            $stmt->bindParam(':id', $pid, PDO::PARAM_INT);
            // Execute the statement
            $stmt->execute();
            // Fetch the result according to the fetch method (fetchAll or fetch)
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            // Display error message
            $message = 'Error! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        // Return the result
        return $result;
    }

    // Function to display the planning and player
    public function planning($fetchMethod = "fetchAll")
    {
        try {
            // Query to select the planning, player, terrain, and role information
            $query = "SELECT planning.date, joueur.nom_j as player, terrain.libelle_t AS terrain, joueur.role
            FROM planning
            JOIN pj_mm ON pj_mm.planning_id = planning.id
            JOIN joueur ON joueur.id = pj_mm.joueur_id
            JOIN terrain ON terrain.id = planning.terrain_id
            ORDER BY planning.date ASC, terrain.libelle_t ASC, joueur.role DESC ";
            // Prepare and execute the query
            $stmt = $this->conx->prepare($query);
            $stmt->execute();

            // Store the result of the query
            $result = $stmt->{$fetchMethod}();
        } catch (PDOException $e) {
            // Display an error message if there is an issue with the query
            $message = 'Error! ' . $e->getMessage() . '<hr />';
            die($message);
        }
        return $result;
    }

    // Function to insert data into a table
    public function insertData($table, $nameValue1, $nameValue2, $value1, $value2)
    {

        // Prepare the SQL statement based on the table
        if ($table == 'joueur') {
            $sql = "INSERT INTO $table ($nameValue1, $nameValue2) VALUES (:value1, :value2)";
            $stmt = $this->conx->prepare($sql);

            // Bind the parameters to their respective values
            $stmt->bindParam(':value1', $value1, PDO::PARAM_STR);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_STR);
        } elseif ($table == 'planning') {
            $sql = "INSERT INTO $table ($nameValue1, $nameValue2, code_date) VALUES (:value1, :value2, :value3)";
            $stmt = $this->conx->prepare($sql);
            $value3 = time();

            // Bind the parameters to their respective values
            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
            $stmt->bindParam(':value3', $value3, PDO::PARAM_INT);
        } elseif ($table == 'pj_mm') {
            $sql = "INSERT INTO $table ($nameValue1, $nameValue2) VALUES (:value1, :value2)";
            $stmt = $this->conx->prepare($sql);

            // Bind the parameters to their respective values
            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
        }

        // Execute the prepared statement
        $stmt->execute();
    }


    //Updates a data in a table
    public function update($table, $id, $value1, $value2)
    {
        //SQL statement for updating data in the "joueur" table
        if ($table == "joueur") {
            $sql = "UPDATE " . $table . " SET nom_j = :value1, role = :value2 WHERE id = :id";
            $stmt = $this->conx->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':value1', $value1, PDO::PARAM_STR);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_STR);
        }
        //SQL statement for updating data in the "planning" table
        if ($table == "planning") {
            $sql = "UPDATE " . $table . " SET date = :value1, terrain_id = :value2 WHERE id = :id";
            $stmt = $this->conx->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':value1', $value1, PDO::PARAM_INT);
            $stmt->bindParam(':value2', $value2, PDO::PARAM_INT);
        }
        //Execute the prepared statement
        return $stmt->execute();
    }

    //Delete a single record in a table
    public function delete($table, $id)
    {
        $sql = "DELETE FROM " . $table . " WHERE id = :id";
        $stmt = $this->conx->prepare($sql);
        //Bind the value of the id to the placeholder ':id'
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        //Execute the DELETE statement
        return $stmt->execute();
    }

    //Delete multiple records in a join table
    public function deletepxj($idj, $idp)
    {
        $sql = "DELETE FROM pj_mm WHERE joueur_id = :value1 AND planning_id = :value2";
        $stmt = $this->conx->prepare($sql);
        //Bind the value of the joueur_id to the placeholder ':value1'
        $stmt->bindParam(':value1', $idj, PDO::PARAM_INT);
        //Bind the value of the planning_id to the placeholder ':value2'
        $stmt->bindParam(':value2', $idp, PDO::PARAM_INT);
        //Execute the DELETE statement
        return $stmt->execute();
    }

    //Get hashed password for user
    public function getUserPassword($user)
    {
        // Prepare SELECT statement to retrieve user password
        $stmt = $this->conx->prepare("SELECT * FROM user WHERE nom_u=:user");
        // Bind user name to statement
        $stmt->bindParam(':user', $user);
        // Execute statement
        $stmt->execute();
        // Fetch result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // Return password
        return $result['mdp'];
    }

    //Check if player exists in a database
    public function isPlayerInDB($player_id, $planning_id)
    {
        // Prepare SELECT statement to check player's presence
        $stmt = $this->conx->prepare("SELECT joueur_id FROM pj_mm WHERE planning_id=:planning_id AND joueur_id=:player_id");
        // Bind parameters to statement
        $stmt->bindParam(':player_id', $player_id, PDO::PARAM_INT);
        $stmt->bindParam(':planning_id', $planning_id, PDO::PARAM_INT);
        // Execute statement
        $stmt->execute();
        // Check if any rows were returned
        if ($stmt->rowCount() > 0) {
            // Player already exists in database
            return false;
        } else {
            // Player does not exist in database
            return true;
        }
    }
}
