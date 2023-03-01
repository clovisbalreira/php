<?php
    function alerta($mensagem){
        echo "<script>alert('$mensagem');</script>";
    }

    function voltar(){
        echo "<script>history.back();</script>";
    }

    function direciona($pasta ,$para_url){
        echo '<script>window.location="'.$pasta.$para_url.'"</script>';
    }

    function formata_dinheiro($valor){
        return 'R$ '.number_format($valor,2,',','.');
    }
?>