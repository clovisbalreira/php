<?php
    class pedido_manutencao{
        function pedido_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_pedido(){
            $ordenacao = $_REQUEST['ordem'] ?? 'PED_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_pedido WHERE PED_DATA like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new pedido_lista();
            $listar_tabela->acoes_pedido($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_pedido where PED_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            $q = "INSERT INTO tbl_pedido (CLI_CODIGO, PED_DATA, PED_HORA, PED_BOLETO, PED_VALORTOTAL, PED_VALORFRETE, PED_STATUS, PED_FORMAPAGTO, PED_OBSERVACAO) VALUES ('".$_REQUEST['CLI_CODIGO']."','".$_REQUEST['PED_DATA']."','".$_REQUEST['PED_HORA']."','".$_REQUEST['PED_BOLETO']."','".$_REQUEST['PED_VALORTOTAL']."','".$_REQUEST['PED_VALORFRETE']."','".$_REQUEST['PED_STATUS']."','".$_REQUEST['PED_FORMAPAGTO']."','".$_REQUEST['PED_OBSERVACAO']."')";
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi Incluido com Sucesso");
            }    
    
        }

        function listar_alterar(){
            $q = "SELECT * FROM tbl_pedido where PED_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q); 
            $listar_tabela = new pedido_lista();
            $listar_tabela->acoes_pedido($busca);            
        }

        function listar_salvar_alterar(){
            $q = "UPDATE tbl_pedido set CLI_CODIGO = '".$_REQUEST['CLI_CODIGO']."' ,PED_DATA = '".$_REQUEST['PED_DATA']."', PED_HORA = '".$_REQUEST['PED_HORA']."', PED_BOLETO = '".$_REQUEST['PED_BOLETO']."', PED_VALORTOTAL = '".$_REQUEST['PED_VALORTOTAL']."', PED_VALORFRETE = '".$_REQUEST['PED_VALORFRETE']."', PED_STATUS = '".$_REQUEST['PED_STATUS']."', PED_FORMAPAGTO = '".$_REQUEST['PED_FORMAPAGTO']."', PED_OBSERVACAO = '".$_REQUEST['PED_OBSERVACAO']."' WHERE PED_CODIGO = ". $_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            if($busca = $banco->query($q)){
                alerta("O Registro foi editado com Sucesso");
            }    

        }

        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_pedido";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }

        function listar_cliente($codigo){
            $q = "SELECT * FROM tbl_cliente ORDER BY CLI_NOME";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);
            while($reg = $busca->fetch_object()){
                $selected = "";
                if($reg->CLI_CODIGO == $codigo){
                    $selected = "selected";
                }

                echo "<option value='$reg->CLI_CODIGO' $selected>$reg->CLI_NOME</option>";
            }
        }
    }                                
?>
