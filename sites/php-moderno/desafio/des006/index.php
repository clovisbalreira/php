<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe seu salário</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <section>
        <?php
            $salarioMinimo = 1_380.60;
            $salario = $_GET['salario'] ?? 0;
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        ?>
        <h1><strong>Informe seu salário</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="salario" id="salario" value="<?=$salario?>" step=".01">
            <p>Considerando o salário mínimo de <strong><?=numfmt_format_currency($padrao, $salarioMinimo, "BRL")?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </section>
    <section id="resultado">
        <?php
            $quantidadeSalario = intdiv($salario, $salarioMinimo);
            $mais = $salario - ($salarioMinimo * $quantidadeSalario);
            //$mais = $salario % $salarioMinimo;
        ?>
        <h2>Resultado Final</h2>
        <p>Quem recebe um salário de <?=numfmt_format_currency($padrao, $salarioMinimo, "BRL")?> ganha <strong><?=floor($quantidadeSalario)?> salários mínimos </strong>+ <?=numfmt_format_currency($padrao, $mais, "BRL")?></p>
    </section>
</body>
</html>