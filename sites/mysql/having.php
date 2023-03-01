<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar grupos na tabela com passe em carga e condição de carga maior ou igual a 30</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'includes/banco.php'; 
    ?>
</head>
<body>
    <main>
        <h1>Criar grupos na tabela com passe em carga e condição de carga maior ou igual a 30</h1>
        <pre>
            <fieldset>
                <?php
                $busca =$banco->query("SELECT carga, COUNT(*) FROM cursos GROUP by carga HAVING(carga) >= 30");
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