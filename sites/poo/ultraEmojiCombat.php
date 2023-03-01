<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Emoji Combat</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeUltraEmojiCombat/Lutador.php';
        require_once 'classeUltraEmojiCombat/Luta.php';
    ?>
</head>
<body>
    <main>
        <h1>Ultra Emoji Combat</h1>
        <fieldset>
            <?php
                $lutadores = array();
                $lutadores[0] = new Lutador("Pretty Boy","França",31,1.75,68.9,11,2,1);
                $lutadores[1] = new Lutador("Putscript","Brasil",29,1.68,57.8,14,2,3);
                $lutadores[2] = new Lutador("SnapShadow","EUA",35,1.65,80.9,12,2,1);
                $lutadores[3] = new Lutador("Dead Code","Austrália",28,1.93,81.6,13,0,2);
                $lutadores[4] = new Lutador("UFOCobol","Brasil",37,1.70,119.3,5,4,3);
                $lutadores[5] = new Lutador("Nerdaart","EUA",30,1.81,105.7,12,2,4);

                echo "<h2>Lutadores</h2>";
                for($i = 0; $i < count($lutadores);$i++){
                    $lutadores[$i]->status();
                }

                echo "<h2>Lutas</h2>";
                for($i = 0 ; $i < count($lutadores); $i++){
                    for($j = 0; $j < count($lutadores); $j++){
                        $UECO = new Luta();
                        $UECO->marcarLuta($lutadores[$i],$lutadores[$j]);
                        $UECO->lutar();
                        if($UECO->getAprovada()){
                            $lutadores[0]->status();
                            $lutadores[1]->status();
                            echo "////////////////";
                        }
                    }
                }
            ?>
        </fieldset>
    </main>
</body>
</html>