<?php

include '../../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id_produto = ? LIMIT 1";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$produto = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>
<body>
    
    <div class="container py-5">

        <div class="card shadow">

            <div class="card-header">
                <h2>Editar Produto</h2>
            </div>

        </div>

    </div>
</body>
</html>