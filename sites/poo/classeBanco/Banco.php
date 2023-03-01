<?php

class Banco{
    public $numeroConta;   
    public $tipo;   
    public $dono;   
    public $saldo;   
    public $status;   

    public function getNumeroConta(){return $this->numeroConta;}
    public function setNumeroConta($n){$this->numeroConta = $n; }
    public function getTipo(){return $this->tipo;}
    public function setTipo($t){$this->tipo = $t; }
    public function getDono(){return $this->dono;}
    public function setDono($d){$this->dono = $d; }
    public function getSaldo(){return $this->saldo;}
    public function setSaldo($s){$this->saldo = $s; }
    public function getStatus(){return $this->status;}
    public function setStatus($s){$this->status = $s; }

    function __construct(){
        $this->setSaldo(0);
        $this->setStatus(false);        
    }

    public function mostrar(){
        if($this->getNumeroConta() != ''){
            echo "<p>Numero Conta: ".$this->getNumeroConta()."</p>";
        }  
        if($this->getTipo() != ''){      
            echo "<p>Numero Tipo: ".$this->getTipo()."</p>";
        }  
        if($this->getDono() != ''){
            echo "<p>Numero Dono: ".$this->getDono()."</p>";
        }  
        if($this->getSaldo() != ''){
            echo "<p>Numero Saldo: R$ ".$this->getSaldo()."</p>";
        }  
        if($this->getStatus() != ''){
            echo "<p>Numero Status: ".($this->getStatus()? "Aberta":"Fechada")."</p>";
        }  
        echo "--------------------------------";
    }

    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if($t == 'cc'){
            $this->setSaldo(50);
        }elseif($t == 'cp'){
            $this->setSaldo(150);
        }
    }

    public function fecharConta(){
        if($this->getSaldo() > 0){
            echo "<p>Conta ainda tem dinheiro não posso fechá-la ". $this->getDono() ."</p>";
        }elseif($this->getSaldo() < 0){
            echo "<p>Conta está em debito! impossivel encerrar ". $this->getDono() ."</p>";
        }else{
            $this->setStatus(false);
            echo "<p>Conta fechada ". $this->getDono() ."</p>";
        }
    }

    public function depositar($v){
        if($this->getStatus()){
            $this->setSaldo($this->getSaldo() + $v);
        }else{
            echo "Conta fechada não consigo depositar";
        }
    }

    public function sacar($v){
        if($this->getStatus()){
            if($this->getSaldo() >= $v){
                $this->setSaldo($this->getSaldo() - $v);
            }else{
                echo "<p>Saldo insuficiente para saque</p>";
            }
        }else{
            echo "<p>Não posso sacar em um conta fechada</p>";
        }
    }

    public function pagarMensalidade(){
        if($this->getTipo() == 'cc'){
            $v = 12;
        }elseif($this->getTipo() == 'cp'){
            $v = 20;
        }
        if($this->getStatus()){
            $this->setSaldo($this->getSaldo() - $v);
        }else{
            echo '<p>Problemas com a conta. Não posso cobrar</p>';
        }
    }    
}
