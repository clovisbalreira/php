<?php
require_once '../model/Funcionario.php';
require_once '../model/Setor.php';
include "../controller/deletar.php";
include "../components/inputs.php";
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

	<title>Gestão Supermercado - Funcionário</title>

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
				<?php
					deletar('funcionario',$conexao);
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Funcionario <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre os funcionarios do super mercado.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-8">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Nome:</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<input type="text" class="form-control" placeholder="Digite seu nome completo" name="nome" value="<?Php echo isset($_GET['nomeEditar']) ? $_GET['nomeEditar'] : '' ?>" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Data de nascimento</h5>
									</div>
									<div class="card-body">
										<input type="date" class="form-control" name="nascimento" value="<?Php echo isset($_GET['nascimentoEditar']) ? $_GET['nascimentoEditar'] : '' ?>" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">C.P.F.</h5>
									</div>
									<div class="card-body">
										<input type="text" class="form-control" placeholder="XXX.XXX.XXX-XX" id="cpf" name="cpf" value="<?Php echo isset($_GET['cpfEditar']) ? $_GET['cpfEditar'] : '' ?>" minlength="14" maxlength="14" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Setor</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="setor" required>
											<option value="">Selecione o setor</option>
											<?php $buscaSetor = $conexao->query("SELECT * FROM setor");?>
											<?php while($setorBusca = $buscaSetor->fetch()) { 
												$setor = new Setor($setorBusca['codigo'],$setorBusca['setor']);
												?>
												<option value="<?php echo $setor->getcodigo(); ?>" 
												<?php if(isset($_GET['setorEditar'])) { echo $setor->getCodigo() == $_GET['setorEditar'] ? 'selected' : '';}; ?>><?php echo $setor->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Salário</h5>
									</div>
									<div class="card-body">
										<input type="number" class="form-control" placeholder="Digite o salário" name="salario" step="0.01" value="<?Php echo isset($_GET['salarioEditar']) ? $_GET['salarioEditar'] : '' ?>" min="1" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroFuncionario")?>
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
								$sql = "SELECT * FROM funcionario";
							}else{
								$sql = "SELECT funcionario.codigo, funcionario.nome, funcionario.nascimento, funcionario.cpf, funcionario.id_setor, funcionario.salario FROM funcionario INNER JOIN setor ON funcionario.id_setor = setor.codigo WHERE funcionario.nome LIKE '%".$procura."%' or funcionario.nascimento LIKE '%".$procura."%' or funcionario.cpf LIKE '%".$procura."%' or funcionario.salario LIKE '%".$procura."%' or setor.setor LIKE '%".$procura."%'";
							}
							$busca = $conexao->query($sql);
							$dados = array();
							while($row = $busca->fetch()){
								$dados[] = ['codigo' => $row['codigo'], 'nome' => $row['nome'], 'nascimento' => $row['nascimento'], 'cpf' => $row['cpf'], 'setor' => $row['id_setor'], 'salario' => $row['salario']];
							}
						?>
						<?php if(count($dados) > 0){?>
						<table class="table">
							<thead>
								<th scope="col">Nome</th>
								<th scope="col">Data de nascimento</th>
								<th scope="col">C.P.F.</th>
								<th scope="col">Setor</th>
								<th scope="col">Salario</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach($dados as $row){ ?>
									<?php $funcionario = new Funcionario($row['codigo'], $row['nome'], $row['nascimento'], $row['cpf'], $row['setor'], $row['salario'])?>
										<tr>
											<td><?php echo $funcionario->getNome(); ?></td>
											<td><?php echo date('d/m/Y', strtotime($funcionario->getNascimento())) ?></td>
											<td><?php echo $funcionario->getCpf(); ?></td>
											<td><?php echo mostrarTabela($funcionario->getSetor(),'setor','setor',$conexao); ?></td>
											<td><?php echo 'R$: ' . number_format($funcionario->getSalario(), 2, ',', '.'); ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $funcionario->getCodigo(); ?>">
													<input type="hidden" name="nomeEditar" value="<?php echo $funcionario->getNome(); ?>">
													<input type="hidden" name="nascimentoEditar" value="<?php echo $funcionario->getNascimento(); ?>">
													<input type="hidden" name="cpfEditar" value="<?php echo $funcionario->getCpf(); ?>">
													<input type="hidden" name="setorEditar" value="<?php echo $funcionario->getSetor(); ?>">
													<input type="hidden" name="salarioEditar" value="<?php echo $funcionario->getSalario(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
											<?php echo botaoTabelaDeletar($funcionario->getCodigo())?>
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
		const input = document.getElementById('cpf')
		input.addEventListener('keypress', function(e){
 			const keyCode = (e.keyCode ? e.keyCode : e.wich)
			 let inputLength = input.value.length 
			 if(inputLength == 3 || inputLength == 7 ){
				 input.value += '.'
			 }
			 if(inputLength ==11){
				 input.value += '-'
			 }
			 if(keyCode < 46 || keyCode > 59){
				e.preventDefault()
			}
		})
	</script>
</body>

</html>