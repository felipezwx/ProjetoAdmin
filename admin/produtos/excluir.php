<?php

include '../../conexao.php';

$id = $_GET['id'];


$sqlCategoria = "DELETE FROM produto_categoria WHERE id_produto = ?";

$stmtCategoria = $conn->prepare($sqlCategoria);

$stmtCategoria->bind_param("i", $id);

$stmtCategoria->execute();


$sqlProduto = "DELETE FROM produtos
               WHERE id_produto = ?";

$stmtProduto = $conn->prepare($sqlProduto);

$stmtProduto->bind_param("i", $id);

$stmtProduto->execute();


header("Location: listar.php?mensagem=excluido");

exit;

?>