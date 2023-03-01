<?php
require_once "Aluno.php";
class Tecnico extends Aluno{
    private $registroProfissional;

    public function praticar(){
        echo "<p>". $this->nome ." está no estágio</p>";
    }

    public function getRegistroProfissional(){
        return $this->registroProfissional;
    }

    public function setRegistroProfissional($rp){
        $this->registroProfissional = $rp;
    }

}