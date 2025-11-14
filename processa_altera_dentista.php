<?php
    session_start();

    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

    $cod = $_POST["codigo"];
    $matricula = $_POST["matricula"];
    $especialidade= $_POST["especialidade"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $dataNascimento = $_POST["dataNascimento"];
    $dataContratacao = $_POST["dataContratacao"];
    $salario = $_POST["salario"];
    $funcao = $_POST["funcao"];
    $auxiliardeDentista_idauxiliar = $_POST["auxiliardeDentista_idauxiliar"];

    

    $sql_altera = "UPDATE dentista 
                SET matricula = ?,
                    especialidade = ?,
                    nome = ?,
                    login = ?,
                    senha = ?,
                    cpf = ?,
                    endereco = ?,
                    telefone = ?,
                    dataNascimento = ?,
                    dataContratacao = ?,
                    salario = ?,
                    funcao = ?,
                    auxiliardeDentista_idauxiliar = ?
                WHERE cpf = ?";

    $stmt = mysqli_prepare($conectar, $sql_altera);
    // 14 "s" = 14 strings (ajuste se tiver números)
    mysqli_stmt_bind_param($stmt, "issssssissdsis",
        $matricula, $especialidade, $nome, $login, $senha,
        $cpf, $endereco, $telefone, $dataNascimento,
        $dataContratacao, $salario, $funcao,
        $auxiliardeDentista_idauxiliar, $cod
    );

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($success = true) {

        echo "<script> alert ('Dentista alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_den.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_dentista.php?codigo=$cod') </script>";

    }