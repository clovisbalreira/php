<?php
    require_once '../../../includes/conexao.php';
    require_once '../model/empresa.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $imagemBanco = $_POST['imagemBanco'] ?? '';
    $imagem = $_FILES['imagem']['name'] ?? '';
    $imagemTemporario = $_FILES['imagem']['tmp_name'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $ordem = $_POST['ordem'] ?? '';
    $diretorio = '../../../assets/imagens/carrossel/';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO carrossel(id, nome, imagem, descricao, ordem) VALUES (null,'$nome','$imagem','$descricao', $ordem)");
        move_uploaded_file($imagemTemporario, $diretorio . $imagem);
    }else if($acao == 'editar'){
        $q = "UPDATE carrossel SET nome = '$nome',";
        if($imagem != ''){
            $q .= "imagem = '$imagem',";
            move_uploaded_file($imagemTemporario, $diretorio . $imagem);
            unlink($diretorio . $imagemBanco); 
        }
        $q .= " descricao = '$descricao', ordem = $ordem WHERE id = $id";
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM carrossel WHERE id = $id");
        unlink($diretorio . $imagemBanco); 
    }
?>
<script>
    window.location.replace("<?php echo $caminho?>/admin/index.php?listar=carrossel&acao=<?php echo $acao?>")
</script>