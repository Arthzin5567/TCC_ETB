<?php
    $host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

    $supervisor = $_POST["supervisor"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $dataNascimento = $_POST["dataNascimento"];

    // Verificar se o CPF já está cadastrado
    $sql_consulta = "SELECT * FROM auxiliardeDentista WHERE cpf = ?";
    $stmt = $conectar->prepare($sql_consulta);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert ('CPF já cadastrado. Tente outro!')
            </script>";
        echo "<script> location.href = ('cadastra_auxden.php') </script>";
    } else {
        // Inserir novo auxiliar de dentista
        $sql_cadastrar = "INSERT INTO auxiliardeDentista (supervisor, nome, cpf, telefone, endereco, dataNascimento)
                        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conectar->prepare($sql_cadastrar);
        $stmt->bind_param("sssiss", $supervisor, $nome, $cpf, $telefone, $endereco, $dataNascimento);

        if ($stmt->execute()) {
            echo "<script>
                    alert ('$nome cadastrado com sucesso')
                </script>";
            echo "<script> location.href = ('cadastra_auxden.php') </script>";
        } else {
            echo "<script>
                    alert ('Ocorreu um erro no servidor. Tente de novo')
                </script>";
            echo "<script> location.href = ('cadastra_auxden.php') </script>";
        }
    }

    $stmt->close();
    $conectar->close();