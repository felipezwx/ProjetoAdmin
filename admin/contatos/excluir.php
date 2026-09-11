<?php

include '../../conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM contatos
        WHERE id_contato = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: listar.php?mensagem=excluido");
exit;

?>