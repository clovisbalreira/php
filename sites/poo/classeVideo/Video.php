<?php
require_once "AcoesVideo.php";
class Video implements AcoesVideo{
    private $titulo;
    private $avaliacao;
    private $views;
    private $curtidas;
    private $reproduzindo;

    public function __construct($titulo){
        $this->setTitulo($titulo);
        $this->avaliacao = 0;
        $this->views = 0;
        $this->curtidas = 0;
        $this->reproduzindo = false;
    }

    public function getTitulo(){return $this->titulo;}
    public function setTitulo($t){$this->titulo = $t;}
    public function getAvaliacao(){return $this->avaliacao;}
    public function setAvaliacao($a){
        $media = ($this->avaliacao + $a) / $this->views;
        $this->avaliacao = number_format($media,2);
    }
    public function getViews(){return $this->views;}
    public function setViews($v){$this->views = $v;}
    public function getCurtidas(){return $this->curtidas;}
    public function setCurtidas($c){
        $this->curtidas = $this->getCurtidas() + $c;}
    public function getReproduzindo(){return $this->reproduzindo;}
    public function setReproduzindo($r){$this->reproduzindo = $r;}

    public function play(){
        $this->reproduzindo = true;
    }
    
    public function pause(){
        $this->reproduzindo = false;
    }
    
    public function like(){
        $this->curtidas++;
    }
}