<?php
    namespace Projeto\GamerMatch\View;
    require_once('../Model/Equipe.php');
    require_once('../Control/EquipeControl.php');
    require_once('../DAO/Conexao.php');
    require_once('../DAO/Excluir.php'); 

    use  Projeto\GamerMatch\Model\Equipe;
    use  Projeto\GamerMatch\Control\Control;
    use  Projeto\GamerMatch\DAO\Conexao;
    use  Projeto\GamerMatch\DAO\Excluir;
    //inicia sessão 
    //session_start();
    //coletar o objeto
    //$clienteRecuperado = $_SESSION['cliente'];
    //$controle = new Control($clienteRecuperado);//para acessar metodos de atualização
    //$resultado = 0;//instanciando o valor inicial
   
    //instaciando
    $conexao   = new Conexao();
    $excluir   = new Excluir();
    $resultado = ""; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Equipe</title>
</head>
<body>
    <h1>Excluir Equipe</h1>
        <form method="POST">
            <label>Código</label>
            <input type="number" name ="codigo" id="codigo"/>
            <br><br>
            <button type="submit"> Excluir
               <?php
                $resultado = $excluir->excluirEquipe($conexao, $_POST['codigo']);
                ?>
            </button>
        </form>
        <?php
           //if($resultado = 1)
           //{ 
            echo $resultado;
           //}
          //else
           //{
           //echo "Aperte o botão para confirmar a exclusão!";
           //}
        ?>  
        <br>
     <a href="../index.php"><button>Voltar</button></a>
</body>
</html>