<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exibição de Dentistas - Personal Odontologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
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
            <h1> Dados do Dentista </h1>
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "clinica");
            $cod = $_GET["codigo"];

            $sql_consulta = "SELECT matricula, especialidade, nome, login, senha, cpf, telefone, endereco,
                                    dataNascimento, dataContratacao, salario, funcao, auxiliardeDentista_idauxiliar
                                FROM dentista
                                WHERE cpf = '$cod'";
            $sql_resultado = mysqli_query($conectar, $sql_consulta);
            $registro = mysqli_fetch_assoc($sql_resultado);

            echo "<p> Nome: " . htmlspecialchars($registro['nome']) . "</p>";
            echo "<p> Matrícula: " . htmlspecialchars($registro['matricula']) . "</p>";
            echo "<p> Especialidade: " . htmlspecialchars($registro['especialidade']) . "</p>";
            echo "<p> Login: " . htmlspecialchars($registro['login']) . "</p>";
            echo "<p> CPF: " . htmlspecialchars($registro['cpf']) . "</p>";
            echo "<p> Telefone: " . htmlspecialchars($registro['telefone']) . "</p>";
            echo "<p> Endereço: " . htmlspecialchars($registro['endereco']) . "</p>";
            echo "<p> Data de Nascimento: " . htmlspecialchars($registro['dataNascimento']) . "</p>";
            echo "<p> Data de Contratação: " . htmlspecialchars($registro['dataContratacao']) . "</p>";
            echo "<p> Salário: " . htmlspecialchars($registro['salario']) . "</p>";
            echo "<p> Função: " . htmlspecialchars($registro['funcao']) . "</p>";
            echo "<p> Auxiliar de Dentista (ID): " . htmlspecialchars($registro['auxiliardeDentista_idauxiliar']) . "</p>";
            ?>
        </div>
    </div>
</body>

</html>