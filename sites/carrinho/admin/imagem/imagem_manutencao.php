<?php
    class imagem_manutencao{
        function imagem_manutencao(){
            require_once '../conexao/Conexao.php' ;
        }
        
        function listar_imagem(){
            $ordenacao = $_REQUEST['ordem'] ?? 'IMG_CODIGO';

            $filtro = $_REQUEST['pesquisa'] ?? '';

            $q = "SELECT * FROM tbl_imagem WHERE PROD_CODIGO = ".$_REQUEST['codigo']." AND IMG_DESCRICAO like '".$filtro."%' ORDER BY $ordenacao";
            $banco = new mysqli('localhost','root','','carrinho');
    
            $busca = $banco->query($q);    
            
            $listar_tabela = new imagem_lista();
            $listar_tabela->acoes_imagem($busca);            
        }

        function listar_excluir(){
            $q = "DELETE FROM tbl_imagem where IMG_CODIGO = ". $_REQUEST['codigo_imagem'];
            $banco = new mysqli('localhost','root','','carrinho');
    
            if($busca = $banco->query($q)){
                alerta("O Registro foi excluido com Sucesso");
            }  

        }
              

        function listar_salvar(){
            //CODIGO PARA ENVIO DA IMAGEM PARA O SERVIDOR
            //DEFINEOS TIPOS DE ARQUIVOS QUE SERA ACEITO
            $tipo_arquivos = array(".png",".PNG",".jpg",".JPG");
        
            //PEGA O NOME DO ARQUIVO ESCOLHIDO
            $nome_arquivo = $_FILES['IMG_DESCRICAO']['name'];
            //pega a extensão (tipo de arquivo que devera ser jpg png)            
            $tipo = strrchr($nome_arquivo ,".");
                if (in_array($tipo,$tipo_arquivos)){
                    if(move_uploaded_file($_FILES['IMG_DESCRICAO']['tmp_name'],"imagens/".$nome_arquivo)){
                        $q = "INSERT INTO tbl_imagem (IMG_DESCRICAO, PROD_CODIGO) VALUES ('$nome_arquivo','".$_REQUEST['codigo']."')";
                        
                        $banco = new mysqli('localhost','root','','carrinho');
                        if($busca = $banco->query($q)){
                            alerta("O Registro foi Incluido com Sucesso");
                        }else{
                            alert('Não e possivel gravar esse tipo de arquivo');
                        }
                    }else{
                        echo "não Salva";
                    }
            }else{
                echo "arquivo Invalido";
            }    
    
        }


        function total_registro(){
            $q = "SELECT count(*) as total FROM tbl_imagem WHERE PROD_CODIGO = ".$_REQUEST['codigo'];
            $banco = new mysqli('localhost','root','','carrinho');
            $busca = $banco->query($q);
            $reg = $busca->fetch_object(); 
            return $reg->total;
        }

    }                                
?>
