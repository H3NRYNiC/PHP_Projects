<?php
    include("../Connection/cn.php");
    
    $id = $_POST['id'];
    $cmd = "DELETE FROM Evidencias WHERE Id=?";
    try {
        $sql = $cn->prepare($cmd);
        $resultado = $sql->execute([$id]);
        header("Location: ../Pages/Principal.php?cod=9");
        die();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
?>