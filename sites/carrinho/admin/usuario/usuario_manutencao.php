<?php
    class usuario_manutencao{
        function usuario_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_usuario(){
            $ordenacao = $_REQUEST['ordem'] ?? 'USU_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_usuario WHERE USU_NOME like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new usuario_lista();
            $listar_tabela->acoes_usuario($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_usuario where USU_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_usuario (USU_NOME, USU_LOGIN, USU_SENHA, USU_NIVEL) VALUES ('".$_REQUEST['USU_NOME']."','".$_REQUEST['USU_LOGIN']."','".base64_encode($_REQUEST['USU_SENHA'])."','".$_REQUEST['USU_NIVEL']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_usuario where USU_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new usuario_lista();
            $listar_tabela->acoes_usuario($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_usuario set USU_NOME = '".$_REQUEST['USU_NOME']."', USU_LOGIN = '".$_REQUEST['USU_LOGIN']."', USU_SENHA = '".base64_encode($_REQUEST['USU_SENHA'])."', USU_NIVEL = '".$_REQUEST['USU_NIVEL']."' WHERE USU_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_usuario";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }
    }                                
?>
