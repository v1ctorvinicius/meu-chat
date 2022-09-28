<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");
include_once("util/properties.php");

class ClientRepository {

    private $conn;

    function __construct(DBConnection $conn) {
        $this->conn = $conn->getConnection();
    }

    function create(string $login, string $password_hash) {

        $queryText = "INSERT INTO client (login, password_hash) VALUES (?, ?)";
        $query = $this->conn->prepare($queryText);
        $query->bindParam(1, $login);
        $query->bindParam(2, $password_hash);

        $data = $query->execute();
        print_r($data);

        if( $data === false){
            echo $query->errno;
            if($this->conn->errno == 1062){
                $status = -1; 
                header("Location: error-handler.php/?status=$status");
                exit;
            }
            else {
                die("sql error: " . $this->conn->error . "<br> error number: " . $this->conn->errno . "<hr>");
            }  
        }
    }

    public function read (string $login) {
        $data = $this->conn->query("SELECT * FROM client c WHERE c.login = $login");
        foreach($data as $row){
            print_r($row);
        }
    }
}

?>