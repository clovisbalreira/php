<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetores</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Vetores</h1>
        <fieldset>
            <?php
                echo "<h2>Criando vetores</h2>";
                $n = array(3,5,8,2);
                $n[] = 7;
                echo "<pre>";
                print_r($n);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Cria um array começando por um numero e derminando por outro e pulando com valor que quiser</h2>";
                $c = range(5,20,5);
                echo "<pre>";
                print_r($c);
                echo "</pre>";
                foreach($c as $valor){
                    echo "$valor  ";
                }
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Chaves personalizadas</h2>";
                $v = array(3=>5,1=>9,0=>8,7=>7);
                $v[] = 3;
                echo "<pre>";
                print_r($v);
                echo "</pre>";
                echo "<h2>Deslocar valor</h2>";
                unset($v[7]);
                echo "<pre>";
                print_r($v);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Chaves Associativas</h2>";
                $cad = array("nome" => "Ana", "idade" => 23,"peso" => 65.5);
                $cad["fuma"] = true;
                echo "<pre>";
                print_r($cad);
                echo "</pre>";
                foreach($cad as $campo => $valor){
                    echo "<p>O valor de $campo é $valor</p>";
                }
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Arrays dentro de arrays</h2>";
                $m = array(array(6,4),array(4,9),array(3,2));
                //$m=[0][1] = $m[2][0];
                echo "<pre>";
                print_r($m);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Quantos elementos tem o vetor</h2>";
                $v = array("A","J","M","X","K");
                echo "<p>O vetor tem " . count($v) . " elementos</p>";
                echo "<pre>";
                print_r($v);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Colocar elementos no final</h2>";
                $v = array("A","J","M","X","K");
                echo "<pre>";
                print_r($v);
                echo "</pre>";
                //$v[] = "O";
                array_push($v,"O");
                echo "<pre>";
                print_r($v);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Elimina o ultimo valor</h2>";
                $v = array("A","J","M","X","K");
                echo "<pre>";
                print_r($v);
                echo "</pre>";
                array_pop($v);
                echo "<pre>";
                print_r($v);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                 echo "<h2>Colocar elementos no inicio</h2>";
                 $v = array("A","J","M","X","K");
                 echo "<pre>";
                 print_r($v);
                 echo "</pre>";
                 array_unshift($v,"O");
                 echo "<pre>";
                 print_r($v);
                 echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Elimina o primeiro valor</h2>";
                $v = array("A","J","M","X","K");
                echo "<pre>";
                print_r($v);
                echo "</pre>";
                array_shift($v);
                echo "<pre>";
                print_r($v);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Colocar vetores em ordem crescente</h2>";
                $num = array("A","J","M","X","K");
                echo "<pre>";
                print_r($num);
                echo "</pre>";
                echo "<pre>";
                sort($num);
                print_r($num);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Colocar vetores em ordem decrescente</h2>";
                $num1 = array("A","J","M","X","K");
                echo "<pre>";
                print_r($num1);
                echo "</pre>";
                echo "<pre>";
                rsort($num1);
                print_r($num1);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Ordenação associativa crescente( mexe os valores e os indices )</h2>";
                $num1 = array("A","J","M","X","K");
                echo "<pre>";
                print_r($num1);
                echo "</pre>";
                echo "<pre>";
                asort($num1);
                print_r($num1);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Ordenação associativa decrescente( mexe os valores e os indices )</h2>";
                $num1 = array("A","J","M","X","K");
                echo "<pre>";
                print_r($num1);
                echo "</pre>";
                echo "<pre>";
                arsort($num1);
                print_r($num1);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Ordenação por chaves</h2>";
                $num1 = array(2=>"A",3=>"J",0=>"M",1=>"X",4=>"K");
                echo "<pre>";
                print_r($num1);
                echo "</pre>";
                echo "<pre>";
                ksort($num1);
                print_r($num1);
                echo "</pre>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Ordenação por chaves decrescente</h2>";
                $num1 = array(2=>"A",3=>"J",0=>"M",1=>"X",4=>"K");
                echo "<pre>";
                print_r($num1);
                echo "</pre>";
                echo "<pre>";
                krsort($num1);
                print_r($num1);
                echo "</pre>";
            ?>
        </fieldset>
    </main>
</body>
</html>