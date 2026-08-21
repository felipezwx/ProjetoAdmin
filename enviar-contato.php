<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);
    $mensagem = trim($_POST["mensagem"]);

    if(empty($nome) || empty($email) || empty($telefone) || empty($mensagem)){
        die("Preencha todos os campos!");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("E-mail inválido!");
    }

    header("Location: contato.php?sucesso=1");
    exit;
}
?>