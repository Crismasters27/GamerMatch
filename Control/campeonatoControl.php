<?php
    namespace Projeto\GamerMatch\Control;//conectar os arquivos
    require_once('../Model/Campeonato.php');//acessar o conteudo do arquivo
    use Projeto\GamerMatch\Model\Campeonato;//acessar e indicar a classe e seus metodos

    class Control{
        private Campeonato $campeonato;

        public function __construct(Campeonato $campeonato){
            $this->campeonato = $campeonato;//cadastrar campeonato
        }//fim do contrutor

        //consultar
        public function consultarCampeonato(): string
        {
            return "código: "                   .$this->campeonato->codigo.
                   "<br>Nome do Campeonato:"    .$this->campeonato->nomeDoCampeonato.
                   "<br>Data de Inicio:"        .$this->campeonato->dataInicio.
                   "<br>Data de Encerramento:"  .$this->campeonato->dataFim;
                   "<br>Prémio:"                .$this->campeonato->premio;
                   "<br>Jogo:"                  .$this->campeonato->jogo_codigo;
        }//fim do método

        public function atualizarNomeDoCampeonato(string $nomeDoCampeonato):string
        {
            $this->campeonato->nomeDoCampeonato = $nomeDoCampeonato;
            return  "$nomeDoCampenato, atualizado com sucesso!";
        }// fim do nome do campeonato

         public function atualizarDataInicio(string  $dataInicio):string
        {
            $this->campeonato->dataInicio = $dataInicio;
            return "$dataInicio, atualizada com sucesso!";
        }//fim da data de inicio

          public function atualizarDataFim(string  $dataFim):string
        {
            $this->jogo->dataFim = $dataFim;
            return "$dataFim, atualizado com sucesso!";  
        }//fim da data de fim

        public function atualizarPremio(float $premio):string
        {
            $this->Campeonato->premio = $premio;
            return "$premio, atualizado com sucesso!";  
        }//fim do premio

          public function atualizarData(string $data):string
        {
                $this->campeonato->data = $data;
                return "Data, atualizada com sucesso!";
        }//fim do Data

        public function excluir():int
        {
            $cod = $this->campeonato->codigo; 
            $this->campeonato->codigo             = 0;
            $this->campeonato->nomeDoCampeonato   = "";
            $this->campeonato->dataInicio         = "";
            $this->campeonato->dataFIm            = "";
            $this->campeonato->premio             = "";
            return 1;
        }// fim do excluir

    }//fim da classe Control campeonato
?>