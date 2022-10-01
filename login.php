<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");
include_once("util/error-codes.php");
include_once("model/Clients.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if( empty($_POST['login']) || empty($_POST['password']) ){
        $status = ERROR_FILL_BOTH_FIELDS;
        header("Location: error-handler.php/?status=$status");
        exit;
    }

    $login = $_POST['login'];

    $conn = new DBConnection();
    $conn = $conn->getConnection();

    $query = $conn->prepare("SELECT * FROM client c WHERE c.login = ?");
    $query->bindParam(1, $login);
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

    // login success
    if(password_verify($_POST['password'], $result['password_hash'])){
        session_start();
        $_SESSION['login'] = $login;
        if ( ! isset(Clients::$clients)) {
            Clients::$clients = [];
        }
        
        array_push(Clients::$clients, $result);

        header("Location: /home.php");
        exit;
    }

    exit;
}

function echoErrorCode (PDOStatement $query) : void {
    die("query error: " . $query->errorCode());
}

?>