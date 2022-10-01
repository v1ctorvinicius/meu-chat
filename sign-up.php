<?php

include_once("service/RegisterClientService.php");
include_once("model/Client.php");

// check for errors in the user input
checkForms();

// create a new client in db
$registerClientService = new RegisterClientService();

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
$registerClientService->run($_POST['login'], $password_hash);
header("Location: sign-up-success.html");

function checkForms () {

    if( empty($_POST['login']) ){
        die("digite um login");
    }

    if( empty($_POST['password']) ){
        die("digite uma senha");
    }

    if( strlen($_POST['password']) < 8 ){
        die("a senha deve ter no mínimo 8 dígitos");
    }
    
    if( ! preg_match("/[a-z]/i", $_POST['password']) ){
        die("a senha deve conter pelo menos uma letra");
    }

    if( ! preg_match("/[0-9]/", $_POST['password']) ){
        die("a senha deve conter pelo menos um número");
    }

    if( empty($_POST['confirm-password']) && ! empty($_POST['password']) ){
        die("confirme a senha");
    }

    if( ($_POST['password']) !== $_POST['confirm-password']){
        die("as senhas não correspondem");
    }
}

?>