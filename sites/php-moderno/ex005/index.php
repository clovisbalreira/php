<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos String</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <?php
            /*
            Quatro formatos de strings
            double quoted
            aspas duplas
            "Curso"
            existe interpletação entre as aspas duplas
            single quoted
            não existe interpretação entre aspas simples
            aspas simples
            Heredoc
                echo <<<FRASE
                texto variaveis
                FRASE;
            Nowdoc
                echo <<<'FRASE'
                texto variaveis
                FRASE;
                concatenação de string = .
                serve para double quoted e single quoted
                \ ponto de escape so funciona entre aspas duplas \u{1F418}
                Sequencia de escapes
                \n Nova linha
                \t Tabulação
                \\ Barra ivertida
                \$ Sinal de cifrão
                \u{} Codepoint Unicode
                \" mostra aspas duplas
                Para mostrar constante tem que usar a contenação de string
                */
            echo("\u{1F418}");
            $nome = "Clóvis";
            echo "<br>";
            echo "Nome: $nome";
            echo "<br>";
            echo 'Nome: $nome';
            echo "<br>";
            const ESTADO = "RS";
            echo "Moro no " . ESTADO;
            echo "<br>";
            $canal = "Curso em Video";
            $ano = date('Y');
            echo <<<FRASE
            Olá galera do $canal!
            Tudo bem com vocês?
            Como está sendo esse ano de $ano?
            Abraços! \u{1F596}
            FRASE;
            echo "<br>";
            echo <<<'FRASE'
            Olá galera do $canal!
            Tudo bem com vocês?
            Como está sendo esse ano de $ano?
            Abraços! \u{1F596}
            FRASE;
        ?>
    </main>
</body>
</html>