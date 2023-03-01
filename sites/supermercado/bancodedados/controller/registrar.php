<?php
    include "../model/Acesso.php";
    include "../model/Contas.php";
    include "../model/Contrato.php";
    include "../model/Estoque.php";
    include "../model/Fornecedor.php";
    include "../model/Funcionario.php";
    include "../model/Marca.php";
    include "../model/ContasPatrimonio.php";
    include "../model/Patrimonio.php";
    include "../model/Precos.php";
    include "../model/Produto.php";
    include "../model/Promocao.php";
    include "../model/SaborAroma.php";
    include "../model/Segmento.php";
    include "../model/Setor.php";
    include "../model/Tamanho.php";
    include "../model/TipoContrato.php";
    include "../model/TipoPagamento.php";
    include "../model/TipoProduto.php";
    include "../model/TipoSegmento.php";
    require_once 'init.php';
    $conexao = db_connect();
    if(isset($_GET['cadastro'])){
        $acesso = new Acesso(null,$_GET['nome'],$_GET['senha']);
        $gravar = $conexao->query("INSERT INTO acesso(nome, senha) VALUES ('".$acesso->getNome()."','".sha1($acesso->getSenha())."')");
        if(!$gravar){
            echo "<p>Falha ao salvar</p>";
        }else{
            echo "Salvo com sucesso!!";
        }
        header("Refresh:0; ../view/"); 
    }
    //Login
    if(isset($_GET['acesso'])){
        $login = false;
        $busca = $conexao->query("SELECT * FROM acesso");
        if(!$busca){
            echo "<p>falha na busca</p>";
        }else{
            while($row = $busca->fetch()){
                if($row['nome'] == $_GET['nome'] and $row['senha'] == sha1($_GET['senha'])){
                    $login = true;  
                    $_SESSION['usuario'] = $row['nome'];
                    header("Refresh:0; ../view/dashboard.php");
                }
            }
        }
        if(!$login){
            echo '<h2>Login Invalido</h2>';
            header("Refresh:1; ../view/"); 
        }
    }
    // editar e criar setor
    if(isset($_GET['cadastroSetor'])){
        $dados = new Setor(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE setor SET setor='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO setor(setor) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/setor.php"); 
    }
    // editar e criar funcionario
    if(isset($_GET['cadastroFuncionario']) == 1){
        $dados = new Funcionario($_GET['codigo'], $_GET['nome'], $_GET['nascimento'], $_GET['cpf'], $_GET['setor'], $_GET['salario']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE funcionario SET nome='".$dados->getNome()."',nascimento='".$dados->getNascimento()."',cpf='".$dados->getCPF()."',id_setor=".$dados->getSetor().",salario=".$dados->getSalario()." WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO funcionario(nome, nascimento, cpf, id_setor, salario) VALUES('".$dados->getNome()."' , '".$dados->getNascimento()."' , '".$dados->getCPF()."' , ".$dados->getSetor()." , ".$dados->getSalario().");");
        }
        header("Refresh:0; ../view/funcionario.php"); 
    }
    // editar e criar fornecedor
    if(isset($_GET['cadastroFornecedor']) == 1){
        $dados = new Fornecedor(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE fornecedor SET nome='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO fornecedor(nome) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/fornecedor.php"); 
    }
    // editar e criar marca
    if(isset($_GET['cadastroMarca']) == 1){
        $dados = new Marca(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome'], $_GET['fornecedor']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE marca SET nome='".$dados->getNome()."', id_fornecedor=".$dados->getFornecedor()." WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO marca(nome, id_fornecedor) VALUES ('".$dados->getNome()."' , ".$dados->getFornecedor().");");
        }
        header("Refresh:0; ../view/marca.php"); 
    }
    // editar e criar tipo produto
    if(isset($_GET['cadastroTipoProduto']) == 1){
        $dados = new TipoProduto(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE tipoProduto SET nome='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO tipoProduto(nome) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/tipoproduto.php"); 
    }
    // editar e criar segmento
    if(isset($_GET['cadastroSegmento']) == 1){
        $dados = new Segmento(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE segmento SET nome='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO segmento(nome) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/segmento.php"); 
    }
    // editar e criar tipo segmento
    if(isset($_GET['cadastroTipoSegmento']) == 1){
        $dados = new TipoSegmento(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome'], $_GET['segmento']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE tipoSegmento SET nome='".$dados->getNome()."' , id_segmento=".$dados->getSegmento()." WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO tipoSegmento(nome, id_segmento) VALUES ('".$dados->getNome()."', ".$dados->getSegmento().");");
        }
        header("Refresh:0; ../view/tiposegmento.php"); 
    }
    // editar e criar sabor aroma
    if(isset($_GET['cadastroSaborAroma']) == 1){
        $dados = new SaborAroma(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE saborAroma SET nome='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO saborAroma(nome) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/saboraroma.php"); 
    }
    // editar e criar tamanho
    if(isset($_GET['cadastroTamanho']) == 1){
        $dados = new Tamanho(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['tamanho'], $_GET['medida']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE tamanho SET tamanho=".$dados->getTamanho().", medida='".$dados->getMedida()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO tamanho(tamanho, medida) VALUES (".$dados->getTamanho().", '".$dados->getMedida()."');");
        }
        header("Refresh:0; ../view/tamanho.php"); 
    }
    // editar e criar produto
    if(isset($_GET['cadastroProduto']) == 1){
        $dados = new Produto(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['fornecedor'], $_GET['marca'], $_GET['tipoSegmento'], $_GET['tipoProduto'], $_GET['saborAroma'], $_GET['tamanho']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE produto SET id_fornecedor=".$dados->getFornecedor().", id_marca=".$dados->getMarca().",id_tipoProduto=".$dados->getTipoProduto().",id_saborAroma=".$dados->getSaborAroma().",id_tamanho=".$dados->getTamanho().",id_tipoSegmento=".$dados->getTipoSegmento()." WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO produto(id_fornecedor, id_marca, id_tipoProduto, id_saborAroma, id_tamanho, id_tipoSegmento) VALUES (".$dados->getFornecedor().", ".$dados->getMarca().", ".$dados->getTipoProduto().", ".$dados->getSaborAroma().", ".$dados->getTamanho().", ".$dados->getTipoSegmento().");");
        }
        header("Refresh:0; ../view/produto.php"); 
    }
    // editar e criar tipo contrato
    if(isset($_GET['cadastroTipoContrato']) == 1){
        $dados = new TipoContrato(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['nome']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE tipoContrato SET nome='".$dados->getNome()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO tipoContrato(nome) VALUES ('".$dados->getNome()."');");
        }
        header("Refresh:0; ../view/tipocontrato.php"); 
    }
    // editar e criar contrato
    if(isset($_GET['cadastroContrato']) != ''){
        $codigo = $conexao->query("SELECT COUNT(codigo) FROM contrato");
        $parcelas = 0;
        $anoInicio =  date('Y', strtotime($_GET['inicioContrato']));
        $anoFim =  date('Y', strtotime($_GET['fimContrato']));
        $mesInicio =  date('m', strtotime($_GET['inicioContrato']));
        $mesfim =  date('m', strtotime($_GET['fimContrato']));
        $ano = $anoFim - $anoInicio;
        if($anoInicio < $anoFim){
            $parcelas = ($ano * 12) + ($mesfim - $mesInicio) + 1;
        }else{
            $parcelas = $mesfim - $mesInicio + 1;
        }
        $dados = new Contrato(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $_GET['inicioContrato'], $_GET['fimContrato']);
        if($dados->getCodigo() != ''){
            for($i = 0; $i < $parcelas; $i ++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month ", strtotime($_GET['inicioContrato'])));
                $dados->setDataInicio($dataPagamento);
                if($i == 0){
                    $editar = $conexao->query("UPDATE contrato SET id_fornecedor=".$dados->getFornecedor().",id_segmento=".$dados->getSegmento().",id_tipoContrato=".$dados->getTipoContrato().",porcentagem=".$dados->getPorcentagem().",valor=".$dados->getValor().",dataInicio='".$dados->getDataInicio()."',dataFim='".$dados->getDataFim()."' WHERE codigo = ".$dados->getCodigo().";");
                }else{
                    $gravar = $conexao->query("INSERT INTO contrato(id_fornecedor, id_segmento, id_tipoContrato, porcentagem, valor, dataInicio, dataFim) VALUES (".$dados->getFornecedor().",".$dados->getSegmento().",".$dados->getTipoContrato().",".$dados->getPorcentagem().",".$dados->getValor().",'".$dados->getDataInicio()."','".$dados->getDataFim()."')");
                }
            }
        }else{
            for($i = 0; $i < $parcelas; $i ++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month ", strtotime($_GET['inicioContrato'])));
                $dados->setDataInicio($dataPagamento);
                $gravar = $conexao->query("INSERT INTO contrato(id_fornecedor, id_segmento, id_tipoContrato, porcentagem, valor, dataInicio, dataFim) VALUES (".$dados->getFornecedor().",".$dados->getSegmento().",".$dados->getTipoContrato().",".$dados->getPorcentagem().",".$dados->getValor().",'".$dados->getDataInicio()."','".$dados->getDataFim()."')");
            }
        }
        header("Refresh:0; ../view/contrato.php"); 
    }
    // editar e criar tipo pagamento
    if(isset($_GET['cadastroTipoPagamento']) == 1){
        $dados = new TipoPagamento(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['tipo'],$_GET['parcelas'],$_GET['dias']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE tipoPagamento SET tipo='".$dados->getTipo()."', parcelas=".$dados->getParcelas().", dias=".$dados->getDias()." WHERE codigo = ".$dados->getCodigo().";");
            
        }else{
            $gravar = $conexao->query("INSERT INTO tipoPagamento(tipo, parcelas, dias) VALUES ('".$dados->getTipo()."',".$dados->getParcelas().",".$dados->getDias().");");
        }
        header("Refresh:0; ../view/tipopagamento.php"); 
    }
 
    // editar e criar contas compras
    if(isset($_GET['cadastroCompras']) == 1 ){
        $parcelas = 0;
        $dias = 0;

        $buscaTipoPagamento = $conexao->query("SELECT * FROM tipoPagamento ");
        while($tipoPagamentoBusca = $buscaTipoPagamento->fetch()) {
            if($_GET['tipoPagamento'] == $tipoPagamentoBusca['codigo']){
                $parcelas = $tipoPagamentoBusca['parcelas'];
                $dias = $tipoPagamentoBusca['dias'];
            }
        }

        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;

        $dados = new Contas(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $_GET['diaPagamento'], 'debito');
        $estoque = new Estoque('',$_GET['fornecedor'], $_GET['produto'], ($_GET['quantidade'] * $_GET['quantidadeTotal']));

        if($dados->getCodigo() != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDataPagamento($dataPagamento);
                if($i == 0){
                    $editar = $conexao->query("UPDATE contas SET id_fornecedor=".$dados->getFornecedor().",id_produto=".$dados->getProduto().",quantidade=".$dados->getQuantidade().",preco=".$dados->getPreco().",data='".$dados->getData()."',id_tipoPagamento=".$dados->getTipoPagamento().",dataPagamento='".$dados->getDataPagamento()."',tipoConta='".$dados->getTipoConta()."' WHERE codigo = ".$dados->getCodigo().";");
                }else{
                    $gravar = $conexao->query("INSERT INTO contas(id_fornecedor, id_produto, quantidade, preco, data, id_tipoPagamento, dataPagamento, tipoConta) VALUES (".$dados->getFornecedor().",".$dados->getProduto().",".$dados->getQuantidade().",".$dados->getPreco().",'".$dados->getData()."',".$dados->getTipoPagamento().",'".$dados->getDataPagamento()."','".$dados->getTipoConta()."')");
                }
            }
            
            $estoqueQuantidade = 0;
            $buscaContas = $conexao->query("SELECT (contas.quantidade * precos.caixa) as total FROM contas INNER JOIN produto ON produto.codigo = contas.id_produto INNER JOIN precos ON precos.id_produto = produto.codigo WHERE contas.codigo = ".$dados->getCodigo());
            while($contasBusca = $buscaContas->fetch()){
                $estoqueQuantidade = $contasBusca['total']; 
            }

            $buscaEstoque = $conexao->query("SELECT estoque.codigo as codigo, estoque.quantidade as quantidade FROM estoque INNER JOIN produto on produto.codigo = estoque.id_produto WHERE produto.codigo = ".$dados->getProduto());
            while($estoqueBusca = $buscaEstoque->fetch()){
                if($estoqueQuantidade > $estoque->getQuantidade()){
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueBusca['quantidade'] - $estoque->getQuantidade()." WHERE codigo = ".$estoqueBusca['codigo']);
                }else if($estoqueQuantidade < $estoque->getQuantidade()){
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueBusca['quantidade'] + $estoque->getQuantidade()." WHERE codigo = ".$estoqueBusca['codigo']);
                }
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDataPagamento($dataPagamento);
                $gravar = $conexao->query("INSERT INTO contas(id_fornecedor, id_produto, quantidade, preco, data, id_tipoPagamento, dataPagamento, tipoConta) VALUES (".$dados->getFornecedor().",".$dados->getProduto().",".$dados->getQuantidade().",".$dados->getPreco().",'".$dados->getData()."',".$dados->getTipoPagamento().",'".$dados->getDataPagamento()."','".$dados->getTipoConta()."')");
            }
            $buscaEstoque = $conexao->query("SELECT COUNT(produto.codigo) as conta, estoque.codigo as codigo, estoque.quantidade as quantidade FROM estoque INNER JOIN produto on produto.codigo = estoque.id_produto where produto.codigo = ".$dados->getProduto());
            while($estoqueBusca = $buscaEstoque->fetch()){
                if($estoqueBusca['conta'] == 0){
                    $gravarEstoque = $conexao->query("INSERT INTO estoque(id_fornecedor, id_produto, quantidade) VALUES (".$estoque->getFornecedor().",".$estoque->getProduto().",".$estoque->getQuantidade().")");
                }else{
                    $estoque->setCodigo($estoqueBusca['codigo']);
                    $estoque->setQuantidade($estoqueBusca['quantidade'] + $estoque->getQuantidade());
                    $editarEstoque = $conexao->query("UPDATE estoque SET id_fornecedor=".$estoque->getFornecedor().",id_produto=".$estoque->getProduto().",quantidade=".$estoque->getQuantidade()." WHERE codigo = ".$estoque->getCodigo());
                }
            }
        }
        header("Refresh:0; ../view/compras.php"); 
    }
    // editar e criar contas vendas
    if(isset($_GET['cadastroVendas']) == 1){
        $parcelas = 0;
        $dias = 0;
        $buscaTipoPagamento = $conexao->query("SELECT * FROM tipoPagamento WHERE codigo = ".$_GET['tipoPagamento']);
        while($tipoPagamentoBusca = $buscaTipoPagamento->fetch()) {
            $parcelas = $tipoPagamentoBusca['parcelas'];
            $dias = $tipoPagamentoBusca['dias'];
        }
    
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;

        $dados = new Contas(isset($_GET['codigo']) ? $_GET['codigo'] : '',$_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $_GET['diaPagamento'], 'credito');
        $estoque = new Estoque('',$_GET['fornecedor'], $_GET['produto'], $_GET['quantidade']);

        if($dados->getCodigo() != ''){
            $estoqueQuantidade = 0;
            $buscaContas = $conexao->query("SELECT contas.quantidade as total FROM contas INNER JOIN produto ON produto.codigo = contas.id_produto INNER JOIN precos ON precos.id_produto = produto.codigo WHERE contas.codigo = ".$dados->getCodigo());
            while($contasBusca = $buscaContas->fetch()){
                $estoqueQuantidade = $contasBusca['total']; 
            }
            
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDataPagamento($dataPagamento);
                if($i == 0){
                    $editar = $conexao->query("UPDATE contas SET id_fornecedor=".$dados->getFornecedor().",id_produto=".$dados->getProduto().",quantidade=".$dados->getQuantidade().",preco=".$dados->getPreco().",data='".$dados->getData()."',id_tipoPagamento=".$dados->getTipoPagamento().",dataPagamento='".$dados->getDataPagamento()."',tipoConta='".$dados->getTipoConta()."' WHERE codigo = ".$dados->getCodigo().";");
                }else{
                    $gravar = $conexao->query("INSERT INTO contas(id_fornecedor, id_produto, quantidade, preco, data, id_tipoPagamento, dataPagamento, tipoConta) VALUES (".$dados->getFornecedor().",".$dados->getProduto().",".$dados->getQuantidade().",".$dados->getPreco().",'".$dados->getData()."',".$dados->getTipoPagamento().",'".$dados->getDataPagamento()."','".$dados->getTipoConta()."')");
                }
            }
            
            $buscaEstoque = $conexao->query("SELECT estoque.codigo as codigo, estoque.quantidade as quantidade FROM estoque INNER JOIN produto on produto.codigo = estoque.id_produto WHERE produto.codigo = ".$dados->getProduto());
            while($estoqueBusca = $buscaEstoque->fetch()){
                if($estoqueQuantidade > $estoque->getQuantidade()){
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueBusca['quantidade'] + ($estoqueQuantidade - $estoque->getQuantidade()) ." WHERE codigo = ".$estoqueBusca['codigo']);
                }else if($estoqueQuantidade < $estoque->getQuantidade()){
                    $editarEstoque = $conexao->query("UPDATE estoque SET quantidade=".$estoqueBusca['quantidade'] - ($estoque->getQuantidade() - $estoqueQuantidade)." WHERE codigo = ".$estoqueBusca['codigo']);
                }
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDataPagamento($dataPagamento);
                $gravar = $conexao->query("INSERT INTO contas(id_fornecedor, id_produto, quantidade, preco, data, id_tipoPagamento, dataPagamento, tipoConta) VALUES (".$dados->getFornecedor().",".$dados->getProduto().",".$dados->getQuantidade().",".$dados->getPreco().",'".$dados->getData()."',".$dados->getTipoPagamento().",'".$dados->getDataPagamento()."','".$dados->getTipoConta()."')");
            }
            $buscaEstoque = $conexao->query("SELECT COUNT(produto.codigo) as conta, estoque.codigo as codigo, estoque.quantidade as quantidade FROM estoque INNER JOIN produto on produto.codigo = estoque.id_produto where produto.codigo = ".$dados->getProduto());
            while($estoqueBusca = $buscaEstoque->fetch()){
                $estoque->setCodigo($estoqueBusca['codigo']);
                $estoque->setQuantidade($estoqueBusca['quantidade'] - $estoque->getQuantidade());
                $editarEstoque = $conexao->query("UPDATE estoque SET id_fornecedor=".$estoque->getFornecedor().",id_produto=".$estoque->getProduto().",quantidade=".$estoque->getQuantidade()." WHERE codigo = ".$estoque->getCodigo());
            }
        } 
        header("Refresh:0; ../view/vendas.php"); 
    }
    // editar e criar preco
    if(isset($_GET['cadastroPreco']) == 1){
        $dados = new Precos(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE precos SET id_fornecedor=".$dados->getFornecedor().",id_produto=".$dados->getProduto().",preco=".$dados->getPreco().",caixa=".$dados->getCaixa().",precoTotal=".$dados->getPrecoTotal()." WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO precos(id_fornecedor, id_produto, preco, caixa, precoTotal) VALUES (".$dados->getFornecedor().", ".$dados->getProduto().", ".$dados->getPreco().", ".$dados->getCaixa().", ".$dados->getPrecoTotal().");");
        }
        header("Refresh:0; ../view/precos.php"); 
    }
    // editar e criar promoção
    if(isset($_GET['cadastroPromocao']) == 1){
        $dados = new Promocao(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['inicio'], $_GET['fim']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE promocao SET id_fornecedor=".$dados->getFornecedor().",id_produto=".$dados->getProduto().",preco=".$dados->getPreco().",dataInicio='".$dados->getDataInicio()."',dataFim='".$dados->getDataFim()."' WHERE codigo = ".$dados->getCodigo().";");
        }else{
            $gravar = $conexao->query("INSERT INTO promocao(id_fornecedor, id_produto, preco, dataInicio, dataFim) VALUES (".$dados->getFornecedor().", ".$dados->getProduto().", ".$dados->getPreco().", '".$dados->getDataInicio()."', '".$dados->getDataFim()."');");
        }
        header("Refresh:0; ../view/promocao.php"); 
    }
    // editar e criar estoque
    if(isset($_GET['cadastroEstoque']) == 1){
        $dados = new Estoque($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE estoque SET id_fornecedor=".$dados->getFornecedor().",id_produto=".$dados->getProduto().",quantidade=".$dados->getQuantidade()." WHERE codigo = ".$dados->getCodigo().";");
        }
        header("Refresh:0; ../view/estoque.php"); 
    }
    // editar e criar contas patrimonio
    if(isset($_GET['cadastroContas']) == 1){
        $parcelas = 0;
        $dias = 0;
        $buscaTipoPagamento = $conexao->query("SELECT * FROM tipoPagamento WHERE codigo = ".$_GET['tipoPagamento']);
        while($tipoPagamentoBusca = $buscaTipoPagamento->fetch()) {
            $parcelas = $tipoPagamentoBusca['parcelas'];
            $dias = $tipoPagamentoBusca['dias'];
        }
    
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;

        $dados = new ContasPatrimonio(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['nome'], $_GET['diaPagamento'], $_GET['tipoPagamento'], $_GET['preco'], $_GET['tipo']);
    
        if($dados->getCodigo() != ''){
            $dados->setValor($valor);
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDiaPagamento($dataPagamento);
                if($i == 0){
                    $dados->setDiaPagamento($dataPagamento);$editar = $conexao->query("UPDATE contaPatrimonio SET nome='".$dados->getNome()."',preco=".$dados->getValor().",diaPagamento='".$dados->getDiaPagamento()."',tipo='".$dados->getTipo()."',id_tipoPagamento=".$dados->getTipoPagamento()." WHERE codigo = ".$dados->getCodigo().";");
                }else{
                    $gravar = $conexao->query("INSERT INTO contaPatrimonio(nome, preco, diaPagamento, tipo, id_tipoPagamento) VALUES ('".$dados->getNome()."',".$dados->getValor().",'".$dados->getDiaPagamento()."','".$dados->getTipo()."',".$dados->getTipoPagamento().")");
                }
            }
        }else{
            $dados->setValor($valor);
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDiaPagamento($dataPagamento);
                $gravar = $conexao->query("INSERT INTO contaPatrimonio(nome, preco, diaPagamento, tipo, id_tipoPagamento) VALUES ('".$dados->getNome()."',".$dados->getValor().",'".$dados->getDiaPagamento()."','".$dados->getTipo()."',".$dados->getTipoPagamento().")");
            }
        }
        if($dados->getTipo() == 'patrimonio'){
            $gravarPatrimonio = $conexao->query("INSERT INTO patrimonio(nome, valor, tipo) VALUES ('".$dados->getNome()."',".($dados->getValor()* $parcelas).",'".$dados->getTipo()."')");
        }
        header("Refresh:0; ../view/contas.php"); 
    }
    // editar e criar patrimonio
    if(isset($_GET['cadastroPatrimonio']) == 1){
        $dados = new Patrimonio($_GET['codigo'], $_GET['nome'], $_GET['preco'], $_GET['tipo']);
        if($dados->getCodigo() != ''){
            $editar = $conexao->query("UPDATE patrimonio SET nome='".$dados->getNome()."',valor=".$dados->getValor().",tipo='".$dados->getTipo()."' WHERE codigo = ".$dados->getCodigo().";");
        }
        if($dados->getTipo() == 'credito'){
            $dados = new ContasPatrimonio(isset($_GET['codigo']) ? $_GET['codigo'] : '', $_GET['nome'], $_GET['diaPagamento'], $_GET['tipoPagamento'], $_GET['preco'], $_GET['tipo']);
            $parcelas = 0;
            $dias = 0;
            $buscaTipoPagamento = $conexao->query("SELECT * FROM tipoPagamento WHERE codigo = ".$_GET['tipoPagamento']);
            while($tipoPagamentoBusca = $buscaTipoPagamento->fetch()) {
                $parcelas = $tipoPagamentoBusca['parcelas'];
                $dias = $tipoPagamentoBusca['dias'];
            }
        
            $data = date('Y-m-d');
            $valor = $_GET['preco'] / $parcelas;
            $dados->setValor($valor);
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $dados->setDiaPagamento($dataPagamento);
                $gravar = $conexao->query("INSERT INTO contaPatrimonio(nome, preco, diaPagamento, tipo, id_tipoPagamento) VALUES ('".$dados->getNome()."',".$dados->getValor().",'".$dados->getDiaPagamento()."','".$dados->getTipo()."',".$dados->getTipoPagamento().")");
            }
        }
        header("Refresh:0; ../view/patrimonio.php"); 
    }

?>