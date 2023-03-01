<?php
    $acao = $_REQUEST['acao'] ?? "";
    if($acao == 'listar_produtos'){
        $oquefazer->listar_produtos($_REQUEST['categoria']);
    }
    if($acao == 'incluir_no_carrinho'){
        $oquefazer->incluir_no_carrinho($_REQUEST['produto']);            
        voltar();
    }
    if($acao == 'listarcarrinho'){
        $oquefazer->listar_carrinho();            
    }
    if($acao == 'atualizar_carrinho'){
        $oquefazer->atualizar_carrinho();            
        $oquefazer->listar_carrinho();            
    }
    if($acao == 'finalizar_pedido'){
        require('cliente_form.php');
    }
    if($acao == 'ver_pedido'){
        $oquefazer->ver_pedido();            
        $mostra = new layout();
        $mostra->mostrar_cliente();
        $oquefazer->listar_carrinho();
    }
    if($acao == ""){
        require("principal.php");
    }    

?>