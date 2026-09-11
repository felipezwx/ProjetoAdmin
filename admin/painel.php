<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style-admin.css">
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

        <h1 class="mb-4 titulo-admin">
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

                        <a href="categorias/listar.php" class="btn btn-dark">
                            Gerenciar Categorias
                        </a>
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

                        <a href="contatos/listar.php" class="btn btn-dark">
                            Gerenciar Mensagens
                        </a>
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

    <h2 class="mt-5 mb-4">Resumo do Estoque</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Total de Produtos</h5>

                    <h3 id="totalProdutos">
                        0
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Valor do Estoque</h5>

                    <h3 id="valorEstoque">
                        R$ 0,00
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Estoque Baixo</h5>

                    <h3 id="estoqueBaixo">
                        0
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <script src="painel.js"></script>
</body>
</html>