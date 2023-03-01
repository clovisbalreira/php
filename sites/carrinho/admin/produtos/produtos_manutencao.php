<?php
    class produto_manutencao{
        function produto_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_produto(){
            $ordenacao = $_REQUEST['ordem'] ?? 'PROD_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_produto WHERE PROD_DESCRICAO like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new produto_lista();
            $listar_tabela->acoes_produto($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_produto where PROD_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_produto (FOR_CODIGO, CAT_CODIGO, PROD_DESCRICAO, PROD_VALOR, PROD_QUANTIDADE, PROD_TIPO, PROD_OBS ) VALUES ('".$_REQUEST['FOR_CODIGO']."','".$_REQUEST['CAT_CODIGO']."','".$_REQUEST['PROD_DESCRICAO']."','".$_REQUEST['PROD_VALOR']."','".$_REQUEST['PROD_QUANTIDADE']."','".$_REQUEST['PROD_TIPO']."','".$_REQUEST['PROD_OBS']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            echo $q;
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_produto where PROD_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new produto_lista();
            $listar_tabela->acoes_produto($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_produto set FOR_CODIGO = '".$_REQUEST['FOR_CODIGO']."' ,PROD_DESCRICAO = '".$_REQUEST['PROD_DESCRICAO']."', PROD_VALOR = '".$_REQUEST['PROD_VALOR']."', PROD_QUANTIDADE = '".$_REQUEST['PROD_QUANTIDADE']."', PROD_TIPO = '".$_REQUEST['PROD_TIPO']."', PROD_OBS = '".$_REQUEST['PROD_OBS']."',  CAT_CODIGO = '".$_REQUEST['CAT_CODIGO']."' WHERE PROD_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_produto";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }

        function listar_fornecedor($codigo){
            $q = "SELECT * FROM tbl_fornecedor ORDER BY FOR_NOME_FANTASIA";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);
            while($reg = $busca->fetch_object()){
                $selected = "";
                if($reg->FOR_CODIGO == $codigo){
                    $selected = "selected";
                }

                echo "<option value='$reg->FOR_CODIGO' $selected>$reg->FOR_NOME_FANTASIA</option>";
            }
        }

        function listar_categoria($codigo){
            $q = "SELECT * FROM tbl_categoria ORDER BY CAT_DESCRICAO";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);
            while($reg = $busca->fetch_object()){
                $selected = "";
                if($reg->CAT_CODIGO == $codigo){
                    $selected = "selected";
                }

                echo "<option value='$reg->CAT_CODIGO' $selected>$reg->CAT_DESCRICAO</option>";
            }
        }

    }                                
?>
