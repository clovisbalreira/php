<?php
class pedido_lista{
    
    function acoes_pedido($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action='index.php' >";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                    echo "<tr><td colspan=2>Editar de pedido";
                        echo "<tr><td>Data";
                        echo "<td><input name='PED_DATA' type='text' id='PED_DATA' SIZE='40' value='$reg->PED_DATA' required/>";
                        echo "<tr><td>Hora";
                        echo "<td><input name='PED_HORA' type='text' id='PED_HORA' SIZE='40' value='$reg->PED_HORA' required/>";
                        echo "<tr><td>Boleto";
                        echo "<td><input name='PED_BOLETO' type='type' id='PED_BOLETO' SIZE='40' value='$reg->PED_BOLETO' required/>";
                        echo "<tr><td>Valor Total";
                        echo "<td><input name='PED_VALORTOTAL' type='text' id='PED_VALORTOTAL' SIZE='40' value='$reg->PED_VALORTOTAL' required/>";
                        echo "<tr><td>Valor Frete";
                        echo "<td><input name='PED_VALORFRETE' type='tel' id='PED_VALORFRETE' SIZE='40' value='$reg->PED_VALORFRETE' required/>";
                        echo "<tr><td>Status";
                        echo "<td><input name='PED_STATUS' type='text' id='PED_STATUS' SIZE='40' value='$reg->PED_STATUS' required/>";
                        echo "<tr><td>Forma Pagamento";
                        echo "<td><input name='PED_FORMAPAGTO' type='text' id='PED_FORMAPAGTO' SIZE='40' value='$reg->PED_FORMAPAGTO' required/>";
                        echo "<tr><td>Observação";
                        echo "<td><input name='PED_OBSERVACAO' type='type' id='PED_OBSERVACAO' SIZE='40' value='$reg->PED_OBSERVACAO' required/>";
                        echo "<tr><td>Cliente";
                        echo "<td><select name='CLI_CODIGO' id='CLI_CODIGO'>";
                            $listar_tabela = new pedido_manutencao();
                            $listar_tabela->listar_cliente($reg->CLI_CODIGO);
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='pedido'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->PED_CODIGO'>";
                        }
                } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
                echo '</table>';
                echo "</form>";
            }
        }elseif($acao == "incluir"){
            echo "<form id='form' name='form_cadastro' method='post' action=''>";
            echo  "<table>";
                echo "<tr class='ordenacao_novo_registro'><td colspan=2>Manutenção de                   ";
                echo "<tr><td>Data";
                echo "<td><input name='PED_DATA' type='text' id='PED_DATA' SIZE='40'/>";
                echo "<tr><td>Hora";
                echo "<td><input name='PED_HORA' type='text' id='PED_HORA' SIZE='40'/>";
                echo "<tr><td>Boleto";
                echo "<td><input name='PED_BOLETO' type='text' id='PED_BOLETO' SIZE='40'/>";
                echo "<tr><td>Valor Total";
                echo "<td><input name='PED_VALORTOTAL' type='text' id='PED_VALORTOTAL' SIZE='40'/>";
                echo "<tr><td>Valor Frete";
                echo "<td><input name='PED_VALORFRETE' type='tel' id='PED_VALORFRETE' SIZE='40'/>";
                echo "<tr><td>Status";
                echo "<td><input name='PED_STATUS' type='emal' id='PED_STATUS' SIZE='40'/>";
                echo "<tr><td>Forma Pagamento";
                echo "<td><input name='PED_FORMAPAGTO' type='text' id='PED_FORMAPAGTO' SIZE='40'/>";
                echo "<tr><td>Obervasão";
                echo "<td><input name='PED_OBSERVACAO' type='text' id='PED_OBSERVACAO' SIZE='40'/>";
                echo "<tr><td>Cliente";
                echo "<td><select name='CLI_CODIGO' id='CLI_CODIGO'>";
                    $listar_tabela = new pedido_manutencao();
                    $listar_tabela->listar_cliente("");
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='pedido'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=11><h2>Lista de pedido</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=pedido&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_DATA'>Data</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_HORA'>Hora</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_BOLETO'>Boleto</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_VALORTOTAL'>Valor Total</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_VALORFRETE'>Valor Frete</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_STATUS'>Status</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_FORMAPAGTO'>Forma Pagamento</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=PED_OBSERVACAO'>Observação</a>";
            echo "<td><a href='index.php?tabela=pedido&acao=listar&ordem=CLI_CODIGO'>Cliente</a>";
            echo "<td colspan=2><a href='index.php?tabela=pedido&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->PED_DATA";
                        echo "<td class='itens_tabela_banco'>$reg->PED_HORA";
                        echo "<td class='itens_tabela_banco'>$reg->PED_BOLETO";
                        echo "<td class='itens_tabela_banco'>$reg->PED_VALORTOTAL";
                        echo "<td class='itens_tabela_banco'>$reg->PED_VALORFRETE";
                        echo "<td class='itens_tabela_banco'>$reg->PED_STATUS";
                        echo "<td class='itens_tabela_banco'>$reg->PED_FORMAPAGTO";
                        echo "<td class='itens_tabela_banco'>$reg->PED_OBSERVACAO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_CODIGO";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=pedido&acao=alterar&codigo=$reg->PED_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=pedido&acao=excluir&codigo=$reg->PED_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=11>Total de registros : ';
                    $contar = new pedido_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
