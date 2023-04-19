<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobais</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        a{
            font-size: 40px;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
    <body>
        <main>
            <?php
                /*
                $_GET = gera um array associativo com todas as variaveis mandatas por parametro atraveis de uma url
                $_POST = pega dados de formularios que foram inviados pelo medoto post
                $_REQUEST = junto o medoto post e get atraves de vetores
                $_COOKIE = pequenas variaveis que ficam guardadas no seu navegador por um determinado tempo
                $_FILES = upload de arquivo pegar os dados do arquivo
                $_SESSION = permite variaveis de seção possam ser utilizadas
                $_ENV = variaveis de ambiente do servidor
                $_SERVER = dados do servidor
                $GLOBALS = mostra dados de todas super globais
                    */
                setcookie("dia-da-semana","SEGUNDA", time() + 3600);
                session_start();
                $_SESSION['teste'] = 'funcionou!';
                echo "<h1>Superglobal GET</h1>";
                var_dump($_GET);
                echo "<h1><a href='./form.php'>Superglobal POST</a></h1>";
                var_dump($_POST);                    echo "<h1>Superglobal REQUEST</h1>";
                var_dump($_REQUEST);
                echo "<h1>Superglobal COOKIE</h1>";
                var_dump($_COOKIE);
                echo "<h1>Superglobal FILES</h1>";
                var_dump($_FILES);
                echo "<h1>Superglobal SESSION</h1>";
                var_dump($_SESSION);
                echo "<h1>Superglobal ENV</h1>";
                var_dump($_ENV);
                echo "<br>";
                foreach(getenv() as $c => $v){
                    echo "$c - $v <br>";
                }
                echo "<h1>Superglobal SERVER</h1>";
                var_dump($_SERVER);
                echo "<h1>Superglobal GLOBALS</h1>";
                var_dump($GLOBALS);
            ?>
        </main>    
    </body>
</html>