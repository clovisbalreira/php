<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Final</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <main>
        <h1>Resultado Final</h1>
        <p>
            <?php
                $numero = $_GET["numero"] ?? 0;
                $antecessor = $numero - 1;
                $sucessor = $numero + 1;
                echo "O número escolhido foi <strong>$numero</strong>";
                echo "<br>O <em>seu antecessor</em> é $antecessor";
                echo "<br>O seu <em>sucessor</em> é $sucessor";
            ?>
        </p>
        <!-- <button onclick="javascript:window.location.href='index.php'">&#x2B05;Voltar</button> -->
        <button onclick="javascript:history.go(-1)">&#x2B05;Voltar</button>
    </main>
</body>
</html>