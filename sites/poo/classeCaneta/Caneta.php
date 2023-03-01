<?php

class Caneta{
    public $modelo;
    public $cor;
    private $ponta;
    protected $carga;
    protected $tampada;

    public function getModelo(){return $this->modelo;}
    public function setModelo($m){$this->modelo = $m; }
    public function getCor(){return $this->cor;}
    public function setCor($c){$this->cor = $c;}
    public function getPonta(){return $this->ponta;}
    public function setPonta($p){$this->ponta = $p;}
    public function getCarga(){return $this->carga;}
    public function setCarga($c){$this->carga = $c;}
    public function getTampada(){return $this->tampada;}
    public function setTampada($t){$this->tampada = $t;}

    public function __construct($m,$c,$p){
        $this->setmodelo($m);
        $this->setCor($c);
        $this->setPonta($p);
        $this->setCarga(100);
        $this->tampar();
    }

    public function mostrar(){
        if($this->getModelo() != ''){
            echo "<p>Modelo: ".$this->getModelo()."</p>";
        }  
        if($this->getCor() != ''){      
            echo "<p>Cor: ".$this->getCor()."</p>";
        }  
        if($this->getPonta() != ''){
            echo "<p>Ponta: ".$this->getPonta()."</p>";
        }  
        if($this->getCarga() != ''){
            echo "<p>Carga: ".$this->getCarga()."</p>";
        }  
        if($this->getTampada() != ''){
            echo "<p>Tambada: ".($this->getTampada() ? "Sim" : "Não")."</p>";
        }  
    }
      

    public function rabiscar(){
        if($this->tampada == true){
            echo "<p>Caneta esta tampada!</p>";
        }else{
            echo "<p>Estou rabiscando</p>";
        }
    }

    public function tampar(){
        $this->tampada = true;
    }
    
    public function destampar(){
        $this->tampada = false;
    }
}