<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Detalhes</title>
    <style>
        div{
            display: flex;
            gap: .5rem;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php
        require_once 'includes/banco.php'; 
        require_once 'includes/login.php'; 
        require_once 'functions/functions.php' 
    ?>
    <main id="corpo">
        <?php require_once 'topo.php'?>
        <?php
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod='$c'")
        ?>
        <h1>Detalhes</h1>
        <table class="detalhes">
            <?php
                if(!$busca){
                    echo "<tr><td>Busca falhou!</td></tr>";
                }else{
                    if($busca->num_rows == 1){
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr>"; 
                            echo "<td rowspan='3' class='full'><img src='$t'></td>";
                            echo "<h2>$reg->nome</h2>";
                            echo "<div><p>Nota: " . number_format($reg->nota,1)." / 10.0</p>";
                            if(is_admin()){
                                echo "<i class='material-icons'>add_circle</i>";
                                echo "<i class='material-icons'>edit</i>";
                                echo "<i class='material-icons'>delete</i></div>";
                            }else if(is_editor()){
                                echo "<i class='material-icons'>edit</i></div>";
                            }
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>$reg->descricao</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Adm</td>";
                        echo "</tr>";
                    }else{
                        echo "<tr><td>Busca falhou!</td></tr>";
                    }
                }
            ?>
        </table>
        <!--<a href="index.php">
            <img src="icones/icoback.png" alt="">
        </a>-->
        <?php echo voltar();?>
    </main>
    <?php include_once 'rodape.php' ?>
</body>
</html>
