<section id="menu">
    <span  id="idMenu" class="material-symbols-outlined" onclick="clickMenu()">menu</span>
    <nav id="navMenu">
        <?php
            echo "<a href='#Destaques' alt='Os nossos melhores produtos' onClick='fechaMenu()'>Destaques</a>";
            $busca =$banco->query("SELECT * FROM categoria");
            if(!$busca){
                echo "<p>falha na busca</p>";
            }else{
                while($reg = $busca->fetch_object()){
                    echo "<a href='#$reg->nome' alt='$reg->descricao' onClick='fechaMenu()'>$reg->nome</a>";
                }
            }
        ?>
    </nav>
</section>


