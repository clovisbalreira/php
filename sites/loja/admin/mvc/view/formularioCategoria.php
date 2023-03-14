<?php
    $id = $_GET['id'] ?? '';
    $busca = $banco->query("SELECT * FROM categoria where id = '$id'");
    if(!$busca->num_rows == 0){
        while($reg=$busca->fetch_object()){
            $id = $reg->id;
            $nome = $reg->nome;
            $descricao = $reg->descricao;
        }
    }
?>
<section id="acao">
    <form action="./mvc/controller/categoria.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <input type="hidden" name="acao" id="acao" value="<?php echo $_GET['acao']?>">
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome da categoria" value='<?php echo $nome;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div id="textearea">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" placeholder="Digite a descrição da categoria" rows="3" required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>><?php echo $descricao?></textarea>
        </div>
        <?php
            if(strtoupper($_GET['acao']) == "EXCLUIR"){
                echo '<p>TEM CERTEZA QUE QUER EXCLUIR</p>';
            }
        ?>
        <input type="submit" value="<?php echo strtoupper($_GET['acao'])?>">
    </form>
</section>
