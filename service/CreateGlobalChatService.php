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

        $creatorLogin = $_SESSION['login'];
        
        $conn = new DBConnection();
        $conn = $conn->getConnection();        
        
        $query = $conn->prepare("SELECT * FROM client c WHERE c.login = ?");
        $query->bindParam(1, $creatorLogin);
        // TODO - util\echoErrorCode
        // if($query->execute() == false){
        //     echoErrorCode($query);
        // }

        $creator = $query->fetch();

        $chat = new GlobalChat($name, $password, $creator);
        
        if( ! isset(GlobalChats::$globalChats)) {
            GlobalChats::$globalChats = [];
            array_push(GlobalChats::$globalChats, $chat);
            header("Location: global-chat.php");
        }

        array_push(GlobalChats::$globalChats, $chat);
        header("Location: global-chat.php");

        exit;
    }

}

?>