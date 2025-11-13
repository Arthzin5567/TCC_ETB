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
    <link rel="stylesheet" href="indexcss/menu.css">
    <link rel="stylesheet" href="indexcss/geral.css">
    <link rel="stylesheet" href="indexcss/variaveis.css">
	<link rel="stylesheet" href="listadentistacss/index.css">
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
        <section id="quarta-section">
        </section>
        <div id="conteudo_especifico">
        <div class="titulo">
            <h1> Relatório exames de pacientes </h1>
                <a href="cadastra_ex.php">
                    <p class="subtitulos">Cadastro de Exames</p>
                </a>
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "clinica");

            $sql_consulta = "SELECT e.idexame, e.tipo, e.data, e.resultado, p.nome AS nome_paciente, d.nome AS nome_dentista 
                             FROM exame e 
                             JOIN paciente p ON e.paciente_idpaciente = p.idpaciente
                             JOIN dentista d ON e.dentista_idDentista = d.idDentista";

            $sql_resultado = mysqli_query($conectar, $sql_consulta);
            ?>
            </div>
            <table width="90%">
                <tr height="50px">
                    <td>ID Exame</td>
                    <td>Tipo</td>
                    <td>Data</td>
                    <td>Resultado</td>
                    <td>Paciente</td>
                    <td>Dentista</td>
                </tr>
                <?php
                while ($registro = mysqli_fetch_assoc($sql_resultado)) {
                    ?>
                    <tr height="50px">
                        <td><?php echo htmlspecialchars($registro['idexame']); ?></td>
                        <td><?php echo htmlspecialchars($registro['tipo']); ?></td>
                        <td><?php echo htmlspecialchars($registro['data']); ?></td>
                        <td><?php echo htmlspecialchars($registro['resultado']); ?></td>
                        <td><?php echo htmlspecialchars($registro['nome_paciente']); ?></td>
                        <td><?php echo htmlspecialchars($registro['nome_dentista']); ?></td>
                        <td>
                            <a href="exibe_ex.php?id=<?php echo htmlspecialchars($registro['idexame']); ?>">
                                <p class="interacao">Visualizar</p>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>