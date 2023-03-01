<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php
        require_once 'classeBanco/Banco.php';
    ?>
</head>
<body>
    <main>
        <h1>Banco</h1>
        <fieldset>
            <?php
                $pessoa1 = new Banco();
                $pessoa2 = new Banco();
                echo "<h2>Abrir Conta</h2>";
                $pessoa1->abrirConta('cc');
                $pessoa1->mostrar();
                $pessoa2->abrirConta('cp');
                $pessoa2->mostrar();
                echo "<h2>Adicionar Nome</h2>";
                $pessoa1->setDono('Jubileu');
                $pessoa1->mostrar();                
                $pessoa2->setDono('Creuza');
                $pessoa2->mostrar();
                echo "<h2>Depositar</h2>";
                $pessoa1->depositar(300);
                $pessoa1->mostrar();                
                $pessoa2->depositar(500);
                $pessoa2->mostrar();
                echo "<h2>Sacar</h2>";
                $pessoa1->sacar(350);
                $pessoa1->mostrar();                
                $pessoa2->sacar(100);
                $pessoa2->mostrar();
                echo "<h2>Pagar Mensalidade</h2>";
                $pessoa1->pagarMensalidade();
                $pessoa1->mostrar();                
                $pessoa2->pagarMensalidade();
                $pessoa2->mostrar();
                echo "<h2>Fechar Conta</h2>";
                $pessoa1->fecharConta();
                echo "<h2>Depositar para fechar conta</h2>";
                $pessoa1->depositar(12);
                $pessoa1->mostrar();                
                $pessoa1->fecharConta();
                $pessoa1->mostrar();                

                $pessoa2->fecharConta();
                echo "<h2>Sacar para fechar conta</h2>";
                $pessoa2->sacar(530);
                $pessoa2->mostrar();
                $pessoa2->fecharConta();
                $pessoa2->mostrar();
            ?>
        </fieldset>
    </main>
    <script>
    </script>
</body>
</html>