<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tempo</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <section>
        <h1><strong>Calculadora de Tempo</strong></h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <label for="segundos">Qual é o total de segundos?</label>
            <input type="number" name="segundos" id="segundos">
            <input type="submit" value="Calcular">
        </form>
    </section>
    <section id="resultado">
        <?php
            $inputSegundos = $_GET['segundos'] ?? 0;
        ?>
        <h2>Totalizando tudo</h2>
        <p>Analizando o valor que você digitou, <strong><?=number_format($inputSegundos,0,",",".");?> segundos </strong>equiváliem a um total de:</p>
        <?php
            //semana = 7 dias x 24 horas = 168 horas x 60 minitos = 10080 minutos x 60 segundos = 604800 segundos
            //dias = 24 horas X 60 minutos = 1440 minutos X 60 segundos = 86400 segundos
            // minutos = 60 minutos x 60 segundos = 3600 segundos 
            //minutos = 60 segundos 
            $semanas = $inputSegundos / 604800;
            $inputSegundos = $inputSegundos % 604800;
            $dias = $inputSegundos / 86400;
            $inputSegundos = $inputSegundos % 86400;
            $horas = $inputSegundos / 3600;
            $inputSegundos = $inputSegundos % 3600;
            $minutos = $inputSegundos / 60;
            $inputSegundos = $inputSegundos % 60;
            $segundos = $inputSegundos;
             
        ?>
        <ul>
            <li><?=intval($semanas)?> semanas</li>
            <li><?=intval($dias)?> dias</li>
            <li><?=intval($horas)?> horas</li>
            <li><?=intval($minutos)?> minutos</li>
            <li><?=intval($segundos)?> segundos</li>
        </ul>
    </section>
</body>
</html>