<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");
include_once("util/error-codes.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if( empty($_POST['login']) || empty($_POST['password']) ){
        $status = ERROR_FILL_BOTH_FIELDS;
        header("Location: error-handler.php/?status=$status");
        exit;
    }

    $conn = new DBConnection();
    $conn = $conn->getConnection();

    $query = $conn->prepare("SELECT * FROM client c WHERE c.login = ?");
    $query->bindParam(1, $_POST['login']);
    if($query->execute() == false){
        echoErrorCode($query);
    }
    
    $result = $query->fetch();

    if($query->errorCode() != "00000"){
        echoErrorCode($query);
    }

    if( ! $result){
        $status = ERROR_CLIENT_DOES_NOT_EXIST;
        header("Location: error-handler.php/?status=$status");
        exit;
    }

    if(password_verify($_POST['password'], $result['password_hash'])){
        header("Location: /home.php");
        exit;
    }

    exit;
}

function echoErrorCode (PDOStatement $query) : void {
    die("query error: " . $query->errorCode());
}

?>