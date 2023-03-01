<?php
    $banco = mysqli_connect("localhost", "root", "", "bd_games");
    if($banco->connect_errno){
        echo "<p>Encontrei um erro $banco->errno --> $banco->error</p>";
        die();
    }//else{ echo 'conectou'}

    /*
    $banco->query("SET NAMES'utf8'");
    $banco->query("SET character set connection=utf8");
    $banco->query("SET character setclient=utf8");
    $banco->query("SET character_set_result=utf8");

    $busca =$banco->query("SELECT * FROM generos");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($reg = $busca->fetch_object()){
            print_r($reg);
            echo "<br>";
        }
    }*/
    
?>
