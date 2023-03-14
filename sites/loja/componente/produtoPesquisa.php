<?php
    $buscaProdutos =$banco->query("SELECT * FROM produtos");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($regProdutos = $buscaProdutos->fetch_object()){
            echo "<div>";
                echo "<img src='./assets/imagens/produto/$regProdutos->imagem' alt='$regProdutos->nome'>";
                echo "<a href='https://wa.me/$phone?text=Olá%20Tudo%20Bem%20gostaria%20de%20mais%20informações%20sobre%20$regProdutos->nome' target='_blank'><button class='fale-conosco'>Faça seu pedido</button></a>";
                echo "<p class='nomePesquisa'>$regProdutos->nome</p>";
                $preco = str_replace('.',',',$regProdutos->preco);
                echo "<p>R$: $preco</p>";
            echo "</div>";
        }
    }
?>
