<?php

include '../../conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM vw_produtos_categorias WHERE id_produto = ? LIMIT 1";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$produto = $resultado->fetch_assoc();

$sqlCategorias = "SELECT * FROM categorias";

$resultadoCategorias = $conn->query($sqlCategorias);

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

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label class="form-label">Nome: </label>

                        <input
                            type="text"
                            name="nome"
                            class="form-control"
                            value="<?php echo $produto['nome']; ?>"

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição:</label>

                        <textarea
                            name="descricao"
                            class="form-control"
                            rows="4"
                        ><?php echo $produto['descricao']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preço:</label>

                        <input
                            type="number"
                            step="0.01"
                            name="preco"
                            class="form-control"
                            value="<?php echo $produto['preco']; ?>"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estoque:</label>

                        <input
                            type="number"
                            name="estoque"
                            class="form-control"
                            value="<?php echo $produto['estoque']; ?>"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Imagem:</label>

                        <input
                            type="text"
                            name="imagem"
                            class="form-control"
                            value="<?php echo $produto['imagem']; ?>"
                        >
                    </div>

                    <div class="mb-3">

                        <label class="form-label">Categoria:</label>

                        <select name="id_categoria" class="form-select">

                            <?php while ($categoria = $resultadoCategorias->fetch_assoc()) { ?>

                                <option
                                    value="<?php echo $categoria['id_categoria']; ?>"

                                    <?php
                                        if ($categoria['id_categoria'] == $produto['id_categoria']) {
                                            echo "selected";
                                    }
                                    ?>
                                >

                                    <?php echo $categoria['nome']; ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="form-check mb-3">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="promocao"
                            value="1"
                            id="promocao"

                            <?php
                            if ($produto['promocao'] == 1) {
                                echo "checked";
                            }
                            ?>
                        >

                        <label class="form-check-label" for="promocao">
                            Produto em promoção
                        </label>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">
                            Salvar Alterações
                        </button>

                        <a href="listar.php" class="btn btn-secondary">
                            Voltar
                        </a>
                    </div>

                </form>

            </div>

        </div>

    </div>
</body>
</html>