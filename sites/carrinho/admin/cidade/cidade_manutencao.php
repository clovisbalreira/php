<?php
    class cidade_manutencao{
        function cidade_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_cidade(){
            $ordenacao = $_REQUEST['ordem'] ?? 'CID_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_cidade WHERE CID_DESCRICAO like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new cidade_lista();
            $listar_tabela->acoes_cidade($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_cidade where CID_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_cidade (CID_DESCRICAO, CID_UF) VALUES ('".$_REQUEST['CID_DESCRICAO']."','".$_REQUEST['CID_UF']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_cidade where CID_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new cidade_lista();
            $listar_tabela->acoes_cidade($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_cidade set CID_DESCRICAO = '".$_REQUEST['CID_DESCRICAO']."', CID_UF = '".$_REQUEST['CID_UF']."' WHERE CID_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_cidade";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }
    }                                
?>
