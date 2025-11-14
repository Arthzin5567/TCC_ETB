<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dentistas - Personal Odontologia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="#">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
        <link rel="stylesheet" href="cssindex/menu.css">
        <link rel="stylesheet" href="cssindex/geral.css">
        <link rel="stylesheet" href="cssindex/variaveis.css">
        <link rel="stylesheet" href="csscadastraaux/index.css">
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
                <h1> PRONTUÁRIOS </h1>
                <ul type="none">
                    <li><a href="prontuarios_den.php" class="active"><p>Prontuários de Pacientes</p></a></li>
                </ul>
            </div>
        </div>
    </body>
</html>