<?php

include '../verificar_login.php';
include '../../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM categorias
        WHERE id_categoria = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$categoria = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];

    $sqlAtualizar = "UPDATE categorias
                     SET nome = ?
                     WHERE id_categoria = ?";

    $stmtAtualizar = $conn->prepare($sqlAtualizar);

    $stmtAtualizar->bind_param("si", $nome, $id);

    $stmtAtualizar->execute();

    header("Location: listar.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Categoria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>

<body>

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">
            <h2>Editar Categoria</h2>
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
                        value="<?php echo $categoria['nome']; ?>"
                        required
                    >

                </div>

                <button type="submit" class="btn btn-success">
                    Salvar Alterações
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