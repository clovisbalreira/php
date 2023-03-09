<?php
    require_once '../../../includes/conexao.php';
    $acao = $_POST['acao'] ?? ''; 
    $id = $_POST['id'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $imagem = $_FILES['imagem']['name'] ?? '';
    $imagemTemporario = $_FILES['imagem']['tmp_name'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $diretorio = '../../../assets/imagens/carrossel/';
    if($acao == 'gravar'){
        $banco->query("INSERT INTO carrossel(id, nome, imagem, descricao) VALUES (null,'$nome','$imagem','$descricao')");
        move_uploaded_file($imagemTemporario, $diretorio . $imagem);
    }else if($acao == 'editar'){
        $q = "UPDATE carrossel SET nome = '$nome',";
        if($imagem != ''){
            $q .= "imagem = '$imagem',";
            move_uploaded_file($imagemTemporario, $diretorio . $imagem);
        }
        $q .= "descricao = '$descricao' WHERE id = $id";
        $banco->query($q);
    }else if($acao == 'excluir'){
        $banco->query("DELETE FROM carrossel WHERE id = $id");
    }
    $_SESSION['atualizar'] = 'atualizar';
?>
<script>
    window.location.replace("http://localhost/php/sites/uniqueartesim/admin/index.php?listar=carrossel&acao=<?php echo $acao?>")
</script>