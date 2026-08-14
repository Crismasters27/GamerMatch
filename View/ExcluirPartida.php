<?php
    namespace Projeto\GamerMatch\View;
    require_once('../Model/Partida.php');
    require_once('../Control/PartidaControl.php');
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Excluir.php');

    use Projeto\GamerMatch\Model\Partida;
    use Projeto\GamerMatch\Control\Control;
    use Projeto\GamerMatch\DAO\Conexao;
    use Projeto\GamerMatch\DAO\Excluir;

    $conexao = new Conexao();
    $excluir = new Excluir();
    $resultado = "";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Partida</title>
</head>
<body>
    <h1>Excluir Partida</h1>
    <form method="POST">
        <label>Código:</label>
        <input type="number" name="codigo" id="codigo">
        <br><br>
        <button type="submit">Excluir
            <?php
                $resultado = $excluir->excluirPartida($conexao, $_POST['codigo']);
            ?>
        </button>
    </form>
        <?php
            echo $resultado;
        ?>
        <br><br>
        
    <a href="../index.php"><button type="button">Voltar</button></a>

</body>
</html>