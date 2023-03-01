<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Remoto</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeControleRemoto/ControleRemoto.php';
    ?>
</head>
<body>
    <main>
        <h1>Controle Remoto</h1>
        <fieldset>
            <?php
                $controle = new ControleRemoto();
                echo "<h2>Abrir menu</h2>";
                $controle->abrirMenu();
                echo "<h2>Ligar</h2>";
                $controle->ligar();
                $controle->abrirMenu();
                echo "<h2>Tocar</h2>";
                $controle->play();
                $controle->abrirMenu();
                echo "<h2>Aumentar Volume</h2>";
                $controle->maisVolume();
                $controle->maisVolume();
                $controle->maisVolume();
                $controle->abrirMenu();  
                echo "<h2>Pausa</h2>";
                $controle->pause();
                $controle->abrirMenu();
                echo "<h2>Diminuir Volume</h2>";
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->menosVolume();
                $controle->abrirMenu(); 
                echo "<h2>Mudo</h2>";
                $controle->ligarMudo();
                $controle->abrirMenu();
                echo "<h2>Desligar mudo</h2>";
                $controle->desligarMudo();
                $controle->abrirMenu();
                echo "<h2>Desligar</h2>";
                $controle->desligar();
                $controle->abrirMenu();
                
            ?>
        </fieldset>
    </main>
</body>
</html>