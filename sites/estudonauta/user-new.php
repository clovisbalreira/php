<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Novo Usúario</title>
    <style>
        main#corpo{
            width: 27rem;
            font-size: 15pt;
        }
        table{
            width: 100%;
        }
        td{
            padding: .2rem 0;
        }
        td:nth-child(1){
            width: 50%;
        }
        input, select{
            width: 100%;
        }
    </style></head>
<body>
    <?php
        require_once 'includes/banco.php'; 
        require_once 'includes/login.php'; 
        require_once 'functions/functions.php' 
    ?>
    <main id="corpo">
        <?php 
            if(!is_admin()){
                echo msg_erro("Você não é um administrador");
            }else{
                if(!isset($_POST['usuario'])){
                    require 'user-new-form.php';
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    if($senha1 === $senha2){
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2)){
                            echo msg_erro('Todos os dados são obrigatorios');
                        }else{
                            $senha = gerarHash($senha1);
                            $q = "insert into usuarios (usuario, nome, senha, tipo) values ('$usuario','$nome','$senha','$tipo')";
                            if($banco->query($q)){
                                msg_sucesso("Usuario $nome cadastrado com sucesso.");
                            }else{
                                msg_erro("Não foi possivel criar o $usuario. Talvez o login já esteje sendo usado.");
                            }
                        }
                    }else{
                        echo msg_erro("Senhas não conferem. Repita o procedimento.");
                    }
                }
            }
            echo voltar();
        ?>
    </main>
</body>
</html>