<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Excluir.php');

    use Projeto\GamerMatch\DAO\Conexao;
    use Projeto\GamerMatch\DAO\Excluir;

    $conexao = new Conexao();
    $excluir = new Excluir();
    $resultado = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
            $codigo = $_POST['codigo'];
            $resultado = $excluir->excluirUsuario($conexao, $codigo);
        } else {
            $resultado = "Informe o código do usuário.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerMatch — Excluir Usuário</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
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
                <a href="../index.php" class="logo">
                    <img src="../imagens/logo.png" alt="GamerMatch">
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

                    <div class="botoes-cabecalho d-flex align-items-center gap-2">

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

        <section class="secao secao-usuario">

            <div class="container">


                <!-- TÍTULO -->

                <div class="mb-4">

                    <h1 class="titulo-secao">

                        <span class="barra-titulo"></span>

                        EXCLUIR USUÁRIO

                    </h1>

                    <p class="subtitulo-secao">

                        Remova um usuário cadastrado no GamerMatch.

                    </p>

                </div>


                <!-- PAINEL -->

                <div class="row justify-content-center">

                    <div class="col-12 col-lg-8">

                        <div class="painel">


                            <!-- CABEÇALHO DO PAINEL -->

                            <div class="cabecalho-painel">

                                <div>

                                    <h2>
                                        Remover usuário
                                    </h2>

                                    <p>
                                        Informe o código do usuário que deseja excluir.
                                    </p>

                                </div>

                                <span class="icone-painel">
                                    🗑️
                                </span>

                            </div>


                            <!-- FORMULÁRIO -->

                            <div class="p-4">

                                <form
                                    method="POST"
                                    action=""
                                >

                                    <div class="mb-4">

                                        <label
                                            for="codigo"
                                            class="form-label"
                                        >
                                            Código do usuário
                                        </label>

                                        <input
                                            type="number"
                                            class="form-control campo-login"
                                            name="codigo"
                                            id="codigo"
                                            placeholder="Ex.: 1"
                                            min="1"
                                            required
                                        >

                                        <div class="form-text">
                                            Digite o código do usuário cadastrado no banco de dados.
                                        </div>

                                    </div>


                                    <!-- BOTÕES -->

                                    <div class="d-flex flex-wrap gap-3">

                                        <button
                                            type="submit"
                                            class="btn botao-principal"
                                            onclick="return confirm('Tem certeza que deseja excluir este usuário?');"
                                        >

                                            🗑️ Excluir usuário

                                        </button>


                                        <a
                                            href="../admin.php#gerenciamento"
                                            class="botao-contorno"
                                        >

                                            ← Voltar

                                        </a>

                                    </div>

                                </form>


                                <!-- RESULTADO -->

                                <?php if (!empty($resultado)): ?>

                                    <div class="alert alert-info mt-4">

                                        <?= htmlspecialchars($resultado) ?>

                                    </div>

                                <?php endif; ?>


                            </div>

                        </div>

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

                &copy; 2026 GamerMatch. Todos os direitos reservados.

            </p>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>