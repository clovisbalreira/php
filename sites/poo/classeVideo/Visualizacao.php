<?php
require_once "Gafanhoto.php";
require_once "Video.php";

class Visualizacao{
    private $espectador;
    private $filme;

    public function __construct($espectador, $filme){
        $this->espectador = $espectador;
        $this->filme = $filme;
        $this->filme->setViews($this->filme->getViews()+1);
        $this->espectador->setTotAssistido($this->espectador->getTotAssistido()+1);
    }
    public function getEspectador(){return $this->espectador;}
    public function setEspectador($e){$this->espectador = $e;}
    public function getFilme(){return $this->filme;}
    public function setFilme($f){$this->filme = $f;}

    public function avaliar(){
        $this->filme->setAvaliacao(5);
    }
    public function avaliarNota($nota){
        $this->filme->setAvaliacao($nota);
    }
    public function avaliarPorcentagem($porc){
        $nota = 0;
        if($porc < 20){
            $nota = 3;
        }elseif($porc <= 50){
            $nota = 5;
        }elseif($porc <= 80){
            $nota = 8;
        }else{
            $nota = 10;
        }
        $this->filme->setAvaliacao($nota);
    }
    
}