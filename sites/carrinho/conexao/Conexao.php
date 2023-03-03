<?php
    $banco = new mysqli('localhost','root','','carrinho');
    //se encontrar um erro no banco e mata o banco
    if($banco->connect_errno){
        echo "<p>Encontrei um erro $banco->errno --> $banco->errno</p>";
        die();
    }//else{ echo 'conectou';}

    //verificar acentuação do banco de dados
    /*$banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");
*/
?>
