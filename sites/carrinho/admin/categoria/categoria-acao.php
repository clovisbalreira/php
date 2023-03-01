<?php
    require('categoria_manutencao.php');

    $oquefazer = new categoria_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'listar'){
        $filtro = $_REQUEST['filtro'] ?? "";
        $oquefazer->listar_categoria();
    }

    if($acao == 'excluir'){
        $oquefazer->listar_excluir();
        $oquefazer->listar_categoria();
    }
    
    if($acao == 'incluir'){
        $listar_tabela = new categoria_lista();
        $listar_tabela->acoes_categoria("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        $oquefazer->listar_categoria();
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_categoria();
    }
    

?>