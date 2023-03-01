<?php
class cidade_lista{
    function acoes_cidade($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action=''>";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        echo "<tr><td colspan=2>Editar de cidade";
                        echo "<tr><td>Nome";
                        echo "<td><input name='CID_DESCRICAO' type='text' id='CID_DESCRICAO' SIZE='40' value='$reg->CID_DESCRICAO'/>";
                        echo "<tr><td>UF";
                        echo "<td><select name='CID_UF' id='CID_UF'>";
                            $estado1 = '';
                            $estado2 = '';
                            $estado3 = '';
                            switch($reg->CID_UF){
                                case 'SC' : $estado1 = 'selected';break;
                                case 'PR' : $estado2 = 'selected';break;
                                case 'RS' : $estado3 = 'selected';break;
                            }

                            echo "<option value='SC' $estado1>SC</option>";
                            echo "<option value='PR' $estado2>PR</option>";
                            echo "<option value='RS' $estado3>RS</option>";
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='cidade'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->CID_CODIGO'>";
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
                echo "<tr class='ordenacao_novo_registro'><td colspan=2>Manutenção de cidade";
                echo "<tr><td>Nome";
                echo "<td><input name='CID_DESCRICAO' type='text' id='CID_DESCRICAO' SIZE='40'/>";
                echo "<tr><td>UF";
                echo "<td><select name='CID_UF' id='CID_UF'>";
                    echo "<option>SC</option>";
                    echo "<option>PR</option>";
                    echo "<option>RS</option>";
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='cidade'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=4><h2>Lista de Cidade</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=cidade&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=cidade&acao=listar&ordem=CID_DESCRICAO'>Descrição</a>";
            echo "<td><a href='index.php?tabela=cidade&acao=listar&ordem=CID_UF'>UF";
            echo "<td colspan=2><a href='index.php?tabela=cidade&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr><td class='itens_tabela_banco'>$reg->CID_DESCRICAO";
                        echo "<td class='itens_tabela_banco'>$reg->CID_UF";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=cidade&acao=alterar&codigo=$reg->CID_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=cidade&acao=excluir&codigo=$reg->CID_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=4>Total de registros : ';
                    $contar = new cidade_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
