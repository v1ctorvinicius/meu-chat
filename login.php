<?php

include_once("model/DBConnection.php");
include_once("model/Client.php");
include_once("util/error-codes.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if( empty($_POST['login']) || empty($_POST['password']) ){
        $status = -3;
        header("Location: error-handler.php/?status=$status");
    }

    $conn = DBConnection::createConnection();

    $query = sprintf("SELECT * FROM client WHERE login = '%s'", $conn->real_escape_string($_POST['login']));

    $result = $conn->query($query);

    $client = $result->fetch_assoc();

    if( ! $client){
        $status = ERROR_CLIENT_DOES_NOT_EXIST;
        header("Location: error-handler.php/?status=$status");
    }

    if(password_verify($_POST['password'], $client['password_hash'])){
        header("Location: /home.js");
    }

    exit;
}

?>