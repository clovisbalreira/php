<?php
    function quantidade($conexao){
        if(isset($_GET['quantidadeEditar'])){
            $buscaCaixa = $conexao->query("SELECT caixa FROM precos WHERE id_produto = ".$_GET['produtoEditar'] );
            while($caixaBusca = $buscaCaixa->fetch()) {
                return number_format($caixaBusca['caixa']);
            }
        } 
    }
?>