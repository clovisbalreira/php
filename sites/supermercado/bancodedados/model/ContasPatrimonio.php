<?php
    class ContasPatrimonio{
        private $codigo;
        private $nome;
        private $diaPagamento;
        private $tipoPagamento;
        private $valor;
        private $tipo;

        function __construct($codigo, $nome, $diaPagamento, $tipoPagamento, $valor, $tipo){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->diaPagamento = $diaPagamento;
            $this->tipoPagamento = $tipoPagamento;
            $this->valor = $valor;       
            $this->tipo = $tipo;       
        }

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        public function getValor()
        {
                return $this->valor;
        }

        public function setValor($valor)
        {
                $this->valor = $valor;

                return $this;
        }

        /**
         * Get the value of tipo
         */ 
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */ 
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        /**
         * Get the value of diaPagamento
         */ 
        public function getDiaPagamento()
        {
                return $this->diaPagamento;
        }

        /**
         * Set the value of diaPagamento
         *
         * @return  self
         */ 
        public function setDiaPagamento($diaPagamento)
        {
                $this->diaPagamento = $diaPagamento;

                return $this;
        }

        /**
         * Get the value of tipoPagamento
         */ 
        public function getTipoPagamento()
        {
                return $this->tipoPagamento;
        }

        /**
         * Set the value of tipoPagamento
         *
         * @return  self
         */ 
        public function setTipoPagamento($tipoPagamento)
        {
                $this->tipoPagamento = $tipoPagamento;

                return $this;
        }
    }
?>