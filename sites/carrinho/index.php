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
        <title>carrinho</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <header>
            <h2>Carrinho</h2>
        </header>
        <main>
            <nav>
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
                    <li>
                        <?php
                            require('./carrinho_lista.php');
                            $oquefazer->listar();
                        ?>
                    </li>
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
        <footer>Criado por <a href="">Clóvis Balreira Rodrigues</a></footer>
    </body>
</html>
