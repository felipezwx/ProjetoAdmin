<?php

include '../../conexao.php';

$sql = "SELECT * FROM produtos";

$resultado = $conn->query($sql);

?>