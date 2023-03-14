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
    <main>
        <h1>Conversor de moedas v1.0</h1>
        <?php
            $valor = $_GET["valor"] ?? "0";
            $cotacao = 5.22;
            $dolar = $valor / $cotacao;
            echo "<p>Seus R$ $valor equivalem a  <strong>US$ $dolar</strong></p>";
            echo "<p><strong>Cotação fixa de R$: $cotacao</strong> informada diretamente no código.</p>";
        ?>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>