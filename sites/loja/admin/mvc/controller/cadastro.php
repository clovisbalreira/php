<?php
    require_once '../../../includes/conexao.php';
    require_once '../../../includes/login.php';
    require_once '../model/empresa.php';
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
        $banco->query($q);
    }else if($acao == 'excluir'){
        echo $usuario;
        echo "DELETE FROM usuarios WHERE usuario = '$usuario'";
        $banco->query("DELETE FROM usuarios WHERE usuario = '$usuario'");
    }
?>
<script>
    window.location.replace("<?php echo $caminho?>/admin/index.php?listar=cadastro&acao=<?php echo $acao?>")
</script>