<?php
    function mostrarTabela($codigo,$tabela,$nome,$conexao){
        $busca = $conexao->query("SELECT ".$nome." FROM ".$tabela." WHERE codigo = ".$codigo.";");
        while($nomeBusca = $busca->fetch()) {
            return $nomeBusca[$nome];
        } 
    }

    function mostrarTabelaProduto($codigo,$tabela,$marca,$tipoProduto,$saborAroma,$tamanho,$medida,$conexao){
        $busca = $conexao->query("SELECT produto.codigo as codigo, marca.nome as marca, tipoProduto.nome as tipoProduto, saborAroma.nome as saborAroma, tamanho.tamanho as tamanho, tamanho.medida as medida  FROM ".$tabela." INNER JOIN fornecedor ON produto.id_fornecedor = fornecedor.codigo INNER JOIN marca ON produto.id_marca = marca.codigo INNER JOIN tipoProduto ON produto.id_tipoProduto = tipoProduto.codigo INNER JOIN saborAroma ON produto.id_saborAroma = saborAroma.codigo INNER JOIN tamanho ON produto.id_tamanho = tamanho.codigo INNER JOIN tipoSegmento ON produto.id_tipoSegmento = tipoSegmento.codigo WHERE produto.codigo = ".$codigo.";");
        while($nomeBusca = $busca->fetch()) {
            return $nomeBusca[$marca]." - ".$nomeBusca[$tipoProduto]." - ".$nomeBusca[$saborAroma]." - ".$nomeBusca[$tamanho]." ".$nomeBusca[$medida];
        } 
    }

    function mostrarTabela_2($codigo,$tabela,$nome,$nome2,$conexao){
        $busca = $conexao->query("SELECT ".$nome.", ".$nome2." FROM ".$tabela." WHERE codigo = ".$codigo.";");
        while($nomeBusca = $busca->fetch()) {
            return $nomeBusca[$nome] ." ". $nomeBusca[$nome2];
        } 
    }

    function mostrarTabela_3($codigo,$tabela,$nome,$nome2,$nome3,$conexao){
        $busca = $conexao->query("SELECT ".$nome.", ".$nome2.", ".$nome3." FROM ".$tabela." WHERE codigo = ".$codigo.";");
        while($nomeBusca = $busca->fetch()) {
            return $nomeBusca[$nome] ." ". $nomeBusca[$nome2]." vezes . primeiros pagamento em ". $nomeBusca[$nome3]." dias.";
            ;
        } 
    }
?>