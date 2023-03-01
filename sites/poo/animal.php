<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal - Polimorfismo</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeAnimal/Mamifero.php';
        require_once 'classeAnimal/Reptil.php';
        require_once 'classeAnimal/Peixe.php';
        require_once 'classeAnimal/Ave.php';
        require_once 'classeAnimal/Cachorro.php';
        require_once 'classeAnimal/Canguru.php';
        require_once 'classeAnimal/Cobra.php';
        require_once 'classeAnimal/Tartaruga.php';
        require_once 'classeAnimal/GoldFish.php';
        require_once 'classeAnimal/Arara.php';
    ?>
</head>
<body>
    <main>
        <h1>Animal - Polimorfismo</h1>
        <fieldset>
            <pre style="font-size: .8em">
                <?php
                    $mamifero = new Mamifero() ;
                    $reptil = new Reptil();
                    $peixe = new Peixe();
                    $ave = new Ave();
                    $cachorro = new Cachorro();
                    $canguru = new Canguru();
                    $cobra = new Cobra();
                    $tartaruga = new Tartaruga();
                    $goldFish = new GoldFish();
                    $arara = new Arara();
            
                    echo "<h2>Mamifero</h2>";
                    $mamifero->setIdade(10);
                    $mamifero->setPeso(30);
                    $mamifero->setMembros(4);
                    $mamifero->setCorPelo("Preto");
                    $mamifero->locomover();
                    $mamifero->emitirSom();
                    $mamifero->alimentar();
                    print_r($mamifero);

                    echo "<h2>Reptil</h2>";
                    $reptil->setIdade(5);
                    $reptil->setPeso(10);
                    $reptil->setMembros(4);
                    $reptil->setCorEscama("Verde");
                    $reptil->locomover();
                    $reptil->emitirSom();
                    $reptil->alimentar();
                    print_r($reptil);

                    echo "<h2>Peixe</h2>";
                    $peixe->setIdade(1);
                    $peixe->setPeso(0.3);
                    $peixe->setMembros(2);
                    $peixe->setCorEscama("Vermelho");
                    $peixe->locomover();
                    $peixe->emitirSom();
                    $peixe->alimentar();
                    print_r($peixe);

                    echo "<h2>Ave</h2>";
                    $ave->setIdade(2);
                    $ave->setPeso(1);
                    $ave->setMembros(4);
                    $ave->setCorPena("Amarelo");
                    $ave->locomover();
                    $ave->emitirSom();
                    $ave->alimentar();
                    print_r($ave);

                    echo "<h2>Cachorro</h2>";
                    $cachorro->setIdade(15);
                    $cachorro->setPeso(30);
                    $cachorro->setMembros(4);
                    $cachorro->setCorPelo("Preto e branco");
                    $cachorro->locomover();
                    $cachorro->emitirSom();
                    $cachorro->alimentar();
                    print_r($cachorro);

                    echo "<h2>Canguru</h2>";
                    $canguru->setIdade(10);
                    $canguru->setPeso(30);
                    $canguru->setMembros(4);
                    $canguru->setCorPelo("Laranja");
                    $canguru->locomover();
                    $canguru->emitirSom();
                    $canguru->alimentar();
                    print_r($canguru);

                    echo "<h2>Cobra</h2>";
                    $cobra->setIdade(5);
                    $cobra->setPeso(10);
                    $cobra->setMembros(4);
                    $cobra->setCorEscama("Preta");
                    $cobra->locomover();
                    $cobra->emitirSom();
                    $cobra->alimentar();
                    print_r($cobra);

                    echo "<h2>Tartaruga</h2>";
                    $tartaruga->setIdade(5);
                    $tartaruga->setPeso(10);
                    $tartaruga->setMembros(4);
                    $tartaruga->setCorEscama("Verde");
                    $tartaruga->locomover();
                    $tartaruga->emitirSom();
                    $tartaruga->alimentar();
                    print_r($tartaruga);

                    echo "<h2>Gold Fish</h2>";
                    $goldFish->setIdade(1);
                    $goldFish->setPeso(0.3);
                    $goldFish->setMembros(2);
                    $goldFish->setCorEscama("Vermelho");
                    $goldFish->locomover();
                    $goldFish->emitirSom();
                    $goldFish->alimentar();
                    print_r($goldFish);

                    echo "<h2>Arara</h2>";
                    $arara->setIdade(2);
                    $arara->setPeso(1);
                    $arara->setMembros(4);
                    $arara->setCorPena("Amarelo");
                    $arara->locomover();
                    $arara->emitirSom();
                    $arara->alimentar();
                    print_r($arara);
                ?>
            </pre>
        </fieldset>
    </main>
</body>
</html>