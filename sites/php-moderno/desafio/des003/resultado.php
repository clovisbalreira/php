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
        <h1>Conversor de moedas v2.0</h1>
        <?php
            $inicio = date("m-d-Y", strtotime("-7 days"));
            $fim = date("m-d-Y");
            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''.$inicio.'\'&@dataFinalCotacao=\''.$fim.'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
            $dados = json_decode(file_get_contents($url), true);
            $cotacao = $dados['value'][0]['cotacaoCompra'];
            $real = $_GET["real"] ?? "0";
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
            echo "<p>*Cotação obtida diretamente do site do <strong>Banco Central do Brasil</strong></p>";
        ?>
        <p>
            <a href="javascript:history.go(-1)">Voltar para a página anterior</a>
        </p>
    </main>
</body>
</html>