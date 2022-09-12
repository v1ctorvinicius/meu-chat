<?php

define("UNKNOWN_DB", 1049);

class DBConnection {

    private $conn;

    public static function createConnection(){
        $host = 'localhost';
        $username = 'root';
        $password = 'admin1234';
        $dbname = 'meuchat';

        $conn = new mysqli($host, $username, $password, $dbname);

        if($conn->connect_errno == UNKNOWN_DB){
            $query = "CREATE DATABASE $dbname";
            
            $stmt = $conn->prepare($query);

            if($stmt->execute() === false){
                $status = -2;
                header("Location: error-handler.php/?status=$status");
            }
        }
    
        if ($conn->connect_errno){
            die("db connection error: " . $conn->connect_error);
        }

        return $conn;
    }

    public function getDatabaseConnection() : mysqli {
        return $this->conn;
    }
}

?>