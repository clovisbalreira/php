<?php
    class Acesso{
        private $codigo;
        private $nome;
        private $senha;

        function __construct($codigo, $nome, $senha){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->senha = $senha;
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

        public function getSenha()
        {
                return $this->senha;
        }

        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

    }
?>