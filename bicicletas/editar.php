<?php
include 'conexao.php';
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $data["id"];
    $registro = $data["registro"];
    $marca = $data["marca"];
    $cor = $data["cor"];
    $categoria = $data["categoria"];


    $sql = "UPDATE bicicletas SET registro='$registro', marca='$marca', cor='$cor', categoria='$categoria' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
}

$conn->close();
?>