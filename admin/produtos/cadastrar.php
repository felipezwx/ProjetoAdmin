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

    }