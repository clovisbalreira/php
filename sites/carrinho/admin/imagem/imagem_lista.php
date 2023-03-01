<?php
class imagem_lista{
    
    function acoes_imagem($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "incluir"){
            echo "<form id='form' enctype='multipart/form-data' name='form_cadastro' method='post' action='index.php' >";
            echo  "<table>";
                echo "<tr class='ordenacao_novo_registro'><td colspan=2>Manutenção de    ";
                echo "<td><input name='IMG_DESCRICAO' type='file' id='IMG_DESCRICAO' SIZE='50' />";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='imagem'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
                echo "<input type='hidden' name='codigo' value='".$_REQUEST['codigo']."'/>";

            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo "<tr class='titulos_listas'><td colspan=11><h2>Lista de imagem do produto "; echo $_REQUEST['codigo'];"</h2>";
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=imagem&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=imagem&acao=listar&ordem=PROD_ CODIGO'>Produto</a>";
            echo "<td><a href='index.php?tabela=imagem&acao=listar&ordem=IMG_CODIGO'>imagem</a>";
            echo "<td colspan=3><a href='index.php?tabela=imagem&acao=incluir&codigo=";echo $_REQUEST["codigo"]; echo "'>Novo Registro</a>";            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->PROD_CODIGO";
                        echo "<td class='itens_tabela_banco'><img class='produto' src='imagens/$reg->IMG_DESCRICAO'>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=imagem&codigo=$reg->PROD_CODIGO&acao=excluir&codigo_imagem=$reg->IMG_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=11>Total de registros : ';
                    $contar = new imagem_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
