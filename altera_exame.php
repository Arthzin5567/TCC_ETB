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

			</div>
			<div id="conteudo_especifico">
					<h1> ALTERAÇÃO DE EXAMES </h1>
				
					<?php
					
                    $conectar = mysqli_connect("localhost", "root", "", "clinica");

						$cod = $_GET["id"];

						$sql_pesquisa = "SELECT 
											tipo,
											data,
                                            resultado,
                                            dentista_idDentista,
                                            paciente_idpaciente
										FROM exame
										WHERE idexame = '$cod'";

						$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

						$registro = mysqli_fetch_row($resultado_pesquisa);
					
					?>

					<form method = "post" action = "processa_altera_exame.php" enctype = "multipart/form-data"> 

						<input type = "hidden" name = "codigo" value = "<?php echo $cod; ?>">

						<p> Tipo: <input type = "text" name = "tipo" required value = "<?php echo $registro [0];?>"> </p>
						<p> Data do exame: <input type = "date" name = "data" required value = "<?php echo $registro [1];?>"> </p>
						<p> Resultado do exame: <input type = "text" name = "resultado" required value = "<?php echo $registro [2];?>"> </p>
						<p> ID do dentista: <input type = "text" name = "dentista_idDentista" value = "<?php echo $registro[3]; ?>"> </p>
                        <p> ID do paciente: <input type = "text" name = "paciente_idpaciente" value = "<?php echo $registro[4]; ?>"> </p>
                        

                        <div class="btn">
				    		<a href=""><button>Alterar Exame</button></a>
			    		</div>
					</form>

				</div>				
			</div>	
		</div>
    </body>
</html>