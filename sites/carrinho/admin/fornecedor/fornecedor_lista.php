<?php
class fornecedor_lista{
    
    function acoes_fornecedor($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action='index.php' >";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                    echo "<tr><td colspan=2>Editar de fornecedor";
                        echo "<tr><td>Razão Social";
                        echo "<td><input name='FOR_RAZAOSOCIAL' type='text' id='FOR_RAZAOSOCIAL' SIZE='40' value='$reg->FOR_RAZAOSOCIAL' required/>";
                        echo "<tr><td>Nome";
                        echo "<td><input name='FOR_NOME_FANTASIA' type='text' id='FOR_NOME_FANTASIA' SIZE='40' value='$reg->FOR_NOME_FANTASIA' required/>";
                        echo "<tr><td>Endereço";
                        echo "<td><input name='FOR_ENDERECO' type='type' id='FOR_ENDERECO' SIZE='40' value='$reg->FOR_ENDERECO' required/>";
                        echo "<tr><td>Bairro";
                        echo "<td><input name='FOR_BAIRRO' type='text' id='FOR_BAIRRO' SIZE='40' value='$reg->FOR_BAIRRO' required/>";
                        echo "<tr><td>Telefone";
                        echo "<td><input name='FOR_FONE' type='tel' id='FOR_FONE' SIZE='40' value='$reg->FOR_FONE' required/>";
                        echo "<tr><td>Responsavel";
                        echo "<td><input name='FOR_RESPONSAVEL' type='type' id='FOR_RESPONSAVEL' SIZE='40' value='$reg->FOR_RESPONSAVEL' required/>";
                        echo "<tr><td>Email";
                        echo "<td><input name='FOR_EMAIL' type='email' id='FOR_EMAIL' SIZE='40' value='$reg->FOR_EMAIL' required/>";
                        echo "<tr><td>CNPJ";
                        echo "<td><input name='FOR_CNPJ' type='text' id='FOR_CNPJ' SIZE='40' value='$reg->FOR_CNPJ' required/>";
                        echo "<tr><td>CEP";
                        echo "<td><input name='FOR_CEP' type='type' id='FOR_CEP' SIZE='40' value='$reg->FOR_CEP' required/>";
                        echo "<tr><td>Cidade";
                        echo "<td><select name='CID_CODIGO' id='CID_CODIGO'>";
                            $listar_tabela = new fornecedor_manutencao();
                            $listar_tabela->listar_cidade($reg->CID_CODIGO);
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='fornecedor'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->FOR_CODIGO'>";
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
                echo "<tr><td>Razão Social";
                echo "<td><input name='FOR_RAZAOSOCIAL' type='text' id='FOR_RAZAOSOCIAL' SIZE='40'/>";
                echo "<tr><td>Nome";
                echo "<td><input name='FOR_NOME_FANTASIA' type='text' id='FOR_NOME_FANTASIA' SIZE='40'/>";
                echo "<tr><td>Endereco";
                echo "<td><input name='FOR_ENDERECO' type='text' id='FOR_ENDERECO' SIZE='40'/>";
                echo "<tr><td>Bairro";
                echo "<td><input name='FOR_BAIRRO' type='text' id='FOR_BAIRRO' SIZE='40'/>";
                echo "<tr><td>Telefone";
                echo "<td><input name='FOR_FONE' type='tel' id='FOR_FONE' SIZE='40'/>";
                echo "<tr><td>Responsavel";
                echo "<td><input name='FOR_RESPONSAVEL' type='text' id='FOR_RESPONSAVEL' SIZE='40'/>";
                echo "<tr><td>E-mail";
                echo "<td><input name='FOR_EMAIL' type='emal' id='FOR_EMAIL' SIZE='40'/>";
                echo "<tr><td>CNPJ";
                echo "<td><input name='FOR_CNPJ' type='text' id='FOR_CNPJ' SIZE='40'/>";
                echo "<tr><td>CEP";
                echo "<td><input name='FOR_CEP' type='text' id='FOR_CEP' SIZE='40'/>";
                echo "<tr><td>Cidade";
                echo "<td><select name='CID_CODIGO' id='CID_CODIGO'>";
                    $listar_tabela = new fornecedor_manutencao();
                    $listar_tabela->listar_cidade("");
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='fornecedor'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=11><h2>Lista de fornecedor</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=fornecedor&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_RAZAOSOCIAL'>Razão Social</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_NOME_FANTASIA'>Nome</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_ENDERECO'>Endereco</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_BAIRRO'>Bairro</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_FONE'>Telefone</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_RESPONSAVEL'>Responsavel</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_EMAIL'>e-mail</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_CNPJ'>cnpj</a>";
            echo "<td><a href='index.php?tabela=fornecedor&acao=listar&ordem=FOR_CEP'>cep</a>";
            echo "<td colspan=2><a href='index.php?tabela=fornecedor&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->FOR_RAZAOSOCIAL";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_NOME_FANTASIA";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_ENDERECO";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_BAIRRO";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_FONE";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_RESPONSAVEL";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_EMAIL";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_CNPJ";
                        echo "<td class='itens_tabela_banco'>$reg->FOR_CEP";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=fornecedor&acao=alterar&codigo=$reg->FOR_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=fornecedor&acao=excluir&codigo=$reg->FOR_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=11>Total de registros : ';
                    $contar = new fornecedor_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
