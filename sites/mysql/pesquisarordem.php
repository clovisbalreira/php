<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar ordem decrescente</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Pesquisar ordem nome em decrescente</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT * FROM cursos ORDER BY nome DESC;");
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