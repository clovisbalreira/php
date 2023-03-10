<?php
require_once '../model/Contrato.php';
require_once '../model/Fornecedor.php';
require_once '../model/TipoSegmento.php';
require_once '../model/TipoContrato.php';
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

	<title>Gestão Supermercado - Contrato</title>

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
				deletar('contrato', $conexao);
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Contrato <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre os contratos do super mercado e os fornecedores.<br>Selecionado o percentual do espaço do tipo de contrato, o valor, o fornecedor, o segmento e a data de inicio e fim do contrato.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo Contrato</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" name="tipoContrato" required>
											<option value="">Selecione o tipo de contrato</option>
											<?php $buscaTipoContrato = $conexao->query("SELECT codigo, nome FROM tipoContrato"); ?>
											<?php while ($tipoContratoBusca = $buscaTipoContrato->fetch()) {
												$tipoContrato = new TipoContrato($tipoContratoBusca['codigo'], $tipoContratoBusca['nome'], '')
											?>
												<option value="<?php echo $tipoContrato->getCodigo(); ?>" <?php if (isset($_GET['tipoContratoEditar'])) {
																												echo $tipoContrato->getCodigo() == $_GET['tipoContratoEditar'] ? 'selected' : '';
																											}; ?>><?php echo $tipoContrato->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Porcentagem</h5>
									</div>
									<div class="card-body">
										<input type="number" step="0.01" class="form-control" placeholder="Digite a porcentagem" name="porcentagem" value="<?Php echo isset($_GET['porcentagemEditar']) ? $_GET['porcentagemEditar'] : '' ?>" min="0" max="100" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Valor</h5>
									</div>
									<div class="card-body">
										<input type="number" step="0.01" class="form-control" placeholder="Digite o valor" name="valor" value="<?Php echo isset($_GET['valorEditar']) ? $_GET['valorEditar'] : '' ?>" min="0" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Fornecedor</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="fornecedor" required>
											<option value="">Selecione o fornecedor</option>
											<?php $buscaFornecedor = $conexao->query("SELECT * FROM fornecedor"); ?>
											<?php while ($fornecedorBusca = $buscaFornecedor->fetch()) {
												$fornecedor = new Fornecedor($fornecedorBusca['codigo'], $fornecedorBusca['nome'])
											?>
												<option value="<?php echo $fornecedor->getCodigo(); ?>" <?php if (isset($_GET['fornecedorEditar'])) {
																											echo $fornecedor->getCodigo() == $_GET['fornecedorEditar'] ? 'selected' : '';
																										}; ?>><?php echo $fornecedor->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo de Segmento</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoSegmento" required>
											<option value="">Selecione o tipo de segmento</option>
											<?php $buscaTipoSegmento = $conexao->query("SELECT codigo, nome FROM tipoSegmento"); ?>
											<?php while ($tipoSegmentoBusca = $buscaTipoSegmento->fetch()) {
												$tipoSegmento = new TipoSegmento($tipoSegmentoBusca['codigo'], $tipoSegmentoBusca['nome'], '')
											?>
												<option value="<?php echo $tipoSegmento->getCodigo(); ?>" <?php if (isset($_GET['tipoSegmentoEditar'])) {
																												echo $tipoSegmento->getCodigo() == $_GET['tipoSegmentoEditar'] ? 'selected' : '';
																											}; ?>><?php echo $tipoSegmento->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Começo do Contrato</h5>
									</div>
									<div class="card-body">
										<input type="date" class="form-control" name="inicioContrato" value="<?Php echo isset($_GET['inicioContratoEditar']) ? $_GET['inicioContratoEditar'] : '' ?>" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Final do Contrato</h5>
									</div>
									<div class="card-body">
										<input type="date" class="form-control" name="fimContrato" value="<?Php echo isset($_GET['fimContratoEditar']) ? $_GET['fimContratoEditar'] : '' ?>" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroContrato") ?>
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
					if ($procura == '') {
						$sql = "SELECT * FROM contrato";
					} else {
						$sql = "SELECT contrato.codigo, contrato.id_fornecedor, contrato.id_segmento, contrato.id_tipoContrato, contrato.porcentagem, contrato.valor, contrato.dataInicio, contrato.dataFim FROM contrato INNER JOIN fornecedor ON contrato.id_fornecedor = fornecedor.codigo INNER JOIN tipoSegmento ON contrato.id_segmento = tipoSegmento.codigo INNER JOIN tipoContrato ON contrato.id_tipoContrato = tipoContrato.codigo WHERE contrato.porcentagem LIKE '%" . $procura . "%' or contrato.valor LIKE '%" . $procura . "%' or contrato.dataInicio LIKE '%" . $procura . "%' or contrato.dataFim LIKE '%" . $procura . "%' or fornecedor.nome LIKE '%" . $procura . "%' or tipoSegmento.nome LIKE '%" . $procura . "%' or tipoContrato.nome LIKE '%" . $procura . "%'";
					}
					$busca = $conexao->query($sql);
					$dados = array();
					while ($row = $busca->fetch()) {
						$dados[] = ['codigo' => $row['codigo'], 'id_fornecedor' => $row['id_fornecedor'], 'id_segmento' => $row['id_segmento'], 'id_tipoContrato' => $row['id_tipoContrato'], 'porcentagem' => $row['porcentagem'], 'valor' => $row['valor'], 'dataInicio' => $row['dataInicio'], 'dataFim' => $row['dataFim']];
					}
					?>
					<?php if (count($dados) > 0) { ?>
						<table class="table">
							<thead>
								<th scope="col">Tipo Contrato</th>
								<th scope="col">Fornecedor</th>
								<th scope="col">Segmento</th>
								<th scope="col">Porcentagem</th>
								<th scope="col">Valor</th>
								<th scope="col">Inicio do Contrato</th>
								<th scope="col">Fim do Contrato</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($dados as $row) { ?>
									<?php $contrato = new Contrato($row['codigo'], $row['id_tipoContrato'], $row['id_fornecedor'], $row['id_segmento'], $row['porcentagem'], $row['valor'], $row['dataInicio'], $row['dataFim']) ?>
									<tr>
										<td><?php echo mostrarTabela($contrato->getTipoContrato(), 'tipoContrato', 'nome', $conexao); ?></td>
										<td><?php echo mostrarTabela($contrato->getFornecedor(), 'fornecedor', 'nome', $conexao); ?></td>
										<td><?php echo mostrarTabela($contrato->getSegmento(), 'tipoSegmento', 'nome', $conexao); ?></td>
										<td><?php echo $contrato->getPorcentagem(); ?></td>
										<td><?php echo $contrato->getValor() ?></td>
										<td><?php echo date('d/m/Y', strtotime($contrato->getDataInicio())) ?></td>
										<td><?php echo date('d/m/Y', strtotime($contrato->getDataFim())) ?></td>
										<td>
											<form action="#" method="get">
												<input type="hidden" name="codigoEditar" value="<?php echo $contrato->getCodigo(); ?>">
												<input type="hidden" name="tipoContratoEditar" value="<?php echo $contrato->getTipoContrato(); ?>">
												<input type="hidden" name="fornecedorEditar" value="<?php echo $contrato->getFornecedor(); ?>">
												<input type="hidden" name="tipoSegmentoEditar" value="<?php echo $contrato->getSegmento(); ?>">
												<input type="hidden" name="porcentagemEditar" value="<?php echo $contrato->getPorcentagem(); ?>">
												<input type="hidden" name="valorEditar" value="<?php echo $contrato->getValor(); ?>">
												<input type="hidden" name="inicioContratoEditar" value="<?php echo $contrato->getDataInicio(); ?>">
												<input type="hidden" name="fimContratoEditar" value="<?php echo $contrato->getDataFim(); ?>">
												<button type="submit" class="btn btn-primary">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
														<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
														<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
													</svg>
												</button>
											</form>
										</td>
										<td>
											<?php echo botaoTabelaDeletar($contrato->getCodigo()) ?>
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
</body>

</html>