<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['idrol']);
    unset($_SESSION['usuario']);
    unset($_SESSION['nombre']);
    header("Location: index.php");
    die();

?>