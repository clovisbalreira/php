<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        /*
        No formulario tem que ter o method 
            get = aparece os dados na url da pagina
            post = os dados não aparece na url
        action 
            arquivo o que vai aparecer
        name
            nome do input 
        value
            valor do input
        */
    ?>
    <header>
        <h1>Apresente-se para nós</h1>
    </header>
    <section>
        <form action="cad.php" method="get">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome">
            <input type="submit" value="Enviar">
        </form>
    </section>
</body>
</html>