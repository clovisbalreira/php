<?php
require_once '../model/Acesso.php';
require_once '../model/Contas.php';
require_once '../model/Contrato.php';
require_once '../model/Precos.php';
require_once '../model/Estoque.php';
require_once '../model/Funcionario.php';
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

	<title>Gestão Supermercado - Home</title>

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
						<?php
							$saldo = 0;
							$saldoLiquido = 0;
							$patrimonioSoma = 0;
							$comprasSoma = 0;
							$vendasSoma = 0;
							$contasSoma = 0;
							$contratosSoma = 0;
							$estoqueSoma = 0;
							$funcionariosSoma = 0;

							$funcionarios = $conexao->query("SELECT nome, salario FROM funcionario");
							while($funcionario = $funcionarios->fetch()){ 
								$funcionariosSoma += $funcionario['salario']; 
								$saldo -= $funcionario['salario'];
								$saldoLiquido -= $funcionario['salario'];							
							}
							
							$debitos = $conexao->query("SELECT id_produto, dataPagamento, preco FROM contas WHERE tipoConta = 'debito'");
							while($debito = $debitos->fetch()){ 
								$comprasSoma += $debito['preco'];
								$saldo -= $debito['preco'];
								$saldoLiquido -= $debito['preco'];
										
							}

							$contratos = $conexao->query("SELECT id_fornecedor, valor, dataInicio, dataFim FROM contrato");
							while($contrato = $contratos->fetch()){ 
								$contratosSoma += $contrato['valor'];
								$saldo += $contrato['valor'];
								$saldoLiquido += $contrato['valor'];
							}

							$creditos = $conexao->query("SELECT id_produto, dataPagamento, preco FROM contas WHERE tipoConta = 'credito'");
							while($credito = $creditos->fetch()){ 
								$vendasSoma += $credito['preco'];
								$saldo += $credito['preco'];
								$saldoLiquido += $credito['preco'];
							}

							$estoques = $conexao->query("SELECT estoque.id_produto as produto, (estoque.quantidade * precos.preco) as valor FROM estoque INNER JOIN precos ON precos.id_produto = estoque.id_produto");
							while($estoque = $estoques->fetch()){ 
								$estoqueSoma += $estoque['valor'];
								$saldo += $estoque['valor'];
							}

						?>
						<?php ?>
						<h1>Super Mercado <span id="mensagem" onmouseover="mostrarInformacoes('Visualize a renda do super mercado de <?php echo date('m');?> de <?php echo date('Y');?>.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Saldo Liquido</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $saldoLiquido < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($saldoLiquido, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Saldo</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $saldo < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($saldo, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Contratos</h5>
								</div>
								<div class="card-body">
									<p style="color: green ; "><?php echo 'R$: '. number_format($contratosSoma, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Vendas</h5>
								</div>
								<div class="card-body">
									<p style="color: green ; "><?php echo 'R$: '. number_format($vendasSoma, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Estoque</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $estoqueSoma < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($estoqueSoma, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Funcionarios</h5>
								</div>
								<div class="card-body">
									<p style="color: red ; "><?php echo 'R$: '. number_format($funcionariosSoma, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Compras</h5>
								</div>
								<div class="card-body">
									<p style="color: red ; "><?php echo 'R$: '. number_format($comprasSoma, 2, ',', '.') ?></p>
								</div>
							</div>
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