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
        $arduino = $_REQUEST["arduino"] ?? 'Sim';
        $conecaoArduino = fopen('COM3', 'w'); // conexao com porta serial parametro porta , metodo
        sleep(2); // delay
    ?>
    <div>
        <h1>Controles de arduino</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
            <h2>Possui arduino</h2>
            <input type="submit" name="arduino" value="Sim">
            <input type="submit" name="arduino" value="Não">
        </form>
    </div>
    <?php    
        $lambada = $_REQUEST["lampada"] ?? 'Apagar';
        if($lambada == 'Apagar'){
            $acaoLambada = '0';
            $imagemLambada = './img/lampada-apagada.jpg';
        }else if($lambada == 'Pisca'){
            $acaoLambada = '2';    
            $imagemLambada = './img/lampada-apagada.jpg';
            $imagemLambada = './img/lampada-acesa.jpg';
        }else{
            $acaoLambada = '1';
            $imagemLambada = './img/lampada-acesa.jpg';
        }
        fwrite($conecaoArduino,$acaoLambada); // onde vai escrever e o que quer escrever
        fclose($conecaoArduino); // fechar conexao
    ?>
    <!--
        -->
    <div>
        <h1>Acender e piscar</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">
            <img id="lambada" src="<?=$imagemLambada ?>" alt="Lambada">
            <div>
                <input type="submit" name="lampada" value="Acender">
                <input type="submit" name="lampada" value="Pisca">
                <input type="submit" name="lampada" value="Apagar">
            </div>
        </form>
    </div>
    <?php    
        $semaforo = $_REQUEST["semaforo"] ?? 'Ligar';
        if($semaforo == 'Ligar'){
            $acaoSemaforo = '1';
            echo "pedestre $acaoSemaforo";            
        }else if($semaforo == 'Pedestre'){
            $acaoSemaforo = '3';    
            echo "pedestre $acaoSemaforo";            
        }else{
            $acaoSemaforo = '0';
            echo "pedestre $acaoSemaforo";            
        }
        //if($arduino == 'Sim'){
        //    fwrite($conecaoArduino,$acaoSemaforo); // onde vai escrever e o que quer escrever
        //    fclose($conecaoArduino); // fechar conexao
        //}
        /* 
        criar redes externa
        1) acessar o modem dsl 192.168.1.1
        2) redirecionar uma rota para o endereço ip da pagina que você tem o arduino - nat virtual server
        3) acessar meuip.com.br
        */
    ?>
    <div>
        <h1>Semaforo</h1>
        <form action="<?= $_SERVER['PHP_SELF']?>" method="get">            <div>
                <input type="submit" name="semaforo" value="Ligar">
                <input type="submit" name="semaforo" value="Pedestre">
                <input type="submit" name="semaforo" value="Parar">
            </div>
        </form>
    </div>
</body>
</html>