<?php
    require_once '../model/Acesso.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Supermercado - Sair</title>
</head>
<body>
    <h1>Deslocado com sucesso</h1>
    <?php 
        $_SESSION['usuario'] = ''; 
        header("Refresh:1; ../"); 
    ?>
</body>
</html>