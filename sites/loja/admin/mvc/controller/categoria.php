<?php
    require_once '../../../includes/conexao.php';
    require_once '../model/empresa.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO categoria(id, nome, descricao) VALUES (null,'$nome','$descricao')");
    }else if($acao == 'editar'){
        $banco->query("UPDATE categoria SET nome = '$nome',descricao = '$descricao' WHERE id = $id");
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM categoria WHERE id = $id");
    }
?>
<script> 
    window.location.replace("<?php echo $caminho?>/admin/index.php?listar=categoria&acao=<?php echo $acao?>")
</script>