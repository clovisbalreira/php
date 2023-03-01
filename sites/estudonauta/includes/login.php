<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = '';
        $_SESSION['nome'] = '';
        $_SESSION['tipo'] = '';
    }
    
    function cripto($senha){
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++){
            $letra = ord($senha[$pos]) + 1;//ord() - codigo da letra
            $c .= chr($letra);//chr() - letra do codigo
        }
        return $c;
    }

    function gerarHash($senha){
        $txt =cripto($senha);
        $hash = password_hash($txt, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash){
        $ok = password_verify(cripto($senha), $hash);
        return $ok;
    }

    function logout(){
        $_SESSION['user'] = '';
        $_SESSION['nome'] = '';
        $_SESSION['tipo'] = '';
    }

    /*$original = "teste";
    echo $original."<br>";
    echo cripto($original)."<br>";
    echo gerarHash($original)."<br>";
    echo testarHash($original,"$2y$10$4IWDoFoqM4bfC6bUGoyl2O0KjuFQaWKu10BWah1H9pjU3hZhEQJS2")*/

?>