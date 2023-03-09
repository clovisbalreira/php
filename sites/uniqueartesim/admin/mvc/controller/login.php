<?php
    require_once '../../../includes/conexao.php';
    require_once '../../../includes/login.php';
    $loginUsuario = $_POST['loginUsuario'];
    $loginSenha = $_POST['loginSenha'];
    $q = "select usuario, nome, senha, tipo from usuarios where usuario like '$loginUsuario' limit 1";
    $busca = $banco->query($q);
    if(!$busca){
        echo msg_erro("Falha ao acessar os dados.");
    }else{
        if($busca->num_rows > 0){
            $reg = $busca->fetch_object();
            echo "login";
            if(testarHash($loginSenha, $reg->senha)){
                echo "Logado com sucesso!";
                $_SESSION['user'] = $reg->usuario;
                $_SESSION['nome'] = $reg->nome;
                $_SESSION['tipo'] = $reg->tipo;
            }else{
                echo "Senha invalida!";
            }
        }else{
            echo 'Usúario não existe';
        }
    }
?>
<script>
    window.history.back()
</script>