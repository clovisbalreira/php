<?php
    require_once '../../../includes/conexao.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $cnpj = $_POST['cnpj'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $facebook = $_POST['facebook'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $mapa = $_POST['mapa'] ?? '';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO empresa(id, telefone, cnpj, endereco, facebook, instagram, mapa) VALUES (null, $telefone , $cnpj , '$endereco', '$facebook','$instagram','$mapa')");
    }else if($acao == 'editar'){
        $banco->query("UPDATE empresa SET telefone = $telefone, cnpj = $cnpj, endereco = '$endereco', facebook = '$facebook', instagram = '$instagram', mapa = '$mapa' WHERE id = $id");
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM empresa WHERE id = $id");
    }
    $_SESSION['atualizar'] = 'atualizar';
?>
<script> 
    window.location.replace("http://localhost/php/sites/uniqueartesim/admin/index.php?listar=empresa&acao=<?php echo $acao?>")
</script>