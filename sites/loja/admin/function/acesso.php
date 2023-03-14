<?php
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
?>