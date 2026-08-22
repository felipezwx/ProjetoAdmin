<?php

header('Content-Type: application/json; charset=utf-8');

include '../../conexao.php';

$sql = "SELECT * FROM vw_produtos_categorias";

$stmt = $conn->prepare($sql);

$stmt->execute();

$resultado = $stmt->get_result();

$produtos = [];

while ($produto = $resultado->fetch_assoc()) {
    $produtos[] = $produto;
}

echo json_encode($produtos);

?>