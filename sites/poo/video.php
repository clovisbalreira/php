<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vídeo</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeVideo/Video.php';
        require_once 'classeVideo/Gafanhoto.php';
        require_once 'classeVideo/Visualizacao.php';
    ?>
</head>
<body>
    <main>
        <h1>Vídeo</h1>
        <fieldset>
            <pre style="font-size: .8em"> 
                <?php
                    $v[0] = new Video("Aula 1 de PDO");
                    $v[1] = new Video("Aula 12 de PHP ");
                    $v[2] = new Video("Aula 15 de HTML ");
                    $g[0] = new Gafanhoto("Jubileu",22,"M","juba");
                    $g[1] = new Gafanhoto("Creuza",12,"M","cre");
                    
                    echo "<h2>Vídeos</h2>";
                    for($i = 0; $i < count($v); $i++){
                        print_r($v[$i]);
                    }
                    echo "<h2>Gafanhotos</h2>";
                    for($i = 0; $i < count($g); $i++){
                        print_r($g[$i]);
                    }
                    echo "<h2>Visualização</h2>";
                    for($i = 0; $i < 5; $i++){
                        $pessoa = rand(0,1);
                        $video = rand(0,2);
                        $vis = new Visualizacao($g[$pessoa],$v[$video]);
                        $aleatorioNota = rand(0,2);
                        $nota = 0 ;
                        switch($aleatorioNota){
                            case 0:
                                $vis->avaliar();
                                $nota = 5;
                                break;
                            case 1:
                                $notaSorteio = rand(0,10);
                                $vis->avaliarNota($notaSorteio);
                                $nota = $notaSorteio;
                                break;
                            case 2:
                                $notaSorteio = 0;
                                if($notaSorteio < 20){
                                    $nota = 3;
                                }elseif($notaSorteio <= 50){
                                    $nota = 5;
                                }elseif($notaSorteio <= 80){
                                    $nota = 8;
                                }else{
                                    $nota = 10;
                                }
                                $vis->avaliarPorcentagem($notaSorteio);
                                break;
                            default:
                                break;
                        }
                        $aleatorio = rand(0,1);
                        $v[$video]->setCurtidas($aleatorio);
                        
                        echo "<p>" . $g[$pessoa]->getNome() . " está assistindo " . $v[$video]->getTitulo() . "<p></p>Nota: ". $nota ." Curtidas: ". (($aleatorio == 1) ? "Sim" : "Não") ."</p>";
                    }
                    echo "<h2>Vídeos</h2>";
                    for($i = 0; $i < count($v); $i++){
                        print_r($v[$i]);
                    }
                    echo "<h2>Gafanhotos</h2>";
                    for($i = 0; $i < count($g); $i++){
                        print_r($g[$i]);
                    }
                ?>
            </pre>
        </fieldset>
    </main>
</body>
</html>