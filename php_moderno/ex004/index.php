<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Primitivos</title>
</head>
<body>
    <?php
    /*
    Categorias dos tipos primitivos
        Escalares
            string 
                sequencia de letras, numeros e simbolos, sempre representadas entre aspas.
            int ou integer
                um valor numerico inteiro,aquele que vem sem a parte decimal.
            float, double ou real ( não existe mais )
                um valor numerico Real, que vem com a parte decimal, depois do ponto flutuante.
            bool ou boolen
                um valor logico ou Booleano, que aceita apenas os valores verdadeiro ou falso ( true ou false).
                o bolleano escrevendo na tela mostra 0 para true e vazio para 0
        Compostos
            Array
                lista de variaveis pode usar varios tipos
            object
                classes
        Especiais
            null
            resource
            callabe
            mixed
        0x = hexadecimal 
        0b binario 
        0 = octal
        var_dump(variavel) mostra a variavel e o tipo
        $int = (integer) "int ou integer"; coerção força para ser o tipo escolhido
    */
    $string = "string";
    $int = "int ou integer";
    $float = "float, double ou real";
    $boolen = "bool ou boolen";
    $rj = "RJ";
    $_31415 = 3.1415;
    $_17 = 17;
    $true = true;
    $espaco = " ";
    $_19 = -19;
    $false = "false";
    $_0x1A = 0x1A;
    $_3e2 = 3e2;
    $_1024 = "1024";
    echo "$rj é $string";
    echo "<br>";
    echo "$_31415 é $float";
    echo "<br>";
    echo "$_17 é $int";
    echo "<br>";
    echo "$true é $boolen";
    echo "<br>";
    echo "$espaco é $string";
    echo "<br>";
    echo "$_19 é $int";
    echo "<br>";
    echo "$false é $string";
    echo "<br>";
    echo "$_0x1A é $int";
    echo "<br>";
    echo "$_0x1A é $int ( numero decimal )";
    echo "<br>";
    echo "$_3e2 é $float";
    echo "<br>";
    echo "$_1024 é $string";
    echo "<br>";
    $vet = [6,2,9,3];
    var_dump($vet);
    class Pessoa{
        private string $nome;
    }
    echo "<br>";

    $p = new Pessoa;
    var_dump($p)
    ?>
</body>
</html>