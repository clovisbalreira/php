<section id="listar">
    <div id="tituloTable">
        <h1 id="titulo">Carrossel</h1>
        <a id="buttonLogout" href="./mvc/controller/logout.php">Sair</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Imagem</td>
                <td>Descrição</td>
                <td>Ordem</td>
                <td rowspan="2" colspan="<?php echo is_admin() ? 2 : 1;?>"><?php echo is_admin() ? "<a href='index.php?listar=carrossel&acao=gravar' alt='Carrossel'>Criar Novo</a>" : 'Editar';?></td>
            </tr>
            <tr>
                <td><input type="text" name="col0" id="col0" class="colInput"></td>
                <td><input type="text" name="col1" id="col1" class="colInput"></td>
                <td><input type="text" name="col2" id="col2" class="colInput"></td>
                <td><input type="text" name="col3" id="col3" class="colInput"></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $busca =$banco->query("SELECT * FROM carrossel");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        $td = "
                            <tr>
                                <td>$reg->nome</td>
                                <td><img src='../assets/imagens/carrossel/$reg->imagem' alt='$reg->nome'></td>
                                <td>$reg->descricao</td>
                                <td>$reg->ordem</td>
                                <td><a href='index.php?listar=carrossel&acao=editar&id=$reg->id' alt='Carrossel'>Editar</a></td>
                            ";
                        if(is_admin()){
                            $td .= "<td><a href='index.php?listar=carrossel&acao=excluir&id=$reg->id' alt='Carrossel'>Excluir</a></td>";
                        }
                        $td .= "</tr>
                        ";
                        echo $td;                             
                    }
                } 
            ?>
            </tbody>
    </table>
</section>