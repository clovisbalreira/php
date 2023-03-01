<?php 
    function deletar($secao,$conexao){
        if(isset($_GET['codigoDeletar'])){
            $conexao->query("DELETE FROM ".$secao." WHERE codigo = ".$_GET['codigoDeletar']."");
        }
    }

    function deletarEstoque($conexao,$tipo){
        if(isset($_GET['codigoDeletar'])){
            $buscaConta = $conexao->query("SELECT contas.quantidade as quantidade,(contas.quantidade * precos.caixa) as total, produto.codigo as produto FROM contas INNER JOIN produto ON produto.codigo = contas.id_produto INNER JOIN precos ON precos.id_produto = produto.codigo WHERE contas.codigo = ".$_GET['codigoDeletar']);
            $total = 0;
            $quantidade = 0;
            $produto = '';
            while($contasBusca = $buscaConta->fetch()){
                $total = $contasBusca['total']; 
                $quantidade = $contasBusca['quantidade']; 
                $produto = $contasBusca['produto']; 
            }
            $estoque = 0;
            $buscaEstoque = $conexao->query("SELECT estoque.codigo as codigo FROM estoque WHERE estoque.id_produto = ".$produto);
            while($estoqueBusca = $buscaEstoque->fetch()){
                $estoque = $estoqueBusca['codigo']; 
            }
            $buscaEstoqueProduto = $conexao->query("SELECT * FROM estoque WHERE codigo = ".$estoque);
            while($estoqueProdutoBusca = $buscaEstoqueProduto->fetch()){
                if($tipo == 'compra'){
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueProdutoBusca['quantidade'] - $total." WHERE codigo = ".$estoqueProdutoBusca['codigo']);
                }else{
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueProdutoBusca['quantidade'] + $quantidade." WHERE codigo = ".$estoqueProdutoBusca['codigo']);
                }
            }
        }
    }
?>