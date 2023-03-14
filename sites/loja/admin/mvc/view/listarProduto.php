<section id="listar">
    <div id="tituloTable">
        <h1 id="titulo">Produto</h1>
        <a id="buttonLogout" href="./mvc/controller/logout.php">Sair</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Preço</td>
                <td>Categoria</td>
                <td>Destaque</td>
                <td rowspan="2" colspan="<?php echo is_admin() ? 2 : 1;?>"><?php echo is_admin() ? "<a href='index.php?listar=produto&acao=gravar' alt='produtos'>Criar Novo</a>" : 'Editar';?></td>
            </tr>
            <tr>
                <td><input type="text" name="col0" id="col0" class="colInput"></td>
                <td><input type="text" name="col1" id="col1" class="colInput"></td>
                <td><input type="text" name="col2" id="col2" class="colInput"></td>
                <td><input type="text" name="col3" id="col3" class="colInput"></td>
                <td><input type="text" name="col4" id="col4" class="colInput"></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $busca =$banco->query("SELECT produtos.id as id, produtos.nome as nome, produtos.imagem as imagem, produtos.preco as preco, categoria.nome as categoria, produtos.destaque as destaque FROM produtos INNER JOIN categoria on categoria.id = produtos.categoria;");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        $preco = str_replace('.',',',$reg->preco);
                        $td = "<tr>
                        <td>$reg->nome</td>
                        <td><img src='../assets/imagens/produto/$reg->imagem' alt='$reg->nome'></td>
                        <td>R$: $preco</td>
                        <td>$reg->categoria</td>
                        <td>$reg->destaque</td>
                        <td><a href='index.php?listar=produto&acao=editar&id=$reg->id' alt='produtos'>Editar</a></td>";
                        if(is_admin()){
                            $td .= "<td><a href='index.php?listar=produto&acao=excluir&id=$reg->id' alt='produtos'>Excluir</a></td>";
                        }
                        $td .= "</tr>";
                        echo $td;
                    }
                } 
            ?>
            </tbody>
    </table>
</section>