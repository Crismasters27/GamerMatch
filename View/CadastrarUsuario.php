<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Cadastrar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Usuario.php');
    require_once('../Control/UsuarioControl.php');
    require_once('../DAO/Consultar.php');

    use  Projeto\GamerMatch\Model\Usuario;
    use  Projeto\GamerMatch\Control\Control;
    use  Projeto\GamerMatch\DAO\Conexao;
    use  Projeto\GamerMatch\DAO\cadastrar;
    use Projeto\GamerMatch\DAO\Consultar;

    $conexao  = new Conexao();
    $inserir  = new Cadastrar();
    $mensagem = "";

    $consultar = new Consultar();
    $equipes = $consultar->listarEquipes($conexao);

    // Coletando os dados
    if (isset($_POST['nomeCompleto'])) {
        $nomeReal       = $_POST['nomeCompleto'];
        $nickName       = $_POST['nickname'];
        $dtDeNascimento = $_POST['dataNascimento'];
        $nacionalidade  = $_POST['nacionalidade'];
        $login          = $_POST['login'];
        $senha          = $_POST['senha'];
        $tipo           = (bool) $_POST['tipo'];
        $equipe_codigo  = (int) $_POST['equipe_codigo'];

        $mensagem = $inserir->cadastrarUsuario($conexao, $nomeReal, $nickName, $dtDeNascimento, $nacionalidade, $login, $senha, $tipo, $equipe_codigo);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- CSS do projeto -->
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <!-- ===================== TELA DE CADASTRO ===================== -->
    <main class="tela-login">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100 py-5">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                    <!-- ===================== CARTÃO ===================== -->
                    <div class="cartao-login">

                        <!-- LOGO E TÍTULO -->
                        <div class="text-center mb-4">
                            <a href="index.html" class="logo-login">
                                <img src="../imagens/logo.png" alt="Logo GamerMatch">
                            </a>

                            <h1 class="titulo-login mt-3">CRIAR <span>USUARIO</span></h1>
                            <p class="subtitulo-login">
                                Crie sua conta e faça parte do GamerMatch.
                            </p>
                        </div>


                        <!-- ===================== FORMULÁRIO ===================== -->
                        <form action="#" method="POST">

                            <!-- NOME E NICKNAME -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nomeCompleto" class="form-label">
                                        Nome completo
                                    </label>
                                    <input type="text" class="form-control campo-login" id="nomeCompleto" name="nomeCompleto" placeholder="Digite seu nome">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nickname" class="form-label">
                                        Nickname
                                    </label>
                                    <input type="text" class="form-control campo-login" id="nickname" name="nickname" placeholder="Seu nome no jogo">
                                </div>
                            </div>

                            <!-- DATA DE NASCIMENTO E NACIONALIDADE -->

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dataNascimento"
                                        class="form-label">
                                        Data de nascimento
                                    </label>

                                    <input type="date" class="form-control campo-login" id="dataNascimento" name="dataNascimento">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nacionalidade" class="form-label">
                                        Nacionalidade
                                    </label>

                                    <input type="text" class="form-control campo-login" id="nacionalidade" name="nacionalidade" placeholder="Ex.: Brasileira">
                                </div>
                            </div>

                            <!-- EQUIPE -->
                            <div class="mb-3">
                            <label for="equipe_codigo" class="form-label">
                                Equipe
                            </label>

                            <select name="equipe_codigo" id="equipe_codigo" class="form-select campo-login" required>
                                <option value="">Selecione uma equipe</option>
                                <?php foreach ($equipes as $equipe): ?>
                                    <option value="<?= $equipe['codigo'] ?>">
                                    <?= htmlspecialchars($equipe['nome']) ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                            <!-- LOGIN -->
                            <div class="mb-3">
                                <label for="login" class="form-label">
                                    Login
                                </label>

                                <input type="text" class="form-control campo-login" id="login" name="login" placeholder="Escolha seu login">
                            </div>

                            <!-- SENHA E CONFIRMAÇÃO -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="senha" class="form-label">
                                        Senha
                                    </label>

                                    <input type="password" class="form-control campo-login" id="senha" name="senha" placeholder="Digite sua senha">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="confirmarSenha" class="form-label">
                                        Confirmar senha
                                    </label>

                                    <input type="password" class="form-control campo-login" id="confirmarSenha" name="confirmarSenha" placeholder="Repita sua senha">
                                </div>
                            </div>

                            <!-- TERMOS DE USO -->
                            <!-- <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="termos" name="termos">

                                <label class="form-check-label" for="termos">
                                    Concordo com os termos de uso.
                                </label>
                            </div> -->

                            <!-- TIPO DE USUÁRIO -->

                            <div class="mb-3">

                                <label for="tipo" class="form-label">
                                    Tipo de usuário
                                </label>

                                <select
                                    name="tipo"
                                    id="tipo"
                                    class="form-select campo-login"
                                    required
                                >

                                    <option value="0">Usuário Comum</option>
                                    <option value="1">Administrador</option>

                                </select>

                            </div>

                            <!-- BOTÃO -->
                            <button type="submit" class="btn botao-principal w-100 botao-login">
                                CRIAR CONTA
                            </button>
                        </form>
                        
                        <!-- MENSAGEM DO CADASTRO -->

                        <?php
                            if(isset($_POST['nomeCompleto'])){
                                echo $mensagem;
                            }
                        ?>

                        <!-- ===================== LOGIN ===================== -->
                        <div class="text-center mt-4">
                            <p class="texto-cadastro">
                                Já possui uma conta?
                                <a href="login.html" class="link-login">
                                    Entrar
                                </a>
                            </p>
                        </div>

                        <!-- ===================== VOLTAR ===================== -->
                        <div class="text-center mt-3">
                            <a href="../index.php" class="link-voltar">
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
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>