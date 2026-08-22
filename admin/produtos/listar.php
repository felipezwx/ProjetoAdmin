<?php

include '../../conexao.php';

$sql = "SELECT * FROM produtos";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h1 class="mb-4">
            Produtos
        </h1>


        <a href="../painel.php" class="btn btn-secondary mb-3">
            Voltar
        </a>


        <a href="cadastrar.php" class="btn btn-success mb-3">
            Novo Produto
        </a>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Imagem</th>

                    <th>Nome</th>

                    <th>Preço</th>

                    <th>Estoque</th>

                    <th>Ações</th>

                </tr>

            </thead>

            <tbody> 

                <?php while ($produto = $resultado->fetch_assoc()) { ?> 
                
                    <tr> 

                        <td>

                            <?php echo $produto['id_produto']; ?>

                        </td>

                    </tr>
                
                <?php } ?>

            </tbody>

    </div>
</body>
</html>