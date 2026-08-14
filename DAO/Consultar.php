<?php
    namespace Projeto\GamerMatch\DAO;
    require_once('Conexao.php');
    use Projeto\GamerMatch\DAO\Conexao;

    class Consultar
    {
        function consultarUsuario(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "select * from usuario where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);

                while($dados = mysqli_fetch_Array($result))
                {
                    if($dados['codigo'] == $codigo)
                    {
                        return '<br>Código: '.$dados['codigo'].
                               '<br>Nome Real: '.$dados['nomeReal'].
                               '<br>Nick Name: '.$dados['nickName']. 
                               '<br>Data de Nascimento: '.$dados['dtDeNascimento']. 
                               '<br>Nacionalidade: '.$dados['nacionalidade'].
                               '<br>Tipo de Usuário: '.$dados['tipo'].
                               '<br>Equipe: '.$dados['equipe_codigo'];
                    }
                }
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
            }
        }//fim do consultar usuário


        function consultarEquipe(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "select * from equipe where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);

                while($dados = mysqli_fetch_Array($result))
                {
                    if($dados['codigo'] == $codigo)
                    {
                        return '<br>Código: '.$dados['codigo'].
                               '<br>Nome da Equipe: '.$dados['nome'].
                               '<br>Abreviação: '.$dados['abreviacao']. 
                               '<br>País: '.$dados['pais']; 
                    }
                }
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
            }
        }//fim do consultar equipe


        function consultarPartida(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "select * from partida where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);

                while($dados = mysqli_fetch_Array($result))
                {
                    if($dados['codigo'] == $codigo)
                    {
                        return '<br>Código: '.$dados['codigo'].
                               '<br>Resultado: '.$dados['resultado'].
                               '<br>Status da Partida: '.$dados['statuss']. 
                               '<br>Campeonato: '.$dados['campeonato_codigo']; 
                    }
                }
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
            }
        }//fim do consultar partida


        function consultarCampeonato(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "select * from campeonato where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);

                while($dados = mysqli_fetch_Array($result))
                {
                    if($dados['codigo'] == $codigo)
                    {
                        return '<br>Código: '.$dados['codigo'].
                               '<br>Nome do Campeonato: '.$dados['nomeDoCampeonato'].
                               '<br>Data de Inicio: '.$dados['dataInicio']. 
                               '<br>Data de Encerramento: '.$dados['dataFim'].
                               '<br>Prémio: '.$dados['premio']. 
                               '<br>Jogo: '.$dados['jogo_codigo']; 
                    }
                }
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
            }
        }//fim do consultar campeonato


        function consultarJogo(Conexao $conexao, int $codigo)
        {
            try
            {
                $conn = $conexao->conectar();//abre conexão
                $sql  = "select * from jogo where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);

                while($dados = mysqli_fetch_Array($result))
                {
                    if($dados['codigo'] == $codigo)
                    {
                        return '<br>Código: '.$dados['codigo'].
                               '<br>Nome do Jogo: '.$dados['nome'].
                               '<br>Desenvolvedora: '.$dados['desenvolvedora']. 
                               '<br>Gênero: '.$dados['genero'];
                    }
                }
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
            }
        }//fim do consultar jogo
    
        //CONSULTAS PARA A PÁGINA INICIAL

        public function listarCampeonatos(Conexao $conexao)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "SELECT campeonato.codigo, campeonato.nomeDoCampeonato, campeonato.dataInicio, campeonato.dataFim, campeonato.premio, jogo.nome AS nomeJogo FROM campeonato INNER JOIN jogo ON campeonato.jogo_codigo = jogo.codigo ORDER BY campeonato.dataInicio ASC";
                $result = mysqli_query($conn, $sql);
                $campeonatos = [];
                while($dados = mysqli_fetch_assoc($result))
                {
                    $campeonatos[] = $dados;
                }

                return $campeonatos;
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
                return [];
            }
        }


        public function listarJogos(Conexao $conexao)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "SELECT * FROM jogo ORDER BY nome ASC";
                $result = mysqli_query($conn, $sql);
                $jogos = [];
                while($dados = mysqli_fetch_assoc($result))
                {
                    $jogos[] = $dados;
                }
                return $jogos;
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
                return [];
            }
        }


        public function listarEquipes(Conexao $conexao)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "SELECT * FROM equipe ORDER BY nome ASC";
                $result = mysqli_query($conn, $sql);
                $equipes = [];
                while($dados = mysqli_fetch_assoc($result))
                {
                    $equipes[] = $dados;
                }

                return $equipes;
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
                return [];
            }
        }


        public function listarPartidas(Conexao $conexao)
        {
            try
            {
                $conn = $conexao->conectar();
                $sql = "SELECT partida.codigo, partida.resultado, partida.statuss, partida.campeonato_codigo, campeonato.nomeDoCampeonato, jogo.nome AS nomeJogo FROM partida INNER JOIN campeonato ON partida.campeonato_codigo = campeonato.codigo INNER JOIN jogo ON campeonato.jogo_codigo = jogo.codigo ORDER BY campeonato.dataInicio ASC";
                $result = mysqli_query($conn, $sql);
                $partidas = [];
                while($dados = mysqli_fetch_assoc($result))
                {
                    $partidas[] = $dados;
                }

                return $partidas;
            }
            catch(Exception $erro)
            {
                echo "Algo deu errado <br><br> $erro";
                return [];
            }
        }

// =====================================================
// RELATÓRIO GERAL
// =====================================================

public function listarRelatorioGeral(Conexao $conexao)
{
    try
    {
        // =====================================================
        // ABRE A CONEXÃO COM O BANCO
        // =====================================================

        $conn = $conexao->conectar();


        // =====================================================
        // CONSULTA GERAL
        // =====================================================
        //
        // Essa consulta reúne as informações relacionadas
        // aos jogadores:
        //
        // USUÁRIO
        // EQUIPE
        // CAMPEONATO
        // JOGO
        // PARTIDA
        //
        // LEFT JOIN permite que o usuário apareça mesmo
        // que ainda não tenha equipe, campeonato ou partida.
        //

        $sql = "SELECT

                    u.codigo AS codigoUsuario,
                    u.nomeReal,
                    u.nickName,
                    u.dtDeNascimento,
                    u.nacionalidade,
                    u.login,
                    u.tipo,

                    e.codigo AS codigoEquipe,
                    e.nome AS nomeEquipe,
                    e.abreviacao,
                    e.pais,

                    c.codigo AS codigoCampeonato,
                    c.nomeDoCampeonato,
                    c.dataInicio,
                    c.dataFim,
                    c.premio,

                    j.codigo AS codigoJogo,
                    j.nome AS nomeJogo,
                    j.desenvolvedora,
                    j.genero,

                    p.codigo AS codigoPartida,
                    p.resultado,
                    p.statuss

                FROM usuario u

                LEFT JOIN equipe e
                    ON e.codigo = u.equipe_codigo

                LEFT JOIN campeonato_usuario cu
                    ON cu.usuario_codigo = u.codigo

                LEFT JOIN campeonato c
                    ON c.codigo = cu.campeonato_codigo

                LEFT JOIN jogo j
                    ON j.codigo = c.jogo_codigo

                LEFT JOIN partida_usuario pu
                    ON pu.usuario_codigo = u.codigo

                LEFT JOIN partida p
                    ON p.codigo = pu.partida_codigo

                ORDER BY u.nomeReal ASC";


        // =====================================================
        // EXECUTA A CONSULTA
        // =====================================================

        $resultado = mysqli_query($conn, $sql);


        // =====================================================
        // ARRAY QUE VAI ARMAZENAR OS DADOS
        // =====================================================

        $dados = [];


        // =====================================================
        // VERIFICA SE A CONSULTA FOI EXECUTADA
        // =====================================================

        if ($resultado)
        {
            while ($linha = mysqli_fetch_assoc($resultado))
            {
                $dados[] = $linha;
            }
        }


        // =====================================================
        // FECHA A CONEXÃO
        // =====================================================

        mysqli_close($conn);


        // =====================================================
        // RETORNA OS DADOS
        // =====================================================

        return $dados;
    }

    catch(Exception $erro)
    {
        echo "Algo deu errado <br><br> $erro";

        return [];
    }
}

    }//fim do consultar

?> 