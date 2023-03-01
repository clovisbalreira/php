<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoa</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php 
        require_once 'classePessoa/Pessoa.php';
        require_once 'classePessoa/Aluno.php';
        require_once 'classePessoa/Funcionario.php';
        require_once 'classePessoa/Professor.php';
    ?>
</head>
<body>
    <main>
        <h1>Pessoa</h1>
        <fieldset>
            <pre>
                <?php
                    $pessoa1 = new Pessoa("Pedro",10,"M");
                    $pessoa2 = new Aluno("Maria",25,"F");
                    $pessoa3 = new Professor("Cláudio",55,"M");
                    $pessoa4 = new Funcionario("","","","","","");
                    $pessoa1->setNome("Pedro");
                    $pessoa1->setIdade(10);
                    $pessoa1->setSexo("M");
                    $pessoa2->setNome("Maria");
                    $pessoa2->setIdade(25);
                    $pessoa2->setSexo("F");
                    $pessoa3->setNome("Cláudio");
                    $pessoa3->setIdade(55);
                    $pessoa3->setSexo("M");
                    $pessoa4->setNome("Fabiana");
                    $pessoa4->setIdade(33);
                    $pessoa4->setSexo("F");

                    
                    $pessoa2->setCurso("Informatica");
                    $pessoa3->setSalario(2500.75);
                    $pessoa4->setSetor("Estoque");
                    $pessoa3->receberAumento(550.20);$pessoa4->mudarTrabalho();
                    $pessoa2->cancelarMatricula();
                    
                    echo "<h2>Pessoa</h2>";
                    print_r($pessoa1);
                    echo "<h2>Aluno</h2>";
                    print_r($pessoa2);
                    echo "<h2>Professor</h2>";
                    print_r($pessoa3);
                    echo "<h2>Funcionario</h2>";
                    print_r($pessoa4);
                ?>
            </pre>
        </fieldset>
    </main>
</body>
</html>