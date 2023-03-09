<?php
    session_start();
    require_once './conexao/Conexao.php' ;
    require_once './carrinho_manutencao.php';
    $oquefazer = new carrinho_manutencao();
    $total_produtos_carrinho = $oquefazer->quantidade_produtos();
    $categoria = $_REQUEST['categoria'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            require_once 'admin/funcao/funcoes.php' ;
        ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>carrinho</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header>
            <h2>Carrinho</h2>
            <i id="idMenu" class="material-symbols-outlined" onclick="clickMenu()">menu</i>
        </header>
        <main>
            <nav id="">
                <ul>
                    <li>
                        <a href="index.php?id=1&acao=listarcarrinho&categoria=<?php echo $categoria?>">Meu Carrinho : </a>
                        <?php
                        echo $total_produtos_carrinho;
                        ?>
                    </li>
                    <li>
                        <a href="./index.php">Categoria</a>
                    </li>
                    <?php
                        require('./carrinho_lista.php');
                        $oquefazer->listar();
                    ?>
                </ul>
            </nav>  
            <section>
                <?php
                    $acao = $_REQUEST['acao'] ?? "";
                    $id = $_REQUEST['id'] ?? "";        
                    if($id == 1){
                        require('./carrinho-acao.php');
                    }
                    if($id == 2){
                        require('./cliente_form.php');
                    }
                    if($id == 3){
                        require('./cliente_validacao.php');
                    }
                    if($id == 4){
                        require('./clientes-acao.php');
                    }
                    if($id == 5){
                        require('./pedido-acao.php');
                    }
                ?>
            </section>
        </main>
        <!-- <footer>Criado por <a href="">Clóvis Balreira Rodrigues</a></footer> -->
    </body>
</html>
