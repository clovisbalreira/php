<?php
    require_once '../../../includes/conexao.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
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
        }
        $q .= "preco = '$preco', categoria = $categoria, destaque = $destaque WHERE id = $id";
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM produtos WHERE id = $id");
    }
    $_SESSION['atualizar'] = 'atualizar';
?>
<script> 
    window.location.replace("http://localhost/php/sites/uniqueartesim/admin/index.php?listar=produto&acao=<?php echo $acao?>")
</script>