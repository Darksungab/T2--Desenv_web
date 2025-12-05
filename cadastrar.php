<?php
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $data["nome"];
    $email = $data["email"];
    $telefone = $data["telefone"];
    $registro = $data["registro"];
    $marca = $data["marca"];
    $cor = $data["cor"];
    $categoria = $data["categoria"];

    $sql = "INSERT INTO bicicletas (nome, email, telefone, registro, marca, cor, categoria) VALUES ('$nome', '$email', '$telefone', '$registro', '$marca', '$cor', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";

    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>