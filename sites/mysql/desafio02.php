<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma lista com os dados de todos aqueles que nasceram de entre 1/jan/2000 a 31/dez/2015</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Uma lista com os dados de todos aqueles que nasceram de entre 1/jan/2000 a 31/dez/2015</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT * FROM pessoas WHERE nascimento BETWEEN '2000/01/01' and '2015/12/01';");
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