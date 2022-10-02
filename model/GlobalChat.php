<?php

class GlobalChat {
    private string $name;
    private string $password;
    private string $creator;

    function __construct (string $name, string $password, string $creator) {
        $this->name = $name;
        $this->password = $password;
        $this->creator = $creator;
    }

    public function getName () : string {
        return $this->name;
    }

}

?>