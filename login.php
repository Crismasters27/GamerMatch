<?php
namespace Projeto\GamerMatch;

require_once('DAO/Conexao.php');

use Projeto\GamerMatch\DAO\Conexao;

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $conexao = new Conexao();
    $conn = $conexao->conectar();

    $sql = "SELECT codigo, nomeReal, nickName, senha, tipo
            FROM usuario
            WHERE login = '$login'";

    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $usuario = mysqli_fetch_assoc($resultado);

        if ($senha === $usuario['senha']) {

            if ($usuario['tipo'] == 1) {

                // Administrador
                header("Location: View/Admin.php");
                exit;

            } else {

                // Usuário comum
                header("Location: usuario.php");
                exit;

            }

        } else {

            $mensagem = "Senha incorreta!";

        }

    } else {

        $mensagem = "Usuário não encontrado!";

    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GamerMatch — Entrar</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
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

    <!-- CSS do projeto -->
    <link rel="stylesheet" href="css/estilo.css">

</head>

<body>

    <!-- ===================== TELA DE LOGIN ===================== -->

    <main class="tela-login">

        <div class="container">

            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-12 col-sm-10 col-md-7 col-lg-5">

                    <!-- CARTÃO DE LOGIN -->

                    <div class="cartao-login">

                        <!-- LOGO -->

                        <div class="text-center mb-4">

                            <a href="index.php" class="logo-login">

                                <img
                                    src="imagens/logo.png"
                                    alt="GamerMatch"
                                >

                            </a>

                            <h1 class="titulo-login">

                                GAMER<span>MATCH</span>

                            </h1>

                            <p class="subtitulo-login">

                                Entre na sua conta e continue competindo.

                            </p>

                        </div>


                        <!-- MENSAGEM -->

                        <?php if ($mensagem != ""): ?>

                            <div class="alert alert-danger text-center">

                                <?= htmlspecialchars($mensagem) ?>

                            </div>

                        <?php endif; ?>


                        <!-- FORMULÁRIO -->

                        <form action="login.php" method="POST">

                            <!-- LOGIN -->

                            <div class="mb-3">

                                <label
                                    for="login"
                                    class="form-label"
                                >
                                    Login
                                </label>

                                <input
                                    type="text"
                                    class="form-control campo-login"
                                    id="login"
                                    name="login"
                                    placeholder="Digite seu login"
                                    required
                                >

                            </div>


                            <!-- SENHA -->

                            <div class="mb-3">

                                <label
                                    for="senha"
                                    class="form-label"
                                >
                                    Senha
                                </label>

                                <input
                                    type="password"
                                    class="form-control campo-login"
                                    id="senha"
                                    name="senha"
                                    placeholder="Digite sua senha"
                                    required
                                >

                            </div>


                            <!-- LEMBRAR-ME -->

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="lembrar"
                                        name="lembrar"
                                    >

                                    <label
                                        class="form-check-label"
                                        for="lembrar"
                                    >
                                        Lembrar-me
                                    </label>

                                </div>

                                <a href="#" class="link-login">
                                    Esqueci minha senha
                                </a>

                            </div>


                            <!-- BOTÃO ENTRAR -->

                            <button
                                type="submit"
                                class="btn botao-principal w-100 botao-login"
                            >

                                ENTRAR

                            </button>

                        </form>


                        <!-- CADASTRO -->

                        <div class="text-center mt-4">

                            <p class="texto-cadastro">

                                Ainda não possui uma conta?

                                <a
                                    href="View/CadastrarUsuario.php"
                                    class="link-login"
                                >
                                    Cadastre-se
                                </a>

                            </p>

                        </div>


                        <!-- VOLTAR -->

                        <div class="text-center mt-3">

                            <a
                                href="index.php"
                                class="link-voltar"
                            >

                                ← Voltar para o GamerMatch

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>