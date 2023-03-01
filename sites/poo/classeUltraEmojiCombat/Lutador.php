<?php
class Lutador{
    private $nome;
    private $nascionalidade; 
    private $idade;
    private $altura;
    private $peso;
    private $categoria; 
    private $vitorias;
    private $empates;
    private $derrotas;

    public function getNome(){return $this->nome;}
    public function setNome($n){$this->nome = $n;}
    public function getNascionalidadeIdade(){return $this->nascionalidade;}
    public function setNascionalidadeIdade($ni){$this->nascionalidade = $ni;}
    public function getIdade(){return $this->idade;}
    public function setIdade($i){$this->idade = $i;}
    public function getAltura(){return $this->altura;}
    public function setAltura($a){$this->altura = $a;}
    public function getPeso(){return $this->peso;}
    public function setPeso($p){
        $this->peso = $p;
        $this->setCategoria();
    }
    public function getCategoria(){return $this->categoria;}
    private function setCategoria(){
        if($this->peso < 52.2){
            $this->categoria = "Inválido";
        }elseif($this->peso <= 70.3){
            $this->categoria = "Leve";
        }elseif($this->peso <= 83.9){
            $this->categoria = "Médio";
        }elseif($this->peso <= 120.2){
            $this->categoria = "Pesado";
        }else{
            $this->categoria = "Inválido";
        }
    }
    public function getVitorias(){return $this->vitorias;}
    public function setVitorias($v){$this->vitorias = $v;}
    public function getEmpates(){return $this->empates;}
    public function setEmpates($e){$this->empates = $e;}
    public function getDerrotas(){return $this->derrotas;}
    public function setDerrotas($d){$this->derrotas = $d;}
   

    public function __construct($no,$na,$id,$al,$pe,$vi,$de,$em){
        $this->setNome($no);
        $this->setNascionalidadeIdade($na);
        $this->setIdade($id);
        $this->setAltura($al);
        $this->setPeso($pe);
        $this->setVitorias($vi);
        $this->setDerrotas($de);
        $this->setEmpates($em);
    }

    public function apresentar(){
        echo "<p>--------------------------</p>";
        echo "<p>CHEGOU A HORA! O lutador " . $this->getNome()." veio diretamente de ".$this->getNascionalidadeIdade()." tem ".$this->getIdade()." anos ".$this->getAltura()." m de altura e pesando ".$this->getPeso()."Kg</p>";
        echo "<p>Ele tem ".$this->getVitorias()." vitórias ".$this->getDerrotas()." derrotas e ".$this->getEmpates()." empates</p>";
    }

    public function status(){
        echo "<p>-------------------</p>";
        echo "<p>".$this->getNome()." é um peso ".$this->getCategoria()." e já ganhou ".$this->getVitorias()." ".($this->getVitorias() <= 1 ? "vez":"vezes").". perdeu ".$this->getDerrotas()." ".($this->getDerrotas() <= 1 ? "vez":"vezes").". empatou ".$this->getEmpates()." ".($this->getEmpates() <= 1 ? "vez":"vezes")."!</p>";

    }

    public function ganharLuta(){
        $this->setVitorias($this->getVitorias()+1);
    }

    public function empatarLuta(){
        $this->setEmpates($this->getEmpates()+1);
    }

    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas()+1);
    }
}