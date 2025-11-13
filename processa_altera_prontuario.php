<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

    $cod = $_POST["codigo"];

    $numero = $_POST["numero"];
    $dataAbertura = $_POST["dataAbertura"];
    $anotacoes = $_POST["anotacoes"];
    $dentista_idDentista = $_POST["dentista_idDentista"];
    

    $sql_altera = "UPDATE prontuario
                    SET numero = '$numero',
                        dataAbertura = '$dataAbertura',
                        anotacoes = '$anotacoes',
                        dentista_idDentista = '$dentista_idDentista'
                    WHERE idprontuario = '$cod'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    
    if ($sql_resultado_alteracao == true) {

        echo "<script> alert ('Prontuário alterado com sucesso! ') </script>";
        echo "<script> location.href = ('prontuarios.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_prontuario.php?id=$cod') </script>";

    }

?>