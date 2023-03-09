<?php
    $id = $_GET['id'] ?? '';
    $busca = $banco->query("SELECT * FROM produtos where id = '$id'");
    if(!$busca->num_rows == 0){
        while($reg=$busca->fetch_object()){
            $id = $reg->id;
            $nome = $reg->nome;
            $imagem = $reg->imagem;
            $preco = $reg->preco;
            $categoria = $reg->categoria;
            $destaque = $reg->destaque;
        }
    }
?>
<section id="acao">
    <form action="./mvc/controller/produto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <input type="hidden" name="acao" id="acao" value="<?php echo $_GET['acao']?>">
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" value='<?php echo $nome?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem"  <?php echo $_GET['acao'] == "gravar" ? "required" : "";?> <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" placeholder="Digite o preço do produto" min='0' step='.01' value='<?php echo $preco?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
            <?php
                $busca =$banco->query("SELECT * FROM categoria");
                if(!$busca){
                    echo "<p>falha na busca</p>";
                }else{                    
                    while($reg = $busca->fetch_object()){
                        echo "
                        <option value='$reg->id'"; 
                        if($reg->id == $categoria){
                            echo 'selected';
                        }
                        echo ">$reg->nome</option>
                        ";
                    }
                } 
            ?>
            </select>
        </div>
        <div>
            <label for="destaque">Destaque</label>
            <input type="number" name="destaque" id="destaque" placeholder="Digite a posição de destaque do produto" min='0' value='<?php echo $destaque?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <?php
            if(strtoupper($_GET['acao']) == "EXCLUIR"){
                echo '<p>TEM CERTEZA QUE QUER EXCLUIR</p>';
            }
        ?>
        <input type="submit" value="<?php echo strtoupper($_GET['acao'])?>">
    </form>
</section>
