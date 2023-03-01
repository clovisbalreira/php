<?php
    require('produtos_manutencao.php');

    $oquefazer = new produto_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'listar'){
        $filtro = $_REQUEST['filtro'] ?? "";
        $oquefazer->listar_produto();
    }

    if($acao == 'excluir'){
        $oquefazer->listar_excluir();
        $oquefazer->listar_produto();
    }
    
    if($acao == 'incluir'){
        $listar_tabela = new produto_lista();
        $listar_tabela->acoes_produto("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        $oquefazer->listar_produto();
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_produto();
    }
    

?>