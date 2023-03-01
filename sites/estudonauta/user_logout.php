<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <?php
        require_once 'includes/banco.php'; 
        require_once 'includes/login.php'; 
        require_once 'functions/functions.php' 
    ?>
    <main id="corpo">
        <?php
            logout();
            echo msg_sucesso('Deslogado com sucesso');
            echo voltar();
        ?>
    </main>
</body>
</html>