<?php
    class carrinho_manutencao{
        function carrinho_manutencao(){
            require_once 'conexao/Conexao.php' ;
        }
        
        function listar(){
            $q = "SELECT * FROM tbl_categoria";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $mostra = new layout();
            $mostra->categoria_listar($busca);
        }

        function listar_produtos($codigo){
            $q = "SELECT * FROM tbl_produto where CAT_CODIGO = $codigo ORDER BY PROD_DESCRICAO";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $mostra = new layout();
            $mostra->mostrar_produtos($busca);
        }

        function listar_imagem($codigo){
            $q = "SELECT * FROM tbl_imagem where PROD_CODIGO = $codigo ORDER BY IMG_DESCRICAO";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $img = "";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro $busca";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        $img = $reg->IMG_DESCRICAO;
                    }
                }
            }
            return $img;
        }

        function incluir_no_carrinho($codigo){
            $q_produto = "SELECT * FROM tbl_produto where PROD_CODIGO = $codigo";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q_produto);
            $valor = "";
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro $busca";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        $valor = $reg->PROD_VALOR;
                    }
                }
            }
            $q = "INSERT INTO tbl_carrinho (PROD_CODIGO, CAR_SESSAO, CAR_QUANTIDADE, CAR_VALOR, CAR_DATA) values (".$codigo.",'".session_id()."',1,".$valor.",'".date('Y-m-d')."')";
            $banco1 = new mysqli('localhost','root','','carrinho');
            $busca = $banco1->query($q);
            
        }

        function listar_carrinho(){
            $q = "SELECT * FROM tbl_carrinho c, tbl_produto p WHERE CAR_SESSAO = '".session_id()."' and c.PROD_CODIGO = p.PROD_CODIGO ORDER BY p.PROD_CODIGO";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $mostra = new layout();
            $mostra->carrinho($busca);
        }

        function quantidade_produtos(){
            $q = "SELECT COUNT(*)  AS TOTAL FROM tbl_carrinho WHERE CAR_SESSAO = '".session_id()."'";
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca teu um erro $busca";
            } else {
                if ( $busca->num_rows > 0){
                    if($reg = $busca->fetch_object()){
                        return $reg->TOTAL;
                    }
                }
            }        
        }

        function atualizar_carrinho(){
            $qtd = $_POST['qtd'];
            $codigo = $_POST['codigo'];
            $total = $_POST['total'];
            
            $tamanho = count($qtd);
            
            for($i = 0 ; $i < $tamanho ;$i++){
                if($qtd[$i] > 0){
                    $q = "UPDATE tbl_carrinho SET CAR_QUANTIDADE = ".$qtd[$i]." , CAR_VALOR = ".$total[$i]." WHERE PROD_CODIGO = ".$codigo[$i]." AND CAR_SESSAO = '".session_id()."'";
                    }else{
                    $q = "DELETE FROM tbl_carrinho  WHERE PROD_CODIGO = ".$codigo[$i]." AND CAR_SESSAO = '".session_id()."'";
                        }
                    $banco = new mysqli('localhost','root','','carrinho');
                    $busca = $banco->query($q);
            }
        }
    }
?>
