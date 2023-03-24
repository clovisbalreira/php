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
    <section>
        <h1>Conversor de moedas v2.0</h1>
        <form action="resultado.php" method="get">
            <label for="real">Quantos R$ você tem na carteira?</label>
            <input type="number" name="real" id="real" step=".01">
            <input type="submit" value="Converter">
        </form>
    </section>
</body>
</html>