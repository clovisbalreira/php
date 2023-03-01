<?php
require_once 'Publicacao.php';
class Livro implements Publicacao{
    private $titulo;
    private $autor;
    private $totPagina;
    private $pagAtual;
    private $aberto;
    private $leitor;

    public function getTitulo(){return $this->titulo;}
    public function setTitulo($t){$this->titulo = $t;}
    public function getAutor(){return $this->autor;}
    public function setAutor($a){$this->autor = $a;}
    public function getTotPagina(){return $this->totPagina;}
    public function setTotPagina($tp){$this->totPagina = $tp;}
    public function getPagAtual(){return $this->pagAtual;}
    public function setPagAtual($pa){$this->pagAtual = $pa;}
    public function getAberto(){return $this->aberto;}
    public function setAberto($a){$this->aberto = $a;}
    public function getLeitor(){return $this->leitor;}
    public function setLeitor($l){$this->leitor = $l;}

    public function __construct($t,$a,$tp,$l){
        $this->setTitulo($t);
        $this->setAutor($a);
        $this->setTotPagina($tp);
        $this->setAberto(false);
        $this->setPagAtual(0);
        $this->setLeitor($l);
    }

    public function detalhes(){
        echo "<p>Livro ". $this->titulo . " escrito por " . $this->autor . "</p>";
        echo "<p>Páginas: ". $this->totPagina . " atual " . $this->pagAtual . "</p>";
        echo "<p>Sendo lido por ". $this->leitor->getNome() . "</p>";
    }

    public function abrir(){
        $this->aberto = true;
    }
    
    public function fechar(){
        $this->aberto = false;
    }

    public function folhear($f){
        if($f > $this->totPagina){
            $this->pagAtual = 0;
        }else{
            $this->pagAtual = $f;
        }
    }

    public function avancarPag(){
        $this->pagAtual ++;
    }
    
    public function voltarPag(){
        $this->pagAtual --;
    }
}