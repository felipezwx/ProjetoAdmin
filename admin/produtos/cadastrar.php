<?php

include '../../conexao.php';

$sqlCategorias = "SELECT * FROM categorias";

$resultadoCategorias = $conn->query($sqlCategorias);