<?php

include '../../conexao.php';

$sqlCategorias = "SELECT * FROM categorias";

$resultadoCategorias = $conn->query($sqlCategorias);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $imagem = $_POST['imagem'];
    $id_categoria = $_POST['id_categoria'];

    $sqlVerificar = "SELECT * FROM produtos WHERE nome = ?";

    $stmtVerificar = $conn->prepare($sqlVerificar);

    $stmtVerificar->bind_param("s", $nome);

    $stmtVerificar->execute();

    $resultadoVerificar = $stmtVerificar->get_result();


    if ($resultadoVerificar->num_rows > 0) {

        $mensagem = "Já existe um produto com esse nome.";
    
    } else {

        $sql = "INSERT INTO produtos (nome, descricao, preco, estoque, imagem) VALUES (?, ?, ?, ?, ?)";

        $smt = $conn->prepare($sql);

        $stmt->bind_param("ssdis", $nome, $descricao, $preco, $estoque, $imagem);

        $stmt->execute();

        $id_produto = $conn->insert_id;

        $sqlCategoria = "INSERT INTO produto_categoria (id_produto, id_categoria) VALUES (?, ?)";

        $stmtCategoria = $conn->prepare($sqlCategoria);

        $stmtCategoria->bind_param("li", $id_produto, $id_categoria);

        $stmtCategoria->execute();

        header("Location: listar.php");

        exit;

        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>

    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h1 class="mb-4">
            Cadastrar Produto
        </h1>

        <?php if (isset($mensagem)) { ?>

            <div class="alert alert-danger">

                <?php echo $mensagem; ?>
            </div>

        <?php } ?>

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Nome
                </label>

                <input type="text" name="nome" class="form-control" required>
            
            </div>

        </form>
    </div>
</body>
</html>