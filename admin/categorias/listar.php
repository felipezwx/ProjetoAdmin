<?php

include '../../conexao.php';

$sql = "SELECT * FROM categorias";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Categorias</h2>

        <a href="cadastrar.php" class="btn btn-success">
            Nova Categoria
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($categoria = $resultado->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?php echo $categoria['id_categoria']; ?>
                    </td>

                    <td>
                        <?php echo $categoria['nome']; ?>
                    </td>

                    <td>

                        <a
                            href="editar.php?id=<?php echo $categoria['id_categoria']; ?>"
                            class="btn btn-warning btn-sm"
                        >
                            Editar
                        </a>

                        <a
                            href="excluir.php?id=<?php echo $categoria['id_categoria']; ?>"
                            class="btn btn-danger btn-sm"
                        >
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

    <a href="../painel.php" class="btn btn-secondary">
        Voltar ao Painel
    </a>

</div>

</body>
</html>