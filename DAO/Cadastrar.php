<?php
    namespace Projeto\GamerMatch\DAO;
    require_once('Conexao.php');
    use Projeto\GamerMatch\DAO\Conexao;

    class cadastrar
    {
        public function cadastrarUsuario(Conexao $conexao, string $nomeReal, string $nickName, string $dtDeNascimento, string $nacionalidade, string $login, string $senha, bool $tipo, int $equipe_codigo)
        {
            try
            {
                $conn    = $conexao->conectar();//Abre conexão
                $sql     = "insert into usuario(codigo, nomeReal, nickName, dtDeNascimento, nacionalidade, login, senha, tipo, equipe_codigo)
                            values('','$nomeReal','$nickName','$dtDeNascimento','$nacionalidade','$login','$senha','$tipo','$equipe_codigo')";
                $result  = mysqli_query($conn,$sql); // executando o comando criando
                //fechar comando
                mysqli_close($conn);
                //verrificando se inserio ou não
                if($result)
                {
                    return "<br><br> Inserido com sucesso!";
                }
                    return "<br><br> Não Inseriodo!";
            }
            catch(Exception $erro)
            {
                return "<br><br>Impossível cadastrar usuario!!! <br><br> $erro";
            }//fim do catch

        }//fim do cadastrar usuario

        public function cadastrarJogo(Conexao $conexao, string $nome, string $desenvolvedora, string $genero,)
        {
            try
            {
                $conn    = $conexao->conectar();//Abre conexão
                $sql     = "insert into jogo(codigo, nome, desenvolvedora, genero)
                            values('','$nome','$desenvolvedora','$genero')";
                $result  = mysqli_query($conn,$sql); // executando o comando criando
                //fechar comando
                mysqli_close($conn);
                //verrificando se inserio ou não
                if($result)
                {
                    return "<br><br> Inserido com sucesso!";
                }
                    return "<br><br> Não Inseriodo!";
            }
            catch(Exception $erro)
            {
                return "<br><br>Impossível cadastrar jogo!!! <br><br> $erro";
            }//fim do catch

        }//fim do cadastrar jogo

         public function cadastrarCampeonato(Conexao $conexao, string $nomeDoCampeonato, string  $dataInicio, string  $dataFim, float $premio, int $jogo_codigo)
        {
            try
            {
                $conn    = $conexao->conectar();//Abre conexão
                $sql     = "insert into campeonato(codigo, nomeDoCampeonato, dataInicio, dataFim, premio, jogo_codigo)
                            values('','$nomeDoCampeonato','$dataInicio','$dataFim','$premio','$jogo_codigo')";
                $result  = mysqli_query($conn,$sql); // executando o comando criando
                //fechar comando
                mysqli_close($conn);
                //verrificando se inserio ou não
                if($result)
                {
                    return "<br><br> Inserido com sucesso!";
                }
                    return "<br><br> Não Inseriodo!";
            }
            catch(Exception $erro)
            {
                return "<br><br>Impossível cadastrar Campeonato!!! <br><br> $erro";
            }//fim do catch

        }//fim do cadastrar campenato

        
         public function cadastrarPartida(Conexao $conexao, string $resultado, string $statuss, int $campeonato_codigo)
        {
            try
            {
                $conn    = $conexao->conectar();//Abre conexão
                $sql     = "insert into Partida(codigo, resultado, statuss, campeonato_codigo)
                            values('','$resultado','$statuss','$campeonato_codigo')";
                $result  = mysqli_query($conn,$sql); // executando o comando criando
                //fechar comando
                mysqli_close($conn);
                //verrificando se inserio ou não
                if($result)
                {
                    return "<br><br> Inserido com sucesso!";
                }
                    return "<br><br> Não Inseriodo!";
            }
            catch(Exception $erro)
            {
                return "<br><br>Impossível cadastrar Partida!!! <br><br> $erro";
            }//fim do catch

        }//fim do cadastrar partida


        public function cadastrarEquipe(Conexao $conexao, string $nome, string $abreviacao, string $pais)
        {
            try
            {
                $conn    = $conexao->conectar();//Abre conexão
                $sql     = "insert into equipe(codigo, nome, abreviacao, pais)
                            values('','$nome','$abreviacao','$pais')";
                $result  = mysqli_query($conn,$sql); // executando o comando criando
                //fechar comando
                mysqli_close($conn);
                //verrificando se inserio ou não
                if($result)
                {
                    return "<br><br> Inserido com sucesso!";
                }
                    return "<br><br> Não Inseriodo!";
            }
            catch(Exception $erro)
            {
                return "<br><br>Impossível cadastrar equipe!!! <br><br> $erro";
            }//fim do catch

        }//fim do cadastrar equipe


    }//fim do cadastrar

?>