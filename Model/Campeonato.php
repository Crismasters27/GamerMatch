<?php 
    namespace Projeto\GamerMatch\Model;

    class Campeonato{
        //Encapsulamento : definir as variaveis como privete
        private int         $codigo;
        private string      $nomeDoCampeonato;
        private string      $dataInicio;
        private string      $dataFim;
        private float     $premio;
        private int         $jogo_codigo;

        //primeira coisa: Criar um Construtor
        public function __construct(int $codigo, string $nomeDoCampeonato, string $dataInicio, string $dataFim, float $premio, int $jogo_codigo)
        {
            $this->codigo            = $codigo;
            $this->nomeDoCampeonato  = $nomeDoCampeonato;
            $this->dataInicio        = $dataInicio;
            $this->dataFim           = $dataFim;
            $this->premio            = $premio;
            $this->jogo_codigo       = $jogo_codigo;

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