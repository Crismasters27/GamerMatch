<?php
    namespace Projeto\GamerMatch;

// CAMPEONATOS
/*$campeonatos = [
    [
        'nome' => 'GamerMatch Championship',
        'jogo' => 'Street Fighter 6',
        'data' => '20/09/2026',
        'premio' => 'R$ 5.000,00'
    ],
    [
        'nome' => 'FGC Battle Arena',
        'jogo' => 'Tekken 8',
        'data' => '27/09/2026',
        'premio' => 'R$ 3.000,00'
    ],
    [
        'nome' => 'Fighters Clash',
        'jogo' => 'Guilty Gear Strive',
        'data' => '04/10/2026',
        'premio' => 'R$ 2.000,00'
    ]
];


// JOGOS
$jogos = [
    [
        'nome' => 'Street Fighter 6',
        'desenvolvedora' => 'Capcom',
        'genero' => 'Fighting Game'
    ],
    [
        'nome' => 'Tekken 8',
        'desenvolvedora' => 'Bandai Namco',
        'genero' => 'Fighting Game'
    ],
    [
        'nome' => 'Guilty Gear Strive',
        'desenvolvedora' => 'Arc System Works',
        'genero' => 'Fighting Game'
    ],
    [
        'nome' => 'Fatal Fury: City of the Wolves',
        'desenvolvedora' => 'SNK',
        'genero' => 'Fighting Game'
    ]
];


// EQUIPES
$equipes = [
    [
        'nome' => 'Blue Fighters',
        'sigla' => 'BLF',
        'pais' => 'Brasil'
    ],
    [
        'nome' => 'Red Dragons',
        'sigla' => 'RDX',
        'pais' => 'Brasil'
    ],
    [
        'nome' => 'Final Round',
        'sigla' => 'FR',
        'pais' => 'Brasil'
    ],
    [
        'nome' => 'Warriors FGC',
        'sigla' => 'WFG',
        'pais' => 'Brasil'
    ]
];


// PARTIDAS
$partidas = [
    [
        'jogo' => 'Street Fighter 6',
        'equipe1' => 'Blue Fighters',
        'equipe2' => 'Red Dragons',
        'data' => '20/09/2026',
        'status' => 'Agendada'
    ],
    [
        'jogo' => 'Tekken 8',
        'equipe1' => 'Final Round',
        'equipe2' => 'Warriors FGC',
        'data' => '27/09/2026',
        'status' => 'Agendada'
    ]
];*/

    require_once('DAO/Conexao.php');
    require_once('DAO/Consultar.php');

    use Projeto\GamerMatch\DAO\Conexao;
    use Projeto\GamerMatch\DAO\Consultar;

    $conexao = new Conexao();
    $consultar = new Consultar();

    $campeonatos = $consultar->listarCampeonatos($conexao);
    $jogos = $consultar->listarJogos($conexao);
    $equipes = $consultar->listarEquipes($conexao);
    $partidas = $consultar->listarPartidas($conexao);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- CSS do Projeto -->
    <link rel="stylesheet" href="css/estilo.css">
    <title>GamerMatch — A Arena da Comunidade FGC</title>
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
                <img src="imagens/logo.png" alt="GamerMatch">
            </a>

            <!-- BOTÃO MOBILE -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavegacao" aria-controls="menuNavegacao" aria-expanded="false" aria-label="Abrir menu">
                <i class="bi bi-list"></i>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="menuNavegacao">
                <ul class="navbar-nav mx-auto menu-navegacao">
                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">Início</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#campeonatos">Campeonatos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#jogos">Jogos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#equipes">Equipes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#partidas">Partidas</a>
                    </li>
                </ul>

                <!-- BOTÕES DO CABEÇALHO -->

                <div class="d-flex align-items-center gap-2 botoes-cabecalho">
                    <!-- TEMA -->
                    <button id="themeToggle" class="btn botao-icone" type="button" title="Alternar tema" aria-label="Alternar tema claro/escuro">
                        <i class="bi bi-sun-fill"></i>
                    </button>

                    <!-- ENTRAR -->

                    <a href="login.php" class="btn btn-outline-light btn-sm botao-contorno">
                        <i class="bi bi-box-arrow-in-right"></i>Entrar</a>

                    <!-- CADASTRO -->

                    <a href="View/CadastrarUsuario.php" class="btn btn-sm botao-principal">
                        <i class="bi bi-person-plus-fill"></i>Cadastre-se</a>

                </div>

            </div>

        </nav>

    </div>

</header>

<!-- ===================== SEÇÃO INICIAL ===================== -->

<section class="secao-inicial" id="inicio">

    <!-- CARROSSEL DE FUNDO -->
    <div id="carrosselJogos" class="carousel slide carousel-fade carrossel-fundo" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-inner">

            <!-- IMAGEM 1 -->
            <div class="carousel-item active">
                <img src="imagens/jogos/street-fighter-6-yasmine.jpg" alt="Street Fighter 6">
            </div>

            <!-- IMAGEM 2 -->
            <div class="carousel-item">
                <img src="imagens/jogos/tekken-8-Kazama-Jin.jpg" alt="Tekken 8">
            </div>

            <!-- IMAGEM 3 -->
            <div class="carousel-item">
                <img src="imagens/jogos/MK1.jpg" alt="Mortal Kombat 1">
            </div>

            <!-- IMAGEM 4 -->
            <div class="carousel-item">
                <img src="imagens/jogos/BlazBlue.jpg" alt="BlazBlue Centralfiction">
            </div>

            <!-- IMAGEM 5 -->
            <div class="carousel-item">
                <img src="imagens/jogos/Guilty-Gear-Strive.png" alt="Guilty Gear Strive">
            </div>

            <!-- IMAGEM 6 -->
            <div class="carousel-item">
                <img src="imagens/jogos/marvel_tokon.jpg" alt="Marvel Tokon">
            </div>

        </div>

    </div>


    <!-- CAMADA ESCURA SOBRE AS IMAGENS -->

    <div class="fundo-secao-inicial">

        <div class="efeito-lateral efeito-azul"></div>

        <div class="efeito-lateral efeito-vermelho"></div>

        <div class="sobreposicao-carrossel"></div>

    </div>


    <!-- CONTEÚDO PRINCIPAL -->

    <div class="container conteudo-inicial text-center">

        <h1 class="titulo-inicial">
            A ARENA DA<br>
            <span class="text-accent">COMUNIDADE FGC</span>
        </h1>

        <p class="subtitulo-inicial">
            Encontre equipes, forme alianças e conquiste torneios.
        </p>

        <div class="d-flex justify-content-center gap-2 flex-wrap">

            <a href="#campeonatos" class="btn botao-principal btn-lg">
                <i class="bi bi-trophy-fill"></i>
                Explorar Campeonatos
            </a>

            <a href="#equipes" class="btn botao-contorno btn-lg">
                <i class="bi bi-people-fill"></i>
                Explorar Equipes
            </a>

        </div>

    </div>

</section>



<!-- =====================================================
     CAMPEONATOS
====================================================== -->

<section
    class="secao"
    id="campeonatos">
    <div class="container">
        <!-- TÍTULO -->
        <div class="mb-4">
            <h2 class="titulo-secao">
                <span class="barra-titulo"></span>
                CAMPEONATOS
            </h2>
            <p class="subtitulo-secao">
                Confira os campeonatos que estão movimentando
                a comunidade de Fighting Games.
            </p>
        </div>


        <!-- CARDS -->
        <div class="row g-4">
            <?php foreach ($campeonatos as $campeonato): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="painel">
                        <div class="cabecalho-painel">
                            <div>
                                <h2>
                                    <?= htmlspecialchars($campeonato['nomeDoCampeonato']) ?>
                                </h2>

                                <p>
                                    <?= htmlspecialchars($campeonato['nomeJogo']) ?>
                                </p>

                            </div>


                            <span class="icone-painel">

                                <i class="bi bi-trophy-fill"></i>

                            </span>

                        </div>


                        <div class="estado-vazio">

                            <div class="icone-vazio">

                                <i class="bi bi-controller"></i>

                            </div>


                            <h3>

                                <?= htmlspecialchars($campeonato['nomeJogo']) ?>

                            </h3>


                            <p>

                                <strong>
                                    Data:
                                </strong>

                                <?= htmlspecialchars($campeonato['dataInicio']) ?>

                                <br>

                                <strong>
                                    Premiação:
                                </strong>

                                <?= htmlspecialchars($campeonato['premio']) ?>

                            </p>

                            <a href="login.php" class="botao-principal"><i class="bi bi-eye"></i>Ver campeonato</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<!-- =====================================================
     JOGOS
====================================================== -->

<section
    class="secao"
    id="jogos"
>

    <div class="container">


        <!-- TÍTULO -->

        <div class="mb-4">

            <h2 class="titulo-secao">

                <span class="barra-titulo"></span>

                JOGOS DA COMUNIDADE

            </h2>


            <p class="subtitulo-secao">

                Fighting Games presentes na plataforma GamerMatch.

            </p>

        </div>


        <!-- JOGOS -->

        <div class="row g-4">

            <?php foreach ($jogos as $jogo): ?>

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="card-destaque">

                        <i class="bi bi-controller"></i>


                        <h3>

                            <?= htmlspecialchars($jogo['nome']) ?>

                        </h3>


                        <p>

                            <?= htmlspecialchars($jogo['desenvolvedora']) ?>

                            <br>

                            <span>

                                <?= htmlspecialchars($jogo['genero']) ?>

                            </span>

                        </p>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>



<!-- =====================================================
     EQUIPES
====================================================== -->

<section
    class="secao"
    id="equipes"
>

    <div class="container">


        <!-- CABEÇALHO -->

        <div
            class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4"
        >


            <div>

                <h2 class="titulo-secao">

                    <span class="barra-titulo"></span>

                    EQUIPES FGC

                </h2>


                <p class="subtitulo-secao">

                    Conheça as principais equipes da cena
                    competitiva de Fighting Games.

                </p>

            </div>


            <!-- PESQUISA -->

            <div class="d-flex gap-2 barra-ferramentas">

                <div class="pesquisa">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="teamSearch"
                        class="form-control"
                        placeholder="Pesquisar equipe..."
                    >

                </div>


                <!-- CADASTRO -->

                <a
                    href="login.php"
                    class="btn botao-principal text-nowrap"
                >

                    <i class="bi bi-plus-lg"></i>

                    Criar Equipe

                </a>

            </div>

        </div>



        <!-- EQUIPES -->

        <div
            class="row g-4"
            id="teamsGrid"
        >

            <?php foreach ($equipes as $equipe): ?>

                <div class="col-12 col-md-6 col-lg-3 equipe-card">

                    <div class="painel">

                        <div class="estado-vazio">

                            <div class="icone-vazio">

                                <i class="bi bi-shield-fill"></i>

                            </div>


                            <h3>

                                <?= htmlspecialchars($equipe['nome']) ?>

                            </h3>


                            <p>

                                <strong>
                                    <?= htmlspecialchars($equipe['abreviacao']) ?>
                                </strong>

                                <br>

                                <?= htmlspecialchars($equipe['pais']) ?>

                            </p>


                            <a
                                href="login.php" class="botao-contorno">
                                Ver equipe
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- VER MAIS -->

        <div class="text-center mt-4">

            <a
                href="login.php"
                class="btn botao-contorno"
            >

                Ver mais equipes

                <i class="bi bi-chevron-down"></i>

            </a>

        </div>

    </div>

</section>



<!-- =====================================================
     PARTIDAS
====================================================== -->

<section class="secao" id="partidas">
    <div class="container">
        <!-- TÍTULO -->
        <div class="mb-4">
            <h2 class="titulo-secao">
                <span class="barra-titulo"></span>
                PRÓXIMAS PARTIDAS
            </h2>
            <p class="subtitulo-secao">Acompanhe os confrontos programados na GamerMatch.</p>
        </div>

        <!-- PARTIDAS -->
        <div class="row g-4">
            <?php foreach ($partidas as $partida): ?>
                <div class="col-12 col-lg-6">
                    <div class="painel">
                        <div class="cabecalho-painel">
                            <div>
                                <h2>
                                    <?= htmlspecialchars($partida['nomeJogo']) ?>
                                </h2>

                                <p>
                                    <?= htmlspecialchars($partida['nomeDoCampeonato']) ?>
                                </p>
                            </div>

                            <span class="icone-painel">
                                <i class="bi bi-controller"></i>
                            </span>
                        </div>


                        <div class="estado-vazio">
                            <div class="icone-vazio">
                                <i class="bi bi-lightning-fill"></i>
                            </div>

                            <h3>
                                Partida #<?= htmlspecialchars($partida['codigo']) ?>
                            </h3>

                            <p>
                                <strong>Status:</strong>
                                <?= htmlspecialchars($partida['statuss']) ?>
                                <br>
                                <strong>
                                    Resultado:
                                </strong>

                                <?= htmlspecialchars($partida['resultado']) ?>

                            </p>

                            <a href="login.php" class="botao-principal">
                                <i class="bi bi-eye"></i>
                                Ver partida
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<!-- =====================================================
     DESTAQUES
====================================================== -->

<section class="destaques">

    <div class="container">

        <div class="row g-4">


            <!-- DESTAQUE 1 -->

            <div class="col-6 col-lg-3">

                <div class="card-destaque">

                    <i class="bi bi-people-fill"></i>

                    <h3>
                        Equipes Competitivas
                    </h3>

                    <p>

                        Encontre equipes e jogadores
                        da comunidade FGC.

                    </p>

                </div>

            </div>


            <!-- DESTAQUE 2 -->

            <div class="col-6 col-lg-3">

                <div class="card-destaque">

                    <i class="bi bi-trophy-fill"></i>

                    <h3>
                        Torneios
                    </h3>

                    <p>

                        Participe de campeonatos
                        organizados pela comunidade.

                    </p>

                </div>

            </div>


            <!-- DESTAQUE 3 -->

            <div class="col-6 col-lg-3">

                <div class="card-destaque">

                    <i class="bi bi-controller"></i>

                    <h3>
                        Fighting Games
                    </h3>

                    <p>

                        Reúna seus jogos de luta
                        favoritos em um só lugar.

                    </p>

                </div>

            </div>


            <!-- DESTAQUE 4 -->

            <div class="col-6 col-lg-3">

                <div class="card-destaque">

                    <i class="bi bi-star-fill"></i>

                    <h3>
                        Comunidade FGC
                    </h3>

                    <p>

                        Conecte-se, compita e fortaleça
                        a cena competitiva.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     CHAMADA PARA CADASTRO
====================================================== -->

<section class="secao">

    <div class="container">

        <div class="painel text-center">

            <div class="estado-vazio">


                <div class="icone-vazio">

                    <i class="bi bi-person-plus-fill"></i>

                </div>


                <h3>

                    Faça parte da GamerMatch

                </h3>


                <p>

                    Crie sua conta, encontre equipes,
                    acompanhe campeonatos e participe
                    da comunidade de Fighting Games.

                </p>


                <a
                    href="cadastrar.html"
                    class="botao-principal"
                >

                    <i class="bi bi-person-plus-fill"></i>

                    Criar minha conta

                </a>

            </div>

        </div>

    </div>

</section>



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
     JAVASCRIPT
====================================================== -->

<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


<!-- JavaScript do projeto -->

<script src="js/script.js"></script>


</body>

</html>