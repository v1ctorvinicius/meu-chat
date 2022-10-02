<?php 

include_once("Client.php");

class Clients {
    
    private array $clients;

    function __construct () {
        $this->clients = [];
    }

    public function add (string $client) : void {
        array_push($this->clients, $client);
    }

    public function get () : array {
        return $this->clients;
    }

}

?>