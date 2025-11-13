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
	<link rel="stylesheet" href="cadastraden/index.css">
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
            <h1> Cadastro de Exames </h1>
            <form method="post" action="processa_cadastra_ex.php">
                <table class="centralizar">
                    <tr>
                        <td>Tipo:</td>
                        <td><input type="text" name="tipo" required></td>
                    </tr>
                    <tr>
                        <td>Data:</td>
                        <td><input type="date" name="data" required></td>
                    </tr>
                    <tr>
                        <td>Resultado:</td>
                        <td><input type="text" name="resultado" required></td>
                    </tr>
                    <tr>
                        <td>ID do Dentista:</td>
                        <td><input type="text" name="dentista_idDentista" required></td>
                    </tr>
                    <tr>
                        <td>ID do Paciente:</td>
                        <td><input type="text" name="paciente_idpaciente" required></td>
                    </tr>
                </table>
                <div class="btn">
				    <a href=""><button>Cadastrar Auxiliar</button></a>
			    </div>
            </form>
        </div>
    </div>
</body>
</html>
