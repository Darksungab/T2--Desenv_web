<?php
include_once "../config/conexao.php";

$data = json_decode(file_get_contents("php://input"), true);

$cpf = $data["cpf"];
$nome = $data["nome"];
$email = $data["email"];
$telefone = $data["telefone"];

$sql = "INSERT INTO usuario (cpf, nome, email, telefone) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $cpf, $nome, $email, $telefone);

if ($stmt->execute()) {
    echo json_encode(["message" => "Usuário criado com sucesso"]);
} else {
    echo json_encode(["error" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
