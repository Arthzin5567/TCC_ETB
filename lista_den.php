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
<section id="primeira-section">
</section>
    <div id="conteudo_especifico">
    <div class="titulo">
        <h1> Dentistas </h1>
            <a href="cadastra_den.php">
                <p class="subtitulos">Cadastro de Dentistas</p>
            </a>
        <?php
        $conectar = mysqli_connect("localhost", "root", "", "clinica");

        $sql_consulta = "SELECT matricula, especialidade, nome, login, senha, cpf, telefone, endereco,
                                dataNascimento, dataContratacao, salario, funcao, auxiliardeDentista_idauxiliar
                                    FROM dentista";

        $sql_resultado = mysqli_query($conectar, $sql_consulta);
        ?>
    </div>
    <div class="table">
        <table width="100%" padding="10px">
            <tr height="50px">
                <td>Matrícula</td>
                <td>Especialidade</td>
                <td>Nome</td>
                <td>Login</td>
                <td>Senha</td>
                <td>Cpf</td>
                <td>Telefone</td>
                <td>Endereço</td>
                <td>Data Nascimento</td>
                <td>Data Contratação</td>
                <td>Salário</td>
                <td>Funçlão</td>
                <td>Auxiliar de Dentista</td>
            </tr>
            <?php
            while ($registro = mysqli_fetch_assoc($sql_resultado)) {
                ?>
                <tr height="50px">
                    <td><?php echo htmlspecialchars($registro['matricula']); ?></td>
                    <td><?php echo htmlspecialchars($registro['especialidade']); ?></td>
                    <td><?php echo htmlspecialchars($registro['nome']); ?></td>
                    <td><?php echo htmlspecialchars($registro['login']); ?></td>
                    <td><?php echo htmlspecialchars($registro['senha']); ?></td>
                    <td><?php echo htmlspecialchars($registro['cpf']); ?></td>
                    <td><?php echo htmlspecialchars($registro['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($registro['endereco']); ?></td>
                    <td><?php echo htmlspecialchars($registro['dataNascimento']); ?></td>
                    <td><?php echo htmlspecialchars($registro['dataContratacao']); ?></td>
                    <td><?php echo htmlspecialchars($registro['salario']); ?></td>
                    <td><?php echo htmlspecialchars($registro['funcao']); ?></td>
                    <td><?php echo htmlspecialchars($registro['auxiliardeDentista_idauxiliar']); ?></td>
                    <td>
                        <a href="exibe_den.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
                            <p class="interacao" >Visualizar</p></a>
                    </td>
                    <td>
                        <a href="altera_dentista.php?codigo=<?php echo htmlspecialchars($registro['cpf']); ?>">
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
    </div>
</body>

</html>