<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");

class ClientRepository {

    private mysqli $conn;

    function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    function create(string $login, string $password_hash) {
        $query = "INSERT INTO client (login, password_hash) VALUES (?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("ss", $login, $password_hash);
        
        if( $stmt->execute() === false){
            echo $stmt->errno;
            if($this->conn->errno == 1062){
                $status = -1; 
                header("Location: error-handler.php/?status=$status");
                exit;
            }
            else {
                die("sql error: " . $this->conn->error . "<br> error number: " . $this->conn->errno . "<hr>");
            }  
        }
        
        $stmt->close();
    }
}

?>