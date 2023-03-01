<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma lista com os dados de todas as mulheres que nasceram no brasil e que tem seu nome iniciado com a letra j</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Uma lista com os dados de todas as mulheres que nasceram no brasil e que tem seu iniciado com a letra j</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT * FROM pessoas WHERE sexo like 'f' and nacionalidade like 'brasil' and nome like 'j%'; ");
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