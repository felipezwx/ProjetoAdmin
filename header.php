<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Be fit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="topo-header">

            <div class="logo">
                    <a href="/ProjetoTADSSegundoBi/index.php" title="Home" alt="Home">
                        <img src="/ProjetoTADSSegundoBi/img/logobefitclara.jpeg" title="Logo" alt="Logo">
                    </a>
            </div>

            <form class="busca" action="/ProjetoTADSSegundoBi/buscar.php" method="GET">
                <input type="text" name="busca" placeholder="Buscar">

                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>      
        </div>

        <nav>
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <li>
                    <a href="produtos.php">Produtos</a>
                </li>
                <li>
                    <a href="contato.php">Contato</a>
                </li>
                <li>
                    <a href="quemsomos.php">Quem Somos</a>
                </li>
            </ul>
        </nav>

    </header>
</body>
</html>