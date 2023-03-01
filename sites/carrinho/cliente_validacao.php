<?php
    require_once 'admin/funcao/funcoes.php' ;
    echo $_POST['cli_login'] ?? 0; 

    if(($_POST['cli_login'] != '') && ($_POST['cli_senha'] != '') ){
    
        $q = "SELECT * FROM tbl_cliente WHERE CLI_LOGIN = '".$_POST['cli_login']."' AND CLI_SENHA = '".$_POST['cli_senha']."'";
        $banco = new mysqli('localhost','root','','carrinho');
        $busca = $banco->query($q);
        if($busca->num_rows > 0){
            $reg = $busca->fetch_object();
            $_SESSION['codigo'] = $reg->CLI_CODIGO;
            $_SESSION['sessao'] = session_id();
            direciona('',"index.php?id=5");
            exit;
        }else{
            echo "Cliente nao invalido a senha";
            voltar();
            exit;
        }  

    }else{
        echo "Cliente nao invalido";
    }
?>