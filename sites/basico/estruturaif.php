<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura if</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Estrutura if</h1>
        <fieldset>
            <form action="estruturaif.php" method="get">
                <div>
                    <label for="ano">Ano nascimento:</label>
                    <input type="number" name="ano" id="ano" placeholder="4 digitos">
                </div>
                <?php
                $ano = $_GET['ano'];
                $idade = date('Y') - $ano;
                if($ano != ''){
                    if($idade >= 18){
                        $voto = "já pode votar";
                        $dirigir = "já pode dirigir";
                    }else{
                        $voto = "não pode votar";
                        $dirigir = "não pode dirigir";
                    }
                    echo "Com $idade anos você $voto e tambêm $dirigir";
                }
                ?>
                <input type="submit" class='botao' value="Verificar">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturaif.php" method="get">
                <div>
                    <label for="ano">Ano nascimento:</label>
                    <input type="number" name="anoOpcional" id="ano" placeholder="4 digitos">
                </div>
                <?php
                $anoOpcional = $_GET['anoOpcional'];
                $idadeOpcional = date('Y') - $anoOpcional;
                if($anoOpcional != ''){
                    if($idadeOpcional < 16){
                        $tipoVoto = "não é obrigatorio";
                    }else if(($idadeOpcional >= 16 && $idadeOpcional < 18) || ($idadeOpcional > 65) ){
                        $tipoVoto = "opcional";
                    }else{
                        $tipoVoto = "obrigatorio";
                    }
                    echo "Com $idadeOpcional anos seu voto é $tipoVoto";
                }
                ?>
                <input type="submit" class='botao' value="Verificar">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturaif.php" method="get">
                <div>
                    <label for="nota1">Nota 1:
                    <input type="number" name="nota1" id="nota1">
                </div>
                <div>
                    <label for="nota2">Nota 2:
                    <input type="number" name="nota2" id="nota2">
                </div>
                <?php
                    $nota1 = $_GET['nota1'];
                    $nota2 = $_GET['nota2'];
                    $media = ($nota1 + $nota2) / 2;
                    if($nota1 != '' && $nota2 != ''){
                        echo "<p>A Média entre <span class='foco'>$nota1</span> e <span class='foco'>$nota2</span> é igual a <span class='foco'>$media</span></p>";
                        if($media < 5){
                            $situacao = "REPROVADO";
                        }else if($media >= 5 && $media < 7){
                            $situacao = "RECUPERAÇÃO";
                        }else{
                            $situacao = "APROVADO";
                        }
                        echo "<p>Situação do aluno: <span class='foco'>$situacao</span></p>";
                    }
                ?>
            <input type="submit" class='botao' value="Verificar">
        </form>
    </fieldset>
    </main>
</body>
</html>