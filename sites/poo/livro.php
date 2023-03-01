<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeLivro/Pessoa.php';
        require_once 'classeLivro/Livro.php';
    ?>
</head>
<body>
    <main>
        <h1>Livro</h1>
        <fieldset>
            <?php

                $pessoa[0] = new Pessoa("Pedro",22,"M");
                $pessoa[1] = new Pessoa("Maria",31,"F");

                $livro[0] = new Livro("PHP Basico","José da Silva",300,$pessoa[0]);
                $livro[1] = new Livro("POO com PHP","Maria de Suza",500,$pessoa[0]);
                $livro[2] = new Livro("PHP Avançado","Ana Paula",800,$pessoa[1]);

                for($i = 0; $i < count($livro); $i++){
                    echo "<h2>Detalhes</h2>";
                    $livro[$i]->detalhes();
                    $pag = rand(2,300);
                    echo "<h2>Folhear para a página $pag</h2>";
                    $livro[$i]->folhear($pag);
                    echo "<h2>Detalhes</h2>";
                    $livro[$i]->detalhes();
                    echo "<h2>Voltar a página</h2>";
                    $livro[$i]->voltarPag();
                    echo "<h2>Detalhes</h2>";
                    $livro[$i]->detalhes();
                    echo "<h2>Avançar a página</h2>";
                    $livro[$i]->avancarPag();
                    echo "<h2>Detalhes</h2>";
                    $livro[$i]->detalhes();
                    echo "<p>---------------------------------</p>";
                }
            ?>
        </fieldset>
    </main>
</body>
</html>