<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_POST["codigo"];

    $tipo = $_POST["tipo"];
    $data = $_POST["data"];
    $resultado = $_POST["resultado"];
    $dentista_idDentista = $_POST["dentista_idDentista"];
    $paciente_idpaciente = $_POST["paciente_idpaciente"];
    

    $sql_altera = "UPDATE exame
                    SET tipo = '$tipo',
                        data = '$data',
                        resultado = '$resultado',
                        dentista_idDentista = '$dentista_idDentista',
                        paciente_idpaciente = '$paciente_idpaciente'
                    WHERE idexame = '$cod'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    
    if ($sql_resultado_alteracao == true) {

        echo "<script> alert ('Exame alterado com sucesso! ') </script>";
        echo "<script> location.href = ('exames.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_exame.php?id=$cod') </script>";

    }

?>