<?php

namespace Projeto\GamerMatch\View;


// =====================================================
// CONEXÃO E CONSULTA
// =====================================================

require_once('../DAO/Conexao.php');
require_once('../DAO/Consultar.php');

use Projeto\GamerMatch\DAO\Conexao;
use Projeto\GamerMatch\DAO\Consultar;


// =====================================================
// OBJETOS
// =====================================================

$conexao = new Conexao();

$consultar = new Consultar();


// =====================================================
// BUSCA OS DADOS DO RELATÓRIO
// =====================================================

$relatorio = $consultar->listarRelatorioGeral($conexao);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        GamerMatch — Relatórios
    </title>


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- =====================================================
         GOOGLE FONTS
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- =====================================================
         CSS DO PROJETO
    ====================================================== -->

    <link
        rel="stylesheet"
        href="../css/estilo.css"
    >

</head>


<body>


<!-- =====================================================
     CABEÇALHO
====================================================== -->

<header class="cabecalho">

    <div class="container-fluid px-4">

        <nav class="navbar navbar-expand-lg">


            <!-- LOGO -->

            <a
                href="../index.php"
                class="logo"
            >

                <img
                    src="../imagens/logo.png"
                    alt="GamerMatch"
                >

            </a>


            <!-- BOTÃO MOBILE -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuNavegacao"
                aria-controls="menuNavegacao"
                aria-expanded="false"
                aria-label="Abrir menu"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- MENU -->

            <div
                class="collapse navbar-collapse"
                id="menuNavegacao"
            >

                <div class="menu-navegacao mx-auto">

                    <div class="navbar-nav">


                        <a
                            href="../admin.php"
                            class="nav-link"
                        >
                            Início
                        </a>


                        <a
                            href="../admin.php#gerenciamento"
                            class="nav-link"
                        >
                            Gerenciamento
                        </a>


                        <a
                            href="../admin.php#partidas"
                            class="nav-link"
                        >
                            Partidas
                        </a>


                        <a
                            href="../admin.php#relatorios"
                            class="nav-link active"
                        >
                            Relatórios
                        </a>

                    </div>

                </div>


                <!-- BOTÕES -->

                <div
                    class="botoes-cabecalho d-flex align-items-center gap-2"
                >


                    <!-- TEMA -->

                    <button
                        class="botao-icone"
                        type="button"
                        title="Alterar tema"
                        aria-label="Alterar tema"
                    >
                        ☾
                    </button>


                    <!-- SAIR -->

                    <a
                        href="../index.php"
                        class="botao-contorno"
                    >
                        Sair
                    </a>

                </div>

            </div>

        </nav>

    </div>

</header>



<!-- =====================================================
     CONTEÚDO PRINCIPAL
====================================================== -->

<main>


    <!-- =================================================
         TÍTULO
    ================================================== -->

    <section class="secao secao-usuario">

        <div class="container">


            <div class="mb-4">

                <h1 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    RELATÓRIO GERAL

                </h1>


                <p class="subtitulo-secao">

                    Consulte todas as informações relacionadas
                    aos jogadores, equipes, campeonatos,
                    jogos e partidas do GamerMatch.

                </p>

            </div>



            <!-- =================================================
                 VERIFICA SE EXISTEM USUÁRIOS
            ================================================== -->

            <?php if (empty($relatorio)): ?>


                <!-- =================================================
                     NENHUM REGISTRO
                ================================================== -->

                <div class="painel">

                    <div class="estado-vazio">


                        <div class="icone-vazio">
                            📊
                        </div>


                        <h3>
                            Nenhum dado disponível
                        </h3>


                        <p>

                            Ainda não existem usuários cadastrados
                            no GamerMatch.

                            <br>

                            Quando novos jogadores forem cadastrados,
                            suas informações aparecerão neste relatório.

                        </p>


                        <a
                            href="../admin.php#gerenciamento"
                            class="botao-contorno"
                        >

                            ← Voltar para gerenciamento

                        </a>

                    </div>

                </div>


            <?php else: ?>


                <!-- =================================================
                     RELATÓRIO
                ================================================== -->

                <?php

                /*
                 * Guarda o código do último usuário processado.
                 *
                 * Isso permite organizar visualmente o relatório
                 * por jogador.
                 */

                $usuarioAtual = null;

                ?>


                <?php foreach ($relatorio as $dados): ?>


                    <!-- =================================================
                         NOVO USUÁRIO
                    ================================================== -->

                    <?php if ($usuarioAtual !== $dados['codigoUsuario']): ?>


                        <?php

                        /*
                         * Atualiza o usuário atual.
                         */

                        $usuarioAtual = $dados['codigoUsuario'];

                        ?>


                        <!-- =================================================
                             CARD DO USUÁRIO
                        ================================================== -->

                        <div class="painel mb-4">


                            <!-- CABEÇALHO -->

                            <div class="cabecalho-painel">

                                <div>

                                    <h2>

                                        <?= htmlspecialchars(
                                            $dados['nickName']
                                        ) ?>

                                    </h2>


                                    <p>

                                        <?= htmlspecialchars(
                                            $dados['nomeReal']
                                        ) ?>

                                    </p>

                                </div>


                                <span class="icone-painel">
                                    👤
                                </span>

                            </div>


                            <!-- =================================================
                                 DADOS DO USUÁRIO
                            ================================================== -->

                            <div class="p-4">


                                <h3 class="mb-3">
                                    Dados do jogador
                                </h3>


                                <div class="row g-3">


                                    <!-- CÓDIGO -->

                                    <div class="col-md-4">

                                        <strong>
                                            Código:
                                        </strong>

                                        <br>

                                        <?= htmlspecialchars(
                                            $dados['codigoUsuario']
                                        ) ?>

                                    </div>


                                    <!-- NOME -->

                                    <div class="col-md-4">

                                        <strong>
                                            Nome:
                                        </strong>

                                        <br>

                                        <?= htmlspecialchars(
                                            $dados['nomeReal']
                                        ) ?>

                                    </div>


                                    <!-- NICKNAME -->

                                    <div class="col-md-4">

                                        <strong>
                                            Nickname:
                                        </strong>

                                        <br>

                                        <?= htmlspecialchars(
                                            $dados['nickName']
                                        ) ?>

                                    </div>


                                    <!-- DATA DE NASCIMENTO -->

                                    <div class="col-md-4">

                                        <strong>
                                            Data de nascimento:
                                        </strong>

                                        <br>

                                        <?= htmlspecialchars(
                                            $dados['dtDeNascimento']
                                        ) ?>

                                    </div>


                                    <!-- NACIONALIDADE -->

                                    <div class="col-md-4">

                                        <strong>
                                            Nacionalidade:
                                        </strong>

                                        <br>

                                        <?= htmlspecialchars(
                                            $dados['nacionalidade']
                                        ) ?>

                                    </div>


                                    <!-- TIPO -->

                                    <div class="col-md-4">

                                        <strong>
                                            Tipo:
                                        </strong>

                                        <br>

                                        <?php
                                        if ($dados['tipo'] == 1)
                                        {
                                            echo "Administrador";
                                        }
                                        else
                                        {
                                            echo "Usuário";
                                        }
                                        ?>

                                    </div>

                                </div>


                                <hr>


                                <!-- =================================================
                                     EQUIPE
                                ================================================== -->

                                <h3 class="mb-3">
                                    Equipe
                                </h3>


                                <?php if (!empty($dados['codigoEquipe'])): ?>


                                    <div class="row g-3">


                                        <div class="col-md-4">

                                            <strong>
                                                Equipe:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['nomeEquipe']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Abreviação:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['abreviacao']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                País:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['pais']
                                            ) ?>

                                        </div>

                                    </div>


                                <?php else: ?>


                                    <div class="estado-vazio">

                                        <div class="icone-vazio">
                                            👥
                                        </div>


                                        <h3>
                                            Nenhuma equipe
                                        </h3>


                                        <p>
                                            Este jogador ainda não está
                                            vinculado a uma equipe.
                                        </p>

                                    </div>


                                <?php endif; ?>


                                <hr>


                                <!-- =================================================
                                     CAMPEONATO
                                ================================================== -->

                                <h3 class="mb-3">
                                    Campeonato
                                </h3>


                                <?php if (!empty($dados['codigoCampeonato'])): ?>


                                    <div class="row g-3">


                                        <div class="col-md-6">

                                            <strong>
                                                Campeonato:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['nomeDoCampeonato']
                                            ) ?>

                                        </div>


                                        <div class="col-md-6">

                                            <strong>
                                                Jogo:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['nomeJogo']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Início:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['dataInicio']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Término:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['dataFim']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Premiação:
                                            </strong>

                                            <br>

                                            R$

                                            <?= htmlspecialchars(
                                                $dados['premio']
                                            ) ?>

                                        </div>


                                        <div class="col-md-6">

                                            <strong>
                                                Desenvolvedora:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['desenvolvedora']
                                            ) ?>

                                        </div>


                                        <div class="col-md-6">

                                            <strong>
                                                Gênero:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['genero']
                                            ) ?>

                                        </div>

                                    </div>


                                <?php else: ?>


                                    <div class="estado-vazio">

                                        <div class="icone-vazio">
                                            🏆
                                        </div>


                                        <h3>
                                            Nenhum campeonato
                                        </h3>


                                        <p>
                                            Este jogador ainda não participa
                                            de nenhum campeonato.
                                        </p>

                                    </div>


                                <?php endif; ?>


                                <hr>


                                <!-- =================================================
                                     PARTIDA
                                ================================================== -->

                                <h3 class="mb-3">
                                    Partida
                                </h3>


                                <?php if (!empty($dados['codigoPartida'])): ?>


                                    <div class="row g-3">


                                        <div class="col-md-4">

                                            <strong>
                                                Partida:
                                            </strong>

                                            <br>

                                            #<?= htmlspecialchars(
                                                $dados['codigoPartida']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Status:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['statuss']
                                            ) ?>

                                        </div>


                                        <div class="col-md-4">

                                            <strong>
                                                Resultado:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['resultado']
                                            ) ?>

                                        </div>


                                        <div class="col-md-6">

                                            <strong>
                                                Campeonato:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['nomeDoCampeonato']
                                            ) ?>

                                        </div>


                                        <div class="col-md-6">

                                            <strong>
                                                Jogo:
                                            </strong>

                                            <br>

                                            <?= htmlspecialchars(
                                                $dados['nomeJogo']
                                            ) ?>

                                        </div>

                                    </div>


                                <?php else: ?>


                                    <div class="estado-vazio">

                                        <div class="icone-vazio">
                                            ⚔️
                                        </div>


                                        <h3>
                                            Nenhuma partida
                                        </h3>


                                        <p>
                                            Este jogador ainda não possui
                                            nenhuma partida registrada.
                                        </p>

                                    </div>


                                <?php endif; ?>


                            </div>

                        </div>


                    <?php endif; ?>


                <?php endforeach; ?>


            <?php endif; ?>


            <!-- =================================================
                 BOTÃO VOLTAR
            ================================================== -->

            <div class="mt-4">

                <a
                    href="../admin.php#relatorios"
                    class="botao-contorno"
                >

                    ← Voltar para relatórios

                </a>

            </div>


        </div>

    </section>

</main>



<!-- =====================================================
     RODAPÉ
====================================================== -->

<footer class="rodape">

    <div
        class="container d-flex flex-wrap justify-content-between align-items-center gap-3"
    >


        <!-- LOGO -->

        <a
            class="navbar-brand logo-rodape"
            href="../index.php"
        >

            <img
                src="../imagens/logo.png"
                alt="GamerMatch"
            >

        </a>


        <!-- COPYRIGHT -->

        <p class="copyright mb-0">

            &copy; 2026 GamerMatch.
            Todos os direitos reservados.

        </p>

    </div>

</footer>



<!-- =====================================================
     BOOTSTRAP JS
====================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>