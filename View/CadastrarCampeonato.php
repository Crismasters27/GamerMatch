<?php
    namespace Projeto\GamerMatch\View;

    require_once('../DAO/Cadastrar.php');
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Consultar.php');
    require_once('../Model/Campeonato.php');
    require_once('../Control/CampeonatoControl.php');

    use Projeto\GamerMatch\Model\Campeonato;
    use Projeto\GamerMatch\Control\Control;
    use Projeto\GamerMatch\DAO\Conexao;
    use Projeto\GamerMatch\DAO\Cadastrar;
    use Projeto\GamerMatch\DAO\Consultar;

    $conexao = new Conexao();
    $inserir = new Cadastrar();
    $consultar = new Consultar();

    $mensagem = "";

    $jogos = $consultar->listarJogos($conexao);
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Campeonato</title>
</head>
<body>
    <h1>Cadastrar Campeonato</h1>
    <form method="POST">

        <label>Nome do Campeonato: </label>
        <input type="text" name="nomeDoCampeonato" id="nomeDoCampeonato"/><br><br>

        <label>Data de Inicio: </label>
        <input type="date" name="dataInicio" id="dataInicio"/><br><br>

        <label>Data de Encerramento: </label>
        <input type="date" name="dataFim" id="dataFim"/><br><br>

        <label>Prémio: </label>
        <input type="decimal" name="premio" id="premio"/><br><br>

        <label>Jogo:</label>
       
        <select name="jogo_codigo" id="jogo_codigo" required>
            <option value="">Selecione um jogo</option>


            <?php
                $contador = 0;
                while($contador < count($jogos)){
            ?>

            <option value="<?= $jogos[$contador]['codigo'] ?>">
                <?= $jogos[$contador]['nome'] ?>
            </option>

            <?php
                $contador++;
            }
            ?>

            </select><br><br>


   
        <button type="submit">Cadastrar Campeonato
            <?php 
    
                // Coletando os dados
                if(isset($_POST['nomeDoCampeonato']))
                {
                    $nomeDoCampeonato     = $_POST['nomeDoCampeonato'];
                    $dataInicio           = $_POST['dataInicio'];
                    $dataFim              = $_POST['dataFim'];
                    $premio               = $_POST['premio'];
                    $jogo_codigo          = $_POST['jogo_codigo'];
                    
                    $mensagem = $inserir->cadastrarCampeonato($conexao, $nomeDoCampeonato, $dataInicio, $dataFim, $premio, $jogo_codigo);
                }
               
            ?> 
        </button>
    </form>
    <?php 
        if(isset($_POST['nomeDoCampeonato'])){
            echo $mensagem;
        }else{
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