<?php
abstract class Pessoa{
    protected $nome;
    protected $idade;
    protected $sexo;
    protected $experiencia;

    public function __construct($nome,$idade,$sexo){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->experiencia = 0;
    }

    public function getNome(){return $this->nome;}
    public function setNome($n){$this->nome = $n;}
    public function getIdade(){return $this->idade;}
    public function setIdade($i){$this->idade = $i;}
    public function getSexo(){return $this->sexo;}
    public function setSexo($s){$this->sexo = $s;}
    public function getExperiencia(){return $this->experiencia;}
    public function setExperiencia($e){$this->experiencia = $e;}
    

}