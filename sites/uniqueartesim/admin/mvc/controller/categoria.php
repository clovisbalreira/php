<?php
    require_once '../../../includes/conexao.php';
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
    $_SESSION['atualizar'] = 'atualizar';
?>
<script> 
    window.location.replace("http://localhost/php/sites/uniqueartesim/admin/index.php?listar=categoria&acao=<?php echo $acao?>")
</script>