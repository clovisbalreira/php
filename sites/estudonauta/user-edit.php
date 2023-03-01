<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Editar dados</title>
</head>
<body>
    <?php
        require_once 'includes/banco.php'; 
        require_once 'includes/login.php'; 
        require_once 'functions/functions.php' 
    ?>
    <main id="corpo">
        <?php
            if(is_logado()){
                echo msg_sucesso("Efetue o login para poder editar os dados");
            }else{
                if(!isset($_POST['usuario'])){
                    include 'user-edit-form.php';
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    $q = "update usuarios set usuario = '$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha1)){
                        echo msg_aviso("Senha antiga foi mantida");
                    }else{
                        if($senha1 === $senha2){
                            $senha = gerarHash($senha1);
                            $q .= ", senha = '$senha'";
                            echo msg_aviso("Senha anterada");
                        }else{
                            echo msg_erro("Senhas não conferem. A senha anterior será mantida.");
                        }                        
                    }
                    $q .= " where usuario = '".$_SESSION['user']."'";

                    if($banco->query($q)){
                        echo msg_sucesso('Usuário alterado com sucesso.');
                        is_logout();
                        echo msg_aviso("Por segurança, Efetue o <a href='user-login.php'>login</a> novamente.");
                    }else{
                        echo msg_erro('Não foi possivel alterar os dados.');
                    }
                }
            }
            echo voltar();
        ?>
    </main>
</body>
</html>