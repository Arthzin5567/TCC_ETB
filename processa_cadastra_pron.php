<?php
    $host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

    $numero = $_POST["numero"];
    $dataAbertura = $_POST["dataAbertura"];
    $anotacoes = $_POST["anotacoes"];
    $dentista_idDentista = $_POST["dentista_idDentista"];

    // Verificar se já existe um prontuário com o mesmo número e dentista
    $sql_consulta = "SELECT * FROM prontuario WHERE numero = ? AND dentista_idDentista = ?";
    $stmt = $conectar->prepare($sql_consulta);
    $stmt->bind_param("ii", $numero, $dentista_idDentista);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Prontuário já cadastrado. Tente outro!')
            </script>";
        echo "<script> location.href = ('cadastra_pron.php') </script>";
    } else {
        // Inserir novo prontuário
        $sql_cadastrar = "INSERT INTO prontuario (numero, dataAbertura, anotacoes, dentista_idDentista)
                        VALUES (?, ?, ?, ?)";

        $stmt = $conectar->prepare($sql_cadastrar);
        $stmt->bind_param("issi", $numero, $dataAbertura, $anotacoes, $dentista_idDentista);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Prontuário cadastrado com sucesso')
                </script>";
            echo "<script> location.href = ('cadastra_pron.php') </script>";
        } else {
            echo "<script>
                    alert('Ocorreu um erro no servidor. Tente de novo')
                </script>";
            echo "<script> location.href = ('cadastra_pron.php') </script>";
        }
    }

    $stmt->close();
    $conectar->close();