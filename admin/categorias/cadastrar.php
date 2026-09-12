<?php

include '../verificar_login.php';
include '../../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];

    $sql = "INSERT INTO categorias (nome) VALUES (?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $nome);

    $stmt->execute();

    header("Location: listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Categoria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>

<body>

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">
            <h2>Nova Categoria</h2>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nome da Categoria:
                    </label>

                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        required
                    >

                </div>

                <button type="submit" class="btn btn-success">
                    Cadastrar
                </button>

                <a href="listar.php" class="btn btn-secondary">
                    Voltar
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>