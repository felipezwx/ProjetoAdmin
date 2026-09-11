<?php

include '../../conexao.php';

$sql = "SELECT * FROM contatos";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contatos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style-admin.css">
</head>

<body>

    <div class="container py-5">

        <h2 class="mb-4">Contatos Recebidos</h2>

        <table class="table table-bordered table-striped">

            <?php

                if (isset($_GET['mensagem']) && $_GET['mensagem'] == 'excluido') {
                ?>

                    <div class="alert alert-success">
                        Contato excluído com sucesso.
                    </div>

                <?php
                }

            ?>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                <?php while ($contato = $resultado->fetch_assoc()) { ?>

                    <tr>

                        <td>
                            <?php echo $contato['id_contato']; ?>
                        </td>

                        <td>
                            <?php echo $contato['nome']; ?>
                        </td>

                        <td>
                            <?php echo $contato['email']; ?>
                        </td>

                        <td>
                            <?php echo $contato['telefone']; ?>
                        </td>

                        <td>
                            <?php echo $contato['status']; ?>
                        </td>

                        <td>

                            <a
                                href="editar.php?id=<?php echo $contato['id_contato']; ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Ver / Editar
                            </a>

                            <a
                                href="excluir.php?id=<?php echo $contato['id_contato']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Deseja realmente excluir este contato?')"
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