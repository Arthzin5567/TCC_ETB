<?php
    $host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

    $tipo = $_POST["tipo"];
    $data = $_POST["data"];
    $resultado = $_POST["resultado"];
    $dentista_idDentista = $_POST["dentista_idDentista"];
    $paciente_idpaciente = $_POST["paciente_idpaciente"];

    // Verificar se já existe um exame com o mesmo tipo, data, dentista e paciente
    $sql_consulta = "SELECT * FROM exame WHERE tipo = ? AND data = ? AND dentista_idDentista = ? AND paciente_idpaciente = ?";
    $stmt = $conectar->prepare($sql_consulta);
    $stmt->bind_param("ssii", $tipo, $data, $dentista_idDentista, $paciente_idpaciente);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert ('Exame já cadastrado. Tente outro!')
            </script>";
        echo "<script> location.href = ('cadastra_ex.php') </script>";
    } else {
        // Inserir novo exame
        $sql_cadastrar = "INSERT INTO exame (tipo, data, resultado, dentista_idDentista, paciente_idpaciente)
                        VALUES (?, ?, ?, ?, ?)";

        $stmt = $conectar->prepare($sql_cadastrar);
        $stmt->bind_param("sssii", $tipo, $data, $resultado, $dentista_idDentista, $paciente_idpaciente);

        if ($stmt->execute()) {
            echo "<script>
                    alert ('Exame cadastrado com sucesso')
                </script>";
            echo "<script> location.href = ('cadastra_ex.php') </script>";
        } else {
            echo "<script>
                    alert ('Ocorreu um erro no servidor. Tente de novo')
                </script>";
            echo "<script> location.href = ('cadastra_ex.php') </script>";
        }
    }

    $stmt->close();
    $conectar->close();