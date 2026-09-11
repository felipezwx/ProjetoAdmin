<?php

session_start();

include '../conexao.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios
            WHERE email = ?
            LIMIT 1";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $resultado = $stmt->get_result();

    $usuario = $resultado->fetch_assoc();


    if ($usuario && password_verify($senha, $usuario['senha'])) {

        $_SESSION['usuario'] = $usuario['nome'];

        header("Location: painel.php");
        exit;

    } else {

        $mensagem = "E-mail ou senha incorretos.";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Administrativo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style-admin.css">
</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-header">
                        <h2>Área Administrativa</h2>
                    </div>

                    <div class="card-body">

                    <?php if ($mensagem != "") { ?>

                        <div class="alert alert-danger">
                            <?php echo $mensagem; ?>
                        </div>

                    <?php } ?>

                        <form method="POST">

                            <div class="mb-3">
                                <label class="form-label">E-mail:</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Senha:</label>

                                <input
                                    type="password"
                                    name="senha"
                                    class="form-control"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-dark w-100">
                                Entrar
                            </button>

                            <a href="../index.php" class="btn btn-secondary w-100 mt-2">
                                Voltar para o Site
                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>