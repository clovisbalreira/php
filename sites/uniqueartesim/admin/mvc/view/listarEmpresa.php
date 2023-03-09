<section id="listar">
    <div id="tituloTable">
        <h1 id="titulo">Empresa</h1>
        <a id="buttonLogout" href="./mvc/controller/logout.php">Sair</a>
    </div>
    <table id="tableEmpressa">
        <thead>
            <tr>
                <td>Telefone</td>
                <td>C.N.P.J.</td>
                <td>Endereço</td>
                <td>Facebook</td>
                <td>Instagram</td>
                <td>Mapa</td>
                <td rowspan="2" colspan="<?php echo is_admin() ? 2 : 1;?>"><?php echo is_admin() ? "<a href='index.php?listar=empresa&acao=gravar' alt='Empresa'>Criar Novo</a>" : 'Editar';?></td>
            </tr>
            <tr>
                <td><input type="text" name="col0" id="col0" class="colInput"></td>
                <td><input type="text" name="col1" id="col1" class="colInput"></td>
                <td><input type="text" name="col2" id="col2" class="colInput"></td>
                <td><input type="text" name="col3" id="col3" class="colInput"></td>
                <td><input type="text" name="col4" id="col4" class="colInput"></td>
                <td><input type="text" name="col5" id="col5" class="colInput"></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $busca =$banco->query("SELECT * FROM empresa");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        $td = "<tr>
                        <td>$reg->telefone</td>
                        <td>$reg->cnpj</td>
                        <td>$reg->endereco</td>
                        <td>$reg->facebook</td>
                        <td>$reg->instagram</td>
                        <td>$reg->mapa</td>
                        <td><a href='index.php?listar=empresa&acao=editar&id=$reg->id' alt='Empresa'>Editar</a></td>";
                        if(is_admin()){
                            $td .= "<td><a href='index.php?listar=empresa&acao=excluir&id=$reg->id' alt='Empresa'>Excluir</a></td>";
                        }
                        $td .= "</tr>";
                        echo $td;
                    }
                } 
            ?>
        </tbody>
    </table>
</section>