<?php
    namespace Projeto\GamerMatch\View;
    require_once('../DAO/Cadastrar.php');
    require_once('../DAO/Conexao.php');
    require_once('../Model/Partida.php');
    require_once('../Control/PartidaControl.php');
    require_once('../DAO/Consultar.php');

    use  Projeto\GamerMatch\Model\Partida;
    use  Projeto\GamerMatch\Control\Control;
    use  Projeto\GamerMatch\DAO\Conexao;
    use  Projeto\GamerMatch\DAO\cadastrar;
    use Projeto\GamerMatch\DAO\Consultar;

    $conexao  = new Conexao();
    $inserir  = new Cadastrar();
    $consultar = new Consultar();

    $campeonatos = $consultar->listarCampeonatos($conexao);
    $mensagem = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Partida</title>
</head>
<body>
    <h1>Cadastrar Partida</h1>
    <form method="POST">

        <label>Resultado:</label>

        <select name="resultado" id="resultado" required>

        <option value="">Selecione uma opção</option>

        <option value="Aguardando resultado">Aguardando resultado</option>
        <option value="Vitoria do Jogador 1">Vitoria do Jogador 1</option>
        <option value="Vitoria do Jogador 2">Vitoria do Jogador 2</option>

         </select><br><br>

        <label>Status:</label>

        <select name="statuss" id="statuss" required>

        <option value="">Selecione uma opção</option>

        <option value="Agendado">Agendado</option>
        <option value="Em Andamento">Em Andamento</option>
        <option value="Finalizada">Finalizada</option>
        <option value="Cancelada">Cancelada</option>

         </select><br><br>

        <label>Campeonato:</label>

        <select name="campeonato_codigo" id="campeonato_codigo" required>
        <option value="">Selecione um campeonato</option>

        <?php foreach ($campeonatos as $campeonato): ?>
        <option value="<?= $campeonato['codigo'] ?>">
            <?= htmlspecialchars($campeonato['nomeDoCampeonato']) ?>
            -
            <?= htmlspecialchars($campeonato['nomeJogo']) ?>
        </option>

        <?php endforeach; ?>

        </select>
         <br><br>

   
        <button type="submit">Cadastrar Partida
            <?php 
    
                // Coletando os dados
                if(isset($_POST['resultado']))
                {
                    $resultado            = $_POST['resultado'];
                    $statuss              = $_POST['statuss'];
                    $campeonato_codigo    = (int) $_POST['campeonato_codigo'];
                    
                    $mensagem = $inserir->cadastrarPartida($conexao, $resultado, $statuss, $campeonato_codigo);
                }
               
            ?> 
        </button>
    </form>
    <?php 
        if(isset($_POST['resultado']))
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