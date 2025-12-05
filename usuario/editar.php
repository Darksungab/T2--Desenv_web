<?php
include_once "../config/conexao.php";
$data = json_decode(file_get_contents("php://input"), true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $data["id"];
    $cpf = $data["cpf"];
    $nome = $data["nome"];
    $email = $data["email"];
    $telefone = $data["telefone"];

    $sql = "UPDATE usuario SET cpf=?, nome=?, email=?, telefone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $cpf, $nome, $email, $telefone, $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuário atualizado com sucesso"]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>
