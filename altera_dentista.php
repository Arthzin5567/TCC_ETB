<?php session_start(); ?>
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
	<link rel="stylesheet" href="alteraden/index.css">
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
					<h1> Alterar dentistas </h1>
				
					<?php
					
                    $conectar = mysqli_connect("localhost", "root", "", "clinica");

						$cod = $_GET["codigo"];

						$sql_pesquisa = "SELECT 
											matricula,
											especialidade,
											nome,
                                            login,
                                            senha,
                                            cpf,
                                            telefone,
                                            endereco,
                                            dataNascimento,
                                            dataContratacao,
                                            salario,
                                            funcao,
                                            auxiliardeDentista_idauxiliar
										FROM dentista
										WHERE cpf = '$cod'";

						$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

						$registro = mysqli_fetch_row($resultado_pesquisa);
					
					?>

					<form method = "post" action = "processa_altera_dentista.php" enctype = "multipart/form-data"> 

						<input type = "hidden" name = "codigo" value = "<?php echo $cod; ?>">

						<p> Matricula: <input type = "text" name = "matricula" required value = "<?php echo $registro [0];?>"> </p>
						<p> Especialidade: <input type = "text" name = "especialidade" required value = "<?php echo $registro [1];?>"> </p>
						<p> Nome: <input type = "text" name = "nome" required value = "<?php echo $registro [2];?>"> </p>
						<p> Login: <input type = "text" name = "login" value = "<?php echo $registro[3]; ?>"> </p>
                        <p> Senha: <input type = "text" name = "senha" value = "<?php echo $registro[4]; ?>"> </p>
                        <p> CPF: <input type = "text" name = "cpf" value = "<?php echo $registro[5]; ?>"> </p>
                        <p> Telefone: <input type = "text" name = "telefone" value = "<?php echo $registro[6]; ?>"> </p>
                        <p> Endereco: <input type = "text" name = "endereco" value = "<?php echo $registro[7]; ?>"> </p>
						<p> Data de nascimento: <input type = "date" name = "dataNascimento" value = "<?php echo $registro[8]; ?>"> </p>
                        <p> Data de contratação: <input type = "date" name = "dataContratacao" value = "<?php echo $registro[9]; ?>"> </p>
                        <p> Salário: <input type = "text" name = "salario" value = "<?php echo $registro[10]; ?>"> </p>
                        <p> Função: <input type = "text" name = "funcao" value = "<?php echo $registro[11]; ?>"> </p>
                        <p> Auxiliar do Dentista: <input type = "text" name = "auxiliardeDentista_idauxiliar" value = "<?php echo $registro[12]; ?>"> </p>

                        <div class="btn">
				            <a href=""><button>Alterar Dentista</button></a>
			            </div>
					</form>
			</div>	
		</div>
    </body>
</html>