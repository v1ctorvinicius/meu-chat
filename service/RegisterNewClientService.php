<?php 

include_once("model/DBConnection.php");
include_once("repository/ClientRepository.php");

class RegisterNewClientService {

    public function run(string $login, string $password_hash){
        if(is_null($login) || is_null($password_hash)){
            die("credenciais nulas");
        }
        
        $conn = new DBConnection();
        $repo = new ClientRepository($conn);
        $repo->create($login, $password_hash);
        
        unset($conn);
    }

}    

?>