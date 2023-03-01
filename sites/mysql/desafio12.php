<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma lista com as pessoas que nasceram fora do brasil, mostrando o país de origem e o total de pessoas nascidas lá. só nos interessam os países que tiverem mais de 3 pessoas com essa nascionalidade.</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Uma lista com as pessoas que nasceram fora do brasil, mostrando o país de origem e o total de pessoas nascidas lá. só nos interessam os países que tiverem mais de 3 pessoas com essa nascionalidade.</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT nacionalidade, COUNT(profissao) as total FROM pessoas WHERE nacionalidade NOT LIKE 'brasil' GROUP BY profissao HAVING total > '3';");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{
                    while($reg = $busca->fetch_object()){
                        print_r($reg);
                        echo "<br>";
                    }
                }
                ?>
            </fieldset>
        </pre>
    </main>
</body>
</html>