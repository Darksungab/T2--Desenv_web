<?php
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registro = $data["registro"];
    $marca = $data["marca"];
    $cor = $data["cor"];
    $categoria = $data["categoria"];
    $data_registro = date("Y-m-d H:i:s");
    

    $stmt = $conn->prepare("SELECT id FROM bicicletas WHERE registro = ?");
    $stmt->bind_param("s", $registro);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["erro" => "Registro já cadastrado"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO bicicletas (registro, marca, cor, categoria, data_registro) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $registro, $marca, $cor, $categoria, $data_registro);

    
    if ($stmt->execute() === TRUE) {
        echo "Novo registro criado com sucesso";

    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>