<?php
	require_once '../model/Estoque.php';
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

	<title>Gestão Supermercado - Estoque</title>

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
					deletar('estoque',$conexao);
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Estoque <span id="mensagem" onmouseover="mostrarInformacoes('Controle de estoque.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Fornecedor:</h5>
                                    </div>
                                    <div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<?php if(isset($_GET['fornecedorEditar'])){?>
										<?php $buscaFornecedor = $conexao->query("SELECT nome FROM fornecedor WHERE codigo = ".$_GET['fornecedorEditar']);?>
											<?php while($fornecedorBusca = $buscaFornecedor->fetch()) { ?>
												<input type="hidden" class="form-control" name="fornecedor" value="<?Php echo isset($_GET['fornecedorEditar']) ? $_GET['fornecedorEditar'] : '' ?>" required>
                                    		    <input type="text" class="form-control" name="fornecedorHidden" value="<?Php echo isset($_GET['fornecedorEditar']) ? $fornecedorBusca['nome'] : '' ?>" disabled required>
												<?php } ?>
												<?php }else{ ?>
													<input type="text" class="form-control" name="fornecedorHidden" value="<?Php echo isset($_GET['fornecedorEditar']) ? $_GET['fornecedorEditar'] : '' ?>" disabled required>
											<?php } ?>
                                    </div>
                                </div>
                            </div>
							<div class="col-12 col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Produto:</h5>
                                    </div>
                                    <div class="card-body">

									<?php if(isset($_GET['fornecedorEditar'])){?>
										<?php $buscaProduto = $conexao->query("SELECT produto.codigo as codigo, marca.nome as marca, tipoProduto.nome as tipoProduto, saborAroma.nome as saborAroma, tamanho.tamanho as tamanho, tamanho.medida as medida FROM produto INNER JOIN fornecedor ON produto.id_fornecedor = fornecedor.codigo INNER JOIN marca ON produto.id_marca = marca.codigo INNER JOIN tipoProduto ON produto.id_tipoProduto = tipoProduto.codigo INNER JOIN saborAroma ON produto.id_saborAroma = saborAroma.codigo INNER JOIN tamanho ON produto.id_tamanho = tamanho.codigo INNER JOIN tipoSegmento ON produto.id_tipoSegmento = tipoSegmento.codigo WHERE produto.codigo = " .$_GET['produtoEditar'] );?>
											<?php while($produtoBusca = $buscaProduto->fetch()) { ?>
										<input type="hidden" class="form-control" name="produto" value="<?Php echo isset($_GET['produtoEditar']) ? $_GET['produtoEditar'] : '' ?>" required>
                                        <input type="text" class="form-control" name="produtoHidden" value="<?Php echo isset($_GET['produtoEditar']) ? $produtoBusca['marca']." - ".$produtoBusca['tipoProduto']." - ".$produtoBusca['saborAroma']." - ".$produtoBusca['tamanho']." ".$produtoBusca['medida'] : '' ?>" disabled required>
										<?php } ?>
										<?php }else{ ?>
											<input type="text" class="form-control" name="produtoHidden" value="<?Php echo isset($_GET['produtoEditar']) ? $_GET['produtoEditar'] : '' ?>" disabled required>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Quantidade:</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="number" class="form-control" name="quantidade" id="quantidade" value="<?Php echo isset($_GET['quantidadeEditar']) ? $_GET['quantidadeEditar'] : '' ?>" <?Php echo isset($_GET['quantidadeEditar']) ? '' : 'disabled' ?> min="0" required>
                                    </div>
                                </div>
                            </div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php 
									if(isset($_GET['codigoEditar'])){
										echo botao("cadastroEstoque");
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
								$sql = "SELECT * FROM estoque";
							}else{
								$sql = "SELECT * FROM estoque INNER JOIN produto ON produto.codigo = estoque.id_produto INNER JOIN fornecedor ON produto.id_fornecedor = fornecedor.codigo INNER JOIN marca ON produto.id_marca = marca.codigo INNER JOIN tipoProduto ON produto.id_tipoProduto = tipoProduto.codigo INNER JOIN saborAroma ON produto.id_saborAroma = saborAroma.codigo INNER JOIN tamanho ON produto.id_tamanho = tamanho.codigo INNER JOIN tipoSegmento ON produto.id_tipoSegmento = tipoSegmento.codigo WHERE fornecedor.nome LIKE '%".$procura."%' or marca.nome LIKE '%".$procura."%' or tipoProduto.nome LIKE '%".$procura."%' or saborAroma.nome LIKE '%".$procura."%' or tamanho.medida LIKE '%".$procura."%' or tamanho.tamanho LIKE '%".$procura."%'";
							}
							$busca = $conexao->query($sql);
							$dados = array();
							while($row = $busca->fetch()){
								$dados[] = ['codigo' => $row['codigo'],'id_fornecedor' => $row['id_fornecedor'],'id_produto' => $row['id_produto'],'quantidade' => $row['quantidade']];
							}
						?>
						<?php if(count($dados) > 0){?>
						<table class="table">
							<thead>
								<th scope="col">Fornecedor</th>
								<th scope="col">Produto</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach($dados as $row){ ?>
									<?php $estoque = new Estoque($row['codigo'], $row['id_fornecedor'], $row['id_produto'], $row['quantidade'])?>
										<td><?php echo mostrarTabela($estoque->getFornecedor(),'fornecedor','nome',$conexao);?></td>
										<td><?php echo mostrarTabelaProduto($estoque->getProduto(),'produto','marca','tipoProduto','saborAroma','tamanho','medida',$conexao);?></td>
										<td><?php echo $estoque->getQuantidade();?></td>
										<td>
											<form action="#" method="get">
												<input type="hidden" name="codigoEditar" value="<?php echo $estoque->getCodigo(); ?>">
												<input type="hidden" name="fornecedorEditar" value="<?php echo $estoque->getFornecedor(); ?>">
												<input type="hidden" name="produtoEditar" value="<?php echo $estoque->getProduto(); ?>">
												<input type="hidden" name="quantidadeEditar" value="<?php echo $estoque->getQuantidade(); ?>">
												<button type="submit" class="btn btn-primary">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
														<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
														<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
													</svg>
												</button>
											</form>
										</td>
										<td>
											<?php echo botaoTabelaDeletar($estoque->getCodigo())?>
										</td>
									</tr>
								<?php }?>	
							</tbody>
						</table>
					<?php } ;?>
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