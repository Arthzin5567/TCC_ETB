<?php
    $host = "localhost";
    $user = "root";
    $password = "SenhaIrada@2024!";
    $database = "clinica";
    $conectar = mysqli_connect($host, $user, $password, $database);

    $dataCadastro = $_POST["dataCadastro"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $dataNascimento = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];

    // Verificar se o CPF já está cadastrado
    $sql_consulta = "SELECT * FROM paciente WHERE cpf = ?";
    $stmt = $conectar->prepare($sql_consulta);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script> 
                alert ('CPF já cadastrado. Tente outro!')
            </script>";
        echo "<script> location.href = ('cadastra_pac.php') </script>";
    } else {
        // Inserir novo paciente
        $sql_cadastrar = "INSERT INTO paciente (dataCadastro, nome, cpf, endereco, dataNascimento, telefone)
                        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conectar->prepare($sql_cadastrar);
        $stmt->bind_param("sssssi", $dataCadastro, $nome, $cpf, $endereco, $dataNascimento, $telefone);

        if ($stmt->execute()) {
            echo "<script>
                    alert ('$nome cadastrado com sucesso')
                </script>";
            echo "<script> location.href = ('cadastra_pac.php') </script>";
        } else {
            echo "<script>
                    alert ('Ocorreu um erro no servidor. Tente de novo')
                </script>";
            echo "<script> location.href = ('cadastra_pac.php') </script>";
        }
    }

    $stmt->close();
    $conectar->close();