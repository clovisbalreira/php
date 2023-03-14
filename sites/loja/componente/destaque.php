<?php
    echo "<h2 id='Destaques'>Destaques</h2>";
    echo "<div>";
    $busca =$banco->query("SELECT * FROM `produtos` WHERE destaque > 0 ORDER by destaque");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($reg = $busca->fetch_object()){
            echo "<div>";
            echo "<img src='./assets/imagens/produto/$reg->imagem' alt='$reg->nome'>";
            echo "<a href='https://wa.me/$phone?text=Olá%20Tudo%20Bem%20gostaria%20de%20mais%20informações%20sobre%20$reg->nome' target='_blank'><button class='fale-conosco'>Faça seu pedido</button></a>";
            echo "<p class='nome'>$reg->nome</p>";
            $preco = str_replace('.',',',$reg->preco);
            echo "<p>R$: $preco</p>";
            echo "</div>";
            }
        echo "</div>";
    }
?>


