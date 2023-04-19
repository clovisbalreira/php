<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajustador de Preços</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <section>
        <h1><strong>Reajustador de Preços</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco">
            <label for="porcentagem">Qual será o percentual de reajuste? (<strong><output id="output">0</output>%</strong>)</label>
            <input type="range" id="range" name="range" min="0" max="100" value="0" oninput="output.value = range.value">
            <input type="submit" value="Reajustar">
        </form>
    </section>
    <section id="resultado">
        <?php
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            $preco = $_GET['preco'] ?? 0;
            $porcentagem = $_GET['range'] ?? 0;
            $reajuste = $preco + ($preco / 100) * $porcentagem ;
            ?>
        <h2>Resultado do Reajuste</h2>
        <p>O produto que custava <?=numfmt_format_currency($padrao, $preco, "BRL")?>, com <strong><?=$porcentagem?>% de aumento </strong>vai passar a custar <strong><?=numfmt_format_currency($padrao, $reajuste, "BRL")?></strong> a partir de agora.</p>
    </section>
</body>
</html>