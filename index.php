<!doctype html>
<html lang="en">
<head>
    <title>meu-chat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style//index.css"></style>
</head>
<body>
    <h1>meu-chat</h1>
    <div class="credentials">
        <form action="/index.php" method="get" id="credentials-form">
            <label for="login">login</label>
            <input type="text" id="login" name="login">
            <label for="password">senha</label>
            <input type="text" id="password" name="password">
            <button type="submit" form="credentials-form" value="submit">entrar</button>
        </form>
    </div>
    <div id="options">
        <a id="password-recover" href="password-recover.php">esqueceu a senha?</a>
        <a id="sign-up" href="sign-up.php">cadastrar</a>
    </div>

    <?php
        $login = $_GET['login'];
        $password = $_GET['password'];
    ?>

</body>
</html>