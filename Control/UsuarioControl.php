<?php
    namespace Projeto\GamerMatch\Control;//conectar os arquivos
    require_once('../Model/Usuario.php');//acessar o conteudo do arquivo
    use Projeto\GamerMatch\Model\Usuario;//acessar e indicar a classe e seus metodos

    class Control{
        private Usuario $usuario;

        public function __construct(Usuario $usuario){
            $this->usuario = $usuario;//cadastrar usuario
        }//fim do contrutor

        //consultar
        public function consultarUsuario(): string
        {
            return "código: "                 .$this->usuario->codigo.
                   "<br>Nome Real:"           .$this->usuario->nomeReal.
                   "<br>nickName:"            .$this->usuario->nickName.
                   "<br>Data De Nascimento:"  .$this->usuario->dtDeNascimento.
                   "<br>Nacionalidade:"       .$this->usuario->nacionalidade.
                   "<br>Login:"               .$this->usuario->login.
                   "<br>Senha:"               .$this->usuario->senha.
                   "<br>Tipo de Usuário:"     .$this->usuario->tipo.
                   "<br>Equipe:"              .$this->usuario->equipe_codigo;
        }//fim do método

        public function atualizarNomeReal(string $nomeReal):string
        {
            $this->usuario->nomeReal = $nomeReal;
            return  "$nomeReal, atualizado com sucesso!";
        }// fim do nome Real

         public function atualizarNickName(string $nickName):string
        {
            $this->usuario->nickName = $nickName;
            return "$nickName, atualizado com sucesso!";
        }//fim do nickName

          public function atualizarDtDeNascimento(string $dtDeNascimento):string
        {
            $this->usuario->dtDeNascimento = $dtDeNascimento;
            return "$dtDeNascimento, atualizada com sucesso!";  
        }//fim do data de nascimento

           public function atualizarNacionalidade(string $nacionalidade):string
        {
            $this->usuario->nacionalidade = $nacionalidade;
            return "$nacionalidade, atualizada com sucesso!";  
        }//fim da nacionalidade

         public function atualizarLogin(string $login):string
        {
            $this->usuario->login = $login;
            return "$login, atualizado com sucesso!";  
        }//fim do login

         public function atualizarSenha(string $senha):string
        {
            $this->usuario->senha = $senha;
            return "$senha, atualizada com sucesso!";  
        }//fim da senha
        
        public function atualizarTipo(bool $tipo):string
        {
            $this->usuario->tipo = $tipo;
            return "$tipo, atualizada com sucesso!";  
        }//fim do tipo

             public function atualizarEquipe_codigo(int $equipe_codigo):string
        {
            $this->usuario->equipe_codigo = $equipe_codigo;
            return "$equipe_codigo, atualizada com sucesso!";  
        }//fim da equipe

          public function atualizarData(string $data):string
        {
                $this->usuario->data = $data;
                return "Data, atualizada com sucesso!";
        }//fim do Data

        public function excluir():int
        {
            $cod = $this->usuario->codigo; 
            $this->usuario->codigo                  = 0;
            $this->usuario->nomeReal                = "";
            $this->usuario->nickName                = "";
            $this->usuario->dtDeNascimento          = "";
            $this->usuario->nacionalidade           = "";
            $this->usuario->login                   = "";
            $this->usuario->senha                   = "";
            $this->usuario->tipo                    = "";
            $this->usuario->equipe_codigo           = "";
            return 1;
        }// fim do excluir

    }//fim da classe Control usuario
?>