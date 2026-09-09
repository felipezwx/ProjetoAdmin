<?php

include '../../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id_produto = ? LIMIT 1";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$produto = $resultado->fetch_assoc();

echo $produto['nome'];

?>