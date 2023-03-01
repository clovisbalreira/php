<?php
require_once "Aluno.php";
class Bolsista extends Aluno{
    private $bolsa;

    public function renovarBolsa(){
        echo "<p>Renovando bolsa</p>";
    }

    public function pagarMensalidade(){
        echo "<p>". $this->nome ." é bolsista paga com desconto </p>";
    }

    public function getBolsa(){
        return $this->bolsa;
    }

    public function setBolsa($b){
        $this->bolsa = $b;
    }

}