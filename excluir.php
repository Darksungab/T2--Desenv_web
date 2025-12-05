<?php
include 'conexao.php';
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $data['id'];

    $sql = "DELETE FROM bicicletas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}
