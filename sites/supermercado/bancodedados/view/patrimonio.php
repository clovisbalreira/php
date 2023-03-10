<?php
require_once '../model/TipoPagamento.php';
require_once '../model/Patrimonio.php';
include "../components/inputs.php";
include "../controller/deletar.php";
include "../php/funcao.php";
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

	<title>Gestão Supermercado - Contas

	</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
				<?php
					deletar('patrimonio',$conexao);
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Patrimônio <span id="mensagem" onmouseover="mostrarInformacoes('Lista o patrimonio do mercado do super mercado.<br>Selecione para vender.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-7">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Patrimônio</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<div class="card-body">
										<input class="form-control" placeholder="Mostra a patrimônio" id="nome" name="nome" value="<?Php echo isset($_GET['nomeEditar']) ? $_GET['nomeEditar'] : '' ?>" min="0" readonly>
									</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Preço</h5>
									</div>
									<div class="card-body">
										<input type="number" step="0.01" class="form-control" placeholder="Digite o valor" id="preco" name="preco" value="<?Php echo isset($_GET['precoEditar']) ? $_GET['precoEditar'] : '' ?>" min="0" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-2">
								<div class="card">
									<div class="form-check">
										<div class="card-header">
											<h5 class="card-title mb-0">Tipo</h5>
										</div>
										<div class="form-check">
											<input id="checkboxPatrimonio" class="form-check-input" type="radio" name="tipo" value="patrimonio" id="flexRadioDefault2" checked>
											<label class="form-check-label" for="flexRadioDefault2" >
												Patrimônio
											</label>
										</div>
										<div class="card-body">
											<input id="checkboxVenda" class="form-check-input" type="radio" name="tipo" value="credito" id="flexRadioDefault1">
											<label class="form-check-label" for="flexRadioDefault1">
												Vender
											</label>
										</div>
									</div>
								</div>
							</div>
							<div id="mostrarPatrimonio" class="row">
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php 
									if(isset($_GET['codigoEditar'])){
										echo botao("cadastroPatrimonio");
									}
								?>
							</div>
						</div>
					</form>

					<form action="#" method="get" style="margin-top: 20px; margin-bottom: 20px;">
						<div class="row">
							<div class="col-12 col-lg-8" style="margin-bottom: 10px;">
								<input type="text" class="form-control" placeholder="Pesquisa" name="procurar">
							</div>
							<div class="col-12 col-lg-2" style="text-align:right; margin-bottom: 10px;">
								<button type="cancel" class="btn btn-primary btn-lg-12">Mostrar tudo</button>
							</div>
							<div class="col-12 col-lg-2" style="text-align:right; margin-bottom: 10px;">
								<button type="submit" class="btn btn-primary btn-lg-12">Pesquisar</button>
							</div>
						</div>
					</form>
						<?php 
							$sql = '';
							$procura = $_GET['procurar'] ?? '';
							if($procura == ''){
								$sql = "SELECT * FROM patrimonio";
							}else{
								$sql = "SELECT * FROM patrimonio WHERE setor LIKE '%".$procura."%'";
							}
							$busca = $conexao->query($sql);
							$dados = array();
							while($row = $busca->fetch()){
								$dados[] = ['codigo' => $row['codigo'],'nome' => $row['nome'],'valor' => $row['valor'],'tipo' => $row['tipo']];
							}
						?>
						<?php if(count($dados) > 0){?>
						<table class="table">
							<thead>
								<th scope="col">Nome</th>
								<th scope="col">Valor</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach($dados as $row){ ?>
									<?php $patrimonio = new Patrimonio($row['codigo'], $row['nome'], $row['valor'], $row['tipo'])?>
										<tr>
											<td><?php echo $patrimonio->getNome(); ?></td>
											<td><?php echo 'R$: ' . number_format($patrimonio->getValor(), 2, ',', '.'); ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $patrimonio->getCodigo(); ?>">
													<input type="hidden" name="nomeEditar" value="<?php echo $patrimonio->getNome(); ?>">
													<input type="hidden" name="precoEditar" value="<?php echo $patrimonio->getValor(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
												<?php echo botaoTabelaDeletar($patrimonio->getCodigo())?>
											</td>
										</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php }; ?>
				</div>
			</main>
			<footer class="footer">
				<?php require_once '../components/footer.php'; ?>
			</footer>
		</div>
	</div>
	<script src="js/app.js"></script>
	<script src="../js/funcao.js"></script>
	<script>
		$("#checkboxPatrimonio").on("click",function(){
			$.ajax({
				beforeSend: function(){		
					$("#mostrarPatrimonio").html('Carregando....');
				},
				success : function(data){			
					$("#mostrarPatrimonio").html('');
				},
				error: function(data){		
					$("#mostrarPatrimonio").html("Houve um erro");
				}
			})
		})
		$("#checkboxVenda").on("click",function(){
			//var fornecedorSelecionado = $("#checkboxPatrimonio").val();
			//console.log('ola')
			$.ajax({
				url : '../php/mostrarPatrimonio.php',
				type: 'POST',
				//data:{id:fornecedorSelecionado},
				beforeSend: function(){		
					$("#mostrarPatrimonio").html('Carregando....');
				},
				success : function(data){			
					$("#mostrarPatrimonio").html(data);
				},
				error: function(data){		
					$("#mostrarPatrimonio").html("Houve um erro");
				}
			})
		})
	</script>
</body>

</html>