<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qual a media de peso das pessoas cadastradas</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Qual a media de peso das pessoas cadastradas</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT Avg(peso) FROM pessoas;");
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