<?php
    class fornecedor_manutencao{
        function fornecedor_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_fornecedor(){
            $ordenacao = $_REQUEST['ordem'] ?? 'FOR_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_fornecedor WHERE FOR_RAZAOSOCIAL like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new fornecedor_lista();
            $listar_tabela->acoes_fornecedor($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_fornecedor where FOR_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_fornecedor (CID_CODIGO, FOR_RAZAOSOCIAL, FOR_NOME_FANTASIA, FOR_ENDERECO, FOR_BAIRRO, FOR_FONE, FOR_RESPONSAVEL, FOR_EMAIL, FOR_CNPJ, FOR_CEP) VALUES ('".$_REQUEST['CID_CODIGO']."','".$_REQUEST['FOR_RAZAOSOCIAL']."','".$_REQUEST['FOR_NOME_FANTASIA']."','".$_REQUEST['FOR_ENDERECO']."','".$_REQUEST['FOR_BAIRRO']."','".$_REQUEST['FOR_FONE']."','".$_REQUEST['FOR_RESPONSAVEL']."','".$_REQUEST['FOR_EMAIL']."','".$_REQUEST['FOR_CNPJ']."','".$_REQUEST['FOR_CEP']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_fornecedor where FOR_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new fornecedor_lista();
            $listar_tabela->acoes_fornecedor($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_fornecedor set CID_CODIGO = '".$_REQUEST['CID_CODIGO']."' ,FOR_RAZAOSOCIAL = '".$_REQUEST['FOR_RAZAOSOCIAL']."', FOR_NOME_FANTASIA = '".$_REQUEST['FOR_NOME_FANTASIA']."', FOR_ENDERECO = '".$_REQUEST['FOR_ENDERECO']."', FOR_BAIRRO = '".$_REQUEST['FOR_BAIRRO']."', FOR_FONE = '".$_REQUEST['FOR_FONE']."', FOR_RESPONSAVEL = '".$_REQUEST['FOR_RESPONSAVEL']."', FOR_EMAIL = '".$_REQUEST['FOR_EMAIL']."', FOR_CNPJ = '".$_REQUEST['FOR_CNPJ']."', FOR_CEP = '".$_REQUEST['FOR_CEP']."' WHERE FOR_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_fornecedor";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }

        function listar_cidade($codigo){
            $q = "SELECT * FROM tbl_cidade ORDER BY CID_DESCRICAO";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);
            while($reg = $busca->fetch_object()){
                $selected = "";
                if($reg->CID_CODIGO == $codigo){
                    $selected = "selected";
                }

                echo "<option value='$reg->CID_CODIGO' $selected>$reg->CID_DESCRICAO</option>";
            }
        }
    }                                
?>
