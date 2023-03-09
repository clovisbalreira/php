<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    require_once '../../../includes/conexao.php';
    require_once '../../../includes/login.php';
    $acao = $_POST['acao'] ?? ''; 
    $usuario = $_POST['usuario'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $senhaPost = $_POST['senha'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $senha = gerarHash($senhaPost);
    $senhaBanco = $_POST['senhaBanco'];
    if($acao == 'gravar'){
        $banco->query("INSERT INTO usuarios(usuario, nome, senha, tipo) VALUES ('$usuario','$nome','$senha','$tipo')");
    }else if($acao == 'editar'){
        $q = "UPDATE usuarios SET nome = '$nome',";
        if($senhaPost == $senhaBanco){
            $q .=  "senha = '$senha',";
        }
        $q .= "tipo ='$tipo' WHERE usuario = '$usuario'";
        echo $q;
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM usuarios WHERE usuario = '$usuario'");
    }
    $_SESSION['atualizar'] = 'atualizar';
?>
<script> 
    window.location.replace("http://localhost/php/sites/uniqueartesim/admin/index.php?listar=cadastro&acao=<?php echo $acao?>")
</script>