<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caneta</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php
        require_once 'classeCaneta/Caneta.php';
    ?>
</head>
<body>
    <main>
        <h1>Caneta</h1>
        <fieldset>
            <?php
                $caneta = new Caneta('Big','Preta',0.5);
                echo "<h2>Caneta criada</h2>";
                $caneta->mostrar();
                echo "<h2>Escrever</h2>";
                $caneta->rabiscar();
                $caneta->mostrar();
                echo "<h2>Destampar Caneta</h2>";
                $caneta->destampar();
                $caneta->mostrar();
                echo "<h2>Escrever</h2>";
                $caneta->rabiscar();
                $caneta->mostrar();
                echo "<h2>Tampar Caneta</h2>";
                $caneta->tampar();
                $caneta->mostrar();
                echo "<h2>Escrever</h2>";
                $caneta->rabiscar();
                $caneta->mostrar();
            ?>
        </fieldset>
    </main>
</body>
</html>