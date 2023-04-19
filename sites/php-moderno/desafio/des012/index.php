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
        }
    </style>
</head>
<body>
    <section>
        <h1><strong>Caixa Eletrônica</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="sacar">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="sacar" id="sacar">
            <input type="submit" value="Sacar">
        </form>
        <p>*Notas disponiveis: R$200, R$100, R$50, R$20, R$10, R$5, R$2</p>
    </section>
    <section id="resultado">
        <?php
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            $sacar = $_GET['sacar'] ?? 0;
        ?>
        <?php
            if($sacar[mb_strlen($sacar, 'UTF-8') - 1] == 1 || $sacar[mb_strlen($sacar, 'UTF-8') - 1] == 3){
                $menor = $sacar - 1;
                $maior = $sacar + 1;
                echo "<p>Digite um valor válido. Os dois valores mais próximos são $menor e $maior.</p>";
            }else{
                ?>
                    <h2>Saque de <?=numfmt_format_currency($padrao, $sacar, "BRL")?> realizado</h2>
                    <p>O Caixa eletrônico vai te entregar as seguintes notas:</p>
                <?php
                $duzentos = 0;
                $cem = 0;
                $cinquenta = 0;
                $vinte = 0;
                $dez = 0;
                $cinco = 0;
                $dois = 0;
                if($sacar >= 200){
                    $duzentos = $sacar / 200;
                    $caixaDuzentos -= intval($duzentos);
                    $sacar = $sacar % 200;
                }
                if($sacar >= 100){
                    $cem = $sacar / 100;
                    $sacar = $sacar % 100;
                }
                if($sacar >= 50){
                    $cinquenta = $sacar / 50;
                    $sacar = $sacar % 50;
                }
                if($sacar >= 20){
                    $vinte = $sacar / 20;
                    $sacar = $sacar % 20;
                }
                if($sacar >= 10){
                    $dez = $sacar / 10;
                    $sacar = $sacar % 10;
                }
                if($sacar >= 5){
                    if($sacar == 5 || $sacar == 7 || $sacar == 9){
                        $cinco = $sacar / 5;
                        $sacar = $sacar % 5;
                    }
                }
                if($sacar < 60){
                    if($sacar > 1){
                        $dois = $sacar / 2;
                    }
                }
            }
        ?>
        <ul>
            <li><img src="./img/200_front.jpg" alt="notas 200"> x <?=intval($duzentos)?></li>
            <li><img src="./img/100_front.jpg" alt="notas 100"> x <?=intval($cem)?></li>
            <li><img src="./img/50_front.jpg" alt="notas 50"> x <?=intval($cinquenta)?></li>
            <li><img src="./img/20_front.jpg" alt="notas 20"> x <?=intval($vinte)?></li>
            <li><img src="./img/10_front.jpg" alt="notas 10"> x <?=intval($dez)?></li>
            <li><img src="./img/5_front.jpg" alt="notas 5"> x <?=intval($cinco)?></li>
            <li><img src="./img/2_front.jpg" alt="notas 2"> x <?=intval($dois)?></li>
        </ul>
    </section>
</body>
</html>