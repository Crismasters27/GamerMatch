<?php
namespace Projeto\GamerMatch;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GamerMatch — Painel Administrativo</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- CSS do Projeto -->
    <link rel="stylesheet" href="css/estilo.css">

</head>


<body>


<!-- =====================================================
     CABEÇALHO
====================================================== -->

<header class="cabecalho">

    <div class="container-fluid px-4">

        <nav class="navbar navbar-expand-lg">


            <!-- LOGO -->

            <a href="index.php" class="logo">

                <img
                    src="imagens/logo.png"
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

                <i class="bi bi-list"></i>

            </button>


            <!-- MENU -->

            <div
                class="collapse navbar-collapse"
                id="menuNavegacao"
            >

                <div class="menu-navegacao mx-auto">

                    <div class="navbar-nav">


                        <a
                            href="admin.php"
                            class="nav-link active"
                        >
                            Início
                        </a>


                        <a
                            href="#gerenciamento"
                            class="nav-link"
                        >
                            Gerenciamento
                        </a>


                        <a
                            href="#partidas"
                            class="nav-link"
                        >
                            Partidas
                        </a>


                        <a
                            href="#relatorios"
                            class="nav-link"
                        >
                            Relatórios
                        </a>


                    </div>

                </div>


                <!-- BOTÕES DO CABEÇALHO -->

                <div class="botoes-cabecalho d-flex align-items-center gap-2">


                    <!-- MODO CLARO / ESCURO -->

                    <button
                        id="themeToggle"
                        class="btn botao-icone"
                        type="button"
                        title="Alternar tema"
                        aria-label="Alternar tema"
                    >

                        <i class="bi bi-sun-fill"></i>

                    </button>


                    <!-- SAIR -->

                    <a
                        href="index.php"
                        class="btn botao-contorno"
                    >

                        <i class="bi bi-box-arrow-right"></i>

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
         BOAS-VINDAS
    ================================================== -->

    <section class="area-usuario">

        <div class="container">

            <div class="row align-items-center g-4">


                <!-- TEXTO -->

                <div class="col-lg-8">

                    <p class="sobrelinha-usuario">

                        PAINEL ADMINISTRATIVO

                    </p>


                    <h1 class="titulo-usuario">

                        Bem-vindo,

                        <span>
                            Administrador
                        </span>

                    </h1>


                    <p class="subtitulo-usuario">

                        Controle usuários, jogos, partidas,
                        campeonatos e equipes do GamerMatch.

                    </p>

                </div>


                <!-- PERFIL -->

                <div class="col-lg-4">

                    <div class="perfil-usuario">


                        <div class="avatar-usuario">

                            AD

                        </div>


                        <div>

                            <h2>
                                Administrador
                            </h2>


                            <p>
                                @admin
                            </p>

                        </div>


                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =================================================
         ESTATÍSTICAS
    ================================================== -->

    <section class="secao">

        <div class="container">


            <div class="mb-4">

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    ESTATÍSTICAS DO SISTEMA

                </h2>


                <p class="subtitulo-secao">

                    Resumo geral da atividade do GamerMatch.

                </p>

            </div>


            <div class="row g-4">


                <!-- USUÁRIOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">
                            👥
                        </div>

                        <p>
                            Usuários
                        </p>

                        <strong>
                            0
                        </strong>

                    </div>

                </div>


                <!-- JOGOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">
                            🎮
                        </div>

                        <p>
                            Jogos
                        </p>

                        <strong>
                            0
                        </strong>

                    </div>

                </div>


                <!-- PARTIDAS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">
                            ⚔
                        </div>

                        <p>
                            Partidas
                        </p>

                        <strong>
                            0
                        </strong>

                    </div>

                </div>


                <!-- CAMPEONATOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">
                            🏆
                        </div>

                        <p>
                            Campeonatos
                        </p>

                        <strong>
                            0
                        </strong>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =================================================
         GERENCIAMENTO
    ================================================== -->

    <section
        class="secao secao-usuario"
        id="gerenciamento"
    >

        <div class="container">


            <div class="mb-4">

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    GERENCIAMENTO

                </h2>


                <p class="subtitulo-secao">

                    Controle os principais recursos da plataforma.

                </p>

            </div>


            <div class="row g-4">


                <!-- USUÁRIOS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="painel">


                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Usuários
                                </h2>

                                <p>
                                    Gerencie os jogadores.
                                </p>

                            </div>


                            <span class="icone-painel">
                                👥
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                👤
                            </div>


                            <h3>
                                Gerenciar usuários
                            </h3>


                            <p>
                                Cadastre, consulte, atualize
                                ou remova usuários.
                            </p>


                            <div class="botoes-crud">

                                <a href="#" class="botao-crud">
                                    Cadastrar
                                </a>

                                <a href="#" class="botao-crud">
                                    Consultar
                                </a>

                                <a href="#" class="botao-crud">
                                    Atualizar
                                </a>

                                <a href="#" class="botao-crud">
                                    Excluir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- JOGOS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="painel">

                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Jogos
                                </h2>

                                <p>
                                    Gerencie os jogos.
                                </p>

                            </div>


                            <span class="icone-painel">
                                🎮
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                🎮
                            </div>


                            <h3>
                                Gerenciar jogos
                            </h3>


                            <p>
                                Cadastre, consulte, atualize
                                ou remova jogos da plataforma.
                            </p>


                            <div class="botoes-crud">

                                <a href="#" class="botao-crud">
                                    Cadastrar
                                </a>

                                <a href="#" class="botao-crud">
                                    Consultar
                                </a>

                                <a href="#" class="botao-crud">
                                    Atualizar
                                </a>

                                <a href="#" class="botao-crud">
                                    Excluir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- PARTIDAS -->

                <div
                    class="col-12 col-md-6 col-lg-4"
                    id="partidas"
                >

                    <div class="painel">

                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Partidas
                                </h2>

                                <p>
                                    Controle as partidas.
                                </p>

                            </div>


                            <span class="icone-painel">
                                ⚔
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                ⚔
                            </div>


                            <h3>
                                Gerenciar partidas
                            </h3>


                            <p>
                                Cadastre, consulte, atualize
                                ou remova partidas.
                            </p>


                            <div class="botoes-crud">

                                <a href="#" class="botao-crud">
                                    Cadastrar
                                </a>

                                <a href="#" class="botao-crud">
                                    Consultar
                                </a>

                                <a href="#" class="botao-crud">
                                    Atualizar
                                </a>

                                <a href="#" class="botao-crud">
                                    Excluir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- CAMPEONATOS -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="painel">

                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Campeonatos
                                </h2>

                                <p>
                                    Controle os campeonatos.
                                </p>

                            </div>


                            <span class="icone-painel">
                                🏆
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                🏆
                            </div>


                            <h3>
                                Gerenciar campeonatos
                            </h3>


                            <p>
                                Cadastre, consulte, atualize
                                ou remova campeonatos.
                            </p>


                            <div class="botoes-crud">

                                <a href="#" class="botao-crud">
                                    Cadastrar
                                </a>

                                <a href="#" class="botao-crud">
                                    Consultar
                                </a>

                                <a href="#" class="botao-crud">
                                    Atualizar
                                </a>

                                <a href="#" class="botao-crud">
                                    Excluir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- EQUIPES -->

                <div class="col-12 col-md-6 col-lg-4">

                    <div class="painel">

                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Equipes
                                </h2>

                                <p>
                                    Controle as equipes.
                                </p>

                            </div>


                            <span class="icone-painel">
                                👥
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                👥
                            </div>


                            <h3>
                                Gerenciar equipes
                            </h3>


                            <p>
                                Cadastre, consulte, atualize
                                ou remova equipes cadastradas.
                            </p>


                            <div class="botoes-crud">

                                <a href="#" class="botao-crud">
                                    Cadastrar
                                </a>

                                <a href="#" class="botao-crud">
                                    Consultar
                                </a>

                                <a href="#" class="botao-crud">
                                    Atualizar
                                </a>

                                <a href="#" class="botao-crud">
                                    Excluir
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- RELATÓRIOS -->

                <div
                    class="col-12 col-md-6 col-lg-4"
                    id="relatorios"
                >

                    <div class="painel">

                        <div class="cabecalho-painel">

                            <div>

                                <h2>
                                    Relatórios
                                </h2>

                                <p>
                                    Consulte os dados.
                                </p>

                            </div>


                            <span class="icone-painel">
                                📊
                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">
                                📊
                            </div>


                            <h3>
                                Relatórios do sistema
                            </h3>


                            <p>
                                Consulte informações cadastradas
                                do GamerMatch.
                            </p>


                            <a
                                href="View/Relatorios"
                                class="botao-principal"
                            >
                                Visualizar
                            </a>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =================================================
         ATIVIDADES RECENTES
    ================================================== -->

    <section class="secao">

        <div class="container">


            <div class="mb-4">

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    ATIVIDADES RECENTES

                </h2>


                <p class="subtitulo-secao">

                    Acompanhe as últimas atividades realizadas
                    na plataforma.

                </p>

            </div>


            <div class="painel">

                <div class="estado-vazio">

                    <div class="icone-vazio">
                        📋
                    </div>


                    <h3>
                        Nenhuma atividade registrada
                    </h3>


                    <p>
                        As atividades realizadas pelos
                        administradores aparecerão aqui.
                    </p>

                </div>

            </div>

        </div>

    </section>


</main>



<!-- =====================================================
     RODAPÉ
====================================================== -->

<footer class="rodape">

    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">


        <a
            class="navbar-brand logo-rodape"
            href="index.php"
        >

            <img
                src="imagens/logo.png"
                alt="GamerMatch"
            >

        </a>


        <p class="copyright mb-0">

            &copy; 2026 GamerMatch.
            Todos os direitos reservados.

        </p>


    </div>

</footer>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- JavaScript do Projeto -->

<script src="js/script.js"></script>


</body>
</html>