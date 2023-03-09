<?php
    require_once './includes/conexao.php';
    ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Unique Arts e Sim</title>
        <link rel="shortcut icon" href="../../" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <header>
            <img src="./assets/imagens/logo/uniqueartesim.png" alt="Unique art e sim">
        </header>
        <main>
            <?php 
                require_once "./componente/categoria.php"; 
                require_once './componente/empresa.php';
            ?>
        <section class="wrapper">
            <div class="slide-wrapper" data-slide="wrapper">
                <button class="slide-nav-button slide-nav-previous" data-slide="nav-previous-button">
                    <img src="./assets/imagens/svg/arrow_left.svg" alt="Unique Art e Sim">
                </button>
                <button class="slide-nav-button slide-nav-next" data-slide="nav-next-button">
                    <img src="./assets/imagens/svg/arrow_right.svg" alt="Unique Art e Sim">
                </button>
                <div class="slide-list" data-slide="list">
                    <?php 
                        require_once './componente/carrosel.php';
                    ?>
                </div>
                <div class="slide-controls" data-slide="controls-wrapper">
                </div>
            </div>
        </section>
        <div id="divPesquisar">
            <labe for="inputPesquisa">Pesquisa: </labe>
            <input type="text" name="inputPesquisa" id="inputPesquisa">
        </div>
        <section id="sectionProdutos">
            <?php 
                require_once './componente/destaque.php';
                require_once './componente/produto.php'; 
            ?>
        </section>
        <section id="sectionPesquisa" class="sectionRemover">
            <?php
                require_once './componente/produtoPesquisa.php';
            ?>
        </section>
        <section id="mapa">
            <h2>ENDEREÇO</h2>
            <address>
                <?php echo $endereco;?>
            </address>
            <?php echo $mapa?>
        </section>
    </main>
    <footer>
        <section id="redes-sociais">
            <div>
                <h3>Siga nossas redes sociais </h2>
                <div id="icon-redes-sociais">
                    <a href="<?php echo $instagram?>" target="_blank">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="<?php echo $facebook?>" target="_blank">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </div>
            </div>
        </section>
        <section id="dados">
            <?php
                echo "<p id='pCnpj'>$cnpj</p>";
                echo "<p id='pEndereco'>$endereco</p>";
                echo "<p id='pTelefone'>$telefone</p>";
            ?>
        </section>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./assets/js/visao/carrossel.js"></script>
    <script src="./assets/js/slide.js"></script>
    <script src="./assets/js/tela.js"></script>
    <script src="./assets/js/pesquisa.js"></script>
    <script>
        initSlider({
            startAtIndex: 0, 
            autoPlay: true, 
            timeInterval: 3000
        })
    </script>
</body>
</html>