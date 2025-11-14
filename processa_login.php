<?php
	session_start();

	$host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$sql_consulta = "SELECT idDentista, nome, funcao, login, senha
						FROM dentista
						WHERE
							login = '$login'
						AND
							senha = '$senha'";

	$resultado_consulta = mysqli_query($conectar, $sql_consulta);

	$linhas = mysqli_num_rows($resultado_consulta);


	if ($linhas == 1) {
		$registro = mysqli_fetch_row($resultado_consulta);
		$_SESSION["idDentista"] = $registro[0];
		$_SESSION["nome"] = $registro[1];
		$_SESSION["funcao"] = $registro[2];

		echo "<script>
						location.href = ('lista_den.php')
				</script>";
	} else {
		echo "<script>
					alert ('Login ou Senha Incorretos! Digite Novamente!!')
				</script>";
		echo "<script> location.href = ('index.php') </script>";
	}