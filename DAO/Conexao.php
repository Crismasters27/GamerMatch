<?php
    namespace Projeto\GamerMatch\DAO;

    class Conexao
    {
        function conectar()
        {
            try //acessar Banco de Dados
            {
                $conn = mysqli_connect('localhost','root','','gamer_match');

                //validação
                if($conn)
                {
                    //echo "<br>Ação efetuada com sucesso!";
                    return $conn;
                }
                echo "Algo deu errado";
            }
            catch(Excepetion $erro) // se der erro 
            {
                echo "Algo deu errado<br><br> $erro";
            }

        }//fim da conexão
    }//fim da conexão
?>