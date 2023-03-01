<?php
    echo "<footer>";
        echo "<p>Acessado por ". $_SERVER['REMOTE_ADDR']. " na " .dataFormatada()."</p>";
        echo "<p>Desenvolvido por Clóvis Balreira Rodrigues</p>";
    echo "</footer>";
    $banco->close();
?>