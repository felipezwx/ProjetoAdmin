<?php

header('Content-Type: application/json; charset=utf-8');

include '../../conexao.php';

$categoria = $_GET['categoria'] ?? 'todos';

$sql = "CALL sp_relatorio_produtos(?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $categoria);

$stmt->execute();

$resultado = $stmt->get_result();

$produtos = [];

while ($produto = $resultado->fetch_assoc()) {
    $produtos[] = $produto;
}

echo json_encode($produtos);

?>