<?php
    require_once '../model/TipoPagamento.php';
	require_once '../controller/init.php';
	$conexao = db_connect();	
	$buscaTipoPagamento = $conexao->query('SELECT * FROM tipoPagamento');
	$conteudo = '';
	echo "
		<div class='col-12 col-lg-6'>
			<div class='card'>
				<div class='card-header'>
					<h5 class='card-title mb-0'>Tipo pagamento</h5>
				</div>
				<div class='card-body'>
					<select class='form-select mb-3' name='tipoPagamento' required>
						<option value=''>Selecione o tipo de pagamento</option>";
							while($tipoPagamentoBusca = $buscaTipoPagamento->fetch()) {
								$tipoPagamento = new TipoPagamento($tipoPagamentoBusca['codigo'],$tipoPagamentoBusca['tipo'],$tipoPagamentoBusca['parcelas'],$tipoPagamentoBusca['dias']);
								echo "<option value='".$tipoPagamento->getcodigo() ."' >".	$tipoPagamento->getTipo()." ".$tipoPagamento->getParcelas()." vezes . primeiros pagamento em ".$tipoPagamento->getDias()." dias.</option>"; 
								}
					echo " 
					</select>
				</div>
			</div>
			</div>
			<div class='col-12 col-lg-6'>
				<div class='card'>
					<div class='card-header'>
						<h5 class='card-title mb-0'>Dia do pagamento</h5>
					</div>
				<div class='card-body'>
					<input type='date' class='form-control' name='diaPagamento' required>
				</div>
			</div>
		</div>
	";
?>