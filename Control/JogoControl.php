<?php
    namespace Projeto\GamerMatch\Control;//conectar os arquivos
    require_once('../Model/Jogo.php');//acessar o conteudo do arquivo
    use Projeto\GamerMatch\Model\Jogo;//acessar e indicar a classe e seus metodos

    class Control{
        private Jogo $jogo;

        public function __construct(Jogo $jogo){
            $this->jogo = $jogo;//cadastrar jogo
        }//fim do contrutor

        //consultar
        public function consultarJogo(): string
        {
            return "código: "                 .$this->jogo->codigo.
                   "<br>Nome:"                .$this->jogo->nome.
                   "<br>Desenvolvedora:"      .$this->jogo->desenvolvedora.
                   "<br>gênero:"              .$this->jogo->genero;
        }//fim do método

        public function atualizarNome(string $nome):string
        {
            $this->jogo->nome = $nome;
            return  "$nome, atualizado com sucesso!";
        }// fim do nome do jogo

         public function atualizarDesenvolvedora(string $desenvolvedora):string
        {
            $this->jogo->desenvolvedora = $desenvolvedora;
            return "$desenvolvedora, atualizada com sucesso!";
        }//fim da desenvolvedora

          public function atualizarGenero(string $genero):string
        {
            $this->jogo->genero = $genero;
            return "$genero, atualizado com sucesso!";  
        }//fim do gênero


          public function atualizarData(string $data):string
        {
                $this->jogo->data = $data;
                return "Data, atualizada com sucesso!";
        }//fim do Data

        public function excluir():int
        {
            $cod = $this->jogo->codigo; 
            $this->jogo->codigo             = 0;
            $this->jogo->nome               = "";
            $this->jogo->desenvolvedora     = "";
            $this->jogo->genero             = "";
            return 1;
        }// fim do excluir

    }//fim da classe Control jogo
?>