<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração HTML5 e P.H.P.</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php
        $txt = $_GET['t'] ?? '';
        $tam = $_GET['tam'] ?? '12pt';
        $cor = $_GET['cor'] ?? '#000000';
    ?>
    <style>
        span.texto{
            font-size: <?php echo $tam; ?>;
            color: <?php echo $cor; ?>;
        }
        fieldset{
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }
        fieldset div{
            display: flex;
            justify-content: space-between;
        }
        input, select, .botao{
            width: 70%;
        }
    </style>
</head>
<body>
    <main>
        <h1>Integração HTML5 e P.H.P.</h1>
        <form action="integracaohtmphp.php" method="get">
            <fieldset>
                <div>
                    <label for="v">Valor: </label>
                    <input type="number" name="v" id="v">
                </div>
                <?php
            $valor = $_GET['v'] ?? '';
            $respostaValor = $valor == '' ? '' : "A raiz quadrada de $valor é ". number_format(sqrt($valor),2) ;
            echo "<p>$respostaValor</p>";
            ?>
            <input type="submit" class='botao' value="Calcular Raiz">
            </fieldset>
        </form>
        <form action="integracaohtmphp.php" method="get">
            <fieldset>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div>
                    <label for="ano">Ano nascimento: </label>
                    <input type="number" name="ano" id="ano">
                </div>
                <fieldset><legend>Sexo</legend>
                    <div>
                        <input type="radio" name="sexo" id="masc" value="Homem" checked>
                        <label for="masc">Mascullino</label>
                        <input type="radio" name="sexo" id="fem" value="Mulher">
                        <label for="fem">Feminino</label>
                    </div>
                </fieldset>
                <?php
                    $nome = $_GET['nome'];
                    $ano = $_GET['ano'];
                    $sexo = $_GET['sexo'];
                    $idade = date('Y') - $ano;
                    $resNome = ($nome != '' && $ano != '' ) ? "$nome é $sexo e tem $idade anos." : "";
                    echo "<p>$resNome</P>";
                ?>
                <input type="submit" class='botao' value="Enviar">
            </fieldset>
         </form>
         <form action="integracaohtmphp.php" method="get">
            <fieldset>
                <div>
                    <label for="itxt">Texto:</label>
                    <input type="text" name="t" id="itxt">
                </div>
                <div>
                    <label for="itam">Tamanho</label>
                    <select name="tam" id="itam">
                        <option value="0pt">0</option>
                        <option value="10pt">10</option>
                        <option value="14pt" selected>14</option>
                        <option value="20pt">20</option>
                        <option value="40pt">40</option>
                    </select>
                </div>
                <div>
                    <label for="icor">Cor:</label>
                    <input type="color" name="cor" id="icor">
                </div>
                <?php
                   echo "<p><span class='texto'>$txt</span></p>"
                ?>
                <input type="submit" class='botao' value="Gerar">
            </fieldset>
        </form>
    </main>
</body>
</html>