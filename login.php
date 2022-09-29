<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");
include_once("util/error-codes.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if( empty($_POST['login']) || empty($_POST['password']) ){
        $status = -3;
        header("Location: error-handler.php/?status=$status");
    }

    $conn = new DBConnection();
    $conn = $conn->getConnection();

    $query = $conn->prepare("SELECT * FROM client c WHERE c.login = ?");
    $query->bindParam(1, $_POST['login']);
    if($query->execute() == false){
        die("query error: " . $query->errorCode());
    }
    
    $result = $query->fetch();

    if($query->errorCode() != "00000"){
        die("query error: " . $query->errorCode());
    }

    if( ! $result){
        $status = ERROR_CLIENT_DOES_NOT_EXIST;
        header("Location: error-handler.php/?status=$status");
    }

    if(password_verify($_POST['password'], $result['password_hash'])){
        header("Location: /home.js");
    }

    exit;
}

?>