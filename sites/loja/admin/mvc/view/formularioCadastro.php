<?php
    $id = $_GET['id'] ?? '';
    $busca = $banco->query("SELECT * FROM usuarios where usuario = '$id'");
    if(!$busca->num_rows == 0){
        while($reg=$busca->fetch_object()){
            $usuario = $reg->usuario;
            $nome = $reg->nome;
            $senha = $reg->senha;
            $tipo = $reg->tipo;
        }
    }
?>
<section id="acao">
    <form action="./mvc/controller/cadastro.php" method="post">
        <input type="hidden" name="acao" id="acao" value="<?php echo $_GET['acao']?>">
        <input type="hidden" name="senhaBanco" id="senhaBanco" value='<?php echo $senha;?>'>
        <div>
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Digite o usuário" value='<?php echo $usuario;?>' required <?php echo $_GET['acao'] == "editar" || $_GET['acao'] == "excluir" ? "readonly" : "";?>>
        </div>
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do usuário"  value='<?php echo $nome;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite a senha do usuário" value='<?php echo $senha;?>' required <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
        </div>
        <div>
            <label for="tipo">Tipo de acesso do usuário</label>
            <select name="tipo" id="tipo" <?php echo $_GET['acao'] == "excluir" ? "disabled" : "";?>>
                <option value="admin" <?php echo $tipo == 'admin' ? 'selected' : '';?>>Administrativo</option>
                <option value="editor" <?php echo $tipo == 'editor' || $tipo == '' ? 'selected' : '';?>>Editor</option>
            </select>
        </div>
        <?php
            if(strtoupper($_GET['acao']) == "EXCLUIR"){
                echo '<p>TEM CERTEZA QUE QUER EXCLUIR</p>';
            }
        ?>
        <input type="submit" value="<?php echo strtoupper($_GET['acao'])?>">
    </form>
</section>