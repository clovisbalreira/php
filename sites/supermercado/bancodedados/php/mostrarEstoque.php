<?php
    require_once '../model/Precos.php';
	require_once '../controller/init.php';
	$conexao = db_connect();	
    
    $buscaProduto = $conexao->query("SELECT produto.codigo as codigo, marca.nome as marca, tipoProduto.nome as tipoProduto, saborAroma.nome as saborAroma, tamanho.tamanho as tamanho, tamanho.medida as medida FROM precos INNER JOIN produto ON produto.codigo = precos.id_produto INNER JOIN estoque ON estoque.id_produto = produto.codigo INNER JOIN fornecedor ON fornecedor.codigo = produto.id_fornecedor INNER JOIN marca ON produto.id_marca = marca.codigo INNER JOIN tipoProduto ON produto.id_tipoProduto = tipoProduto.codigo INNER JOIN saborAroma ON produto.id_saborAroma = saborAroma.codigo INNER JOIN tamanho ON produto.id_tamanho = tamanho.codigo INNER JOIN tipoSegmento ON produto.id_tipoSegmento = tipoSegmento.codigo WHERE fornecedor.codigo = ".$_POST['id'] );
	echo '<option value="">Selecione o produto</option>';
    while($produtoBusca = $buscaProduto->fetch()) {
        echo '<option value="'.$produtoBusca['codigo'].'">'.$produtoBusca['marca']." - ".$produtoBusca['tipoProduto']." - ".$produtoBusca['saborAroma']." - ".$produtoBusca['tamanho']." ".$produtoBusca['medida'].'</option>';  
    }
?>