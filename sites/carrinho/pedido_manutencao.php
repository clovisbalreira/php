<?php
    class pedido_manutencao{
        function pedido_manutencao(){
            require_once 'conexao/Conexao.php' ;
        }
        
        function gravar_pedido(){
            $q = "SELECT COUNT(*) AS TOTAL FROM tbl_carrinho WHERE CAR_SESSAO = '".$_SESSION['sessao']."'";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object();
            if($reg->TOTAL > 0){
                $q_pedido = "INSERT INTO tbl_pedido (CLI_CODIGO, PED_DATA, PED_HORA, PED_BOLETO, PED_VALORTOTAL, PED_VALORFRETE, PED_STATUS, PED_FORMAPAGTO, PED_OBSERVACAO) VALUES (".$_SESSION['codigo'].",current_date,current_time,0.00,0.00,'u','p','C','Qualquer coisa')";
                $busca_pedido = $banco->query($q_pedido);

                $q_ultimo = "SELECT max(PED_CODIGO) AS ULTIMO FROM tbl_pedido";
                $busca_ultimo = $banco->query($q_ultimo);
                $reg_ultimo = $busca_ultimo->fetch_object();

                $q_carrinho = "SELECT * FROM tbl_carrinho WHERE CAR_SESSAO = '".$_SESSION['sessao']."'";
                $busca_carrinho = $banco->query($q_carrinho);
                if ( $busca_carrinho->num_rows > 0){
                    while($reg_carrinho = $busca_carrinho->fetch_object()){
                        $sql_insert_itens = "INSERT INTO tbl_itens_pedido (PROD_CODIGO, PED_CODIGO, PED_QUANT, PED_VALOR) value (".$reg_carrinho->PROD_CODIGO.",".$reg_ultimo->ULTIMO.",".$reg_carrinho->CAR_QUANTIDADE.",".$reg_carrinho->CAR_VALOR.")";
                        $busca_itens = $banco->query($sql_insert_itens);
                        //------------------------
                        $q_carrinho_delete = "DELETE FROM tbl_carrinho WHERE CAR_SESSAO = '".$_SESSION['sessao']."' AND PROD_CODIGO = ".$reg_carrinho->PROD_CODIGO;
                        $busca_carrinho_delete = $banco->query($q_carrinho_delete);
                    }
                }                        
            }
        }

        function listar_itens(){
            $q_ultimo = "SELECT max(PED_CODIGO) AS ULTIMO FROM tbl_pedido WHERE CLI_CODIGO = ".$_SESSION['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            $busca_ultimo = $banco->query($q_ultimo);
            $reg_ultimo = $busca_ultimo->fetch_object();

            //---------------
            $sql_pedido = "SELECT * FROM tbl_pedido p, tbl_cliente c WHERE PED_CODIGO = ".$reg_ultimo->ULTIMO." AND p.CLI_CODIGO = c.CLI_CODIGO";
            $busca_pedido = $banco->query($sql_pedido);
            $busca_pedido = $banco->query($sql_pedido);
            $reg_pedido = $busca_pedido->fetch_object();

            //---------------
            $q = "SELECT * FROM tbl_itens_pedido  i , tbl_produto p WHERE PED_CODIGO =  $reg_pedido->PED_CODIGO AND i.PROD_CODIGO = p.PROD_CODIGO ORDER BY p.PROD_DESCRICAO";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca_itens = $banco->query($q);

            require('pedido_lista.php');
            $mostra = new pedido_lista();
            $mostra->listar_pedido($reg_pedido,$busca_itens);
        }
    }
?>
