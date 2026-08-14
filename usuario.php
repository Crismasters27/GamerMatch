<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GamerMatch — Área do Usuário</title>


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- =====================================================
         BOOTSTRAP ICONS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    >


    <!-- =====================================================
         GOOGLE FONTS
    ====================================================== -->

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


    <!-- =====================================================
         CSS DO PROJETO
    ====================================================== -->

    <link
        rel="stylesheet"
        href="css/estilo.css"
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
                href="index.php"
                class="logo"
            >

                <img
                    src="imagens/logo.png"
                    alt="GamerMatch"
                >

            </a>


            <!-- =================================================
                 BOTÃO MOBILE
            ================================================== -->

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


            <!-- =================================================
                 MENU
            ================================================== -->

            <div
                class="collapse navbar-collapse"
                id="menuNavegacao"
            >


                <div class="menu-navegacao mx-auto">

                    <div class="navbar-nav">


                        <a
                            href="usuario.php"
                            class="nav-link active"
                        >

                            Início

                        </a>


                        <a
                            href="index.php#campeonatos"
                            class="nav-link"
                        >

                            Campeonatos

                        </a>


                        <a
                            href="index.php#partidas"
                            class="nav-link"
                        >

                            Partidas

                        </a>


                        <a
                            href="index.php#equipes"
                            class="nav-link"
                        >

                            Equipes

                        </a>


                    </div>

                </div>


                <!-- =================================================
                     BOTÕES DO CABEÇALHO
                ================================================== -->

                <div class="botoes-cabecalho d-flex align-items-center gap-2">


                    <!-- TEMA -->

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

                        ÁREA DO JOGADOR

                    </p>


                    <h1 class="titulo-usuario">

                        Bem-vindo,

                        <span>Jogador</span>

                    </h1>


                    <p class="subtitulo-usuario">

                        Acompanhe seus campeonatos, partidas,
                        equipe e desempenho no GamerMatch.

                    </p>

                </div>


                <!-- =================================================
                     PERFIL
                ================================================== -->

                <div class="col-lg-4">

                    <div class="perfil-usuario">


                        <div class="avatar-usuario">

                            GM

                        </div>


                        <div>

                            <h2>

                                Jogador

                            </h2>


                            <p>

                                @nickname

                            </p>

                        </div>


                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         ESTATÍSTICAS
    ====================================================== -->

    <section class="secao">

        <div class="container">


            <!-- TÍTULO -->

            <div class="mb-4">

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    MINHAS ESTATÍSTICAS

                </h2>


                <p class="subtitulo-secao">

                    Resumo da sua atividade na plataforma.

                </p>

            </div>


            <!-- CARDS -->

            <div class="row g-4">


                <!-- CAMPEONATOS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">

                            <i class="bi bi-trophy-fill"></i>

                        </div>


                        <p>

                            Campeonatos

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

                            <i class="bi bi-controller"></i>

                        </div>


                        <p>

                            Partidas

                        </p>


                        <strong>

                            0

                        </strong>

                    </div>

                </div>


                <!-- VITÓRIAS -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">

                            <i class="bi bi-award-fill"></i>

                        </div>


                        <p>

                            Vitórias

                        </p>


                        <strong>

                            0

                        </strong>

                    </div>

                </div>


                <!-- EQUIPE -->

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="estatistica-card">

                        <div class="icone-estatistica">

                            <i class="bi bi-people-fill"></i>

                        </div>


                        <p>

                            Equipe

                        </p>


                        <strong>

                            —

                        </strong>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         CAMPEONATOS E EQUIPE
    ====================================================== -->

    <section class="secao secao-usuario">

        <div class="container">

            <div class="row g-4">


                <!-- =================================================
                     CAMPEONATOS
                ================================================== -->

                <div class="col-lg-7">

                    <div class="painel">


                        <!-- CABEÇALHO -->

                        <div class="cabecalho-painel">

                            <div>

                                <h2>

                                    Meus Campeonatos

                                </h2>


                                <p>

                                    Campeonatos em que você participa.

                                </p>

                            </div>


                            <span class="icone-painel">

                                <i class="bi bi-trophy-fill"></i>

                            </span>

                        </div>


                        <!-- ESTADO VAZIO -->

                        <div class="estado-vazio">


                            <div class="icone-vazio">

                                <i class="bi bi-trophy-fill"></i>

                            </div>


                            <h3>

                                Nenhum campeonato

                            </h3>


                            <p>

                                Você ainda não está participando
                                de nenhum campeonato.

                            </p>


                            <a
                                href="index.php#campeonatos"
                                class="btn botao-principal"
                            >

                                <i class="bi bi-search"></i>

                                Ver campeonatos

                            </a>


                        </div>


                    </div>

                </div>



                <!-- =================================================
                     EQUIPE
                ================================================== -->

                <div class="col-lg-5">

                    <div class="painel">


                        <!-- CABEÇALHO -->

                        <div class="cabecalho-painel">

                            <div>

                                <h2>

                                    Minha Equipe

                                </h2>


                                <p>

                                    Sua equipe atual.

                                </p>

                            </div>


                            <span class="icone-painel">

                                <i class="bi bi-people-fill"></i>

                            </span>

                        </div>


                        <!-- EQUIPE -->

                        <div class="equipe-usuario">


                            <div class="distintivo-equipe">

                                —

                            </div>


                            <h3>

                                Nenhuma equipe

                            </h3>


                            <p>

                                Você ainda não está vinculado
                                a uma equipe.

                            </p>


                            <a
                                href="index.php#equipes"
                                class="btn botao-contorno"
                            >

                                <i class="bi bi-search"></i>

                                Encontrar equipe

                            </a>


                        </div>


                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         PRÓXIMAS PARTIDAS
    ====================================================== -->

    <section class="secao">

        <div class="container">


            <!-- TÍTULO -->

            <div class="mb-4">

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    PRÓXIMAS PARTIDAS

                </h2>


                <p class="subtitulo-secao">

                    Confira suas próximas partidas.

                </p>

            </div>


            <!-- PAINEL -->

            <div class="painel">

                <div class="estado-vazio">


                    <div class="icone-vazio">

                        <i class="bi bi-lightning-fill"></i>

                    </div>


                    <h3>

                        Nenhuma partida agendada

                    </h3>


                    <p>

                        Suas próximas partidas aparecerão aqui.

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

    <div
        class="container d-flex flex-wrap justify-content-between align-items-center gap-3"
    >


        <!-- LOGO -->

        <a
            class="navbar-brand logo-rodape"
            href="index.php"
        >

            <img
                src="imagens/logo.png"
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



<!-- =====================================================
     JAVASCRIPT DO PROJETO
====================================================== -->

<script src="js/script.js"></script>


</body>

</html>