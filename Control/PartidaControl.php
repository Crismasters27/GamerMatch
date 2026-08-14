<?php
    namespace Projeto\GamerMatch\Control;//conectar os arquivos
    require_once('../Model/Partida.php');//acessar o conteudo do arquivo
    use Projeto\GamerMatch\Model\Partida;//acessar e indicar a classe e seus metodos

    class Control{
        private Partida $partida;

        public function __construct(Partida $partida){
            $this->partida = $partida;//cadastrar partida
        }//fim do contrutor

        //consultar
        public function consultarPartida(): string
        {
            return "código: "                 .$this->partida->codigo.
                   "<br>Resultado:"           .$this->partida->resultado.
                   "<br>Status:"              .$this->partida->statuss.
                   "<br>Campeonato:"          .$this->partida->campeonato_codigo;
        }//fim do método

        public function atualizarResultado(string $resultado):string
        {
            $this->partida->resultado = $resultado;
            return  "$resultado, atualizado com sucesso!";
        }// fim do resultado

         public function atualizarStatus(string $statuss):string
        {
            $this->partida->statuss = $statuss;
            return "$statuss, atualizado com sucesso!";
        }//fim do status

          public function atualizarCampeonato_codigo(int $campeonato_codigo):string
        {
            $this->partida->campeonato_codigo = $campeonato_codigo;
            return "$campeonato_codigo, atualizado com sucesso!";  
        }//fim do campeonato_codigo


          public function atualizarData(string $data):string
        {
                $this->partida->data = $data;
                return "Data, atualizada com sucesso!";
        }//fim do Data

        public function excluir():int
        {
            $cod = $this->partida->codigo; 
            $this->partida->codigo             = 0;
            $this->partida->resultado          = "";
            $this->partida->statuss            = "";
            $this->partida->genero_codigo      = "";
            return 1;
        }// fim do excluir

    }//fim da classe Control partida
?>