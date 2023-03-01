<?php
class categoria_lista{
    function acoes_categoria($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action=''>";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        echo "<tr><td colspan=2>Editar de categoria";
                        echo "<tr><td>Nome";
                        echo "<td><input name='CAT_DESCRICAO' type='text' id='CAT_DESCRICAO' SIZE='40' value='$reg->CAT_DESCRICAO'/>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<input type='submit' value='Cancela'>";
                        echo "<input type='hidden' name='tabela' value='categoria'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->CAT_CODIGO'>";
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
                echo "<tr class='ordenacao_novo_registro'><td colspan=2>Manutenção de categoria";
                echo "<tr><td>Nome";
                echo "<td><input name='CAT_DESCRICAO' type='text' id='CAT_DESCRICAO' SIZE='40'/>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='button' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='categoria'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=4><h2>Lista de categoria</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=categoria&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=categoria&acao=listar&ordem=CAT_DESCRICAO'>Descrição</a>";
            echo "<td colspan=2><a href='index.php?tabela=categoria&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr><td class='itens_tabela_banco'>$reg->CAT_DESCRICAO";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=categoria&acao=alterar&codigo=$reg->CAT_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=categoria&acao=excluir&codigo=$reg->CAT_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=4>Total de registros : ';
                    $contar = new categoria_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
