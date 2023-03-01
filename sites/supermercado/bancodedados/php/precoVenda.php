<?php
    require_once '../model/Precos.php';
    require_once '../controller/init.php';
	$conexao = db_connect();	
    
    $buscaPreco = $conexao->query("SELECT precos.preco as preco, promocao.preco as promocao, promocao.dataInicio as dataInicio, promocao.dataFim as dataFim FROM precos INNER JOIN produto ON produto.codigo = precos.id_produto INNER JOIN promocao ON promocao.id_produto = produto.codigo WHERE produto.codigo = ".$_POST['id'] );
    while($precoBusca = $buscaPreco->fetch()) {
        if(strtotime(date('Y/m/d')) >= strtotime($precoBusca['dataInicio']) and strtotime(date('Y/m/d')) <= strtotime($precoBusca['dataFim'])){
            echo floatval($precoBusca['promocao']);  
        }else{
            echo floatval($precoBusca['preco']);  
        }
    }
?>