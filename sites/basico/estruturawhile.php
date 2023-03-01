<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura While</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Estrutura While</h1>
        <fieldset>
            <?php
                $c = 1;
                echo "<h3>Contagem crescente</h3>";
                while($c <= 10){
                    echo "$c ";
                    $c++;
                }
            ?>
        </fieldset>
        <fieldset>
            <?php
                $c1 = 10;
                echo "<h3>Contagem decrescente</h3>";
                while($c1 >= 1){
                    echo "$c1 ";
                    $c1--;
                }
            ?>
        </fieldset>
        <fieldset>
            <form action="estruturawhile.php" method="get">
                <?php
                    $c2 = 1;
                    while($c2 <= 5){
                        echo "<div><p>Valor $c2: </p><input type='number' name='valor$c2' id='valor' min='0' max='100' value='0'></div>";
                        $c2++;
                    }
                    $i = 1;
                    while($i <= 5){
                        $v = "num".$i;
                        $url = "valor".$i;
                        $$v = $_GET[$url];
                        $i++;
                    }
                    if($num1 != '' && $num2 != '' && $num3 != '' && $num4 != '' && $num5 != ''){
                        $i = 1;
                        while($i <= 5){
                            $v = "num".$i;
                            echo "<p>Valor $i : " . $$v . "</p>";
                            $i++;
                        }
                    }
                ?>
                <input type="submit" class='botao' value="Enviar">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturawhile.php" method="get">
                <div>
                    <label for="inicio">Inicio:</label>
                    <input type="number" name="inicio" id="inicio">
                </div>
                <div>
                    <label for="fim">Fim:</label>
                    <input type="number" name="fim" id="fim">
                </div>
                <div>
                    <label for="incremento">Incremento:</label>
                    <input type="number" name="incremento" id="incremento">
                </div>
                <?php
                    $inicio = $_GET['inicio'];
                    $fim = $_GET['fim'];
                    $incremento = $_GET['incremento'];
                    if($inicio != "" && $fim != "" && $incremento){
                        if($inicio < $fim){
                            while($inicio < $fim){
                                echo "$inicio ";
                                $inicio += $incremento;
                            }
                        }else if($inicio > $fim){
                            while($inicio > $fim){
                                echo "$inicio ";
                                $inicio -= $incremento;
                            }
                        }else{
                            echo "O inicio e fim são iguais ";
                        } 
                        echo "<br>";
                    }
                ?>
            <input type="submit" class='botao' value="Contar">
            </form>
        </fieldset>
    </main>
</body>
</html>