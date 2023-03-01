<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operacionais Relacionais</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Operacionais Relacionais</h1>
        <?php
            $tipo = $_GET['op'];
            $a = $_GET['a'];
            $b = $_GET['b'];
            $anoNascimento = $_GET['an'];
            echo "Valor $a";
            echo "</br>Valor $b";
            $r = ($tipo == "s") ? $a + $b : $a * $b;
            echo "</br>O resultado é $r";
            $y = 3;
            $x = "3";
            $resultadoIguais = ($x == $y) ? "Sim" : "Não";
            $resultadoIdenticas = ($x === $y) ? "Sim" : "Não";
            $m = ($a + $b) / 2;
            echo "</br>A media entre $a e $b é $m";
            echo "</br>A situação do aluno é " . (($m < 6) ? "Reprovado" : "Aprovado") ;
            $idade = date("Y") - $anoNascimento;
            echo "</br>Quem nasceu em $anoNascimento tem $idade anos";
            $voto = ( $idade >= 18 && $idade<=65) ? "Obrigadorio" : "Não obrigadorio";
            echo "</br>Seu voto é $voto";
            echo "<h2>Valores iguais e identicas</h2>";
            echo "</br>Valor $y número";
            echo "</br>Valor $x string";
            echo "</br>As variaveis $y e $x são iguais? $resultadoIguais";
            echo "</br>As variaveis $y e $x são identicas? $resultadoIdenticas";
        ?>
    </main>
</body>
</html>
