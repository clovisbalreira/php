<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura Do While</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Estrutura Do While</h1>
        <fieldset>
            <?php
                echo "<h2>Contagem crescente</h2>";
                $n = 1; 
                do{
                    echo "$n ";
                    $n++;
                }while($n < 10);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Contagem decrescente</h2>";
                $n = 10; 
                do{
                    echo "$n ";
                    $n--;
                }while($n > 0);
            ?>
        </fieldset>
        <fieldset>
            <form action="estruturadowhile.php" method="get">
                <div>
                    <label for="factorial">Numero:</label>
                    <input type="number" name="factorial" id="factorial" min="0" max="10">
                </div>
                <?php
                    $valor = $_GET['factorial'];
                    if($valor != ''){
                        echo "<h2>Calculando factorial de $valor</h2>";
                        $c = $valor;
                        $fat = 1;
                        do{
                            $fat = $fat * $c;
                            $c--;
                        }while($c >= 1);
                        echo "<p>$valor != $fat</p>";
                    }
                ?>
                <input type="submit" class='botao' value="Factorial">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturadowhile.php" method="get">
                <fieldset>
                    <div>
                        <label for="numero">Número:</label>
                        <select name="numero" id="numero">
                            <?php
                                $i = 1;
                                do{
                                    echo "<option value='$i'>$i</option>";
                                    $i++;
                                }while($i <= 10);
                            ?>
                        </select>
                    </div>
                </fieldset>
                <?php
                    $numero = $_GET['numero'];
                    $t = 1;
                    if($numero != ''){
                        echo "<h2>Mostrando a tabuada de $numero</h2>";
                        do{
                            echo "<p>$numero X $t = ". ($numero * $t) ."</p>";
                            $t++;
                        }while($t <= 10);
                    }
                ?>
                <input type="submit" class='botao' value="Tabuada">
            </form>
        </fieldset>
    </main>
</body>
</html>