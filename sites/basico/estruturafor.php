<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura For</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Estrutura For</h1>
        <fieldset>
            <?php
                echo "<h3>Contagem crescente</h3>";
                for($c = 1; $c <= 10; $c++){
                    echo "$c ";
                }
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h3>Contagem decrescente</h3>";
                for($c = 10; $c >= 1; $c--){
                    echo "$c ";
                }
            ?>
        </fieldset>
        <fieldset>
            <form action="estruturafor.php" method="get">
                <div>
                    <label for="num">Número:</label>
                    <select name="num" id="num">
                        <?php
                            for($i = 1; $i <= 10;$i++){
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
                    </select>
                </div>
                <?php
                    $valor = $_GET['num'];
                    if($valor != ''){
                        for($i = 1; $i <= 10; $i++){
                            echo "<p>$i X $valor = ". ( $i * $valor )."</p>";
                        }
                    }
                ?>
                <input type="submit" class='botao' value="Tabuada">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturafor.php" method="get">
                <div>
                    <label for="primo"></label>
                    <input type="number" name="primo"
                    id="primo" min="0" max="1000000">
                </div>
                <?php
                    $valor = $_GET['primo'];
                    if($valor != ''){
                        echo "<h2>Analisando o número $valor...</h2>";
                        echo "<p>Valores múltiplos: "; $totalPrimo = 0;
                        for($i = 1; $i <= $valor;$i++){
                            if($valor % $i == 0){
                                $totalPrimo++;
                                echo "$i ";
                            }
                        }
                        echo "</p>";
                    }
                    echo "<p>Total Múltiplos: $totalPrimo</p>";
                    echo "<p>Resultado: $valor <span class='foco'>";
                    if($totalPrimo <=2){
                        echo " é PRIMO";
                    }else{
                        echo " não é PRIMO";
                    }
                    echo "</span></p>";
                ?>
                <input type="submit" class='botao' value="Primo">
            </form>
        </fieldset>
    </main>
</body>
</html>