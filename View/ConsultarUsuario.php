<?php
    namespace Projeto\GamerMatch;
    require_once('../DAO/Conexao.php');
    use Projeto\GamerMatch\DAO\Conexao;

    $conexao = new Conexao();
    $conn = $conexao->conectar();

    $sql = "SELECT codigo, nomeReal, nickName, login, tipo FROM usuario ORDER BY codigo ASC";
    $resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamerMatch — Consultar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<header class="cabecalho">
    <div class="container-fluid px-4">
        <nav class="navbar navbar-expand-lg">
            <a href="admin.php" class="logo">
                <img src="../imagens/logo.png" alt="GamerMatch">
            </a>

            <div class="menu-navegacao mx-auto">
                <div class="navbar-nav">
                    <a href="admin.php" class="nav-link">
                        Início
                    </a>

                    <a href="ConsultarUsuario.php" class="nav-link active">
                        Usuários
                    </a>
                </div>

            </div>

            <div class="botoes-cabecalho">
                <a href="admin.php" class="botao-contorno">
                    Voltar
                </a>
            </div>
        </nav>
    </div>
</header>

<main>

    <section class="secao">
    <div class="container">

        <div class="mb-4">

            <h1 class="titulo-secao">

                <span class="barra-titulo"></span>

                CONSULTAR USUÁRIOS

            </h1>

            <p class="subtitulo-secao">
                Usuários cadastrados no GamerMatch.
            </p>

        </div>


        <div class="painel">
            <div class="cabecalho-painel">
                <div>
                    <h2>
                        Lista de Usuários
                    </h2>

                    <p>
                        Consulte os usuários cadastrados no sistema.
                    </p>
                </div>

                <span class="icone-painel">
                    👥
                </span>
            </div>


        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Nickname</th>
                        <th>Login</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>

                <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

                    <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($usuario['codigo']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($usuario['nomeReal']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($usuario['nickName']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($usuario['login']) ?>
                            </td>

                            <td>

                                <?php if ($usuario['tipo'] == 1): ?>

                                    <span class="badge bg-danger">
                                        Administrador
                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-primary">
                                        Usuário
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="5" class="text-center py-4">

                            Nenhum usuário cadastrado.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>

</main>


<footer class="rodape">

    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">

        <a class="logo-rodape" href="admin.php">

            <img src="../imagens/logo.png" alt="GamerMatch">

        </a>

        <p class="copyright mb-0">
            &copy; 2026 GamerMatch. Todos os direitos reservados.
        </p>

    </div>

</footer>

</body>

</html>

<?php
mysqli_close($conn);
?>