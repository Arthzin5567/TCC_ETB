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
<section id="segunda-section">
</section>
        <div id="conteudo_especifico">
            <div class="titulo">
            <h1>Auxiliares de Dentista</h1>
                <a href="cadastra_auxden.php">
                    <p class="subtitulos">Cadastro de Auxiliares de Dentista</p>
                </a>
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "clinica");

            $sql_consulta = "SELECT supervisor, nome, cpf, telefone, endereco, dataNascimento
                             FROM auxiliardeDentista";

            $sql_resultado = mysqli_query($conectar, $sql_consulta);
            ?>
            </div>
            <table width="90%">
                <tr height="50px">
                    <td>Supervisor</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Endereço</td>
                    <td>Data de Nascimento</td>
                </tr>
                <?php
                while ($registro = mysqli_fetch_assoc($sql_resultado)) {
                    ?>
                    <tr height="50px">
                        <td><?php echo htmlspecialchars($registro['supervisor']); ?></td>
                        <td><?php echo htmlspecialchars($registro['nome']); ?></td>
                        <td><?php echo htmlspecialchars($registro['cpf']); ?></td>
                        <td><?php echo htmlspecialchars($registro['telefone']); ?></td>
                        <td><?php echo htmlspecialchars($registro['endereco']); ?></td>
                        <td><?php echo htmlspecialchars($registro['dataNascimento']); ?></td>
                        <td>
                            <a href="exibe_auxden.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
                                <p class="interacao">Visualizar</p>
                            </a>
                        </td>
                        <td>
                            <a href="altera_auxiliarDentista.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
                                <p class="interacao">Alterar</p>
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