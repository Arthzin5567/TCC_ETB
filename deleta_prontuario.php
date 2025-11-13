<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_GET["codigo"];

    

    $sql_deleta = "DELETE FROM prontuario
                    WHERE idprontuario = '$cod'";

    $sql_resultado_delecao = mysqli_query($conectar, $sql_deleta);
    
    if ($sql_resultado_delecao == true) {

        echo "<script> alert ('Prontuário deletado com sucesso! ') </script>";
        echo "<script> location.href = ('prontuarios_den.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não deletados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('prontuarios_den.php?codigo=$cod') </script>";

    }

?>