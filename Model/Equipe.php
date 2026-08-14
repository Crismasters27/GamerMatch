<?php 
    namespace Projeto\GamerMatch\Model;

    class Equipe{
        //Encapsulamento : definir as variaveis como privete
        private int         $codigo;
        private string      $nome;
        private string      $abreviacao;
        private string      $pais;

        //primeira coisa: Criar um Construtor
        public function __construct(int $codigo, string $nome, string $abreviacao, string $pais)
        {
            $this->codigo           = $codigo;
            $this->nome             = $nome;
            $this->abreviacao       = $abreviacao;
            $this->pais             = $pais;

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