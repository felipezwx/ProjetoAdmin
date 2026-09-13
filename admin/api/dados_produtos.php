<?php

include '../verificar_login.php';

header('Content-Type: application/json; charset=utf-8');

include '../../conexao.php';

$categoria = $_GET['categoria'] ?? 'todos';
$busca = $_GET['busca'] ?? '';
$limite = isset($_GET['limite']) ? (int) $_GET['limite'] : 100;
$offset = isset($_GET['offset']) ? (int) $_GET['offset'] : 0;

$sql = "CALL sp_relatorio_produtos(?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssii",
    $categoria,
    $busca,
    $limite,
    $offset
);

$stmt->execute();

$resultado = $stmt->get_result();

$produtos = [];

while ($produto = $resultado->fetch_assoc()) {
    $produtos[] = $produto;
}

echo json_encode($produtos);

?>