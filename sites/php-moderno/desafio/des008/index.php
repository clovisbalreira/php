<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médias Aritméticas</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <?php
        $valor1 = $_GET['valor1'] ?? '';
        $valor2 = $_GET['valor2'] ?? '';
        $peso1 = $_GET['peso1'] ?? '';
        $peso2 = $_GET['peso2'] ?? '';
    ?>
    <section>
        <h1><strong>Médias Aritméticas</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="valor1">1º Valor</label>
            <input type="number" name="valor1" id="valor1" value="<?= $valor1?>">
            <label for="peso1">1º Peso</label>
            <input type="number" name="peso1" id="peso1"
            min="1" value="<?= $peso1?>">
            <label for="valor2">2º Valor</label>
            <input type="number" name="valor2" id="valor2" value="<?= $valor2?>">
            <label for="peso2">2º Peso</label>
            <input type="number" name="peso2" id="peso2" min="1" value="<?= $peso2?>">
            <input type="submit" value="Calcular Médias">
        </form>
    </section>
    <section id="resultado">
        <?php
            $media = 0;
            $mediaPonderada = 0;
            if($valor1 != '' && $valor2 != '' && $peso1 != '' && $peso2 != ''){
                $media = ($valor1 + $valor2) / 2; 
                $mediaPonderada = ($valor1 * $peso1 + $valor2 * $peso2) / ($peso1 + $peso2);
            }
        ?>
        <h2>Cálculo das Médias</h2>
        <p>Analisando os valores <?=$valor1?> e <?=$valor2?>:</p>
        <ul>
            <li>A <strong>Média Aritmética Simples </strong>entre os valores é igual a <?=number_format($media,2,",",".")?></li>
            <li>A <strong>Média Aritmética Ponderada</strong> com pesos <?=$peso1?> e <?=$peso2?> é igual a <?=number_format($mediaPonderada,2,",",".")?></li>
        </ul>
    </section>
</body>
</html>