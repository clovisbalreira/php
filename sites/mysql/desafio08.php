<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qual é o menor peso entre as pessoas mulheres que nasceram fora do brasil e entre 01/jan/1990 e 31/dez/2000</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Qual é o menor peso entre as pessoas mulheres que nasceram fora do brasil e entre 01/jan/1990 e 31/dez/2000</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT *, min(peso) FROM pessoas WHERE sexo like 'f' and nacionalidade NOT LIKE 'brasil' and nascimento BETWEEN '1990/01/01' and '2000/12/01';");
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