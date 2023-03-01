<?php
	require_once '../model/Produto.php';
	require_once '../model/Fornecedor.php';
	require_once '../model/Marca.php';
	require_once '../model/Segmento.php';
	require_once '../model/TipoSegmento.php';
	require_once '../model/TipoProduto.php';
	require_once '../model/SaborAroma.php';
	require_once '../model/Tamanho.php';
	include "../controller/deletar.php";
	include "../components/functionTabela.php";
	include "../components/inputs.php";
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

	<title>Gestão Supermercado - Produtos</title>

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
					deletar('produto',$conexao);
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Produto <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre os produtos e seus atributos.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Fornecedor</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" id="fornecedor" name="fornecedor" required>
											<option value="">Selecione o fornecedor</option>
											<?php $buscaFornecedor = $conexao->query("SELECT * FROM fornecedor");?>
											<?php while($fornecedorBusca = $buscaFornecedor->fetch()) { 
												$fornecedor = new Fornecedor($fornecedorBusca['codigo'],$fornecedorBusca['nome'])
												?>
												<option value="<?php echo $fornecedor->getCodigo(); ?>" <?php if (isset($_GET['fornecedorEditar'])) { echo $fornecedor->getCodigo() == $_GET['fornecedorEditar'] ? 'selected' : '';}; ?>><?php echo $fornecedor->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>														
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Marca</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" name="marca" required>
											<option value="">Selecione a marca</option>
											<?php $buscaMarca = $conexao->query("SELECT codigo, nome FROM marca");?>
											<?php while($marcaBusca = $buscaMarca->fetch()) { 
												$marca = new Marca($marcaBusca['codigo'],$marcaBusca['nome'],'')
												?>
												<option value="<?php echo $marca->getCodigo(); ?>" <?php if (isset($_GET['marcaEditar'])) { echo $marca->getCodigo() == $_GET['marcaEditar'] ? 'selected' : '';}; ?>><?php echo $marca->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo de Segmento</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoSegmento" required>
											<option value="">Selecione o tipo de segmento</option>			
											<?php $buscaTipoSegmento = $conexao->query("SELECT codigo, nome FROM tipoSegmento");?>
											<?php while($tipoSegmentoBusca = $buscaTipoSegmento->fetch()) { 
												$tipoSegmento = new TipoSegmento($tipoSegmentoBusca['codigo'],$tipoSegmentoBusca['nome'],'')
												?>
												<option value="<?php echo $tipoSegmento->getCodigo(); ?>" <?php if (isset($_GET['tipoSegmentoEditar'])) { echo $tipoSegmento->getCodigo() == $_GET['tipoSegmentoEditar'] ? 'selected' : '';}; ?>><?php echo $tipoSegmento->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo produto</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoProduto" required>
											<option value="">Selecione o tipo de produto</option>			
											<?php $buscaTipoProduto = $conexao->query("SELECT codigo, nome FROM tipoProduto");?>
											<?php while($tipoProdutoBusca = $buscaTipoProduto->fetch()) { 
												$tipoProduto = new TipoProduto($tipoProdutoBusca['codigo'],$tipoProdutoBusca['nome'])
												?>
												<option value="<?php echo $tipoProduto->getCodigo(); ?>" <?php if (isset($_GET['tipoProdutoEditar'])) { echo $tipoProduto->getCodigo() == $_GET['tipoProdutoEditar'] ? 'selected' : '';}; ?>><?php echo $tipoProduto->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Sabor/Aroma</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="saborAroma" required>
											<option value="">Selecione o sabor ou aroma</option>			
											<?php $buscaSaborAroma = $conexao->query("SELECT codigo, nome FROM saborAroma");?>
											<?php while($saborAromaBusca = $buscaSaborAroma->fetch()) { 
												$saborAroma = new SaborAroma($saborAromaBusca['codigo'],$saborAromaBusca['nome'],'')
												?>
												<option value="<?php echo $saborAroma->getCodigo(); ?>" <?php if (isset($_GET['saborAromaEditar'])) { echo $saborAroma->getCodigo() == $_GET['saborAromaEditar'] ? 'selected' : '';}; ?>><?php echo $saborAroma->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tamanho</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tamanho" required>
											<option value="">Selecione o tamanho</option>
											<?php $buscaTamanho = $conexao->query("SELECT * FROM tamanho");?>
											<?php while($tamanhoBusca = $buscaTamanho->fetch()) { 
												$tamanho = new Tamanho($tamanhoBusca['codigo'],$tamanhoBusca['tamanho'],$tamanhoBusca['medida'])
												?>
												<option value="<?php echo $tamanho->getCodigo(); ?>" <?php if (isset($_GET['tamanhoEditar'])) { echo $tamanho->getCodigo() ==  $_GET['tamanhoEditar'] ? 'selected' : '';}; ?>><?php echo $tamanho->getTamanho().' '.$tamanho->getMedida(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroProduto")?>
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
								$sql = "SELECT * FROM produto";
							}else{
								$sql = "SELECT produto.codigo, produto.id_fornecedor, produto.id_marca, produto.id_tipoProduto, produto.id_saborAroma, produto.id_tamanho, produto.id_tipoSegmento FROM produto INNER JOIN fornecedor ON produto.id_fornecedor = fornecedor.codigo INNER JOIN marca ON produto.id_marca = marca.codigo INNER JOIN tipoProduto ON produto.id_tipoProduto = tipoProduto.codigo INNER JOIN saborAroma ON produto.id_saborAroma = saborAroma.codigo INNER JOIN tamanho ON produto.id_tamanho = tamanho.codigo INNER JOIN tipoSegmento ON produto.id_tipoSegmento = tipoSegmento.codigo WHERE fornecedor.nome LIKE '%".$procura."%' or marca.nome LIKE '%".$procura."%' or tipoProduto.nome LIKE '%".$procura."%' or saborAroma.nome LIKE '%".$procura."%' or tamanho.medida LIKE '%".$procura."%' or tamanho.tamanho LIKE '%".$procura."%'";
							} 
							$busca = $conexao->query($sql);
							$dados = array();
							while($row = $busca->fetch()){
								$dados[] = ['codigo' => $row['codigo'],'id_fornecedor' => $row['id_fornecedor'],'id_marca' => $row['id_marca'], 'id_tipoProduto' => $row['id_tipoProduto'], 'id_saborAroma' => $row['id_saborAroma'], 'id_tamanho' => $row['id_tamanho'], 'id_tipoSegmento' => $row['id_tipoSegmento']];
							}
						?>
						<?php if(count($dados) > 0){?>
						<table class="table">
							<thead>
								<th scope="col">Fornecedor</th>
								<th scope="col">Marca</th>
								<th scope="col">Segmento</th>
								<th scope="col">Tipo Produto</th>
								<th scope="col">Sabor/Aroma</th>
								<th scope="col">Tamanho</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach($dados as $row){ ?>
								<?php $produto = new Produto($row['codigo'], $row['id_fornecedor'], $row['id_marca'], $row['id_tipoProduto'], $row['id_saborAroma'], $row['id_tamanho'],  $row['id_tipoSegmento']);?>
										<tr>
											<td><?php echo mostrarTabela($produto->getFornecedor(),'fornecedor','nome',$conexao); ?></td>
											<td><?php echo mostrarTabela($produto->getMarca(),'marca','nome',$conexao); ?></td>
											<td><?php echo mostrarTabela($produto->getTipoSegmento(),'tipoSegmento','nome',$conexao); ?></td>
											<td><?php echo mostrarTabela($produto->getTipoProduto(),'tipoProduto','nome',$conexao); ?></td>
											<td><?php echo mostrarTabela($produto->getSaborAroma(),'saborAroma','nome',$conexao); ?></td>
											<td><?php echo mostrarTabela_2($produto->getTamanho(),'tamanho','tamanho','medida',$conexao) ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $produto->getCodigo(); ?>">
													<input type="hidden" name="fornecedorEditar" value="<?php echo $produto->getFornecedor(); ?>">
													<input type="hidden" name="marcaEditar" value="<?php echo $produto->getMarca(); ?>">
													<input type="hidden" name="tipoSegmentoEditar" value="<?php echo $produto->getTipoSegmento(); ?>">
													<input type="hidden" name="tipoProdutoEditar" value="<?php echo $produto->getTipoProduto(); ?>">
													<input type="hidden" name="saborAromaEditar" value="<?php echo $produto->getSaborAroma(); ?>">
													<input type="hidden" name="tamanhoEditar" value="<?php echo $produto->getTamanho(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
												<?php echo botaoTabelaDeletar($produto->getCodigo())?>
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