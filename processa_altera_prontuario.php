<?php
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_POST["codigo"];

    $numero = $_POST["numero"];
    $dataAbertura = $_POST["dataAbertura"];
    $anotacoes = $_POST["anotacoes"];
    $dentista_idDentista = $_POST["dentista_idDentista"];
    

    $sql_altera = "UPDATE prontuario
                SET numero = ?,
                    dataAbertura = ?,
                    anotacoes = ?,
                    dentista_idDentista = ?
                WHERE idprontuario = ?";

    $stmt = mysqli_prepare($conectar, $sql_altera);
    mysqli_stmt_bind_param($stmt, "issii",
        $numero, $dataAbertura, $anotacoes,
        $dentista_idDentista, $cod
    );

    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    if ($success = true) {

        echo "<script> alert ('Prontuário alterado com sucesso! ') </script>";
        echo "<script> location.href = ('prontuarios.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_prontuario.php?id=$cod') </script>";

    }