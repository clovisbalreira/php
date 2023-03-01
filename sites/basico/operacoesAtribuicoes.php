<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operatores de Atribuições</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Operatores de Atribuições</h1>
        <?php
            $preco = $_GET["p"];
            echo "O preço do produto é $preco";
            //$preco = $preco + ( $preco * 10 / 100 );
            $preco += $preco * 10 / 100;
            echo "</br>O novo preço com 10% porcento de aumento é R$ ".number_format($preco,2);
            $precoDesconto = $_GET["p"];
            //$precoDesconto = $precoDesconto - ( $precoDesconto * 10 / 100 );
            $precoDesconto -= $precoDesconto * 10 / 100;
            echo "</br>O novo preço com 10% porcento de desconto é R$ ".number_format($precoDesconto,2,",",".");
            $anoAtual = $_GET["aa"];
            echo "</br>O ano atual é $anoAtual";
            echo "</br>O ano anterior é ".--$anoAtual;
            echo "</br>comentario uma linha ' // comentario ou # comentario' ";
            echo "</br>comentario multilinha ' /* comentario */' ";
            $a = 3;
            $b = &$a;
            $b += 5;
            echo "<h2>Variavel referencial</h2>";
            echo "</br>A variavel a vale $a";
            echo "</br>A variavel b vale $b";
            $site = "cursoemvideo";
            $$site = "Curso P.H.P.";
            echo "<h2>Variavel de variaveis</h2>";
            echo "</br>$site";
            echo "</br>$cursoemvideo";
        ?>
    </main>
</body>
</html>