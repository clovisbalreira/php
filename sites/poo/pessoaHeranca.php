<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoa - Herança</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classeHeranca/Visitante.php';
        require_once 'classeHeranca/Aluno.php';
        require_once 'classeHeranca/Bolsista.php';
        require_once 'classeHeranca/Tecnico.php';
    ?>
</head>
<body>
    <main>
        <h1>Pessoa - Herança</h1>
        <fieldset>
            <pre style="font-size: .8em">
                <?php
                    $v = new Visitante("",0,"");
                    $al = new Aluno("",0,"");
                    $b = new Bolsista("",0,"");
                    $t = new Tecnico("",0,"");
                    echo "<h2>Visitante</h2>";
                    $v->setNome("Juvenal");
                    $v->setIdade(33);
                    $v->setSexo("M");
                    print_r($v);
                    
                    echo "<h2>Aluno</h2>";
                    $al->setNome('Pedro');
                    $al->setMatricula(11111);
                    $al->setIdade(16);
                    $al->setSexo('M');
                    $al->setCurso('Informatica');
                    $al->pagarMensalidade();
                    print_r($al);
                
                    echo "<p>Bolsista</p>";
                    $b->setMatricula(1112);
                    $b->setNome("Jubileu");
                    $b->setBolsa(12.5);
                    $b->setSexo('M');
                    $b->setCurso("Administração");
                    $b->setIdade(17);
                    $b->pagarMensalidade();
                    $b->renovarBolsa();
                    print_r($b);
                
                    echo "<p>Tecnico</p>";
                    $t->setMatricula(1112);
                    $t->setNome("Maria");
                    $t->setSexo('F');
                    $t->setRegistroProfissional(40049);
                    $t->setCurso("Markenting");
                    $t->setIdade(17);
                    $t->pagarMensalidade();
                    $t->praticar();
                    print_r($t);
                ?>
            </pre>
        </fieldset>
    </main>
</body>
</html>