<section id="menu">
    <span  id="idMenu" class="material-symbols-outlined" onclick="clickMenu()">menu</span>
    <nav id="navMenu">
        <?php
            echo "
                <a href='index.php?listar=cadastro&acao=' alt='Cadastro' onClick='fechaMenu()'>Cadastro</a>
                <a href='index.php?listar=empresa' alt='Empresa' onClick='fechaMenu()'>Empresa</a>
                <a href='index.php?listar=carrossel' alt='Carrossel' onClick='fechaMenu()'>Carrossel</a>
                <a href='index.php?listar=categoria' alt='Categorias' onClick='fechaMenu()'>Categoria</a>
                <a href='index.php?listar=produto' alt='Produtos' onClick='fechaMenu()'>Produtos</a>
            ";
        ?>
    </nav>
</section>


