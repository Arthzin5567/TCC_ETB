<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_POST["codigo"];
    $supervisor = $_POST["supervisor"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $dataNascimento = $_POST["dataNascimento"];

    

    $sql_altera = "UPDATE auxiliardedentista
                    SET supervisor = '$supervisor',
                        nome = '$nome',
                        cpf = '$cpf',
                        endereco = '$endereco',
                        telefone = '$telefone',
                        dataNascimento = '$dataNascimento'
                    WHERE cpf = '$cod'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    
    if ($sql_resultado_alteracao == true) {

        echo "<script> alert ('Auxiliar alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_auxden.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_auxiliarDentista.php?codigo=$cod') </script>";

    }

?>