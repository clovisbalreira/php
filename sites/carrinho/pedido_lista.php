<?php 
    class pedido_lista{
        function listar_pedido($reg_pedido,$busca_itens){
            $_SESSION['codigo'] = $reg_pedido->PED_CODIGO;
            echo "<table>";
            echo "<caption>Compras</caption>";
            echo "<tr><td>Descrição<td>Quantidade<td>Preço<td>Total";
                        echo "<tr><td cols=4>Cliente : ".$reg_pedido->CLI_NOME;
                        echo "<tr><td cols=4>Endereço : ".$reg_pedido->CLI_ENDERECO;
                        echo "<tr><td cols=4>E-mail : ".$reg_pedido->CLI_EMAIL;
                        echo "<tr><td cols=4>Telefone : ".$reg_pedido->CLI_FONERES;
            if(!$busca_itens){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca_itens->num_rows > 0){
                    $total_carrinho = 0;
                    while($reg_itens = $busca_itens->fetch_object()){
                        $total_carrinho += $reg_itens->PED_VALOR * $reg_itens->PED_QUANT;
                        echo "<tr>";
                        echo "<td>$reg_itens->PROD_DESCRICAO";
                        echo "<td>$reg_itens->PED_QUANT";
                        echo "<td>".formata_dinheiro($reg_itens->PED_VALOR);
                        echo "<td>".formata_dinheiro($reg_itens->PED_VALOR * $reg_itens->PED_QUANT);
                        
                    }
                    echo "<tr><td colspan=3>Total do Carrinho<td>".formata_dinheiro($total_carrinho);
                    echo "<tr><td colspan=4>";echo "<a href='gera_boleto/boleto_cef.php'><button>Gerar Boleto</buttton></a>";
                    echo "</table>";
                }
            }        
        }
    }
    
?>
