<?php
include_once "../config/conexao.php";

$sql = "
SELECT pb.id_relacao, u.nome, b.registro, pb.data_registro
FROM proprietario_bicicleta pb
JOIN usuario u ON pb.id_usuario = u.id_usuario
JOIN bicicletas b ON pb.id_bicicletas = b.id_bicicletas
";

$result = $conn->query($sql);

$dados = [];
while ($row = $result->fetch_assoc()) {
    $dados[] = $row;
}

echo json_encode($dados);

$conn->close();
?>
