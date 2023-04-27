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
            $atual = date('Y');
            $nascimento = $_GET['nascimento'] ?? 1900;
            $anoAtual = $_GET['atual'] ?? $atual;
            $idade =  intval($anoAtual) - intval($nascimento);
        ?>
        <h1><strong>Calculando a sua idade</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="nascimento">Em que ano você nasceu?</label>
            <input type="number" name="nascimento" id="nascimento" value="<?=$nascimento?>" min="1900" max="<?= $atual - 1?>">
            <label for="atual">Quer saber sua idade em que ano ? ( atualmente estamos em <strong><?=$atual?></strong>)</label>
            <input type="number" name="atual" id="atual" value="<?=$atual?>" min="1900">
            <input type="submit" value="Qual ser'minha idade?">
        </form>
    </section>
    <section id="resultado">
        <h2>Resultado</h2>
        <p>Quem nasceu em <?=$nascimento?> vai ter <strong><?=$idade?> anos</strong> em <?=$anoAtual?>!</p>
    </section>
</body>
</html>