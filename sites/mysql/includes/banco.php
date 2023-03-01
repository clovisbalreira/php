<?php
    $banco = mysqli_connect("localhost", "root", "", "bd_games");
    if($banco->connect_errno){
        echo "<p>Encontrei um erro $banco->errno --> $banco->error</p>";
        die();
    }//else{echo '<p>conectou</p>';}

    //$banco->query("SET NAMES'utf8'");
    //$banco->query("SET character set connection=utf8");
    //$banco->query("SET character setclient=utf8");
    //$banco->query("SET character_set_result=utf8");
    