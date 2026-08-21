<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="container py-5 contato">

    <?php
        if(isset($_GET['sucesso'])){
    ?>
        <div class="alert alert-success">
            Mensagem enviada com sucesso!
        </div>
    <?php
    }
    ?>


    <h1 class="mb-5 titulo-contato">Contato</h1>

    <div class="row">

        <div class="col-md-4">
            <p><i class="fa-brands fa-whatsapp"></i> (44) 99850-1379</p>
            <p><i class="fa-solid fa-phone"></i> (44) 1111-1111</p>
            <p><i class="fa-solid fa-envelope"></i> befit@gmail.com</p>
            <p><i class="fa-solid fa-location-dot"></i> Perimetral Tancredo Neves, 1735</p>
        </div>

        <div class="col-md-8">

            <form method="post" action="enviar-contato.php">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control"placeholder="Digite seu e-mail"required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="tel"name="telefone" class="form-control" placeholder="(44) 99999-9999" pattern="[0-9() -]{10,20}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensagem</label>
                    <textarea name="mensagem" class="form-control" rows="5" maxlength="500" placeholder="Digite sua mensagem" required></textarea>
                </div>

                <button type="submit" class="btn-enviar me-2">
                    Enviar
                </button>

                <button type="reset" class="btn btn-secondary">
                    Limpar
                </button>

            </form>

        </div>

    </div>

    <?php include 'footer.php'; ?>

</section>
</body>
</html>