<?php
    session_start();
    if(!$_SESSION['nome']){
        require_once 'funcao/funcoes.php' ;
        direciona("login/","login_form.php");
        exit;
    }else{

?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <?php
            require_once '../conexao/Conexao.php' ;
            require_once 'funcao/funcoes.php' ;
        ?>
        <title>carrinho</title>
    </head>
    <body>
        <header>
            <h2 class="titulo_sistema">Carrinho</h2>
        </header>
        <table>
        <tr>
            <td>
                <ul>
                    <li><a href="index.php">Home</a>
                    <li><a href="index.php?tabela=usuario&acao=listar">Usuario</a>
                    <li><a href="index.php?tabela=categoria&acao=listar">Categoria 
                    <li><a href="index.php?tabela=cidade&acao=listar">Cidade</a> 
                    <li><a href="index.php?tabela=cliente&acao=listar">Cliente</a> 
                    <li><a href="index.php?tabela=fornecedor&acao=listar">Fornecedor</a> 
                    <li><a href="index.php?tabela=pedido&acao=listar">Pedidos 
                    <li><a href="index.php?tabela=produto&acao=listar">Produtos</a> 
                    <li>Promoção
                    <li><a href="login/logout.php">Sair</a>
            <td>
                <?php 
                    $tabela = $_REQUEST['tabela'] ?? ""; 

                    if($tabela == 'categoria'){
                        require_once 'categoria/categoria_lista.php' ;
                        require("categoria/categoria-acao.php");
                    }elseif($tabela == 'cidade'){
                        require_once 'cidade/cidade_lista.php' ;
                        require("cidade/cidade-acao.php");
                    }elseif($tabela == 'usuario'){
                        require_once 'usuario/usuario_lista.php' ;
                        require("usuario/usuario-acao.php");
                    }elseif($tabela == 'fornecedor'){
                        require_once 'fornecedor/fornecedor_lista.php' ;
                        require("fornecedor/fornecedor-acao.php");
                    }elseif($tabela == 'produto'){
                        require_once 'produtos/produtos_lista.php' ;
                        require("produtos/produtos-acao.php");
                    }elseif($tabela == 'pedido'){
                        require_once 'pedidos/pedido_lista.php' ;
                        require("pedidos/pedido-acao.php");
                    }elseif($tabela == 'cliente'){
                        require_once 'clientes/clientes_lista.php' ;
                        require("clientes/clientes-acao.php");
                    }elseif($tabela == 'imagem'){
                        require_once 'imagem/imagem_lista.php' ;
                        require("imagem/imagem-acao.php");
                    }else{
                        require("principal.php");
                    }
                ?>
        </table>
        <footer>Criado por Clóvis Balreira Rodrigues</footer>
    </body>
    </html>
<?php
}
?>