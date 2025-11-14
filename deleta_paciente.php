<?php
    session_start();

    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

    $cod = $_GET["codigo"];

    

    $sql_deleta = "DELETE FROM paciente
                    WHERE cpf = '$cod'";

    $sql_resultado_delecao = mysqli_query($conectar, $sql_deleta);
    
    if ($sql_resultado_delecao = true) {

        echo "<script> alert ('Paciente deletado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_pac.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não deletados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('lista_pac.php?codigo=$cod') </script>";

    }