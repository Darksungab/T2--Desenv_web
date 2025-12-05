<?php
include_once "../config/conexao.php";

$data = json_decode(file_get_contents("php://input"), true);

$id_usuario = $data["id_usuario"];
$id_bicicletas = $data["id_bicicletas"];

$sql = "INSERT INTO proprietario_bicicleta (id_usuario, id_bicicletas) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_usuario, $id_bicicletas);

if ($stmt->execute()) {
    echo json_encode(["message" => "Proprietário vinculado à bicicleta"]);
} else {
    echo json_encode(["error" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
