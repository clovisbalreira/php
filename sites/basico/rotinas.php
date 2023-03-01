<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotinas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Rotinas</h1>
        <fieldset>
            <?php
                function soma($a,$b){
                   $s = $a + $b;
                   echo "<p>A soma de $a e $b vale $s</p>"; 
                }
                echo "<h2>Função sem retorno</h2>";
                soma(3,4);
            ?>
        </fieldset>
        <fieldset>
            <?php
                function somaReturno($a,$b){
                    return $a + $b;
                }
                $x = 5;
                $y = 7;
                $soma = somaReturno($x,$y);
                echo "<h2>Função com retorno</h2>";
                echo "<p>A soma de $x e $Y vale $soma</p>"; 
            ?>
        </fieldset>
        <fieldset>
            <?php
                function somaMultiplos(){
                    $paramentro = func_get_args();
                    $totalArgumentos = func_num_args();
                    $s = 0;
                    for($i=0;$i<$totalArgumentos;$i++){
                        $s += $paramentro[$i];
                    }
                    return $s;
                }
                $somaMultiplos = somaMultiplos(3,5,2);
                echo "<h2>Função com Multiplos parametros</h2>";
                echo "<p>A soma de 3 , 5 , 2 vale $somaMultiplos</p>"; 
            ?>
        </fieldset>
        <fieldset>
            <?php
                function semReferencia($x){
                    $x += 2;
                    echo "<p>O
                    valor de X é $x</p>";
                }
                $c = 3;
                echo "Função sem referencia";
                semReferencia($c);
                echo "<p>O valor de X é $c</p>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                function comReferencia(&$x){
                    $x += 2;
                    echo "<p>O
                    valor de X é $x</p>";
                }
                $c = 3;
                echo "Função com referencia";
                comReferencia($c);
                echo "<p>O valor de X é $c</p>";            
            ?>
        </fieldset>
        <fieldset>
                <?php
                    // continua o procendimento do programa
                    include 'funcao/funcoes.php';  
                    // para o procendimento do programa
                    //require 'funcao/funcoes.php';   
                    //ele carrega so um vez o arquivo
                    //include_once 'funcao/funcoes.php'; 
                    //require_once 'funcao/funcoes.php';
                    echo "<h2>Função externa</h2>"  ;              
                    ola();
                    mostrarValor(4);
                ?>
            </form>
        </fieldset>
    </main>
</body>
</html>