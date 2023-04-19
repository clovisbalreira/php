<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
        <?php
            $numero = $_POST["numero"] ?? 0;
            echo "<p>Analisando o número <strong>".number_format($numero,3,",",".")."</strong> informado pelo usuário:</p>";
            $inteiro = (int) $numero;
            $fracao = $numero - $inteiro;
        ?>
        <ul>
            <li>A parte inteira do número é <strong><?php echo number_format($inteiro,0,",",".");?></strong></li>
            <li>A parte fracionaria do número é <strong><?php echo number_format($fracao,3,",",".");?></strong></li>
        </ul>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>