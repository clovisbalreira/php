<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções String</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Funções String</h1>
        <fieldset>
            <?php
                echo "<h2>Função com formatação direto</h2>";
                $produto = "leite";
                $preco = 4.5;
                printf("<p>O %s está custando R$ %.2f</p>",$produto,$preco);
                /**
                 * %d - valor decimal ( positivo ou negativo )
                 * %u - valor decimal sem sinal ( positivo ou negativo )
                 * %f - valor real
                 * %s - string
                 */
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Função mostra valores de vetores</h2>";
                $x[0] = 4;
                $x[1] = 8;
                $x[2] = 3;
                print_r($x);
                echo '</br>';
                var_dump($x);
                echo '</br>';
                var_export($x);
                echo '</br>';
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Cria quebras de linha</h2>";
                $txt = "Este é um exemplo de string gigante que...";
                $res = wordwrap($txt,20,"<br>\n",false);
                echo $res;
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Calcula o comprimento da string</h2>";
                $txt = "Curso em vídeo";
                echo "<p>$txt</p>";
                echo strlen($txt)
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Elimina os espaços no inicio e no final</h2>";
                $nome = "   José da Silva   ";
                echo "<p>$nome</p>";
                echo strlen($nome);
                $novo = trim($nome);
                //elimina espaço no começo
                //$novo = ltrim($nome);
                //elimina espaço no final
                //$novo = rtrim($nome);
                echo "<p>$novo</p>";
                echo strlen($novo);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Quantidade de palavras na string</h2>";
                $frase = "Eu vou estudar PHP";
                //0 cria palavra 1 cria vetor 2 cria vetor com indice como a pasição da string
                $cont = str_word_count($frase,0);
                echo "<p>$frase</p>";
                echo $cont;
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Criar vetor</h2>";
                $site = "Curso em Vídeo";
                $vetor = explode(" ",$site);
                print_r($vetor);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Cria vetor separando cada letra da string</h2>";
                $nome = "Maria";
                $vetor = str_split($nome);
                print_r($vetor);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Cria a string adicionando algo entre a palavras do vetor</h2>";
                $vetor[0] = "Curso";
                $vetor[1] = "em";
                $vetor[2] = "Vídeo";
                $texto = implode("#",$vetor);
                //$texto = join("#",$vetor);
                print_r($texto);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Codigo Letra</h2>";
                $codigo = ord("C");
                echo "<p>O codigo da letra C é $codigo</p>";
                $codigoLetra = chr(67);
                echo "<p>O codigo $codigo é da letra C</p>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Todos letras em minusculo</h2>";
                $nome = "Clóvis Balreira Rodrigues";
                echo "Seu nome é ". strtolower($nome);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Todos letras em maiusculo</h2>";
                $nome = "ClÓvis Balreira Rodrigues";
                echo "Seu nome é " . strtoupper($nome);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>A primeira letra em maiusculo</h2>";
                $nome = "clóvIs balReira rOdrigues";
                echo "Seu nome é ". ucfirst($nome);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>A primeira letra de cada palavra em maiusculo</h2>";
                $nome = "clóvIs balreira rodrigues";
                echo "Seu nome é ". ucwords($nome);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>A String ao contrario</h2>";
                $nome = "clóvIs balreira rodrigues";
                echo "Seu nome é ". strrev($nome);
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Encontra a posição da palavra</h2>";
                $frase = "Estou aprendendo PHP";
                $pos = strpos($frase, "PHP");
                echo "<p>$frase</p>";
                echo "A string foi encontrada na posição $pos";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Encontra a posição da palavra ignorando se é maisculo ou minusculo</h2>";
                $frase = "Estou aprendendo PHP";
                $pos = stripos($frase, "php");
                echo "<p>$frase</p>";
                echo "A string foi encontrada na posição $pos";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Mostra quantas vezes é mostrada um determida palavra</h2>";
                $frase = "Estou aprendendo PHP no curso em vídeo de PHP";
                $cont = substr_count($frase, "PHP");
                echo "<p>$frase</p>";
                echo "PHP é encontrada $cont vezes";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Pega um pedaço da string</h2>";
                $site = "Curso em Video";
                $sub = substr($site,0,5);
                echo "$site ";
                echo "<p>".substr($site,0,5)."</p>";
                echo "<p>".substr($site,6)."</p>";
                echo "<p>".substr($site,-5)."</p>";
                echo "<p>".substr($site,-5,2)."</p>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Complementa uma string</h2>";
                $nome = "Clovis";
                $novo = str_pad($nome,30,"#",STR_PAD_RIGHT);
                //$novo = str_pad($nome,30," ",STR_PAD_CENTER);
                //$novo = str_pad($nome,30," ",STR_PAD_LEFT);
                echo "<p>$novo</p>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Repetição de palavra</h2>";
                $txt = str_repeat("Php",5);
                echo "<p>O texto gerado foi $txt</p>";
            ?>
        </fieldset>
        <fieldset>
            <?php
                echo "<h2>Substituir palavras na string</h2>";
                $frase = "Gosto de estudar Matematica!!";
                $novaFrase = str_replace("Matematica","PHP",$frase);
                //$novaFrase = str_ireplace("Matematica","PHP",$frase);
                echo "<p>$frase</p>";
                echo "<p>$novaFrase</p>";
            ?>
        </fieldset>
    </main>
</body>
</html>