<?php

class Client {
    private string $login;
    private string $passwordHash;
    private string $email;
    private int $id;

    public function __construct(string $login, string $passwordHash){
        $this->login = $login;
        $this->passwordHash = $passwordHash;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getPasswordHash(){
        return $this->passwordHash;
    }
}

?>