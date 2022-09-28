<?php

include_once("util/error-codes.php");
include_once("util/properties.php");

// define("UNKNOWN_DB", 1049);
define("SQL_NO_ERROR", 0);

class DBConnection {

    private PDO $conn;

    function __construct () {
        $this->conn = new PDO('mysql:host=localhost;dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $this->checkIfDbExists();
        if ($this->conn->connect_errno){
            die("db connection error: " . $this->conn->connect_error);
        }
    }

    public function createConnection () : PDO{
        try {
            date_default_timezone_set('America/Sao_Paulo');
            return $this->conn;
        } catch (PDOException $e) {
            echo 'error: ' . $e->getMessage();
        }
    }

    public function getConnection () : PDO {
        return $this->conn;
    }
    
    // TO - DO !
    // private function checkIfDbExists () {
    //     if($this->conn->errorInfo() !== SQL_NO_ERROR){
    //         echo($this->conn->errorInfo());
    //         $query = "CREATE DATABASE " . MYSQL_DB_NAME;
            
    //         $stmt = $this->conn->prepare($query);
    
    //         if($stmt->execute() === false){
    //             $status = ERROR_DB_NAME_UNKNOWN;
    //             header("Location: error-handler.php/?status=$status");
    //         }
    //     }
    // }
}

?>