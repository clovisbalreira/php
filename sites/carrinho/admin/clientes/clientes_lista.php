<?php
class cliente_lista{
    
    function acoes_cliente($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action='index.php' >";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                    echo "<tr><td colspan=2>Editar de cliente";
                        echo "<tr><td>Data";
                        echo "<td><input name='CLI_NOME' type='text' id='CLI_NOME' SIZE='40' value='$reg->CLI_NOME' required/>";
                        echo "<tr><td>Hora";
                        echo "<td><input name='CLI_ENDERECO' type='text' id='CLI_ENDERECO' SIZE='40' value='$reg->CLI_ENDERECO' required/>";
                        echo "<tr><td>Boleto";
                        echo "<td><input name='CLI_NUMERO' type='type' id='CLI_NUMERO' SIZE='40' value='$reg->CLI_NUMERO' required/>";
                        echo "<tr><td>Valor Total";
                        echo "<td><input name='CLI_COMPLEMENTO' type='text' id='CLI_COMPLEMENTO' SIZE='40' value='$reg->CLI_COMPLEMENTO' required/>";
                        echo "<tr><td>Valor Frete";
                        echo "<td><input name='CLI_BAIRRO' type='tel' id='CLI_BAIRRO' SIZE='40' value='$reg->CLI_BAIRRO' required/>";
                        echo "<tr><td>Status";
                        echo "<td><input name='CLI_CEP' type='text' id='CLI_CEP' SIZE='40' value='$reg->CLI_CEP' required/>";
                        echo "<tr><td>Forma Pagamento";
                        echo "<td><input name='CLI_FONERES' type='text' id='CLI_FONERES' SIZE='40' value='$reg->CLI_FONERES' required/>";
                        echo "<tr><td>Observação";
                        echo "<td><input name='CLI_FONECEL' type='type' id='CLI_FONECEL' SIZE='40' value='$reg->CLI_FONECEL' required/>";
                        echo "<tr><td>Fone Comercial";
                        echo "<td><input name='CLI_FONECOM' type='type' id='CLI_FONECOM' SIZE='40' value='$reg->CLI_FONECOM' required/>";
                        echo "<tr><td>CPF";
                        echo "<td><input name='CLI_CPF' type='type' id='CLI_CPF' SIZE='40' value='$reg->CLI_CPF' required/>";
                        echo "<tr><td>RG";
                        echo "<td><input name='CLI_RG' type='type' id='CLI_RG' SIZE='40' value='$reg->CLI_RG' required/>";
                        echo "<tr><td>Data de Cadastro";
                        echo "<td><input name='CLI_DATACADASTRO' type='type' id='CLI_DATACADASTRO' SIZE='40' value='$reg->CLI_DATACADASTRO' required/>";
                        echo "<tr><td>Data de Nascimento";
                        echo "<td><input name='CLI_DATANASC' type='type' id='CLI_DATANASC' SIZE='40' value='$reg->CLI_DATANASC' required/>";
                        echo "<tr><td>E-mail";
                        echo "<td><input name='CLI_EMAIL' type='type' id='CLI_EMAIL' SIZE='40' value='$reg->CLI_EMAIL' required/>";
                        echo "<tr><td>Login";
                        echo "<td><input name='CLI_LOGIN' type='type' id='CLI_LOGIN' SIZE='40' value='$reg->CLI_LOGIN' required/>";
                        echo "<tr><td>Senha";
                        echo "<td><input name='CLI_SENHA' type='type' id='CLI_SENHA' SIZE='40' value='$reg->CLI_SENHA' required/>";
                        echo "<tr><td>Data da Ultimo Compra";
                        echo "<td><input name='CLI_DATAULTCOMP' type='type' id='CLI_DATAULTCOMP' SIZE='40' value='$reg->CLI_DATAULTCOMP' required/>";
                        echo "<tr><td>Valor da Ultima Compra";
                        echo "<td><input name='CLI_VALOR_ULTCOMP' type='type' id='CLI_VALOR_ULTCOMP' SIZE='40' value='$reg->CLI_VALOR_ULTCOMP' required/>";
                        echo "<tr><td>Valor Total";
                        echo "<td><input name='CLI_VALOR_TOTAL' type='type' id='CLI_VALOR_TOTAL' SIZE='40' value='$reg->CLI_VALOR_TOTAL' required/>";
                        echo "<tr><td>Cidade";
                        echo "<td><select name='CID_CODIGO' id='CID_CODIGO' required>";
                        echo "<option>Selecione</option>";
                            $listar_tabela = new cliente_manutencao();
                            $listar_tabela->listar_cidade($reg->CID_CODIGO);
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='cliente'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->CLI_CODIGO'>";
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
                echo "<td><input name='CLI_NOME' type='text' id='CLI_NOME' SIZE='40'/>";
                echo "<tr><td>Endereço";
                echo "<td><input name='CLI_ENDERECO' type='text' id='CLI_ENDERECO' SIZE='40'/>";
                echo "<tr><td>Numero";
                echo "<td><input name='CLI_NUMERO' type='text' id='CLI_NUMERO' SIZE='40'/>";
                echo "<tr><td>Complemento";
                echo "<td><input name='CLI_COMPLEMENTO' type='text' id='CLI_COMPLEMENTO' SIZE='40'/>";
                echo "<tr><td>Bairro";
                echo "<td><input name='CLI_BAIRRO' type='tel' id='CLI_BAIRRO' SIZE='40'/>";
                echo "<tr><td>CEP";
                echo "<td><input name='CLI_CEP' type='emal' id='CLI_CEP' SIZE='40'/>";
                echo "<tr><td>Fone residencial";
                echo "<td><input name='CLI_FONERES' type='text' id='CLI_FONERES' SIZE='40'/>";
                echo "<tr><td>Fone celular";
                echo "<td><input name='CLI_FONECEL' type='text' id='CLI_FONECEL' SIZE='40'/>";
                echo "<tr><td>Fone comercial";
                echo "<td><input name='CLI_FONECOM' type='emal' id='CLI_FONECOM' SIZE='40'/>";
                echo "<tr><td>CPF";
                echo "<td><input name='CLI_CPF' type='emal' id='CLI_CPF' SIZE='40'/>";
                echo "<tr><td>RG";
                echo "<td><input name='CLI_RG' type='emal' id='CLI_RG' SIZE='40'/>";
                echo "<tr><td>Data de Cadastro";
                echo "<td><input name='CLI_DATACADASTRO' type='emal' id='CLI_DATACADASTRO' SIZE='40'/>";
                echo "<tr><td>Data de Nascimento";
                echo "<td><input name='CLI_DATANASC' type='emal' id='CLI_DATANASC' SIZE='40'/>";
                echo "<tr><td>E-mail";
                echo "<td><input name='CLI_EMAIL' type='emal' id='CLI_EMAIL' SIZE='40'/>";
                echo "<tr><td>Login";
                echo "<td><input name='CLI_LOGIN' type='emal' id='CLI_LOGIN' SIZE='40'/>";
                echo "<tr><td>Senha";
                echo "<td><input name='CLI_SENHA' type='emal' id='CLI_SENHA' SIZE='40'/>";
                echo "<tr><td>Fone residencial";
                echo "<td><input name='CLI_CEP' type='emal' id='CLI_CEP' SIZE='40'/>";
                echo "<tr><td>Data da Ultima Compra";
                echo "<td><input name='CLI_DATAULTCOMP' type='emal' id='CLI_DATAULTCOMP' SIZE='40'/>";
                echo "<tr><td>Valor da Ultima Compra";
                echo "<td><input name='CLI_VALOR_ULTCOMP' type='emal' id='CLI_VALOR_ULTCOMP' SIZE='40'/>";
                echo "<tr><td>Valor Total";
                echo "<td><input name='CLI_VALOR_TOTAL' type='emal' id='CLI_VALOR_TOTAL' SIZE='40'/>";
                echo "<tr><td>Cidade";
                echo "<td><select name='CID_CODIGO' id='CID_CODIGO'>";
                echo "<option value='2'>dois</option>";
                    $listar_tabela = new cliente_manutencao();
                    $listar_tabela->listar_cidade("");
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='cliente'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=22><h2>Lista de cliente</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=cliente&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_NOME'>Nome</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_ENDERECO'>Endereço</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_NUMERO'>Numero</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_COMPLEMENTO'>Complemento</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_BAIRRO'>Bairro</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_CEP'>Cep</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_FONERES'>Fone 1</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_FONECEL'>Fone 2</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_FONECOM'>Fone 3</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_CPF'>Cpf</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_RG'>rg</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_DATACADASTRO'>dt cad</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_DATANASC'>dt nas</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_EMAIL'>email</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_LOGIN'>login</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_SENHA'>senha</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_CLI_DATAULTCOMP'>dt ult cp</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_CLI_VALOR_ULTCOMP'>vl ult cp</a>";
            echo "<td><a href='index.php?tabela=cliente&acao=listar&ordem=CLI_VALOR_TOTAL'>Valor Total</a>";
            echo "<td colspan=2><a href='index.php?tabela=cliente&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->CLI_NOME";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_ENDERECO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_NUMERO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_COMPLEMENTO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_BAIRRO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_CEP";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_FONERES";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_FONECEL";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_FONECOM";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_CPF";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_RG";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_DATACADASTRO";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_DATANASC";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_EMAIL";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_LOGIN";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_SENHA";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_DATAULTCOMP";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_VALOR_ULTCOMP";
                        echo "<td class='itens_tabela_banco'>$reg->CLI_VALOR_TOTAL";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=cliente&acao=alterar&codigo=$reg->CLI_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=cliente&acao=excluir&codigo=$reg->CLI_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=22>Total de registros : ';
                    $contar = new cliente_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
