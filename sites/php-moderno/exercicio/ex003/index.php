<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variaves e constantes</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <main>
        <?php
            /*Regras para nomes
                variaveis sempre começam com o simbolo $
                o segundo pode ser letra ou o simbolo_
                Aceita caracteres [a-z], [A-Z], [0-9] e [_]
                Aceita caracteres da ASCII a partir de 128
                Aceita caracteres acentuados como á,õ,ç
                A linguagem é case sensitive em relação aos nomes
                Nomes especiais como $this não podem ser usados
                Recomendações para dar nomes
                    Tente dar nomes claros e de fácil identificação
                    Evite nomes muito curtos ou muito longos
                    Difine um padrão e siga em todo o projeto
                    Para variaveis, de preferencia a letras minusculas
                    Para constantes, de preferencia a letras maiusculas
                    Use camelCase para metodos e atributos
                    Use SNAKE_CASE para nomear constantes
                    Não pode ter espaço na variavel
        
            */
            $variaveis = "Variaveis podem ser mudadas";
            $nome = "Clóvis";
            $sobrenome = "Balreira";
            echo $variaveis;
            echo "<br>";
            echo "Muito prazer $nome $sobrenome";
            echo "<br>";
            const CONSTANTE = "Constante não pode ser mudadas";
            const PAIS = "Brasil";
            echo CONSTANTE;
            echo "<br>";
            echo "Você mora no ". PAIS;
            echo "<br>";
        ?>
    </main>
</body>
</html>