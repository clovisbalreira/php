<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculando a sua idade</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <section>
        <?php
            $hoje = date('Y');
        ?>
        <h1><strong>Calculando a sua idade</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="nascimento">Em que ano você nasceu?</label>
            <input type="number" name="nascimento" id="nascimento">
            <label for="atual">Quer saber sua idade em que ano ? ( atualmente estamos em <strong><?=$hoje?></strong>)</label>
            <input type="number" name="atual" id="atual" value="<?=$hoje?>">
            <input type="submit" value="Qual ser'minha idade?">
        </form>
    </section>
    <section id="resultado">
        <?php
            $nascimento = $_GET['nascimento'] ?? 0;
            $atual = $_GET['atual'] ?? $hoje;
            $idade =  intval($atual) - intval($nascimento);
        ?>
        <h2>Resultado</h2>
        <p>Quem nasceu em <?=$nascimento?> vai ter <strong><?=$idade?> anos</strong> em <?=$atual?>!</p>
    </section>
</body>
</html>