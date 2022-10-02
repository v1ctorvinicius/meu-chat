<?php

include_once("Client.php");

class PrivateChat {

    private array $clients;

    function __construct (Client $creator) {
        array_push($clients, $creator);
    }

}

?>