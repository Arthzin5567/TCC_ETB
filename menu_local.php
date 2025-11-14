<?php
    if ($_SESSION["funcao"] == "Administrador") {
        ?>
        <ul>
            <li><a href="lista_den.php" class="active">Dentistas</a></li>
            <li><a href="lista_auxden.php" class="active">Auxiliar de Dentistas</a></li>
            <li><a href="lista_pac.php">Pacientes</a></li>
            <li><a href="exames_pac.php">Exames</a></li>
            <li><a href="prontuarios_den.php">Prontuários</a></li>
            <li><a href="logout.php" class="active">Sair</a></li>
        </ul>
        <?php
    }