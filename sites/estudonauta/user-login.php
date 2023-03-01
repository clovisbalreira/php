<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login do usuario</title>
    <style>
        main#corpo{
            width: 27rem;
            font-size: 15pt;
        }
        table{
            width: 100%;
        }
        td{
            padding: .5rem ;
        }
        input{
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
        require_once 'includes/banco.php'; 
        require_once 'includes/login.php'; 
        require_once 'functions/functions.php' 
    ?>
    <main id="corpo">
        <?php
            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;
            if(is_null($usuario) || is_null($senha)){
                require 'user-login-form.php';
            }else{
                $q = "select usuario, nome, senha, tipo from usuarios where usuario like '$usuario' limit 1";
                $busca = $banco->query($q);
                if(!$busca){
                    echo msg_erro("Falha ao acessar os dados.");
                }else{
                    if($busca->num_rows > 0){
                        $reg = $busca->fetch_object();
                        if(testarHash($senha, $reg->senha)){
                            echo msg_sucesso("Logado com sucesso!");
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        }else{
                            echo msg_erro("Senha invalida!");
                        }
                    }else{
                        echo msg_erro('Usúario não existe');
                    }
                }
            }
        ?>
        <?php echo voltar();?>
    </main>
</body>
</html>