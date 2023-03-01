<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição da tabela</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Descrição da tabela</h1>
        <fieldset>
            <pre>
                <?php
                    $busca =$banco->query("DESCRIBE pessoas;");
                    if(!$busca){
                        echo "<p>falha na busca</p>";
                    }else{
                        while($reg = $busca->fetch_object()){
                            print_r($reg);
                            echo "</br>";
                        }
                    }
                ?>
            </pre>
        </fieldset>
    </main>
</body>
</html>