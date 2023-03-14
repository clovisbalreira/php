<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <?php
        $valor = 58;
    ?>
    <section>
        <h1>Trabalhando com números aleatórios</h1>
        <p>Gerando um número aleatório entre 0 e 100...</p>
        <p>O valor gerado foi <strong><?php echo $valor;?></strong></p>
        <form action="" method="get">
            <input type="submit" value="Gerar outro">
        </form>
    </section>
</body>
</html>