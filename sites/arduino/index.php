<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <title>Servidor com arduino</title>
</head>
<body>
    <?php
        $arduino = $_REQUEST["arduino"] ?? 'Não';
        $lambada = $_REQUEST["lampada"] ?? 'Apagar';
        $conecaoArduino = fopen('COM5', 'w'); // conexao com porta serial parametro porta , metodo
        sleep(2); // delay
        
        if($lambada == 'Apagar'){
            $acao = '0';
            $imagemLambada = './img/lampada-apagada.jpg';
        }else{
            $acao = '1';
            $imagemLambada = './img/lampada-acesa.jpg';
        }
        if($arduino == 'Sim'){
            //fwrite($conecaoArduino,$acao); // onde vai escrever e o que quer escrever
            //fclose($conecaoArduino); // fechar conexao
        }
        //aula 4599
        /* 
        criar redes externa
        1) acessar o modem dsl 192.168.1.1
        2) redirecionar uma rota para o endereço ip da pagina que você tem o arduino - nat virtual server
        3) acessar meuip.com.br
        */
    ?>
    <h1>Controles de arduino</h1>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <h2>Possui arduino</h2>
        <input type="submit" name="arduino" value="Sim">
        <input type="submit" name="arduino" value="Não">
    </form>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
        <img id="lambada" src="<?=$imagemLambada ?>" alt="Lambada">
        <input type="submit" name="lampada" value="Acender">
        <input type="submit" name="lampada" value="Apagar">
    </form>
</body>
</html>