<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
    <?php
        $min = 0;
        $max = 100;
        /* 
            função antigo - rand() = 1951 - Linear Congrential Generator - função lenta 
            mt_rand() = 1997 - Mersenne Twister - Função 4 mais que a rand() - os parametro tem que ser certo o minimo e depois o maximo
            random_int() gera numeros aleatorios criptograficamente seguros - é o mais lento de todos    
        */
        $valor = mt_rand($min, $max);
    ?>
    <section>
        <h1>Trabalhando com números aleatórios</h1>
        <p>Gerando um número aleatório entre <?php echo $min ?> e <?php echo $max ?>...</p>
        <p>O valor gerado foi <strong><?php echo $valor;?></strong></p>
        <button onclick="javascript:document.location.reload()">&#x1F504;Gerar outro</button>
    </section>
</body>
</html>