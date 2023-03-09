<?php
    //ini_set('display_errors', 1);
    //error_reporting(E_ALL);
    $id = $_GET['id'] ?? '';
    $busca = $banco->query("SELECT * FROM empresa where id = '$id'");
    if(!$busca->num_rows == 0){
        while($reg=$busca->fetch_object()){
            $id = $reg->id;
            $cnpj = $reg->cnpj;
            $endereco = $reg->endereco;
            $telefone = $reg->telefone;
            $facebook = $reg->facebook;
            $instagram = $reg->instagram;
            $mapa = $reg->mapa;
        }
    }
?>
<section id="acao">
    <form action="./mvc/controller/empresa.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <input type="hidden" name="acao" id="acao" value="<?php echo $_GET['acao']?>">
        <div>
            <label for="telefone">Telefone</label>
            <input type="number" name="telefone" id="telefone" placeholder="Digite o telefone da empresa" minlength="11" maxlength="11" value='<?php echo $telefone;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="cnpj">C.N.P.J.</label>
            <input type="number" name="cnpj" id="cnpj" placeholder="Digite o C.N.P.J. da empresa " minlength="14" maxlength="14" value='<?php echo $cnpj;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço da empresa" value='<?php echo $endereco;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" placeholder="Digite o facebook da empresa" value='<?php echo $facebook;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" id="instagram" placeholder="Digite o instagram da empresa" value='<?php echo $instagram;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="mapa">Mapa</label>
            <input type="text" name="mapa" id="mapa" placeholder="Digite o mapa da empresa" value='<?php echo $mapa;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <?php
            if(strtoupper($_GET['acao']) == "EXCLUIR"){
                echo '<p>TEM CERTEZA QUE QUER EXCLUIR</p>';
            }
        ?>
        <input type="submit" value="<?php echo strtoupper($_GET['acao'])?>">
    </form>
</section>
