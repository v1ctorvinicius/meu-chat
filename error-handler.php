<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/style//error-page.css">
</head>
<body>
    <div class="only-message">
        <?php
            require_once("util/error-codes.php");

            $status = $_GET['status'];

            switch ($status) {
                case ERROR_LOGIN_ALREADY_EXISTS:
                    echo '
                        [!] esse login já existe
                        <a href="/sign-up.html">
                            <button>voltar</button>
                        </a>
                    ';
                    break;
                case ERROR_DB_NAME_UNKNOWN:
                    echo '
                        [!] não foi possível conectar ao banco de dados (banco de dados desconhecido)
                        <a href="/index.html">
                            <button>voltar</button>
                        </a>
                    ';
                    break;
                case ERROR_FILL_BOTH_FIELDS:
                    echo '
                        [!] preencha os dois campos
                        <a href="/index.html">
                            <button>voltar</button>
                        </a>
                    ';
                    break;
                default:
                    # code...
                    break;
            }
        ?>
    </div>
</body>
</html>