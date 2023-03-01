<?php
    class cliente_manutencao{
        function cliente_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_cliente(){
            $ordenacao = $_REQUEST['ordem'] ?? 'CLI_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_cliente WHERE CLI_NOME like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new cliente_lista();
            $listar_tabela->acoes_cliente($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_cliente where CLI_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              
        function listar_salvar(){
            $q = "INSERT INTO tbl_cliente (CID_CODIGO, CLI_NOME, CLI_ENDERECO, CLI_NUMERO, CLI_COMPLEMENTO, CLI_BAIRRO, CLI_CEP, CLI_FONERES, CLI_FONECEL, CLI_FONECOM, CLI_CPF, CLI_RG, CLI_DATACADASTRO, CLI_DATANASC, CLI_EMAIL, CLI_LOGIN, CLI_SENHA, CLI_DATAULTCOMP, CLI_VALOR_ULTCOMP, CLI_VALOR_TOTAL) VALUES ('".$_REQUEST['CID_CODIGO']."','".$_REQUEST['CLI_NOME']."','".$_REQUEST['CLI_ENDERECO']."','".$_REQUEST['CLI_NUMERO']."','".$_REQUEST['CLI_COMPLEMENTO']."','".$_REQUEST['CLI_BAIRRO']."','".$_REQUEST['CLI_CEP']."','".$_REQUEST['CLI_FONERES']."','".$_REQUEST['CLI_FONECEL']."','".$_REQUEST['CLI_FONECOM']."','".$_REQUEST['CLI_CPF']."','".$_REQUEST['CLI_RG']."','".$_REQUEST['CLI_DATACADASTRO']."','".$_REQUEST['CLI_DATANASC']."','".$_REQUEST['CLI_EMAIL']."','".$_REQUEST['CLI_LOGIN']."','".$_REQUEST['CLI_SENHA']."','".$_REQUEST['CLI_DATAULTCOMP']."','".$_REQUEST['CLI_VALOR_ULTCOMP']."','".$_REQUEST['CLI_VALOR_TOTAL']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_cliente where CLI_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new cliente_lista();
            $listar_tabela->acoes_cliente($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_cliente set CID_CODIGO = '".$_REQUEST['CID_CODIGO']."' ,CLI_NOME = '".$_REQUEST['CLI_NOME']."', CLI_ENDERECO = '".$_REQUEST['CLI_ENDERECO']."', CLI_NUMERO = '".$_REQUEST['CLI_NUMERO']."', CLI_COMPLEMENTO = '".$_REQUEST['CLI_COMPLEMENTO']."', CLI_BAIRRO = '".$_REQUEST['CLI_BAIRRO']."', CLI_CEP = '".$_REQUEST['CLI_CEP']."', CLI_FONERES = '".$_REQUEST['CLI_FONERES']."', CLI_FONECEL = '".$_REQUEST['CLI_FONECEL']."', CLI_FONECOM = '".$_REQUEST['CLI_FONECOM']."', CLI_CPF = '".$_REQUEST['CLI_CPF']."',CLI_RG = '".$_REQUEST['CLI_RG']."', CLI_DATACADASTRO = '".$_REQUEST['CLI_DATACADASTRO']."', CLI_DATANASC = '".$_REQUEST['CLI_DATANASC']."', CLI_EMAIL = '".$_REQUEST['CLI_EMAIL']."', CLI_LOGIN = '".$_REQUEST['CLI_LOGIN']."', CLI_SENHA = '".$_REQUEST['CLI_SENHA']."', CLI_DATAULTCOMP = '".$_REQUEST['CLI_DATAULTCOMP']."', CLI_VALOR_ULTCOMP = '".$_REQUEST['CLI_VALOR_ULTCOMP']."',CLI_VALOR_TOTAL = '".$_REQUEST['CLI_VALOR_TOTAL']."' WHERE CLI_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_cliente";
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
