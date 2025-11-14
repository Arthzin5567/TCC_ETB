<?php
session_start();
?>
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
        <link rel="stylesheet" href="cadastraden/index.css">
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
                <h1> Cadastro de Prontuários </h1>
                <form method="post" action="processa_cadastra_pron.php">
                    <table class="centralizar">
                        <tr>
                            <td>Número:</td>
                            <td><input type="text" name="numero" required></td>
                        </tr>
                        <tr>
                            <td>Data de Abertura:</td>
                            <td><input type="date" name="dataAbertura" required></td>
                        </tr>
                        <tr>
                            <td>Anotações:</td>
                            <td><input type="text" name="anotacoes" required></td>
                        </tr>
                    </table>
                    <div class="btn">
                        <a href=""><button>Cadastrar Auxiliar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
