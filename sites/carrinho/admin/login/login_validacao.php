<?php
    session_start();
    require_once("../funcao/funcoes.php");
    if(($_POST['usu_login'] != '') && ($_POST['usu_senha'] != '') ){
        $texto_senha = $_POST['usu_senha'];

        $tamanho_senha = strlen($texto_senha);
        if($tamanho_senha > 8){
            alerta("senha não pode ter mais de 8 caracteres");
            voltar();
            exit;
        }

        $texto_senha = trim($texto_senha);
        $texto_senha = str_replace("#","",$texto_senha);
        $texto_senha = str_replace("*","",$texto_senha);
        $texto_senha = str_replace("drop","",$texto_senha);
        $texto_senha = str_replace("insert","",$texto_senha);
        $texto_senha = str_replace("--","",$texto_senha);
        $texto_senha = str_replace(",","",$texto_senha);
        $texto_senha = str_replace(" or ","",$texto_senha);
        $texto_senha = str_replace("delete","",$texto_senha);
    
        $q = "SELECT * FROM tbl_usuario WHERE USU_LOGIN = '".$_POST['usu_login']."' AND USU_SENHA = '".base64_encode($texto_senha)."'";
        $banco = new mysqli('localhost','root','','carrinho');
        $busca = $banco->query($q);
        if($busca->num_rows > 0){
            $reg = $busca->fetch_object();
            $_SESSION['codigo'] = $reg->USU_CODIGO;
            $_SESSION['nome'] = $reg->USU_NOME;
            $_SESSION['nivel'] = $reg->USU_NIVEL;
            direciona('../','index.php');
            exit;
        }else{
            voltar();
            exit;
        }  

    }else{
        echo "Usuario nao invalido";
    }
?>