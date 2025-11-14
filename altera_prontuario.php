<?php session_start(); ?>
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
					<h1> ALTERAÇÃO DE EXAMES </h1>
				
					<?php
					
                    $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

						$cod = $_GET["id"];

						$sql_pesquisa = "SELECT
											numero,
											dataAbertura,
                                            anotacoes,
                                            dentista_idDentista
										FROM prontuario
										WHERE idprontuario = '$cod'";

						$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

						$registro = mysqli_fetch_row($resultado_pesquisa);
					
					?>

					<form method = "post" action = "processa_altera_prontuario.php" enctype = "multipart/form-data">

						<input type = "hidden" name = "codigo" value = "<?php echo $cod; ?>">

						<p> Número do Prontuário: <input type = "text" name = "numero" required value = "<?php echo $registro [0];?>"> </p>
						<p> Data de abertura do Prontuário: <input type = "date" name = "dataAbertura" required value = "<?php echo $registro [1];?>"> </p>
						<p> Anotações: <input type = "text" name = "anotacoes" required value = "<?php echo $registro [2];?>"> </p>
						<p> ID do dentista: <input type = "text" name = "dentista_idDentista" value = "<?php echo $registro[3]; ?>"> </p>
                        
						<div class="btn">
				    		<a href=""><button>Alterar Prontuario</button></a>
			    		</div>
					</form>
			</div>
		</div>
    </body>
</html>