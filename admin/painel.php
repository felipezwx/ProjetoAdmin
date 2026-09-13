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
    <title>Painel Administrativo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style-admin.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark nav-admin">
        <div class="container container-admin py-5">
            <span class="navbar-brand m-3 h1">
                Be Fit - Painel Administrativo
            </span>

            <div class="d-flex gap-2">
                <a href="../index.php" class="btn btn-outline-light">
                    Ver Site
                </a>

                <a href="logout.php" class="btn btn-danger">
                    Sair
                </a>
            </div>

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

                        <a href="#relatorio" class="btn btn-dark">
                            Ver Relatório
                        </a>
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

    <h2 id="relatorio" class="mt-5 mb-4">Relatório de Produtos</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <label class="form-label">
                Filtrar por Categoria:
            </label>

            <select id="filtroCategoria" class="form-select">

                <option value="todos">
                    Todas
                </option>

                <option value="Raquetes">
                    Raquetes
                </option>

                <option value="Roupas Masculinas">
                    Roupas Masculinas
                </option>

                <option value="Roupas Femininas">
                    Roupas Femininas
                </option>

            </select>

            <div class="mt-3">

                <label class="form-label">
                    Buscar Produto:
                </label>

                <input
                    type="text"
                    id="campoBusca"
                    class="form-control"
                    placeholder="Digite o nome do produto"
                >

            </div>

        </div>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Valor em Estoque</th>
                    </tr>
                </thead>

                <tbody id="tabelaRelatorio">

                </tbody>

            </table>

        </div>

    </div>

        <div class="d-flex justify-content-between align-items-center mt-3 mb-4">

            <button id="btnAnterior" class="btn btn-secondary">
                Anterior
            </button>

            <span id="paginaAtual">
                Página 1
            </span>

            <button id="btnProxima" class="btn btn-dark">
                Próxima
            </button>

        </div>

        <h2 class="mt-5 mb-4">Ranking de Produtos</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                <ol id="rankingProdutos">
                </ol>

        </div>

    </div>

    </div>

    <script src="painel.js"></script>
</body>
</html>