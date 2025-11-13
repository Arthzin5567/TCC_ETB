<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_POST["codigo"];

    $idpaciente = $_POST["idpaciente"];
    $dataCadastro = $_POST["dataCadastro"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $dataNascimento = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];
    

    $sql_altera = "UPDATE paciente
                    SET dataCadastro = '$dataCadastro',
                        nome = '$nome',
                        cpf = '$cpf',
                        endereco = '$endereco',
                        dataNascimento = '$dataNascimento'
                    WHERE cpf = '$cod'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    
    if ($sql_resultado_alteracao == true) {

        echo "<script> alert ('Paciente alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_pac.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_paciente.php?codigo=$cod') </script>";

    }

?>