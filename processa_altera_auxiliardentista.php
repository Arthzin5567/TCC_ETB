<?php
    session_start();

    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

    $cod = $_POST["codigo"];
    $supervisor = $_POST["supervisor"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $dataNascimento = $_POST["dataNascimento"];

    

    $sql_altera = "UPDATE auxiliardedentista
                SET supervisor = ?,
                    nome = ?,
                    cpf = ?,
                    endereco = ?,
                    telefone = ?,
                    dataNascimento = ?
                WHERE cpf = ?";

    $stmt = mysqli_prepare($conectar, $sql_altera);

    mysqli_stmt_bind_param($stmt, "ssssiss",
        $supervisor,
        $nome,
        $cpf,
        $endereco,
        $telefone,
        $dataNascimento,
        $cod
    );

    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    
    if ($success = true) {

        echo "<script> alert ('Auxiliar alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_auxden.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_auxiliarDentista.php?codigo=$cod') </script>";

    }