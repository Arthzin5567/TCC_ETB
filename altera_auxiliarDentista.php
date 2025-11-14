<?php session_start();?>
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
        <link rel="stylesheet" href="alteraden/index.css">
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
					<h1> Alteração de auxiliares </h1>
					<?php

                    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);
					

						$cod = $_GET["codigo"];

						$sql_pesquisa = "SELECT
											supervisor,
											nome,
											cpf,
											endereco,
                                            telefone,
                                            dataNascimento
										FROM auxiliardedentista
										WHERE cpf = '$cod'";

						$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

						$registro = mysqli_fetch_row($resultado_pesquisa);
					
					?>

					<form method = "post" action = "processa_altera_auxiliardentista.php" enctype = "multipart/form-data">
						<input type = "hidden" name = "codigo" value = "<?php echo $cod; ?>">

						<p> Supervisor: <input type = "text" name = "supervisor" required value = "<?php echo $registro [0];?>"> </p>
						<p> Nome: <input type = "text" name = "nome" required value = "<?php echo $registro [1];?>"> </p>
						<p> CPF: <input type = "text" name = "cpf" required value = "<?php echo $registro [2];?>"> </p>
						<p> Endereço: <input type = "text" name = "endereco" value = "<?php echo $registro[3]; ?>"> </p>
                        <p> Telefone: <input type = "text" name = "telefone" value = "<?php echo $registro[4]; ?>"> </p>
                        <p> Data de nascimento: <input type = "date" name = "dataNascimento" value = "<?php echo $registro[5]; ?>"> </p>
	
						<div class="btn">
				    		<a href=""><button>Alterar Auxiliar</button></a>
			    		</div>
						
					</form>
			</div>
		</div>
    </body>
</html>