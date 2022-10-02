<?php 

include_once("../model/GlobalChat.php");
include_once("../model/GlobalChats.php");

class CreateGlobalChatService {

    public static function execute () {

        session_start();

        if (isset($_POST['name'])) {
            $name = $_POST['name'] . "'s chat";
        } else {
            $name = $_SESSION['login'];
        }

        if (isset($_POST['password'])) { 
            $password = $_POST['password'];
        } else {
            $password = '';
        }

        $creator = $_SESSION['login'];

        $chat = new GlobalChat($name, $password, $creator);
        
        if( ! isset(GlobalChats::$globalChats)) {
            GlobalChats::$globalChats = [];
        }

        header("Location: global-chat.php");

        exit;
    }

}

?>