<?php

include 'conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Produto inválido.");
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id_produto = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    die("Produto não encontrado.");
}

$produto = $resultado->fetch_assoc();

$telefone = "5544998501379";

$precoFormatado = number_format($produto['preco'], 2, ',', '.');

$mensagem = "Olá! Tenho interesse no produto: "
    . $produto['nome']
    . " - R$ "
    . $precoFormatado;

$linkWhatsapp = "https://wa.me/" . $telefone . "?text=" . urlencode($mensagem);

?>

<?php include 'header.php'; ?>

<div class="container py-5" style="margin-top: 180px;">

    <div class="row align-items-center g-5">

        <div class="col-md-6 text-center">

            <img
                src="<?php echo htmlspecialchars($produto['imagem']); ?>"
                alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                class="img-fluid"
                style="max-height: 500px; object-fit: contain;"
            >

        </div>

        <div class="col-md-6">

            <h1 class="fw-bold mb-4">
                <?php echo htmlspecialchars($produto['nome']); ?>
            </h1>


            <?php if (!empty($produto['descricao'])) { ?>

                <p class="fs-5 text-secondary">
                    <?php echo htmlspecialchars($produto['descricao']); ?>
                </p>

            <?php } ?>


            <h2 class="fw-bold my-4">

                R$
                <?php
                    echo number_format(
                        $produto['preco'],
                        2,
                        ',',
                        '.'
                    );
                ?>

            </h2>

            <?php if ($produto['estoque'] > 0) { ?>

                <p class="text-success fw-bold">
                    Produto disponível
                </p>

                <p>
                    Estoque:
                    <?php echo $produto['estoque']; ?>
                    unidade(s)
                </p>

            <?php } else { ?>

                <div class="alert alert-danger">
                    Produto fora de estoque.
                </div>

            <?php } ?>

            <div class="d-flex gap-3 mt-4 flex-wrap">

                <?php if ($produto['estoque'] > 0) { ?>

                    <a
                        href="<?php echo $linkWhatsapp; ?>"
                        target="_blank"
                        class="btn btn-success btn-lg"
                    >
                        Comprar pelo WhatsApp
                    </a>

                <?php } ?>


                <a
                    href="produtos.php"
                    class="btn btn-outline-dark btn-lg"
                >
                    Voltar
                </a>

            </div>

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>