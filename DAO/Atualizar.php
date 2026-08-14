<?php
    namespace Projeto\GamerMatch\DAO;
    require_once('Conexao.php');
    use Projeto\GamerMatch\DAO\Conexao;

    class atualizar
    {
        function atualizarUsuario(Conexao $conexao, int $codigo, string $campo, string $dado)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "update usuario set $campo = '$dado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql); 
                //fechar comando
                mysqli_close($conn);
                if($result)
                {
                    return "<br><br>Atulizado com sucesso!";
                }
                return "<br><br> Não atualizado";
            }    
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do atualizar usuario


         function atualizarJogo(Conexao $conexao, int $codigo, string $campo, string $dado)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "update jogo set $campo = '$dado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql); 
                //fechar comando
                mysqli_close($conn);
                if($result)
                {
                    return "<br><br>Atulizado com sucesso!";
                }
                return "<br><br> Não atualizado";
            }    
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do atualizar jogo


         function atualizarCampeonato(Conexao $conexao, int $codigo, string $campo, string $dado)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "update campeonato set $campo = '$dado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql); 
                //fechar comando
                mysqli_close($conn);
                if($result)
                {
                    return "<br><br>Atulizado com sucesso!";
                }
                return "<br><br> Não atualizado";
            }    
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do atualizar campeonato


         function atualizarPartida(Conexao $conexao, int $codigo, string $campo, string $dado)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "update partida set $campo = '$dado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql); 
                //fechar comando
                mysqli_close($conn);
                if($result)
                {
                    return "<br><br>Atulizado com sucesso!";
                }
                return "<br><br> Não atualizado";
            }    
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do atualizar partida


         function atualizarEquipe(Conexao $conexao, int $codigo, string $campo, string $dado)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "update equipe set $campo = '$dado' where codigo = '$codigo'";
                $result = mysqli_query($conn, $sql); 
                //fechar comando
                mysqli_close($conn);
                if($result)
                {
                    return "<br><br>Atulizado com sucesso!";
                }
                return "<br><br> Não atualizado";
            }    
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do atualizar equipe

        
    }//fim do atualizar

?>    