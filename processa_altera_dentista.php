<?php 
    session_start();

    $conectar = mysqli_connect("localhost", "root", "", "clinica");

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
                    SET matricula = '$matricula',
                        especialidade = '$especialidade',
                        nome = '$nome',
                        login = '$login',
                        senha = '$senha',
                        cpf = '$cpf',
                        endereco = '$endereco',
                        telefone = '$telefone',
                        dataNascimento = '$dataNascimento',
                        dataContratacao = '$dataContratacao',
                        salario = '$salario',
                        funcao = '$funcao',
                        auxiliardeDentista_idauxiliar = '$auxiliardeDentista_idauxiliar'
                    WHERE cpf = '$cod'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
    
    if ($sql_resultado_alteracao == true) {

        echo "<script> alert ('Dentista alterado com sucesso! ') </script>";
        echo "<script> location.href = ('lista_den.php') </script>";

    } else {

        echo "<script> alert ('Ocorreu um erro no servidor, dados não alterados, tente de novo mais tarde') </script>";
        echo "<script> location.href ('altera_dentista.php?codigo=$cod') </script>";

    }

?>