<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
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
			<h1>Cadastro de Dentistas</h1>
			<form method="post" action="processa_cadastra_den.php">
				<table class="centralizar">
					<tr>
						<td>Matrícula:</td>
						<td><input type="text" name="matricula" required></td>
					</tr>
					<tr>
						<td>Nome:</td>
						<td><input type="text" name="nome" required></td>
					</tr>
					<tr>
						<td>Função:</td>
						<td><input type="radio" name="funcao" value="Dentista" checked> Dentista</td>
					</tr>
					<tr>
						<td>Especialidade:</td>
						<td><input type="text" name="especialidade" required></td>
					</tr>
					<tr>
						<td>Login:</td>
						<td><input type="text" name="login" required></td>
					</tr>
					<tr>
						<td>Senha:</td>
						<td><input type="password" name="senha" required></td>
					</tr>
					<tr>
						<td>CPF:</td>
						<td><input type="text" name="cpf" required></td>
					</tr>
					<tr>
						<td>Telefone:</td>
						<td><input type="text" name="telefone" required></td>
					</tr>
					<tr>
						<td>Endereço:</td>
						<td><input type="text" name="endereco" required></td>
					</tr>
					<tr>
						<td>Data de Nascimento:</td>
						<td><input type="date" name="dataNascimento" required></td>
					</tr>
					<tr>
						<td>Data de Contratação:</td>
						<td><input type="date" name="dataContratacao" required></td>
					</tr>
					<tr>
						<td>Salário:</td>
						<td><input type="text" name="salario" required></td>
					</tr>
					<tr>
						<td>Auxiliar de Dentista (ID):</td>
						<td><input type="text" name="auxiliardeDentista_idauxiliar" required></td>
					</tr>
					
				</table>
			<div class="btn">
				<a href=""><button>Cadastrar Dentista</button></a>
			</div>
			</form>
		</div>
</body>

</html>