<?php
class produto_lista{
    
    function acoes_produto($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action='index.php' >";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                    echo "<tr><td colspan=2>Editar de produto";
                        echo "<tr><td>Nome";
                        echo "<td><input name='PROD_DESCRICAO' type='text' id='PROD_DESCRICAO' SIZE='40' value='$reg->PROD_DESCRICAO' required/>";
                        echo "<tr><td>Valor";
                        echo "<td><input name='PROD_VALOR' type='text' id='PROD_VALOR' SIZE='40' value='$reg->PROD_VALOR' required/>";
                        echo "<tr><td>Quantidade";
                        echo "<td><input name='PROD_QUANTIDADE' type='type' id='PROD_QUANTIDADE' SIZE='40' value='$reg->PROD_QUANTIDADE' required/>";
                        echo "<tr><td>Tipo";
                        echo "<td><select name='PROD_TIPO' id='PROD_TIPO'>";
                            $tip1 = '';
                            $tip2 = '';
                            switch($reg->PROD_TIPO){
                                case 'unid' : $tip1 = 'selected';break;
                                case 'c-12' : $tip2 = 'selected';break;
                            }

                            echo "<option value='unid' $tip1>Unidade</option>";
                            echo "<option value='c-12' $tip2>Caixa ( 12 )</option>";
                        echo "</select>";
                        echo "<tr><td>Observação";
                        echo "<td><textarea name='PROD_OBS' cols='50' rows='5' id='PROD_OBS'>$reg->PROD_OBS</textarea>";
                        echo "<tr><td>Fornecedor";
                        echo "<td><select name='FOR_CODIGO' id='FOR_CODIGO'>";
                            $listar_tabela = new produto_manutencao();
                            $listar_tabela->listar_fornecedor($reg->FOR_CODIGO);
                        echo "</select>";
                        echo "<tr><td>Categoia";
                        echo "<td><select name='CAT_CODIGO' id='CAT_CODIGO'>";
                            $listar_tabela = new produto_manutencao();
                            $listar_tabela->listar_categoria($reg->CAT_CODIGO);
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='produto'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->PROD_CODIGO'>";
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
                echo "<tr><td>Nome";
                echo "<td><input name='PROD_DESCRICAO' type='text' id='PROD_DESCRICAO' SIZE='40'/>";
                echo "<tr><td>Valor";
                echo "<td><input name='PROD_VALOR' type='text' id='PROD_VALOR' SIZE='40'/>";
                echo "<tr><td>Quantidade";
                echo "<td><input name='PROD_QUANTIDADE' type='text' id='PROD_QUANTIDADE' SIZE='40'/>";
                echo "<tr><td>Tipo";
                echo "<td><select name='PROD_TIPO' id='PROD_TIPO'>";
                    echo "<option value='unid'>Unidade</option>";
                    echo "<option value='c-12'>Caixa ( 12 )</option>";
                echo "</select>";
                echo "<tr><td>Observação";
                echo "<td><textarea name='PROD_OBS' cols='50' rows='5' id='PROD_OBS'></textarea>";
                echo "<tr><td>Fornecedor";
                echo "<td><select name='FOR_CODIGO' id='FOR_CODIGO'>";
                    $listar_tabela = new produto_manutencao();
                    $listar_tabela->listar_fornecedor("");
                echo "</select>";
                echo "<tr><td>Categoria";
                echo "<td><select name='CAT_CODIGO' id='CAT_CODIGO'>";
                    $listar_tabela = new produto_manutencao();
                    $listar_tabela->listar_categoria("");
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='produto'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=11><h2>Lista de produto</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=produto&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=produto&acao=listar&ordem=PROD_DESCRICAO'>Nome</a>";
            echo "<td><a href='index.php?tabela=produto&acao=listar&ordem=PROD_VALOR'>Valor</a>";
            echo "<td><a href='index.php?tabela=produto&acao=listar&ordem=PROD_QUANTIDADE'>Quantidade</a>";
            echo "<td><a href='index.php?tabela=produto&acao=listar&ordem=PROD_TIPO'>Tipo</a>";
            echo "<td><a href='index.php?tabela=produto&acao=listar&ordem=PROD_OBS'>Observação</a>";
            echo "<td colspan=3><a href='index.php?tabela=produto&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->PROD_DESCRICAO";
                        echo "<td class='itens_tabela_banco'>$reg->PROD_VALOR";
                        echo "<td class='itens_tabela_banco'>$reg->PROD_QUANTIDADE";
                        echo "<td class='itens_tabela_banco'>$reg->PROD_TIPO";
                        echo "<td class='itens_tabela_banco'>$reg->PROD_OBS";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=imagem&acao=listar&codigo=$reg->PROD_CODIGO'>Imagem</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=produto&acao=alterar&codigo=$reg->PROD_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=produto&acao=excluir&codigo=$reg->PROD_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=11>Total de registros : ';
                    $contar = new produto_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
