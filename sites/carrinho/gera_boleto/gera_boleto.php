<?php
     //echo "categoria_manutencao<br>";
   class gera_boleto
   {
		var $reg = "";
		var $reg_som = 3;

		function gera_boleto() //metodo construtor
	   {
			require_once '../conexao/Conexao.php';
	   }   
       
	   function busca_dados()
	   {
			$banco = new mysqli('localhost','root','','carrinho');
			$q = "SELECT * FROM tbl_pedido p, tbl_cliente c, tbl_cidade cid WHERE PED_CODIGO = ".$_SESSION['codigo'];
			$busca = $banco->query($q);
			$reg = $busca->fetch_object();
			$qs = "SELECT SUM(PED_VALOR) AS SOMA FROM tbl_itens_pedido  WHERE PED_CODIGO = ".$_SESSION['codigo'];
			$busca_s = $banco->query($qs);
			$reg_soma = $busca_s->fetch_object();

			$dados_boleto['soma'] = $reg_soma->SOMA;
			$dados_boleto['nome'] = $reg->CLI_NOME;
			$dados_boleto['endereco'] = $reg->CLI_ENDERECO;
			$dados_boleto['bairro'] = $reg->CID_DESCRICAO;
			return $dados_boleto;
	   }
	   
   }
	   
   
?>