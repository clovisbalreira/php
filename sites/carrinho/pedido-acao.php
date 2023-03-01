<?php
    require('pedido_manutencao.php');
    $oquefazer = new pedido_manutencao();
    $acao = $_REQUEST['acao'] ?? "";

    $oquefazer->gravar_pedido();
    $oquefazer->listar_itens();
?>