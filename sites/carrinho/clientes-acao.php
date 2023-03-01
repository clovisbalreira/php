<?php
    require('clientes_manutencao.php');
    require('clientes_lista.php');

    $oquefazer = new cliente_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'novo_cliente'){
        $listar_tabela = new cliente_lista();
        $listar_tabela->acoes_cliente("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        require('cliente_form.php');
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_cliente();
    }
    

?>