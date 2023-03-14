<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe um número</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <main>
        <h1>Informe um número</h1>
        <form action="resultado.php" method="get">
            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero">
            <input type="submit" value="Calcular">
        </form>
    </main>
</body>
</html>