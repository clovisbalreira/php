<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
        <?php
            /* variavel super global 
            $_GET, 
            $_POST, 
            $_REQUEST é a junção de $_GET, $_POST e $_COKKIES ( ocupa mais a memoria )
            */
            $nome = $_GET["nome"] ?? "desconhecido";
            $sobrenome = $_GET["sobrenome"] ?? "desconhecido";
            echo "<p>É um grande prazer em de conhecer <strong>$nome $sobrenome</strong>! Este é o meu site!</p>";
        ?>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>