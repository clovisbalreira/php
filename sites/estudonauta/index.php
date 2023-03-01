<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Listagem de jogos</title>
    </head>
    <body>
        <?php
            require_once 'includes/banco.php'; 
            require_once 'includes/login.php'; 
            require_once 'functions/functions.php';
            $ordem = $_GET['o'] ?? 'cod';
            $chave = $_GET['c'] ?? '';
        ?>
        <main id="corpo">
            <?php require_once 'topo.php'?>
            <h1>Escolha seu jogo</h1>
            <form method="get" id="busca" action="index.php">
                <p>Ordenar :</p> 
                <a href="index.php?o=n&c=<?php echo $chave?>">Nome</a> <p>|</p> 
                <a href="index.php?o=p&c=<?php echo $chave?>">Produtora</a> <p>|</p> 
                <a href="index.php?o=g&c=<?php echo $chave?>">Genero</a> <p>|</p> 
                <a href="index.php?o=na&c=<?php echo $chave?>">Nota Alta</a> <p>|</p> 
                <a href="index.php?o=nb&c=<?php echo $chave?>">Nota Baixa</a> <p>|</p> 
                <a href="index.php">Mostrar Todos</a> <p>|</p> 
                <div>
                    Buscar:
                    <input type="text" name="c" size="10" maxlength="40">
                    <input type="submit" value="OK">
                </div>
            </form>
            <table class="listagem">
                <?php
                    $q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.capa FROM jogos j join generos g on j.genero = g.cod 
                    join produtoras p on j.produtora = p.cod ";

                    if(!empty($chave)){
                        $q .= "where j.nome like '%$chave%' or p.produtora like '%$chave%' or g.genero like '%$chave%' ";
                    }

                    switch($ordem){
                        case 'n':
                            $q .= 'order by j.nome'; 
                            break;
                        case 'p':
                            $q .= 'order by p.produtora'; 
                            break;
                        case 'g': 
                            $q .= 'order by g.genero'; 
                            break;
                        case 'na': 
                            $q .= 'order by j.nota DESC'; 
                            break;
                        case 'nb': 
                            $q .= 'order by j.nota ASC'; 
                            break;
                        default: 
                            $q .= 'order by j.cod'; 
                    }
                    $busca = $banco->query($q);
                    if(!$busca){
                        echo "<tr><td>Infelizmente a busca teu errado</td></tr>";
                    }else{
                        if($busca->num_rows == 0){
                            echo "<tr><td>Nenhum registro encontrado</td></tr>";
                        }else{
                            while($reg=$busca->fetch_object()){
                                $t = thumb($reg->capa);
                                echo "<tr>";
                                    echo "<td><img src='$t' class='mini'></td>";
                                    echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a> [$reg->genero]<br>$reg->produtora</td>";
                                    if(is_admin()){
                                        echo "<td><div>";
                                        echo "<i class='material-icons'>add_circle</i>";
                                        echo "<i class='material-icons'>edit</i>";
                                        echo "<i class='material-icons'>delete</i>";
                                        echo "</div></td>";
                                    }else if(is_editor()){
                                        echo "<td><div>";
                                        echo "<i class='material-icons'>edit</i>";
                                        echo "</div></td>";
                                    }
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
            </table>
        </main>
        <?php include_once 'rodape.php' ?>
    </body>
</html>