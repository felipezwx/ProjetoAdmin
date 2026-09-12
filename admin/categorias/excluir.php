<?php

include '../verificar_login.php';
include '../../conexao.php';

$id = $_GET['id'];


$sqlVerificar = "SELECT * FROM produto_categoria
                 WHERE id_categoria = ?";

$stmtVerificar = $conn->prepare($sqlVerificar);

$stmtVerificar->bind_param("i", $id);

$stmtVerificar->execute();

$resultado = $stmtVerificar->get_result();


if ($resultado->num_rows > 0) {

    header("Location: listar.php?mensagem=em_uso");
    exit;

}


$sqlExcluir = "DELETE FROM categorias
               WHERE id_categoria = ?";

$stmtExcluir = $conn->prepare($sqlExcluir);

$stmtExcluir->bind_param("i", $id);

$stmtExcluir->execute();


header("Location: listar.php?mensagem=excluido");
exit;

?>