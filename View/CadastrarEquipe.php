<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Cadastrar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Equipe.php');
    require_once('../Control/EquipeControl.php');
    use  Projeto\GamerMatch\Model\Equipe;
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
    <title>Cadastrar Equipe</title>
</head>
<body>
    <h1>Cadastrar Equipe</h1>
    <form method="POST">

        <label>Nome: </label>
        <input type="text" name="nome" id="nome"/><br><br>

        <label>Abreviação: </label>
        <input type="text" name="abreviacao" id="abreviacao"/><br><br>

        <label>país: </label>
        <input type="text" name="pais" id="pais"/><br><br>

   
        <button type="submit">Cadastrar Equipe
            <?php 
    
                // Coletando os dados
                if(isset($_POST['nome']))
                {
                    $nome            = $_POST['nome'];
                    $abreviacao      = $_POST['abreviacao'];
                    $pais            = $_POST['pais'];
                    
                    $mensagem = $inserir->cadastrarEquipe($conexao, $nome, $abreviacao, $pais);
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