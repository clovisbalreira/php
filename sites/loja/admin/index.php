<?php
    require_once '../includes/conexao.php';
    require_once '../includes/login.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Unique Arts e Sim</title>
        <link rel="shortcut icon" href="../assets/imagens/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="./css//style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <header>
            <img src="../assets/imagens/logo/uniqueartesim.png" alt="Unique art e sim">
            <?php 
                require_once './componente/menu.php';
            ?>
        </header>
        <main>
            <?php
                if($_SESSION['user'] == '' && $_SESSION['nome'] == '' && $_SESSION['tipo'] == '' && $_SESSION['atualizar'] == ''){
                    require_once './mvc/view/login.php';
                }else{
                    require_once './function/acesso.php';
                    require_once './mvc/controller/controller.php';
                }
            ?>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./js/tela.js"></script>
    <script src="./js/pesquisa.js"></script>
    <script>
        var iframe = document.querySelector('iframe')
        iframe.setAttribute('width', '30')
        iframe.setAttribute('height', '30')
    </script>
</body>
</html>