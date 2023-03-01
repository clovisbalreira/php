<?php
    require('usuario_manutencao.php');

    $oquefazer = new usuario_manutencao();

    $acao = $_REQUEST['acao'] ?? "";

    if($acao == 'listar'){
        $filtro = $_REQUEST['filtro'] ?? "";
        $oquefazer->listar_usuario();
    }

    if($acao == 'excluir'){
        $oquefazer->listar_excluir();
        $oquefazer->listar_usuario();
    }
    
    if($acao == 'incluir'){
        $listar_tabela = new usuario_lista();
        $listar_tabela->acoes_usuario("n");            
    }

    if($acao == 'salvar'){
        $oquefazer->listar_salvar();
        $oquefazer->listar_usuario();
    }

    if($acao == 'alterar'){
        $oquefazer->listar_alterar();
    }

    if($acao == 'salvarAlteracao'){
        $oquefazer->listar_salvar_alterar();
        $oquefazer->listar_usuario();
    }
    

?>