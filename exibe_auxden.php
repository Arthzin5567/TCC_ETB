<?php
session_start();

?>
<!DOCTYPE html>
<html>

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
                <p> Olá <?php include "valida_login.php"; ?></p>
            </div>
            <div>
                <nav class="nav-list">
                    <?php include "menu_local.php"; ?>
                </nav>
            </div>
        </div>
        </header>
        <div id="conteudo_especifico">
            <h1> Auxiliares de Dentista </h1>
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "clinica");
            $cod = $_GET["codigo"];

            $sql_consulta = "SELECT supervisor, nome, cpf, telefone, endereco, dataNascimento
                             FROM auxiliardeDentista
                             WHERE cpf = '$cod'";
            $sql_resultado = mysqli_query($conectar, $sql_consulta);
            $registro = mysqli_fetch_assoc($sql_resultado);

            echo "<p> Supervisor: " . htmlspecialchars($registro['supervisor']) . "</p>";
            echo "<p> Nome: " . htmlspecialchars($registro['nome']) . "</p>";
            echo "<p> CPF: " . htmlspecialchars($registro['cpf']) . "</p>";
            echo "<p> Telefone: " . htmlspecialchars($registro['telefone']) . "</p>";
            echo "<p> Endereço: " . htmlspecialchars($registro['endereco']) . "</p>";
            echo "<p> Data de Nascimento: " . htmlspecialchars($registro['dataNascimento']) . "</p>";
            ?>
        </div>
    </div>
</body>

</html>