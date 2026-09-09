<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativos</title>

    <link rel="stylesheet" type="text/css" href="style-admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark nav-admin">
        <div class="container container-admin py-5">
            <span class="navbar-brand m-3 h1">
                Be Fit - Painel Administrativo
            </span>

            <a href="../index.php" class="btn btn-outline-light">
                Ver Site
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <h1 class="mb-4">
            Painel de Controle
        </h1>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Produtos</h4>

                        <p>
                            Cadastre, edite e exclua produtos.
                        </p>

                        <a href="produtos/listar.php" class="btn btn-dark">
                            Gerenciar Produtos
                        </a>
                    </div>
                </div>
            </div>

             <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Categorias</h4>

                        <p>
                            Gerencie as categorias.
                        </p>

                        <button class="btn btn-secondary" disabled>
                            Em breve
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Contatos</h4>

                        <p>
                            Visualize mensagens recebidas.
                        </p>

                        <button class="btn btn-secondary" disabled>
                            Em breve
                        </button>
                    </div>
                </div>
            </div>

             <div class="col-md-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Relatórios</h4>

                        <p>
                            Consulte dados da loja.
                        </p>

                        <button class="btn btn-secondary" disabled>
                            Em breve
                        </button>
                    </div>
                </div>
            </div>

    </div>

    <script src="painel.js"></script>
</body>
</html>