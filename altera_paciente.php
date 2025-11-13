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
					<h1> ALTERAÇÃO DE EXAMES </h1>
				
					<?php
					
                    $conectar = mysqli_connect("localhost", "root", "", "clinica");

						$cod = $_GET["codigo"];

						$sql_pesquisa = "SELECT 
											dataCadastro,
											nome,
											cpf,
                                            endereco,
                                            dataNascimento,
                                            telefone
										FROM paciente
										WHERE cpf = '$cod'";

						$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

						$registro = mysqli_fetch_row($resultado_pesquisa);
					
					?>

					<form method = "post" action = "processa_altera_paciente.php" enctype = "multipart/form-data"> 

						<input type = "hidden" name = "codigo" value = "<?php echo $cod; ?>">

						<p> Data de Cadastro: <input type = "date" name = "dataCadastro" required value = "<?php echo $registro [0];?>"> </p>
						<p> Nome do paciente: <input type = "text" name = "nome" required value = "<?php echo $registro [1];?>"> </p>
						<p> CPF: <input type = "text" name = "cpf" required value = "<?php echo $registro [2];?>"> </p>
						<p> Data de nascimento do paciente: <input type = "date" name = "dataNascimento" value = "<?php echo $registro[3]; ?>"> </p>
                        <p> Telefone: <input type = "text" name = "telefone" value = "<?php echo $registro[4]; ?>"> </p>
                        


						<div class="btn">
				    		<a href=""><button>Alterar Paciente</button></a>
			    		</div>
					</form>

				</div>				
			</div>	
		</div>
    </body>
</html>