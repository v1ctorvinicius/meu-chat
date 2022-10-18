<!doctype html>
<html lang="en">
<head>
    <title>meu-chat</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style//default.css">
    <link rel="stylesheet" href="style//home.css">
</head>
<body>
    <h1>meu-chat</h1>
    <section id="global-chats">
        <?php
            require_once("model//GlobalChats.php");
            if( ! isset(GlobalChats::$globalChats)) {
                GlobalChats::$globalChats = [];
            }
            var_dump(GlobalChats::$globalChats);
        ?>
    </section>
    <section id="options">
        <div>
            <form action="create-global-chat.html">
                <button class="confirm-btn" type="submit" value="submit">criar chat global</button>
            </form>
        </div>
        <div>
            <button class="confirm-btn" type="submit" value="submit">chat privado</button>
        </div>
    </section>
</body>
</html>