<?php
$conectar = mysqli_connect("localhost", "root", "", "clinica");

$matricula = $_POST["matricula"];
$especialidade = $_POST["especialidade"];
$nome = $_POST["nome"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$dataNascimento = $_POST["dataNascimento"];
$dataContratacao = $_POST["dataContratacao"];
$salario = $_POST["salario"];
$funcao = $_POST["funcao"];
$auxiliar_id = $_POST["auxiliardeDentista_idauxiliar"];

// Verificar se o CPF já está cadastrado
$sql_consulta = "SELECT * FROM dentista WHERE login = ?";
$stmt = $conectar->prepare($sql_consulta);
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script> 
            alert ('Login já cadastrado. Tente outro!') 
          </script>";
    echo "<script> location.href = ('cadastra_den.php') </script>";
} else {
    // Inserir novo dentista
    $sql_cadastrar = "INSERT INTO dentista 
                      (matricula, especialidade, nome, login, senha, cpf, telefone, endereco, dataNascimento, dataContratacao, salario, funcao, auxiliardeDentista_idauxiliar) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conectar->prepare($sql_cadastrar);
    $stmt->bind_param("sssssssssssss", $matricula, $especialidade, $nome, $login, $senha, $cpf, $telefone, $endereco, $dataNascimento, $dataContratacao, $salario, $funcao, $auxiliar_id);

    if ($stmt->execute()) {
        echo "<script> 
                alert ('$nome cadastrado com sucesso') 
              </script>";
        echo "<script> location.href = ('cadastra_den.php') </script>";
    } else {
        echo "<script> 
                alert ('Ocorreu um erro no servidor. Tente de novo') 
              </script>";
        echo "<script> location.href = ('cadastra_den.php') </script>";
    }
}

$stmt->close();
$conectar->close();
?>