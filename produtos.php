<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php

    include 'conexao.php';

    $sql = "
    SELECT
        p.id_produto,
        p.nome,
        p.preco,
        p.imagem,
        p.link,
        p.promocao,
        c.nome AS categoria
    FROM produtos p
    INNER JOIN produto_categoria pc
        ON p.id_produto = pc.id_produto
    INNER JOIN categorias c
        ON pc.id_categoria = c.id_categoria
    ";
    $resultado = $conn->query($sql);

    $produtos = [];

    while($produto = $resultado->fetch_assoc()){
        $produtos[] = $produto;
    }

    ?>

    <?php include 'header.php'; ?>

    <div class="container container-produtos">

        <h1 class="text-center mt-5">
            Produtos
        </h1>

        <div class="text-center filtros">

            <button class="btn btn-dark" onclick="mostrarProdutos('todos')">
                Todos
            </button>

            <button class="btn btn-outline-dark" onclick="mostrarProdutos('Raquetes')">
                Raquetes
            </button>

            <button class="btn btn-outline-dark" onclick="mostrarProdutos('Roupas Masculinas')">
                Masculino
            </button>

            <button class="btn btn-outline-dark" onclick="mostrarProdutos('Roupas Femininas')">
                Feminino
            </button>

            <button class="btn btn-outline-danger"
                onclick="mostrarProdutos('promocao')">
                    Promoções
            </button>

        </div>

        <div class="row" id="listaProdutos">

        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script>

    const produtos = <?php echo json_encode($produtos); ?>;

    console.log(produtos);

    </script>

<script src="produtos.js"></script>

</body>
</html>