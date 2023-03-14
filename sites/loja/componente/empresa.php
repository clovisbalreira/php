<?php
    $busca =$banco->query("SELECT * FROM empresa");
    if(!$busca){
        echo "<p>falha na busca</p>";
    }else{
        while($reg = $busca->fetch_object()){
            $endereco = $reg->endereco;
            $cnpj = "C.N.P.J. : ";
            for($i = 0; $i < strlen($reg->cnpj); $i++){
                $cnpj = $cnpj . $reg->cnpj[$i];
                if($i == 1 || $i == 4){
                    $cnpj = $cnpj . ".";
                }else if($i == 7){
                    $cnpj = $cnpj . "/";
                }else if($i == 11){
                    $cnpj = $cnpj . "-";
                }
            }
            $phone = $reg->telefone;
            $telefone = 'Telefone: (';
            for($i = 0; $i < strlen($reg->telefone); $i++){
                $telefone = $telefone . $reg->telefone[$i];
                if($i == 1 ){
                    $telefone = $telefone . ") ";
                }else if($i == 6){
                    $telefone = $telefone . " - ";
                }
            }
            $facebook = $reg->facebook;
            $instagram = $reg->instagram;
            $mapa = $reg->mapa;
            $logo = $reg->logo;
        }
    }
?>