<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Consultar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Equipe.php');
    require_once('../Control/EquipeControl.php');

    use  Projeto\GamerMatch\Model\Equipe;
    use  Projeto\GamerMatch\Control\Control;
    use  Projeto\GamerMatch\DAO\Consultar;
    use  Projeto\GamerMatch\DAO\Conexao;

    $conexao   = new Conexao();
    $consultar = new Consultar(); 
    $resultado = "";

    //coletar o objeto
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Equipe</title>
</head>
<body>
    <h1>Consultar Equipe</h1>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="codigo" id="codigo"/>
        <button type="submit">Consultar
        <?php    
            //chamando o método de consulta
            $resultado = $consultar->consultarEquipe($conexao, $_POST['codigo']);
        ?>
        </button>
    </form>
        <?php 
            echo $resultado;
        ?>
    <br><br>
    <a href="../index.php"><button>Voltar</button></a>
</body>
</html>