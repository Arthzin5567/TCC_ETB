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
        <section id="quinta-section">
        </section>
        <div id="conteudo_especifico">
            <div class="titulo">
            <h1> Relatório prontuarios de pacientes </h1>
                <a href="cadastra_pron.php">
                    <p class="subtitulos">Cadastro de Prontuários</p>
                </a>
            <?php
            $conectar = mysqli_connect("localhost", "root", "", "clinica");

            $sql_consulta = "SELECT p.idprontuario, p.numero, p.dataAbertura, p.anotacoes, d.nome AS nome_dentista 
                             FROM prontuario p 
                             JOIN dentista d ON p.dentista_idDentista = d.idDentista";

            $sql_resultado = mysqli_query($conectar, $sql_consulta);
            ?>
            </div>
            <table width="90%">
                <tr height="50px">
                    <td>ID Prontuário</td>
                    <td>Número</td>
                    <td>Data de Abertura</td>
                    <td>Anotações</td>
                    <td>Dentista</td>
                </tr>
                <?php
                while ($registro = mysqli_fetch_assoc($sql_resultado)) {
                    ?>
                    <tr height="50px">
                        <td><?php echo htmlspecialchars($registro['idprontuario']); ?></td>
                        <td><?php echo htmlspecialchars($registro['numero']); ?></td>
                        <td><?php echo htmlspecialchars($registro['dataAbertura']); ?></td>
                        <td><?php echo htmlspecialchars($registro['anotacoes']); ?></td>
                        <td><?php echo htmlspecialchars($registro['nome_dentista']); ?></td>
                        <td>
                            <a href="exibe_pron.php?id=<?php echo htmlspecialchars($registro['idprontuario']); ?>">
                                <p class="interacao">Visualizar</p>
                            </>
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