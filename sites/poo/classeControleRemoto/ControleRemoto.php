<?php
require_once 'Controlador.php';
class ControleRemoto implements Controlador{
    private $volume;
    private $ligado;
    private $tocando;

    private function getVolume(){return $this->volume;}
    private function setVolume($v){$this->volume = $v;}
    private function getLigado(){return $this->ligado;}
    private function setLigado($l){$this->ligado = $l;}
    private function getTocando(){return $this->tocando;}
    private function setTocando($t){$this->tocando = $t;}

    public function __construct(){
        $this->setVolume(50);
        $this->setLigado(false);
        $this->setTocando(false);
    }

    public function ligar(){
        $this->setLigado(true);
    }

    public function desligar(){
        $this->setLigado(false);
        $this->setTocando(false);
        $this->setVolume(0);
    }

    public function abrirMenu(){
        echo "<p>Está ligado?: ". ($this->getLigado() ? "Sim" : "Não"). "</p>";
        echo "<p>Está tocando?: " .($this->getTocando() ? "Sim" : "Não"). "</p>";
        echo "<p>Está volume?: ". ($this->getVolume()) . " ";
        for($i=0; $i <= $this->getVolume(); $i+=10){
            if($this->getVolume() == 0){
                break;
            }
            echo "|";
        }
        echo "</p>";
    }

    public function fecharMenu(){
        echo "Fechando Menu...";
    }

    public function maisVolume(){
        if($this->getLigado()){
            $this->setVolume($this->getVolume() + 5);
        }
    }

    public function menosVolume(){
        if($this->getLigado()){
            $this->setVolume($this->getVolume() - 5);
        }
    }

    public function ligarMudo(){
        if($this->getLigado() && $this->getVolume() > 0){
            $this->setVolume(0);
        }
    }

    public function desligarMudo(){
        if($this->getLigado() && $this->getVolume() == 0){
            $this->setVolume(50);
        }
    }

    public function play(){
        if($this->getLigado() && !($this->getTocando())){
            $this->setTocando(true);
        }
    }

    public function pause(){
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
    } 
}