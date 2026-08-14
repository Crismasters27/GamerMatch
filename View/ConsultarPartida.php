<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Consultar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Partida.php');
    require_once('../Control/PartidaControl.php');

    use  Projeto\GamerMatch\Model\Partida;
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
    <title>Consultar Partida</title>
</head>
<body>
    <h1>Consultar Partida</h1>
    <form method="POST">
        <label>Código: </label>
        <input type="number" name="codigo" id="codigo"/>
        <button type="submit">Consultar
        <?php    
            //chamando o método de consulta
            $resultado = $consultar->consultarPartida   ($conexao, $_POST['codigo']);
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