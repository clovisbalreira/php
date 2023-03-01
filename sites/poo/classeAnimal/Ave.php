<?php 
require_once "Animal.php";
class Ave extends Animal{
    private $corPena;

    public function getCorPena(){return $this->corPena;}
    public function setCorPena($cp){$this->corPena = $cp; }

    public function locomover(){
        echo "<p>Voando</p>";
    }
    public function alimentar(){
        echo "<p>Comendo Frutas</p>";
    }
    public function emitirSom(){
        echo "<p>Som de ave</p>";
    }
    public function fazerLinho(){
        echo "<p>Construindo o ninho</p>";
    }
}