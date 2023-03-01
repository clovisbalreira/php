<?php
    class categoria_manutencao{
        function categoria_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_categoria(){
            $ordenacao = $_REQUEST['ordem'] ?? 'CAT_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_categoria WHERE CAT_DESCRICAO like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
  
            $listar_tabela = new categoria_lista();
            $listar_tabela->acoes_categoria($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_categoria where CAT_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_categoria (CAT_DESCRICAO) VALUES ('".$_REQUEST['CAT_DESCRICAO']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_categoria where CAT_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new categoria_lista();
            $listar_tabela->acoes_categoria($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_categoria set CAT_DESCRICAO = '".$_REQUEST['CAT_DESCRICAO']."' WHERE CAT_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_categoria";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }
    }                                
?>
