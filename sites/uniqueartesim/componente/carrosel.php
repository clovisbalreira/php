<script>
    var carrosseis = []
</script>
<?php 
    $busca =$banco->query("SELECT * FROM carrossel");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($reg = $busca->fetch_object()){
            echo "<script>";
            echo "carrosseis.push({nome:'$reg->nome', imagem:'$reg->imagem', descricao:'$reg->descricao'})";
            echo "</script>";
            /* echo "<div slide-item='item' slide-index='$index'>";
                echo "<div class='slide-content'>";
                    echo "<img class='slide-image' src='./assets/imagens/carrossel/$reg->imagem' alt='$reg->descricao'>";
                    //echo "<div class='slide-description'>";
                    //echo "<h3>nome</h3>";
                    //echo "<p>descrição</p>";
                    //echo "</div>";
                echo "</div>";
            echo "</div>";
            $index++; */
        }
    } 
?>
