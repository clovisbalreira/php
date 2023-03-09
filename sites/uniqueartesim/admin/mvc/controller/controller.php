<?php
    $listar = $_GET['listar'] ?? 'cadastro';
    $acao = $_GET['acao'] ?? 'nenhum';
    if($listar == 'cadastro'){
        require_once './mvc/view/listarCadastro.php';
        if($acao != 'nenhum'){
            require_once './mvc/view/formularioCadastro.php';
        }
    }else if($listar == 'empresa'){
        require_once './mvc/view/listarEmpresa.php';
        if($acao != 'nenhum'){
            require_once './mvc/view/formularioEmpresa.php';
        } 
    }else if($listar == 'carrossel'){
        require_once './mvc/view/listarCarrossel.php';
        if($acao != 'nenhum'){
            require_once './mvc/view/formularioCarrossel.php';
        }
    }else if($listar == 'categoria'){
        require_once './mvc/view/listarCategoria.php';
        if($acao != 'nenhum'){
            require_once './mvc/view/formularioCategoria.php';
        }
    }else if($listar == 'produto'){
        require_once './mvc/view/listarProduto.php';
        if($acao != 'nenhum'){
            require_once './mvc/view/formularioProduto.php';
        }
    }
?>