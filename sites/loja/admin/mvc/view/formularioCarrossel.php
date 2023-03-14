<?php
    $id = $_GET['id'] ?? '';
    $busca = $banco->query("SELECT * FROM carrossel where id = '$id'");
    if(!$busca->num_rows == 0){
        while($reg=$busca->fetch_object()){
            $id = $reg->id;
            $nome = $reg->nome;
            $imagem = $reg->imagem;
            $descricao = $reg->descricao;
            $ordem = $reg->ordem;
        }
    }
?>
<section id="acao">
    <form action="./mvc/controller/carrossel.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <input type="hidden" name="acao" id="acao" value="<?php echo $_GET['acao']?>" required>
        <input type="hidden" name="imagemBanco" id="imagemBanco" value="<?php echo $imagem?>">
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome da imagem do carrossel" value='<?php echo $nome;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" <?php echo $_GET['acao'] == "gravar" ? "required" : "";?> <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?> accept=".jpg, .png">
        </div>
        <div id="textearea">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" placeholder="Digite a descrição da imagem" cols="30" rows="10" required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>><?php echo $descricao;?></textarea>
        </div>
        <div>
            <label for="ordem">ordem</label>
            <input type="number" value='<?php echo $ordem;?>' name="ordem" id="ordem" <?php echo $_GET['acao'] == "gravar" ? "required" : "";?> <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?> min="1">
        </div>
        <?php
            if(strtoupper($_GET['acao']) == "EXCLUIR"){
                echo '<p>TEM CERTEZA QUE QUER EXCLUIR</p>';
            }
        ?>
        <input type="submit" value="<?php echo strtoupper($_GET['acao'])?>">
    </form>
</section>
