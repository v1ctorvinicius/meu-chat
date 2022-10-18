<?php

class GlobalChat {
    private string $name;
    private string $password;
    private string $creator;
    private Client $clients;

    function __construct (string $name, string $password, Client $creator) {
        $this->name = $name;
        $this->password = $password;
        $this->creator = $creator;

        require __DIR__ . '/vendor/autoload.php';
        $http = new React\Http\HttpServer(function (Psr\Http\Message\ServerRequestInterface $request) {
            return React\Http\Message\Response::plaintext(
                "Hello World!\n"
            );
        });

        $socket = new React\Socket\SocketServer('127.0.0.1:8080');
        $http->listen($socket);
        echo "Server running at http://127.0.0.1:8080" . PHP_EOL;
    }

    public function getName () : string {
        return $this->name;
    }

}

?>