<?php 
    namespace Projeto\GamerMatch\Model;

    class Usuario{
        //Encapsulamento : definir as variaveis como privete
        private int         $codigo;
        private string      $nomeReal;
        private string      $nickName;
        private string      $dtDeNascimeto;
        private string      $nacionalidade;
        private string      $login;
        private string      $senha;
        private bool        $tipo;
        private int         $equipe_codigo;

        //primeira coisa: Criar um Construtor
        public function __construct(int $codigo, string $nomeReal, string $nickName, string $dtDeNascimeto, string $nacionalidade, string $login, string $senha, bool $tipo, int $equipe_codigo)
        {
            $this->codigo           = $codigo;
            $this->nomeReal         = $nomeReal;
            $this->nickName         = $nickName;
            $this->dtDeNascimento   = $dtDeNascimeto;
            $this->nacionalidade    = $nacionalidade;
            $this->login            = $login;
            $this->senha            = $senha;
            $this->tipo             = $tipo;
            $this->equipe_codigo    = $equipe_codigo;

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