<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma lista agrupada pela altura das pessoas, mostrando quantas pessoas pesam mais de 100kg e que estão acima da média de altura de todos os cadastrados</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Uma lista agrupada pela altura das pessoas, mostrando quantas pessoas pesam mais de 100kg e que estão acima da média de altura de todos os cadastrados</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT altura, peso FROM pessoas WHERE peso > 100 GROUP BY altura HAVING altura > (SELECT AVG(altura) FROM pessoas);");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{
                    echo '<table><tr>';
                    while($reg = $busca->fetch_object()){
                        print_r($reg);
                        echo "</br>";
                    }
                }
                ?>
            </fieldset>
        </pre>
    </main>
</body>
</html>