<?php
    session_start();

    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

    $cod = $_POST["codigo"];

    $tipo = $_POST["tipo"];
    $data = $_POST["data"];
    $resultado = $_POST["resultado"];
    $dentista_idDentista = $_POST["dentista_idDentista"];
    $paciente_idpaciente = $_POST["paciente_idpaciente"];
    

    $sql_altera = "UPDATE exame
                SET tipo = ?,
                    data = ?,
                    resultado = ?,
                    dentista_idDentista = ?,
                    paciente_idpaciente = ?
                WHERE idexame = ?";

    $stmt = mysqli_prepare($conectar, $sql_altera);
    mysqli_stmt_bind_param($stmt, "sssiii",
        $tipo, $data, $resultado, $dentista_idDentista,
        $paciente_idpaciente, $cod
    );

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($success = true) {

        echo "<script> alert ('Exame alterado com sucesso! ') </script>";
        echo "<script> location.href = ('exames.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_exame.php?id=$cod') </script>";

    }