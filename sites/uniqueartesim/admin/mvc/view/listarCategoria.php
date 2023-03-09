<section id="listar">
    <div id="tituloTable">
        <h1 id="titulo">Categoria</h1>
        <a id="buttonLogout" href="./mvc/controller/logout.php">Sair</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Descrição</td>
                <td rowspan="2" colspan="<?php echo is_admin() ? 2 : 1;?>"><?php echo is_admin() ? "<a href='index.php?listar=categoria&acao=gravar' alt='categoria'>Criar Novo</a>" : 'Editar';?></td>
            </tr>
            <tr>
                <td><input type="text" name="col0" id="col0" class="colInput"></td>
                <td><input type="text" name="col1" id="col1" class="colInput"></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $busca =$banco->query("SELECT * FROM categoria");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        $td = "
                        <tr>
                            <td>$reg->nome</td>
                            <td>$reg->descricao</td>
                            <td><a href='index.php?listar=categoria&acao=editar&id=$reg->id' alt='categoria'>Editar</a></td>";
                        if(is_admin()){
                            $td .= "<td><a href='index.php?listar=categoria&acao=excluir&id=$reg->id' alt='categoria'>Excluir</a></td>";
                        }
                        $td .= "</tr>";
                        echo $td;
                    }
                } 
            ?>
            </tbody>
    </table>
</section>