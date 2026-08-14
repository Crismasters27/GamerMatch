<?php 
    namespace Projeto\GamerMatch\Model;

    class Partida{
        //Encapsulamento : definir as variaveis como privete
        private int         $codigo;
        private string      $resultado;
        private string      $statuss;
        private int         $campeonato_codigo;

        //primeira coisa: Criar um Construtor
        public function __construct(int $codigo, string $resultado, string $statuss, int $campeonato_codigo)
        {
            $this->codigo             = $codigo;
            $this->resultado          = $resultado;
            $this->statuss            = $statuss;
            $this->campeonato_codigo  = $campeonato_codigo;

        }//fim do construtor ->CADASTRAR
        //GET
        public function __get(string $dados):mixed
        {
            return $this->$dados;
        }//fim do get

        //SET
         public function __set(string $variavel, string $novoDado):void
        {
            $this->$variavel =$novoDado;
        }//fim do set

    }//fim da classe 

?>