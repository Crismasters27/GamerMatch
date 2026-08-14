<?php
    namespace Projeto\GamerMatch\Control;//conectar os arquivos
    require_once('../Model/Equipe.php');//acessar o conteudo do arquivo
    use Projeto\GamerMatch\Model\Equipe;//acessar e indicar a classe e seus metodos

    class Control{
        private Equipe $equipe;

        public function __construct(Equipe $equipe){
            $this->equipe = $equipe;//cadastrar equipe
        }//fim do contrutor

        //consultar
        public function consultarEquipe(): string
        {
            return "código: "                 .$this->equipe->codigo.
                   "<br>Nome:"                .$this->equipe->nome.
                   "<br>Abreviação:"          .$this->equipe->abreviacao.
                   "<br>País:"                .$this->equipe->pais;
        }//fim do método

        public function atualizarEquipe(string $equipe):string
        {
            $this->equipe->equipe = $nome;
            return  "$nome, atualizado com sucesso!";
        }// fim do nome da equipe

         public function atualizarAbreviacao(string $abreviacao):string
        {
            $this->equipe->abreviacao = $abreviacao;
            return "$abrevicao, atualizada com sucesso!";
        }//fim da abreviação

          public function atualizarPais(string $pais):string
        {
            $this->equipe->pais = $pais;
            return "$pais, atualizado com sucesso!";  
        }//fim do país

          public function atualizarData(string $data):string
        {
                $this->equipe->data = $data;
                return "Data, atualizada com sucesso!";
        }//fim do Data

        public function excluir():int
        {
            $cod = $this->equipe->codigo; 
            $this->equipe->codigo             = 0;
            $this->equipe->nome               = "";
            $this->equipe->abreviacao         = "";
            $this->equipe->pais               = "";
            return 1;
        }// fim do excluir

    }//fim da classe Control equipe
?>