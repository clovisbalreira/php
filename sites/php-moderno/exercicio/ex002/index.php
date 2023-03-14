<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        pre{
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <main>
        <?php
            //mudar fuso horario
            date_default_timezone_set("America/Sao_Paulo");
            echo "Hoje é dia ".date("d/m/y");
            echo " e a hora atual é ".date("G:i:s");
        ?>
        <h1>Mudar servidor local</h1>
        <pre>
            arquivo de configuração   = php.ini
            mostrar erros             = display_error
            funcionar short Open Tag  = short_open_tag
        </pre>
    </main>
</body>
</html>