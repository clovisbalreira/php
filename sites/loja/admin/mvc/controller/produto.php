<?php
    require_once '../../../includes/conexao.php';
    require_once '../model/empresa.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $imagemBanco = $_POST['imagemBanco'] ?? '';
    $imagem = $_FILES['imagem']['name'] ?? '';
    $imagemTemporario = $_FILES['imagem']['tmp_name'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $destaque = $_POST['destaque'] ?? '';
    $diretorio = '../../../assets/imagens/produto/';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO produtos(id, nome, imagem, preco, categoria, destaque) VALUES (null,'$nome','$imagem','$preco',$categoria,$destaque)");
        move_uploaded_file($imagemTemporario, $diretorio . $imagem);
    }else if($acao == 'editar'){
        $q = "UPDATE produtos SET nome = '$nome',"; 
        if($imagem != ''){
            $q .= "imagem = '$imagem',";
            move_uploaded_file($imagemTemporario, $diretorio . $imagem);
            unlink($diretorio . $imagemBanco); 
        }
        $q .= "preco = '$preco', categoria = $categoria, destaque = $destaque WHERE id = $id";
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM produtos WHERE id = $id");
        unlink($diretorio . $imagemBanco); 
    }
?>
<script> 
    window.location.replace("<?php echo $caminho?>/admin/index.php?listar=produto&acao=<?php echo $acao?>")
</script>