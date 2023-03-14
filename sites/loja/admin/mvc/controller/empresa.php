<?php
    require_once '../../../includes/conexao.php';
    require_once '../model/empresa.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $cnpj = $_POST['cnpj'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $facebook = $_POST['facebook'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $logoBanco = $_POST['logoBanco'] ?? '';
    $logo = $_FILES['logo']['name'] ?? '';
    $logoTemporario = $_FILES['logo']['tmp_name'] ?? '';
    $mapa = $_POST['mapa'] ?? '';
    $url = $_POST['url'] ?? '';
    $diretorio = '../../../assets/imagens/logo/';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO empresa(id, telefone, cnpj, endereco, facebook, instagram, mapa, logo, caminho) VALUES (null, $telefone , $cnpj , '$endereco', '$facebook','$instagram','$mapa','$logo','$url')");
        move_uploaded_file($logoTemporario, $diretorio . $logo);
    }else if($acao == 'editar'){
        $q = "UPDATE empresa SET telefone = $telefone, cnpj = $cnpj, endereco = '$endereco', facebook = '$facebook', instagram = '$instagram', mapa = '$mapa', ";
        if($logo != ''){
            $q .= "logo = '$logo', ";
            move_uploaded_file($logoTemporario, $diretorio . $logo);
            unlink($diretorio . $logoBanco); 
        }
        $q .= "caminho = '$url' WHERE id = $id";
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM empresa WHERE id = $id");
        unlink($diretorio . $logoBanco); 
    }
?>
<script>
    window.location.replace("<?php echo $caminho?>/admin/index.php?listar=empresa&acao=<?php echo $acao?>")
</script>