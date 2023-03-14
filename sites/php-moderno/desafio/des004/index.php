<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
        <h1>Analizador de Número Real</h1>
    <section>
        <form action="resultado.php" method="get">
            <label for="numero">Número Real:</label>
            <input type="number" name="numero" id="numero" step=".001">
            <input type="submit" value="Analisar">
        </form>
    </section>
</body>
</html>