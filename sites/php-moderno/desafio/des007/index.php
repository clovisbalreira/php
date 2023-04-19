<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raiz Quadrada e cúbica</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <?php
        $numero = $_GET['numero'] ?? 0;
        //$raizQuadrada = sqrt($numero);
        $raizQuadrada = $numero ** (1/2);
        //$raizCubica = pow($numero, 1/3);
        $raizCubica = $numero **  (1/3);
    ?>
    <section>
        <h1><strong>Informe um número</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="numero">Número</label>
            <input type="number" name="numero" id="numero">
            <input type="submit" value="Calcular Raizes">
        </form>
    </section>
    <section id="resultado">
        <h2>Resultado Final</h2>
        <p>Analisando o <strong>número <?=$numero?></strong>. temos:</p>
        <ul>
            <li>A sua raiz quadrada é <strong><?=number_format($raizQuadrada,3,",",".")?></strong></li>
            <li>A sua raiz cúbica é <strong><?=number_format($raizCubica,3,",",".")?></strong></li>
        </ul>
    </section>
</body>
</html>