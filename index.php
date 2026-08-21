<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be fit</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php
        include 'conexao.php';

        $sqlRaquetes = "
            SELECT p.*
            FROM produtos p
            INNER JOIN produto_categoria pc
                ON p.id_produto = pc.id_produto
            INNER JOIN categorias c
                ON pc.id_categoria = c.id_categoria
            WHERE c.nome = 'Raquetes'
        ";

        $raquetes = $conn->query($sqlRaquetes);

        $sqlMasculino = "
            SELECT p.*
            FROM produtos p
            INNER JOIN produto_categoria pc
                ON p.id_produto = pc.id_produto
            INNER JOIN categorias c
                ON pc.id_categoria = c.id_categoria
            WHERE c.nome = 'Roupas Masculinas'
        ";

        $masculino = $conn->query($sqlMasculino);

        $sqlFeminino = "
            SELECT p.*
            FROM produtos p
            INNER JOIN produto_categoria pc
                ON p.id_produto = pc.id_produto
            INNER JOIN categorias c
                ON pc.id_categoria = c.id_categoria
            WHERE c.nome = 'Roupas Femininas'
        ";

        $feminino = $conn->query($sqlFeminino);
    ?>

    <?php include 'header.php'; ?>

    <section class="area-carrossel">

        <div class="carrossel">

            <div class="slides" id="slides">

                <div class="slide">
                    <img src="img/bannerfobel.webp">
                </div>

                <div class="slide">
                    <img src="img/konabanner.webp">
                </div>

            </div>

            <button class="btn-slide anterior" onclick="voltar()">❮</button>
            <button class="btn-slide proximo" onclick="avancar()">❯</button>
        </div>

    </section>

    <section class="raquetes">
        <h3>Raquetes Beach Tennis</h3>

        <div class="raquetes-carrossel">

            <button class="btn-raquete" onclick="voltarRaquete()">❮</button>

            <div class="raquetes-janela">

                <div class="raquetes-grid" id="raquetes-grid">

                    <?php while($produto = $raquetes->fetch_assoc()) { ?>

                        <div class="raquetes-blocos">

                            <div class="raquetes-imagens">

                                <img
                                    src="<?php echo $produto['imagem']; ?>"
                                    alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                                >

                            </div>

                            <h3 class="raquete-nome">
                                <?php echo htmlspecialchars($produto['nome']); ?>
                            </h3>

                            <div class="raquetes-preco">

                                <strong>
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </strong>

                            </div>

                            <a href="produto.php?id=<?php echo $produto['id_produto']; ?>">

                                <button class="botao-comprar">
                                    Comprar
                                </button>

                            </a>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <button class="btn-raquete" onclick="avancarRaquete()">❯</button>

        </div>

    </section>

    <section class="roupas-masculino">
        <h3>Roupas Masculinas</h3>

        <div class="roupas-masculinas-carrossel">

            <button class="btn-raquete" onclick="voltarMasculino()">❮</button>

            <div class="roupas-masculinas-janela">

                <div class="roupas-masculinas-grid" id="roupas-masculinas-grid">

                    <?php while($produto = $masculino->fetch_assoc()) { ?>

                        <div class="roupas-masculinas-blocos">

                            <div class="roupas-masculinas-imagens">

                                <img
                                    src="<?php echo $produto['imagem']; ?>"
                                    alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                                >

                            </div>

                            <h3 class="roupa-masculina-nome">
                                <?php echo htmlspecialchars($produto['nome']); ?>
                            </h3>

                            <div class="roupa-masculina-preco">

                                <strong>
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </strong>

                            </div>

                            <a href="produto.php?id=<?php echo $produto['id_produto']; ?>">

                                <button class="botao-comprar">
                                    Comprar
                                </button>

                            </a>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <button class="btn-raquete" onclick="avancarMasculino()">❯</button>
        </div>
    </section>

    <section class="roupas-femininas">
        <h3>Roupas Femininas</h3>

        <div class="roupas-femininas-carrossel">

            <button class="btn-raquete" onclick="voltarFeminino()">❮</button>

            <div class="roupas-femininas-janela">

                <div class="roupas-femininas-grid" id="roupas-femininas-grid">

                    <?php while($produto = $feminino->fetch_assoc()) { ?>

                        <div class="roupas-femininas-blocos">

                            <div class="roupas-femininas-imagens">
                                <img
                                    src="<?php echo $produto['imagem']; ?>"
                                    alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                                >
                            </div>

                            <h3 class="roupas-femininas-nome">
                                <?php echo htmlspecialchars($produto['nome']); ?>
                            </h3>

                            <div class="roupas-femininas-preco">
                                <strong>
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </strong>
                            </div>

                            <a href="produto.php?id=<?php echo $produto['id_produto']; ?>">
                                <button class="botao-comprar">Comprar</button>
                            </a>

                        </div>

                    <?php } ?>    

                </div>

            </div>

            <button class="btn-raquete" onclick="avancarFeminino()">❯</button>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="carrossel.js"></script>
</body>
</html>