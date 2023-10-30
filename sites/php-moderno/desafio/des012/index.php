<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônica</title>
    <link rel="stylesheet" href="../../css/formulario.css">
    <style>
        img{
            width: 100px;
            height: 50px;
        }
        ul{
            columns: 2;
        }
        li{
            list-style: none;
        }
        .moeda{
            width: 50px;
        }
    </style>
</head>
<body>
    <?php
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $saque = $_GET['saque'] ?? 0;
    ?>
    <section>
        <h1><strong>Caixa Eletrônica</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="sacar">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="saque" id="sacar" required value="<?=$saque?>" min="0">
            <input type="submit" value="Sacar">
        </form>
        <p>*Notas disponiveis: R$200, R$100, R$50, R$20, R$10, R$5, R$2, R$1</p>
    </section>
    <section id="resultado">
        <h2>Saque de <?=numfmt_format_currency($padrao, $sacar, "BRL")?> realizado</h2>
        <p>O Caixa eletrônico vai te entregar as seguintes notas:</p>
        <?php
            $resto = $saque;
            $tot200 = floor($resto / 200);
            $resto %= 200;
            $tot100 = floor($resto / 100);
            $resto %= 100;
            $tot50 = floor($resto / 50);
            $resto %= 50;
            $tot20 = floor($resto / 20);
            $resto %= 20;
            $tot10 = floor($resto / 10);
            $resto %= 10;
            $tot5 = floor($resto / 5);
            $resto %= 5;
            $tot2 = floor($resto / 2);
            $resto %= 2;
            $tot1 = floor($resto / 1);
            $resto %= 1;
        ?>
        <ul>
            <li><img src="./img/200-reais.jpg" alt="notas 200"> x <?=$tot200?></li>
            <li><img src="./img/100-reais.jpg" alt="notas 100"> x <?=$tot100?></li>
            <li><img src="./img/50-reais.jpg" alt="notas 50"> x <?=$tot50?></li>
            <li><img src="./img/20-reais.jpg" alt="notas 20"> x <?=$tot20?></li>
            <li><img src="./img/10-reais.jpg" alt="notas 10"> x <?=$tot10?></li>
            <li><img src="./img/5-reais.jpg" alt="notas 5"> x <?=$tot5?></li>
            <li><img src="./img/2-reais.jpg" alt="notas 2"> x <?=$tot2?></li>
            <li><img class="moeda" src="./img/1-real.jpg" alt="moeda 1"> x <?=$tot1?></li>
        </ul>
    </section>
</body>
</html>