<?php 

include_once("model/Client.php");

class CreateGlobalChatService {

    private string $name;
    private string $password;
    private string $creator;

    function __construct (string $creator) {
        $this->creator = $creator;
        $this->name = $_POST['name'];
        $this->password = $_POST['password'];
        if (empty($_POST['name'])) {
            $this->name = $creator->getLogin();
        }
    }

}

?>