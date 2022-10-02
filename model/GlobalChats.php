<?php

include_once("GlobalChat.php");

class GlobalChats {

    public static array $globalChats;

    function __construct () {
        $this->GlobalChats = [];
    }

    public function add (GlobalChat $chat) : void {
        array_push($this->GlobalChats, $chat);
    }

}

?>