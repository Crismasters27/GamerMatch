<?php

require_once('../DAO/Conexao.php');

use Projeto\GamerMatch\DAO\Conexao;

$mensagem = "";
$tipoMensagem = "";
$usuario = null;

$conexao = new Conexao();
$conn = $conexao->conectar();


/* =========================================================
   BUSCAR USUÁRIO
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {

    $codigo = intval($_POST['codigo']);

    if ($codigo > 0) {

        $sql = "SELECT codigo, nomeReal, nickName, login, senha, tipo
                FROM usuario
                WHERE codigo = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $codigo
        );

        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {

            $usuario = mysqli_fetch_assoc($resultado);

        } else {

            $mensagem = "Usuário não encontrado.";
            $tipoMensagem = "danger";
        }

        mysqli_stmt_close($stmt);

    } else {

        $mensagem = "Informe um código válido.";
        $tipoMensagem = "danger";
    }
}


/* =========================================================
   ATUALIZAR USUÁRIO
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {

    $codigo = intval($_POST['codigo']);
    $nomeReal = trim($_POST['nomeReal']);
    $nickName = trim($_POST['nickName']);
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $tipo = intval($_POST['tipo']);

    if (
        $codigo > 0 &&
        $nomeReal !== "" &&
        $nickName !== "" &&
        $login !== "" &&
        $senha !== ""
    ) {

        $sql = "UPDATE usuario
                SET nomeReal = ?,
                    nickName = ?,
                    login = ?,
                    senha = ?,
                    tipo = ?
                WHERE codigo = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ssssii",
            $nomeReal,
            $nickName,
            $login,
            $senha,
            $tipo,
            $codigo
        );

        if (mysqli_stmt_execute($stmt)) {

            $mensagem = "Usuário atualizado com sucesso!";
            $tipoMensagem = "success";


            /* Recarregar dados */

            $sqlBusca = "SELECT codigo, nomeReal, nickName, login, senha, tipo
                         FROM usuario
                         WHERE codigo = ?";

            $stmtBusca = mysqli_prepare($conn, $sqlBusca);

            mysqli_stmt_bind_param(
                $stmtBusca,
                "i",
                $codigo
            );

            mysqli_stmt_execute($stmtBusca);

            $resultado = mysqli_stmt_get_result($stmtBusca);

            if (mysqli_num_rows($resultado) > 0) {

                $usuario = mysqli_fetch_assoc($resultado);

            }

            mysqli_stmt_close($stmtBusca);

        } else {

            $mensagem = "Erro ao atualizar o usuário.";
            $tipoMensagem = "danger";
        }

        mysqli_stmt_close($stmt);

    } else {

        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "danger";
    }
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>GamerMatch — Atualizar Usuário</title>


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
        href="../css/estilo.css"
    >


    <!-- =====================================================
         ESTILO ESPECÍFICO DA PÁGINA
    ====================================================== -->

    <style>

        /* =====================================================
           ÁREA CRUD
        ===================================================== */

        .crud-pagina {
            padding: 70px 0;
        }

        .crud-container {
            max-width: 1100px;
            margin: 0 auto;
        }


        /* =====================================================
           TÍTULO
        ===================================================== */

        .crud-titulo {
            display: flex;
            align-items: center;
            gap: 12px;

            font-family: "Rajdhani", sans-serif;
            font-size: 32px;
            font-weight: 700;

            color: #ffffff;

            margin-bottom: 8px;
        }

        .crud-titulo::before {
            content: "";
            width: 4px;
            height: 30px;

            border-radius: 4px;

            background: linear-gradient(
                180deg,
                #3b82f6,
                #e6392f
            );
        }

        .crud-subtitulo {
            color: #8fa3c7;
            font-size: 17px;
            margin-bottom: 35px;
        }


        /* =====================================================
           CARDS
        ===================================================== */

        .crud-card {
            background: #111827;

            border: 1px solid #26344f;

            border-radius: 18px;

            overflow: hidden;

            margin-bottom: 28px;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.20);
        }

        .crud-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 24px 28px;

            background: #151e32;

            border-bottom: 1px solid #26344f;
        }

        .crud-card-header h2 {
            margin: 0;

            font-family: "Rajdhani", sans-serif;

            font-size: 23px;
            font-weight: 700;

            color: #ffffff;
        }

        .crud-card-header p {
            margin: 5px 0 0;

            color: #8fa3c7;

            font-size: 14px;
        }

        .crud-icone {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #19243a;

            border: 1px solid #2d3b59;

            font-size: 21px;
        }

        .crud-card-body {
            padding: 28px;
        }


        /* =====================================================
           GRID
        ===================================================== */

        .crud-grid {
            display: grid;

            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 22px 28px;
        }

        .crud-campo {
            min-width: 0;
        }

        .crud-campo label {
            display: block;

            margin-bottom: 8px;

            color: #ffffff;

            font-size: 15px;
            font-weight: 600;
        }

        .crud-campo input,
        .crud-campo select {

            width: 100%;

            height: 50px;

            padding: 0 15px;

            border-radius: 10px;

            border: 1px solid #2d3b59;

            background: #0f1726;

            color: #ffffff;

            font-family: "Inter", sans-serif;

            outline: none;

            transition: 0.2s;
        }

        .crud-campo input:focus,
        .crud-campo select:focus {

            border-color: #3b82f6;

            box-shadow:
                0 0 0 3px rgba(
                    59,
                    130,
                    246,
                    0.12
                );
        }

        .crud-campo input::placeholder {
            color: #7183a5;
        }

        .crud-campo input[readonly] {
            opacity: 0.65;
            cursor: not-allowed;
        }


        /* =====================================================
           BOTÕES
        ===================================================== */

        .crud-botoes {

            display: flex;

            justify-content: flex-end;

            align-items: center;

            gap: 12px;

            margin-top: 28px;

            padding-top: 22px;

            border-top: 1px solid #26344f;
        }

        .botao-crud-laranja {

            min-height: 48px;

            padding: 0 24px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            border: none;

            border-radius: 10px;

            background: #ff5a1f;

            color: #ffffff;

            font-weight: 700;

            text-decoration: none;

            transition: 0.2s;
        }

        .botao-crud-laranja:hover {

            background: #ff6b35;

            color: #ffffff;

            transform: translateY(-1px);
        }

        .botao-crud-voltar {

            min-height: 48px;

            padding: 0 22px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            border: 1px solid #34435f;

            background: transparent;

            color: #ffffff;

            font-weight: 600;

            text-decoration: none;

            transition: 0.2s;
        }

        .botao-crud-voltar:hover {

            background: #19243a;

            color: #ffffff;
        }


        /* =====================================================
           ALERTA
        ====================================================== */

        .crud-alert {
            border-radius: 10px;
            margin-bottom: 25px;
        }


        /* =====================================================
           RODAPÉ
        ====================================================== */

        .rodape {
            margin-top: 40px;
        }


        /* =====================================================
           RESPONSIVO
        ====================================================== */

        @media (max-width: 768px) {

            .crud-pagina {
                padding: 45px 15px;
            }

            .crud-container {
                width: 100%;
            }

            .crud-titulo {
                font-size: 28px;
            }

            .crud-grid {
                grid-template-columns: 1fr;
            }

            .crud-card-header {
                padding: 20px;
            }

            .crud-card-body {
                padding: 20px;
            }

            .crud-botoes {
                flex-direction: column;
            }

            .botao-crud-laranja,
            .botao-crud-voltar {
                width: 100%;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
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
                            class="nav-link active"
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
                            class="nav-link"
                        >
                            Relatórios
                        </a>

                    </div>

                </div>


                <!-- BOTÕES -->

                <div
                    class="botoes-cabecalho d-flex align-items-center gap-2"
                >

                    <button
                        class="botao-icone"
                        type="button"
                        title="Alterar tema"
                        aria-label="Alterar tema"
                    >
                        ☾
                    </button>

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
     CONTEÚDO
====================================================== -->

<main>

    <section class="crud-pagina">

        <div class="container crud-container">


            <!-- =================================================
                 TÍTULO
            ================================================== -->

            <h1 class="crud-titulo">
                ATUALIZAR USUÁRIO
            </h1>

            <p class="crud-subtitulo">
                Pesquise um usuário e altere seus dados cadastrados no GamerMatch.
            </p>


            <!-- =================================================
                 MENSAGEM
            ================================================== -->

            <?php if ($mensagem !== ""): ?>

                <div
                    class="alert alert-<?= htmlspecialchars($tipoMensagem) ?> crud-alert"
                >

                    <?= htmlspecialchars($mensagem) ?>

                </div>

            <?php endif; ?>


            <!-- =================================================
                 BUSCAR USUÁRIO
            ================================================== -->

            <div class="crud-card">

                <div class="crud-card-header">

                    <div>

                        <h2>
                            Buscar usuário
                        </h2>

                        <p>
                            Informe o código do usuário que deseja alterar.
                        </p>

                    </div>

                    <div class="crud-icone">
                        🔎
                    </div>

                </div>


                <div class="crud-card-body">

                    <form method="POST">

                        <div class="crud-grid">


                            <div class="crud-campo">

                                <label for="codigoBusca">
                                    Código do usuário
                                </label>

                                <input
                                    type="number"
                                    id="codigoBusca"
                                    name="codigo"
                                    placeholder="Ex.: 1"
                                    min="1"
                                    required
                                >

                            </div>


                        </div>


                        <div class="crud-botoes">

                            <a
                                href="../admin.php"
                                class="botao-crud-voltar"
                            >
                                ← Voltar
                            </a>

                            <button
                                type="submit"
                                name="buscar"
                                class="botao-crud-laranja"
                            >
                                🔎 Buscar usuário
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- =================================================
                 DADOS DO USUÁRIO
            ================================================== -->

            <?php if ($usuario): ?>

                <div class="crud-card">


                    <div class="crud-card-header">

                        <div>

                            <h2>
                                Dados do usuário
                            </h2>

                            <p>
                                Edite as informações abaixo e salve as alterações.
                            </p>

                        </div>

                        <div class="crud-icone">
                            ✏️
                        </div>

                    </div>


                    <div class="crud-card-body">

                        <form method="POST">


                            <input
                                type="hidden"
                                name="codigo"
                                value="<?= htmlspecialchars($usuario['codigo']) ?>"
                            >


                            <div class="crud-grid">


                                <!-- NOME REAL -->

                                <div class="crud-campo">

                                    <label for="nomeReal">
                                        Nome real
                                    </label>

                                    <input
                                        type="text"
                                        id="nomeReal"
                                        name="nomeReal"
                                        value="<?= htmlspecialchars($usuario['nomeReal']) ?>"
                                        required
                                    >

                                </div>


                                <!-- NICKNAME -->

                                <div class="crud-campo">

                                    <label for="nickName">
                                        Nickname
                                    </label>

                                    <input
                                        type="text"
                                        id="nickName"
                                        name="nickName"
                                        value="<?= htmlspecialchars($usuario['nickName']) ?>"
                                        required
                                    >

                                </div>


                                <!-- LOGIN -->

                                <div class="crud-campo">

                                    <label for="login">
                                        Login
                                    </label>

                                    <input
                                        type="text"
                                        id="login"
                                        name="login"
                                        value="<?= htmlspecialchars($usuario['login']) ?>"
                                        required
                                    >

                                </div>


                                <!-- SENHA -->

                                <div class="crud-campo">

                                    <label for="senha">
                                        Senha
                                    </label>

                                    <input
                                        type="text"
                                        id="senha"
                                        name="senha"
                                        value="<?= htmlspecialchars($usuario['senha']) ?>"
                                        required
                                    >

                                </div>


                                <!-- TIPO -->

                                <div class="crud-campo">

                                    <label for="tipo">
                                        Tipo de usuário
                                    </label>

                                    <select
                                        id="tipo"
                                        name="tipo"
                                        required
                                    >

                                        <option
                                            value="0"
                                            <?= $usuario['tipo'] == 0 ? 'selected' : '' ?>
                                        >
                                            Usuário
                                        </option>

                                        <option
                                            value="1"
                                            <?= $usuario['tipo'] == 1 ? 'selected' : '' ?>
                                        >
                                            Administrador
                                        </option>

                                    </select>

                                </div>


                                <!-- CÓDIGO -->

                                <div class="crud-campo">

                                    <label for="codigoVisual">
                                        Código
                                    </label>

                                    <input
                                        type="text"
                                        id="codigoVisual"
                                        value="<?= htmlspecialchars($usuario['codigo']) ?>"
                                        readonly
                                    >

                                </div>


                            </div>


                            <!-- BOTÕES -->

                            <div class="crud-botoes">

                                <a
                                    href="../admin.php"
                                    class="botao-crud-voltar"
                                >
                                    ← Voltar
                                </a>

                                <button
                                    type="submit"
                                    name="atualizar"
                                    class="botao-crud-laranja"
                                >
                                    💾 Salvar alterações
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            <?php endif; ?>


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
