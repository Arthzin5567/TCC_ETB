<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dentistas - Personal Odontologia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="#">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
        <link rel="stylesheet" href="indexcss/geral.css">
        <link rel="stylesheet" href="indexcss/index.css">
        <link rel="stylesheet" href="indexcss/variaveis.css">
        <link rel="stylesheet" href="exibe/index.css">
    </head>

    <body>
        <div id="principal">
        <header>
            <div id="menu_global" class="menu_global">
                <div>
                    <p> Olá <?php include_once "valida_login.php"; ?></p>
                </div>
                <div>
                    <nav class="nav-list">
                        <?php include_once "menu_local.php"; ?>
                    </nav>
                </div>
            </div>
            </header>
            <div id="conteudo_especifico">
                <h1> Exames </h1>
                <?php
                $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);
                $id = $_GET["id"];

                $stmt = mysqli_prepare($conectar, "SELECT tipo, data, resultado, dentista_idDentista, paciente_idpaciente
                                FROM exame
                                WHERE idexame = ?");
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);
                $registro = mysqli_fetch_assoc($resultado);
                mysqli_stmt_close($stmt);

                echo "<p> Tipo: " . htmlspecialchars($registro['tipo']) . "</p>";
                echo "<p> Data: " . htmlspecialchars($registro['data']) . "</p>";
                echo "<p> Resultado: " . htmlspecialchars($registro['resultado']) . "</p>";
                echo "<p> ID do Dentista: " . htmlspecialchars($registro['dentista_idDentista']) . "</p>";
                echo "<p> ID do Paciente: " . htmlspecialchars($registro['paciente_idpaciente']) . "</p>";

                ?>
            </div>
        </div>
    </body>
</html>