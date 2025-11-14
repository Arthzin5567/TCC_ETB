<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

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
                    <p> Olá <?php include_once "valida_login.php"; ?></p>
                </div>
                <div>
                    <nav class="nav-list">
                        <?php include_once "menu_local.php"; ?>
                    </nav>
                </div>
            </div>
            </header>
            <section id="terceira-section">
            </section>
            <div id="conteudo_especifico">
                <div class="titulo">
                <h1> Pacientes </h1>
                    <a href="cadastra_pac.php">
                        <p class="subtitulos">Cadastro de Pacientes</p>
                    </a>
                <?php
                $host = "localhost";
                    $user = "root";
                    $password = "SenhaIrada@2024!";

                    $database = "clinica";
                    $conectar = mysqli_connect($host, $user, $password, $database);

                $sql_consulta = "SELECT dataCadastro, nome, cpf, endereco, dataNascimento, telefone FROM paciente";

                $sql_resultado = mysqli_query($conectar, $sql_consulta);
                ?>
                </div>
                <table width="90%">
                    <tr>
                        <td>Data de Cadastro</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Endereço</td>
                        <td>Data de Nascimento</td>
                        <td>Telefone</td>
                    </tr>
                    <?php
                    while ($registro = mysqli_fetch_assoc($sql_resultado)) {
                        ?>
                        <tr height="50px">
                            <td><?php echo htmlspecialchars($registro['dataCadastro']); ?></td>
                            <td><?php echo htmlspecialchars($registro['nome']); ?></td>
                            <td><?php echo htmlspecialchars($registro['cpf']); ?></td>
                            <td><?php echo htmlspecialchars($registro['endereco']); ?></td>
                            <td><?php echo htmlspecialchars($registro['dataNascimento']); ?></td>
                            <td><?php echo htmlspecialchars($registro['telefone']); ?></td>
                            <td>
                                <a href="exibe_pac.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
                                    <p class="interacao">Visualizar</p>
                                </a>
                            </td>
                            <td>
                                <a href="altera_paciente.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
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