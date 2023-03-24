<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <main>
        <h1>Conversor de moedas v1.0</h1>
        <?php
            $real = $_GET["real"] ?? "0";
            $cotacao = 5.17;
            $dolar = $real / $cotacao;
            /* 
                formatação de moedas com internacionalização
                biblioteca intl ( interlization )
                no arquivo php.uni habilida intl ou phpintl
                pt_BR == Brasil - BRL 
                pt_PT == Portugal - 
                ru_RU == Russia -
                us == Estados unidos - USD 
            */
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            echo "<p>Seus R$ ". number_format($real, 2 , ",", ".")  ." equivalem a  <strong>".  numfmt_format_currency($padrao, $dolar, "USD") ."</strong></p>";
            echo "<p><strong>Cotação fixa de ".  numfmt_format_currency($padrao, $dolar, "BRL") . "</strong> informada diretamente no código.</p>";
        ?>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>