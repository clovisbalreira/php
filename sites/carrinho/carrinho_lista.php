<?php 
    class layout{

        function categoria_listar($busca){
            if(!$busca){
                echo "<div>Infelizmente a busca teu um erro $busca</div>";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<li><a href='index.php?id=1&categoria=$reg->CAT_CODIGO&acao=listar_produtos'>$reg->CAT_DESCRICAO</a>";
                    }
                }
            }
        }

        function mostrar_produtos($busca){
            $imagem = new carrinho_manutencao();
            if(!$busca){
                echo "<div>Infelizmente a busca teu um erro $busca</div";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<div class='mostraProdutos'>";
                            echo "<img class='produto' src='admin/imagens/".$imagem->listar_imagem($reg->PROD_CODIGO)."'>";
                            echo "<div><p>".$reg->PROD_DESCRICAO."</p>";
                            echo "<p>R$: ".$reg->PROD_VALOR."</p></div>";
                            echo "<a href='index.php?id=1&produto=$reg->PROD_CODIGO&acao=incluir_no_carrinho'><span class='material-symbols-outlined'>
                            shopping_cart
                            </span></a>";
                        echo "</div>";
                    }
                }
            }
        }

        function carrinho($busca){
            $categoria = $_REQUEST['categoria'] ?? 0;
            echo "<form action='index.php?id=1&categoria=$categoria' method='post' id='form-carrinho'>";
            echo "<table id='tabela-carrinho'>";
            echo "<caption>Meu Carrinho de Compras</caption>";
            echo "<thead>
                    <tr>
                        <td>Descrição</td>
                        <td>Quantidade</td>
                        <td>Preço</td>
                        <td>Total</td>
                    </tr>
                </thead>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro $busca";
            } else {
                $totalGeral = 0;
                if ( $busca->num_rows > 0){
                        $totalGeral = 0;        
                        echo "<tbody>";
                        while($reg = $busca->fetch_object()){
                            $total = $reg->CAR_QUANTIDADE*$reg->PROD_VALOR;
                            $totalGeral += $total;
                            echo "<tr>";
                                echo "<td>".$reg->PROD_DESCRICAO;
                                echo "<td><input type='number' name='qtd[]' size='2' min='0' value='$reg->CAR_QUANTIDADE'/>";
                                echo "<input type='hidden' name='codigo[]' size='2' value='$reg->PROD_CODIGO'/>";
                                echo "<td>".formata_dinheiro($reg->PROD_VALOR);
                                echo "<td>". formata_dinheiro($total);
                                echo "<input type='hidden' name='total[]' size='2' value='$total'/>";
                        }
                    }
                    echo "</tbody>";
                    echo "<tfoot>";
                    echo "<tr><td colspan=3>Total do Carrinho<td>".formata_dinheiro($totalGeral);
                    echo "<tr><td colspan=4>";echo "<input type='submit' name='botao_atualizar' id='botao_atualizar' value='Atualizar Pedido'/>";
                    echo "<input type='hidden' name='acao' id='acao' value='atualizar_carrinho'/>";
                    echo "<button><a href='index.php?id=1&categoria=$categoria&acao=listar_produtos'>Continuar Comprando</a></button>";
                    echo "<button><a href='index.php?id=2&acao=finalizar_pedido'>Comprar</a></button>";
                    echo "</tfoot>";
                echo "</table>";
            echo "</form>";
           }
        }

    }
?>
