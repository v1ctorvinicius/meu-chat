<?php

include_once("model/Client.php");

class Chat {

    private array $clients;

    function __construct (Client $creator) {
        array_push($clients, $creator);
    }

}

?>