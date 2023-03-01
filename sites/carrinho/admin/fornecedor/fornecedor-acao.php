<?php
    require('fornecedor_manutencao.php');

    $oquefazer = new fornecedor_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'listar'){
        $filtro = $_REQUEST['filtro'] ?? "";
        $oquefazer->listar_fornecedor();
    }

    if($acao == 'excluir'){
        $oquefazer->listar_excluir();
        $oquefazer->listar_fornecedor();
    }
    
    if($acao == 'incluir'){
        $listar_tabela = new fornecedor_lista();
        $listar_tabela->acoes_fornecedor("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        $oquefazer->listar_fornecedor();
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_fornecedor();
    }
    

?>