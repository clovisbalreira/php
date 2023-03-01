<?php
    require('imagem_manutencao.php');

    $oquefazer = new imagem_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'listar'){
        $filtro = $_REQUEST['filtro'] ?? "";
        $oquefazer->listar_imagem();
    }

    if($acao == 'excluir'){
        $oquefazer->listar_excluir();
        $oquefazer->listar_imagem();
    }
    
    if($acao == 'incluir'){
        $listar_tabela = new imagem_lista();
        $listar_tabela->acoes_imagem("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        $oquefazer->listar_imagem();
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_imagem();
    }
    

?>