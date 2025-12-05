<?php   
include 'conexao.php';
$data = json_decode(file_get_contents("php://input"), true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $data["id"];

    $sql = "DELETE FROM usuario WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Usuário excluído com sucesso"]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>
