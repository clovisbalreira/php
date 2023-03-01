<?php
require_once "Animal.php";
class Mamifero extends Animal {
    protected $corPelo;

    public function getCorPelo(){return $this->corPelo;}
    public function setCorPelo($cp){$this->corPelo = $cp; }

    public function emitirSom(){
        echo "<p>Som de mamifero</p>";
    }

    function locomover(){}
    function alimentar(){}
}