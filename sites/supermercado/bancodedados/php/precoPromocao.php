<?php
    require_once '../model/Precos.php';
	require_once '../controller/init.php';
	$conexao = db_connect();	
    
    $buscaPreco = $conexao->query("SELECT precos.preco as preco FROM precos INNER JOIN produto ON produto.codigo = precos.id_produto WHERE produto.codigo = ".$_POST['id'] );
    while($precoBusca = $buscaPreco->fetch()) {
        echo floatval($precoBusca['preco']);  
    }
?>