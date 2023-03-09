<section id="listar">
    <div id="tituloTable">
        <h1 id="titulo">Cadastro</h1>
        <a id="buttonLogout" href="./mvc/controller/logout.php">Sair</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>Usuario</td>
                <td>Nome</td>
                <td>Tipo</td>
                <td rowspan="2" colspan="<?php echo is_admin() ? 2 : 1;?>"><?php echo is_admin() ? "<a href='index.php?listar=cadastro&acao=gravar' alt='usuario'>Criar Novo</a>" : 'Editar';?></td>
            </tr>
            <tr>
                <td><input type="text" name="col0" id="col0" class="colInput"></td>
                <td><input type="text" name="col1" id="col1" class="colInput"></td>
                <td><input type="text" name="col2" id="col2" class="colInput"></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $busca =$banco->query("SELECT * FROM usuarios");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        $td = "
                        <tr>
                            <td>$reg->usuario</td>
                            <td>$reg->nome</td>
                            <td>$reg->tipo</td>
                            <td><a href='index.php?listar=cadastro&acao=editar&id=$reg->usuario' alt='usuario'>Editar</a></td>
                        ";
                        if(is_admin()){
                            $td .= "
                                <td><a href='index.php?listar=cadastro&acao=excluir&id=$reg->usuario' alt='usuario'>Excluir</a></td>
                            ";
                        }
                        $td .= "</tr>";
                        echo $td;
                    }
                } 
            ?>
            </tbody>
    </table>
</section>