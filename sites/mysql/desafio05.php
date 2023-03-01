<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma lista com o nome e nascionalidade de todos os homens que tem silva no nome, não nasceram no brasil e pesam menos de 100kg</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Uma lista com o nome e nascionalidade de todos os homens que tem silva no nome, não nasceram no brasil e pesam menos de 100kg</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT nome, nacionalidade FROM pessoas WHERE sexo like 'm' and nome like '%silva%' and nacionalidade not like 'brasil' and peso < 100;");
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