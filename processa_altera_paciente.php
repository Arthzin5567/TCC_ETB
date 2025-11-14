<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

    $cod = $_POST["codigo"];

    $idpaciente = $_POST["idpaciente"];
    $dataCadastro = $_POST["dataCadastro"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $dataNascimento = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];
    

    $sql_altera = "UPDATE paciente
                SET dataCadastro = ?,
                    nome = ?,
                    cpf = ?,
                    endereco = ?,
                    dataNascimento = ?
                WHERE cpf = ?";

    $stmt = mysqli_prepare($conectar, $sql_altera);
    mysqli_stmt_bind_param($stmt, "sssssis",
        $dataCadastro, $nome, $cpf, $endereco,
        $dataNascimento, $cod
    );

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($success = true) {

        echo "<script> alert ('Paciente alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_pac.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_paciente.php?codigo=$cod') </script>";

    }