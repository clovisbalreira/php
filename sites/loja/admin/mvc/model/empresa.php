<?php
    $busca =$banco->query("SELECT * FROM empresa");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($reg = $busca->fetch_object()){
            $caminho = $reg->caminho;
        }
    }
?>