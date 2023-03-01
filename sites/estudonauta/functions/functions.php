<?php
    function thumb($arq){
        $caminho = "fotos/$arq";
        if(is_null($arq) || !file_exists($caminho)){
            return 'fotos/indisponivel.png';
        }else{
            return $caminho;
        }
    }

    function dataFormatada(){
        $diaSemana = date('D');
        switch($diaSemana){
            case 'Sun': $diaSemana = 'Domingo'; break;
            case 'Mon': $diaSemana = 'Segunda-feira'; break;
            case 'Tue': $diaSemana = 'Terça-feira'; break;
            case 'Wed': $diaSemana = 'Quarta-feira'; break;
            case 'Thu': $diaSemana = 'Quinta-feira'; break;
            case 'Fri': $diaSemana = 'Sexta-feira'; break;
            case 'Sat': $diaSemana = 'Sábado'; break;
            default: $diaSemana = 'Hoje';
        }
        $mes = date('M');
        switch($mes){
            case 'Jan': $mes = 'Janeiro'; break;
            case 'Feb': $mes = 'Fevereiro'; break;
            case 'Mar': $mes = 'Março'; break;
            case 'Apr': $mes = 'Abril'; break;
            case 'May': $mes = 'Maio'; break;
            case 'Jun': $mes = 'Junho'; break;
            case 'Jul': $mes = 'Julho'; break;
            case 'Aug': $mes = 'Agosto'; break;
            case 'Sep': $mes = 'Setembro'; break;
            case 'Oct': $mes = 'Outubro'; break;
            case 'Nov': $mes = 'Novembro'; break;
            case 'Dec': $mes = 'Dezembro'; break;
            default : $mes = $mes;
        }
        return $diaSemana." - ".date('d')." de ".$mes." de ".date('Y');
    }

    function voltar(){
        return "<a href='index.php'><i class='material-icons'>
        arrow_back
        </i></a>";
    }

    function msg_sucesso($m){ 
        $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i>$m</div>";
        return $resp;
    }
    function msg_aviso($m){
        $resp = "<div class='aviso'><i class='material-icons'>info</i>$m</div>";
        return $resp;
        
    }
    function msg_erro($m){
        $resp = "<div class='erro'><i class='material-icons'>error</i>$m</div>";
        return $resp;

    }

    function is_logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }

    function is_logado(){
        if(empty($_SESSION['use'])){
            return false;
        }else{
            return true;
        }
    }

    function is_admin(){
        $tipo = $_SESSION['tipo'] ?? null;
        if(is_null($tipo)){
            return false;
        }else{
            if($tipo == 'admin'){
                return true;
            }else{
                return false;
            }
        }
    }

    function is_editor(){
        $tipo = $_SESSION['tipo'] ?? null;
        if(is_null($tipo)){
            return false;
        }else{
            if($tipo == 'editor'){
                return true;
            }else{
                return false;
            }
        }
    }
