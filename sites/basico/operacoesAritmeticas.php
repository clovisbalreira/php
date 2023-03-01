<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operações Aritmeticas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Operações Aritmeticas</h1>
        <?php
            $n1 = 3;
            $n2 = 2;
            $soma = $n1 + $n2;
            $subtracao = $n1 - $n2;
            $multiplicacao = $n1 * $n2;
            $divisao = $n1 / $n2;
            $modulo = $n1 % $n2;
            $media = ( $n1 + $n2 ) / 2;
            echo "A soma entre $n1 e $n2 é igual a $soma</br>";
            echo "A subtração entre $n1 e $n2 é igual a $subtracao</br>";
            echo "A multiplicação entre $n1 e $n2 é igual a $multiplicacao</br>";
            echo "A divisão entre $n1 e $n2 é igual a $divisao</br>";
            echo "A modulo ( resto divisaão ) entre $n1 e $n2 igual $modulo</br>";
            echo "A média entre $n1 e $n2 é igual a $media</br>";
            $v1 = $_GET['a'];
            $v2 = $_GET['b'];
            echo "Os valores recebidos: $a e $b</br>";
            echo "<h2>Valores aritmeticos</h2>";
            echo "Valor absoluto de $v2 é " . abs($v2) . "</br>";
            echo "Valor de $v1<sup>$v2</sup> é " . pow($v1,$v2) . "</br>";
            echo "Valor raiz de $v1 é " . sqrt($v1) . "</br>";
            echo "Valor arredondado de $v1 é " . round($v1) . "</br>";
            echo "Valor arredondado para baixo de $v1 é " . ceil($v1) . "</br>";
            echo "Valor arredondado para cima de $v1 é " . floor($v1) . "</br>";
            echo "Valor inteiro de numero real $v1 é " . intval($v1) . "</br>";
            echo "Valor $v1 formadato com casa decimais " . number_format($v1,2,",",".") . "</br>";


        ?>
    </main>
</body>
</html>