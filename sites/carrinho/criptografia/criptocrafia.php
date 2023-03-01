<?php
//md5 decodifica sempre para 32 caracteres

$senha = 'clovis';
$criptografada = md5($senha);
echo "senha digitada ".$senha;
echo "<br>";
echo "senha criptografada ".$criptografada;
echo "<br>";

//shai decodifica sempre para 40 caracteres

$senha = 'clovis';
echo "<br>";
$criptografada = sha1($senha);
echo "senha digitada ".$senha;
echo "<br>senha criptografada ".$criptografada;
echo "<br>";

//base64 consegue decodificar bom para site
$senha = 'clovis';
echo "<br>";
//faz a criptografia
$criptografada = base64_encode($senha);
//senha descriiptograda
$senhaOriginal = base64_decode($criptografada);
echo "senha digitada ".$senha;
echo "<br>senha criptografada ".$criptografada;
echo "<br>senha Original ".$senhaOriginal;
echo "<br>";


?>