<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal - Polimorfismo - Sobre Carga</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeAnimalSobreCarga/Mamifero.php';
        require_once 'classeAnimalSobreCarga/Lobo.php';
        require_once 'classeAnimalSobreCarga/Cachorro.php';
    ?>
</head>
<body>
    <main>
        <h1>Animal - Polimorfismo - Sobre Carga</h1>
        <pre>
            <fieldset>
                <?php
                    $mamifero = new Mamifero();
                    $lobo = new Lobo();
                    $cachorro = new Cachorro();
                    echo "<h2>Mamifero</h2>";
                    $mamifero->emitirSom();
                    echo "<h2>Lobo</h2>";
                    $lobo->emitirSom();
                    echo "<h2>Cachorro</h2>";
                    $cachorro->emitirSom();
                    echo "<h3>Reagir Frase</h3>";
                    $frase1 = "Ola";
                    $frase2 = "Vai se deitar";
                    echo "<p>Frase: $frase1</p>";
                    $cachorro->reagirFrase($frase1);
                    echo "<p>Frase: $frase2</p>";
                    $cachorro->reagirFrase($frase2);
                    echo "<h3>Reagir Hora</h3>";
                    $manha = 9;
                    $tarde = 15;
                    $noite = 20;
                    $minuto = 55;
                    echo "<p>Hora: $manha</p>";
                    $cachorro->reagirhora($manha,$minuto);
                    echo "<p>Hora: $tarde</p>";
                    $cachorro->reagirhora($tarde,$minuto);
                    echo "<p>Hora: $noite</p>";
                    $cachorro->reagirhora($noite,$minuto);
                    echo "<h3>Reagir Dono</h3>";
                    echo "<p>È o dono</p>";
                    $cachorro->reagirDono(true);                    
                    echo "<p>Não é o dono</p>";
                    $cachorro->reagirDono(false);                    
                    echo "<h3>Reagir Idade e Peso</h3>";
                    $idadeMenor = 2;
                    $idadeMaior = 12;
                    $pesoMenor = 2;
                    $pesoMaior = 22;
                    echo "<p>Idade : $idadeMenor e peso : $pesoMenor</p>";
                    $cachorro->reagirPeso($idadeMenor,$pesoMenor);                    
                    echo "<p>Idade : $idadeMenor e peso : $pesoMaior</p>";
                    $cachorro->reagirPeso($idadeMenor,$pesoMaior);
                    echo "<p>Idade : $idadeMaior e peso : $pesoMenor</p>";
                    $cachorro->reagirPeso($idadeMaior,$pesoMenor);
                    echo "<p>Idade : $idadeMaior e peso : $pesoMaior</p>";
                    $cachorro->reagirPeso($idadeMaior,$pesoMaior);                    
                ?>
            </fieldset>
        </pre>
    </main>
</body>
</html>