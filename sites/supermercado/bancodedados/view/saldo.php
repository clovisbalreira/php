<?php
	require_once '../model/Funcionario.php';
	require_once '../model/Contas.php';
	require_once '../model/Precos.php';
	require_once '../model/Patrimonio.php';
	require_once '../model/Estoque.php';
	require_once '../model/Contrato.php';
	include "../components/functionTabela.php";
	require_once '../controller/init.php';
	$conexao = db_connect();	
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Gestão Supermercado - Saldo
		
	</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<?php require_once '../components/menu.php'; ?>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<?php require_once '../components/header.php'; ?>
			</nav>
			<main class="content">
				<div class="row">
					<div class="col-12 col-lg-6">
						<h2>Debito</h2>
						<?php $totalDebito = 0;?>
						<?php $totalCredito = 0;?>
						<?php $totalCreditoLiquido = 0;?>
						<table class="table">
							<thead>
								<th scope="col">Conta</th>
								<th scope="col">Data Pagamento</th>
								<th scope="col">Valor</th>
							</thead>
							<tbody>
								<tr>
									<th scope="col" colspan="3">Funcionarios</th>
								</tr>
								<?php 
									$funcionarios = $conexao->query("SELECT nome, salario FROM funcionario");
									while($funcionario = $funcionarios->fetch()){ ?>
										<tr>
											<td colspan="2"><?php echo $funcionario['nome'];?></td>
											<td><?php echo 'R$: '. number_format($funcionario['salario'], 2, ',', '.');?></td>
										</tr>
									<?php $totalDebito += $funcionario['salario']; 
									}
								?>
								<tr>
									<th scope="col" colspan="3">Compras</th>
								</tr>
								<?php 
									$debitos = $conexao->query("SELECT id_produto, dataPagamento, preco FROM contas WHERE tipoConta = 'debito'");
									while($debito = $debitos->fetch()){ ?>
										<tr>
											<td ><?php echo mostrarTabelaProduto($debito['id_produto'],'produto','marca','tipoProduto','saborAroma','tamanho','medida',$conexao);?></td>
											<td><?php echo date('d/m/Y', strtotime($debito['dataPagamento']));?></td>
											<td><?php echo 'R$: '. number_format($debito['preco'], 2, ',', '.');?></td>
										</tr>
									<?php $totalDebito += $debito['preco']; 
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-12 col-lg-6">
						<h2>Credito</h2>
							<table class="table">
								<thead>
									<th scope="col">Conta</th>
									<th scope="col">Data Pagamento</th>
									<th scope="col">Valor</th>
								</thead>
								<tbody>
									<tr>
										<th scope="col" colspan="3">Contratos</th>
									</tr>
									<?php 
									$contratos = $conexao->query("SELECT id_fornecedor, valor, dataInicio, dataFim FROM contrato");
									while($contrato = $contratos->fetch()){ ?>
										<tr>
											<td ><?php echo mostrarTabela($contrato['id_fornecedor'],'fornecedor','nome',$conexao);?></td>
											<td><?php echo date('d/m/Y', strtotime($contrato['dataFim']));?></td>
											<td><?php echo 'R$: '. number_format($contrato['valor'], 2, ',', '.');?></td>
										</tr>
										<?php $totalCredito += $contrato['valor']; 
												$totalCreditoLiquido += $contrato['valor'];
										}
									?>
									<tr>
										<th scope="col" colspan="3">Vendas</th>
									</tr>
									<?php 
										$creditos = $conexao->query("SELECT id_produto, dataPagamento, preco FROM contas WHERE tipoConta = 'credito'");
										while($credito = $creditos->fetch()){ ?>
											<tr>
												<td ><?php echo mostrarTabelaProduto($credito['id_produto'],'produto','marca','tipoProduto','saborAroma','tamanho','medida',$conexao);?></td>
												<td><?php echo date('d/m/Y', strtotime($credito['dataPagamento']));?></td>
												<td><?php echo 'R$: '. number_format($credito['preco'], 2, ',', '.');?></td>
											</tr>
										<?php $totalCredito += $credito['preco']; 
											$totalCreditoLiquido += $credito['preco']; 
										}
									?>
									<tr>
										<th scope="col" colspan="3">Estoque</th>
									</tr>
									<?php 
										$estoques = $conexao->query("SELECT estoque.id_produto as produto, (estoque.quantidade * precos.preco) as valor FROM estoque INNER JOIN precos ON precos.id_produto = estoque.id_produto");
										while($estoque = $estoques->fetch()){ ?>
											<tr>
												<td colspan="2"><?php echo mostrarTabelaProduto($estoque['produto'],'produto','marca','tipoProduto','saborAroma','tamanho','medida',$conexao);?></td>
												<td><?php echo 'R$: '. number_format($estoque['valor'], 2, ',', '.');?></td>
											</tr>
										<?php $totalCredito += $estoque['valor']; 
										}
									?>
									<tr>
										<th scope="col" colspan="3">Total</th>
									</tr>
									<tr>
										<th colspan="2" scope="row">Debito:</th>
										<td><?php echo 'R$: '. number_format($totalDebito, 2, ',', '.'); ?></td>
									</tr>
									<tr>
										<th colspan="2" scope="row">Credito:</th>
										<td><?php echo 'R$: '. number_format($totalCredito, 2, ',', '.'); ?></td>
									</tr>
									<tr>
										<?php $soma = $totalCredito - $totalDebito;?>	
										<th colspan="2" scope="row">Saldo :</th>
										<td style="color: <?php echo $soma < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($soma, 2, ',', '.');?></td>
									</tr>
									<tr>
										<?php $somaLiquido = $totalCreditoLiquido - $totalDebito;?>	
										<th colspan="2" scope="row">Saldo Liquido:</th>
										<td style="color: <?php echo $somaLiquido < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($somaLiquido, 2, ',', '.');?></td>
									</tr>
								</tbody>
							</table>
						</div>
				</div>
			</main>
			<footer class="footer">
				<?php require_once '../components/footer.php'; ?>
			</footer>
		</div>
	</div>
	<script src="js/app.js"></script>
	<script src="../js/funcao.js"></script>
</body>

</html>