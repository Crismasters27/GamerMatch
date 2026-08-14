<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Cadastrar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Jogo.php');
    require_once('../Control/JogoControl.php');
    use  Projeto\GamerMatch\Model\Jogo;
    use  Projeto\GamerMatch\Control\Control;
    use  Projeto\GamerMatch\DAO\Conexao;
    use  Projeto\GamerMatch\DAO\cadastrar;

    $conexao  = new Conexao();
    $inserir  = new Cadastrar();
    $mensagem = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Jogo</title>
</head>
<body>
    <h1>Cadastrar Jogo</h1>
    <form method="POST">

        <label>Nome: </label>
        <input type="text" name="nome" id="nome"/><br><br>

        <label>Desenvolvedora: </label>
        <input type="text" name="desenvolvedora" id="desenvolvedora"/><br><br>

        <label>Gênero: </label>
        <input type="text" name="genero" id="genero"/><br><br>

   
        <button type="submit">Cadastrar Jogo
            <?php 
    
                // Coletando os dados
                if(isset($_POST['nome']))
                {
                    $nome            = $_POST['nome'];
                    $desenvolvedora  = $_POST['desenvolvedora'];
                    $genero          = $_POST['genero'];
                    
                    $mensagem = $inserir->cadastrarJogo($conexao, $nome, $desenvolvedora, $genero);
                }
               
            ?> 
        </button>
    </form>
    <?php 
        if(isset($_POST['nome']))
        {
        echo $mensagem;
        }
        else
        {
            echo "Preencha os campos!";
        }
        
    ?>
    <a href="../index.php"><button>Voltar</button></a>
</body>
</html>

<!-- if ($usuario['tipo'] == 1) {
    // abre área administrativa
} else {
    // abre área normal
}