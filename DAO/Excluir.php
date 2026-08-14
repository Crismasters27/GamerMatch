<?php
    namespace Projeto\GamerMatch\DAO;
    require_once('Conexao.php');

    use Projeto\GamerMatch\DAO\Conexao;

    class Excluir
    {

        // =====================================================
        // EXCLUIR USUÁRIO
        // =====================================================

        function excluirUsuario(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "delete from usuario where codigo = '$codigo'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado)
                {
                    if(mysqli_affected_rows($conn) > 0)
                    {
                        mysqli_close($conn);
                        return "Excluido com sucesso!";
                    }
                    mysqli_close($conn);
                    return "Usuário não encontrado.";
                }
                mysqli_close($conn);
                return "Não foi possível excluir o usuário.";
            }
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do excluir usuario

        // =====================================================
        // EXCLUIR JOGO
        // =====================================================

        function excluirJogo(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "delete from jogo where codigo = '$codigo'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado)
                {
                    if(mysqli_affected_rows($conn) > 0)
                    {
                        mysqli_close($conn);

                        return "Excluido com sucesso!";
                    }
                    mysqli_close($conn);
                    return "Jogo não encontrado.";
                }
                mysqli_close($conn);
                return "Não foi possível excluir o jogo.";
            }
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do excluir jogo



        // =====================================================
        // EXCLUIR CAMPEONATO
        // =====================================================

        function excluirCampeonato(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "delete from campeonato where codigo = '$codigo'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado)
                {
                    if(mysqli_affected_rows($conn) > 0)
                    {
                        mysqli_close($conn);
                        return "Excluido com sucesso!";
                    }
                    mysqli_close($conn);
                    return "Campeonato não encontrado.";
                }
                mysqli_close($conn);
                return "Não foi possível excluir o campeonato.";
            }
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do excluir Campeonato



        // =====================================================
        // EXCLUIR PARTIDA
        // =====================================================

        function excluirPartida(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "delete from partida where codigo = '$codigo'";
                $resultado = mysqli_query($conn, $sql);
                if($resultado)
                {
                    if(mysqli_affected_rows($conn) > 0)
                    {
                        mysqli_close($conn);
                        return "Excluido com sucesso!";
                    }

                    mysqli_close($conn);

                    return "Partida não encontrada.";
                }

                mysqli_close($conn);
                return "Não foi possível excluir a partida.";
            }
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do excluir partida



        // =====================================================
        // EXCLUIR EQUIPE
        // =====================================================

        function excluirEquipe(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();

                $sql = "delete from equipe where codigo = '$codigo'";

                $resultado = mysqli_query($conn, $sql);

                if($resultado)
                {
                    if(mysqli_affected_rows($conn) > 0)
                    {
                        mysqli_close($conn);

                        return "Excluido com sucesso!";
                    }

                    mysqli_close($conn);

                    return "Equipe não encontrada.";
                }

                mysqli_close($conn);

                return "Não foi possível excluir a equipe.";
            }
            catch(Exception $erro)
            {
                echo $erro;
            }
        }//fim do excluir equipe


    }//fim do excluir
?>