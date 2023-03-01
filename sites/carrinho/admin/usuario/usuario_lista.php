<?php
class usuario_lista{
    function acoes_usuario($busca){
        $acao = $_REQUEST['acao'] ?? "";

        if($acao == "alterar"){
            echo "<form id='form' name='form_cadastro' method='post' action=''>";
            echo  "<table>";
            
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        echo "<tr><td colspan=2>Editar de usuario";
                        echo "<tr><td>Nome";
                        echo "<td><input name='USU_NOME' type='text' id='USU_NOME' SIZE='40' value='$reg->USU_NOME'/>";
                        echo "<tr><td>Login";
                        echo "<td><input name='USU_LOGIN' type='text' id='USU_LOGIN' SIZE='40'/>";
                        echo "<tr><td>Senha";
                        echo "<td><input name='USU_SENHA' type='password' id='USU_SENHA' SIZE='40'/>";
                        echo "<tr><td>Nivel";
                        echo "<td><select name='USU_NIVEL' id='USU_NIVEL'>";
                            $usu1 = '';
                            $usu2 = '';
                            switch($reg->USU_LIVEL){
                                case 'A' : $usu1 = 'selected';break;
                                case 'L' : $usu2 = 'selected';break;
                            }

                            echo "<option value='A' $usu1 >Administrador</option>";
                            echo "<option value='L' $usu2 >Leitura</option>";
                        echo "</select>";
                        echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                        echo "<input type='reset' value='Limpar'>";
                        echo "<a href='index.php'><input type='button' value='Cancela'></a>";
                        echo "<input type='hidden' name='tabela' value='usuario'>";
                        echo "<input type='hidden' name='acao' value='salvarAlteracao'>";
                        echo "<input type='hidden' name='codigo' value='$reg->USU_CODIGO'>";
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
                echo "<td><input name='USU_NOME' type='text' id='USU_NOME' SIZE='40'/>";
                echo "<tr><td>Login";
                echo "<td><input name='USU_LOGIN' type='text' id='USU_LOGIN' SIZE='40'/>";
                echo "<tr><td>Senha";
                echo "<td><input name='USU_SENHA' type='password' id='USU_SENHA' SIZE='40'/>";
                echo "<tr><td>Nivel";
                echo "<td><select name='USU_NIVEL' id='USU_NIVEL'>";
                    echo "<option value='A'>Administrador</option>";
                    echo "<option value='L'>Leitura</option>";
                echo "</select>";
                echo "<tr><td colspan='2'><input type='submit' value='Salvar'>";
                echo "<input type='reset' value='Limpar'>";
                echo "<input type='submit' value='Cancela'>";
                echo "<input type='hidden' name='tabela' value='usuario'>";
                echo "<input type='hidden' name='acao' value='salvar'>";
            echo '</table>';
            echo "</form>";
        }else{
            echo '<table class="borda_tabela">';
            echo '<tr class="titulos_listas"><td colspan=6><h2>Lista de usuario</h2>';
                echo "<form id='form_pesquisa' name='form_pesquisa' method='post' action='index.php?tabela=usuario&acao=listar&filtro='>";
                    echo '<label>Pesquisa : ';
                        echo "<input name='pesquisa' type='text' id='pesquisa' size='50' /> ";
                    echo '</label>';
                    echo "<input name='button' type='submit' id='button' value='pesquisar' /> ";
                    echo '</form>';
            echo "<tr class='ordenacao_novo_registro'><td><a href='index.php?tabela=usuario&acao=listar&ordem=USU_NOME'>Nome</a>";
            echo "<td><a href='index.php?tabela=usuario&acao=listar&ordem=USU_LOGIN'>Usuario";
            echo "<td><a href='index.php?tabela=usuario&acao=listar&ordem=USU_NIVEL'>Nivel";
            echo "<td colspan=2><a href='index.php?tabela=usuario&acao=incluir'>Novo Registro</a>";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro";
            } else {
                if ( $busca->num_rows > 0){
                    while($reg = $busca->fetch_object()){
                        echo "<tr class='mudar_cor'><td class='itens_tabela_banco'>$reg->USU_NOME";
                        echo "<td class='itens_tabela_banco'>$reg->USU_LOGIN";
                        echo "<td class='itens_tabela_banco'>$reg->USU_NIVEL";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=usuario&acao=alterar&codigo=$reg->USU_CODIGO'>Alterar</a>";
                        echo "<td class='alterar_excluir'><a href='index.php?tabela=usuario&acao=excluir&codigo=$reg->USU_CODIGO'>Excluir</a>";
                    }
                    echo '<tr class="titulos_listas"><td colspan=6>Total de registros : ';
                    $contar = new usuario_manutencao();
                    echo $contar->total_registro();
                    } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            }
            echo '</table>';    
        }

    }

}
