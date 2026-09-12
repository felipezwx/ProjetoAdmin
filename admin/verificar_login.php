<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /ProjetoAdmin/admin/login.php");
    exit;
}

?>