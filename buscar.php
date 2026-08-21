<?php
include 'conexao.php';

$busca = $_GET['busca']?? '';

$sql = "SELECT * FROM produtos WHERE nome LIKE '%$busca%'";

$resultado = $conn->query($sql);

include 'header.php';
?>

<div class="container py-4">

    <h2 class="titulo-busca">

        Resultado para: <?php echo htmlspecialchars($busca); ?>

    </h2>

    <?php if ($resultado->num_rows > 0) { ?>

        <div class="row">

            <?php while ($produto = $resultado->fetch_assoc()) { ?>

                <div class="col-12 col-sm-6 col-md-4 mb-4">

                    <div class="card resultado-card h-100">

                        <img src="<?php echo $produto['imagem']; ?>" class="card-img-top resultado-imagem" alt="<?php echo $produto['nome']; ?>">

                        <div class="card-body text-center">

                            <h5 class="card-title resultado-nome">
                                <?php echo $produto['nome']; ?>
                            </h5>

                            <p class="resultado-preco">
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                            </p>

                            <a href="<?php echo $produto['link']; ?>" class="btn btn-dark resultado-botao">
                                Ver Produto
                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>
 
        </div>


    <?php } else { ?>

        <p class="text-center fs-5">
            Nenhum produto encontrado
        </p>

    <?php } ?>

</div>

<?php
$conn->close();
?>

<?php include 'footer.php'; ?>