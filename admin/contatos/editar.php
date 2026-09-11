<?php

include '../../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM contatos
        WHERE id_contato = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$contato = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $status = $_POST['status'];

    $sqlAtualizar = "UPDATE contatos
                     SET status = ?
                     WHERE id_contato = ?";

    $stmtAtualizar = $conn->prepare($sqlAtualizar);

    $stmtAtualizar->bind_param("si", $status, $id);

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

    <title>Editar Contato</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>

<body>

    <div class="container py-5">

        <div class="card shadow">

            <div class="card-header">
                <h2>Contato</h2>
            </div>

            <div class="card-body">

                <p>
                    <strong>Nome:</strong>
                    <?php echo $contato['nome']; ?>
                </p>

                <p>
                    <strong>E-mail:</strong>
                    <?php echo $contato['email']; ?>
                </p>

                <p>
                    <strong>Telefone:</strong>
                    <?php echo $contato['telefone']; ?>
                </p>

                <div class="mb-3">

                    <label class="form-label">
                        Mensagem:
                    </label>

                    <textarea
                        class="form-control"
                        rows="5"
                        readonly
                    ><?php echo $contato['mensagem']; ?></textarea>

                </div>

                <form method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            Status:
                        </label>

                        <select name="status" class="form-select">

                            <option
                                value="Novo"
                                <?php if ($contato['status'] == 'Novo') echo 'selected'; ?>
                            >
                                Novo
                            </option>

                            <option
                                value="Respondido"
                                <?php if ($contato['status'] == 'Respondido') echo 'selected'; ?>
                            >
                                Respondido
                            </option>

                            <option
                                value="Arquivado"
                                <?php if ($contato['status'] == 'Arquivado') echo 'selected'; ?>
                            >
                                Arquivado
                            </option>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-success">
                        Salvar Status
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