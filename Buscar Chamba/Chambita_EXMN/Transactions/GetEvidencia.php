<?php
    include("../Connection/cn.php");

    $id = $_GET['Id'];
    $sql = "SELECT Foto from Evidencias where Id =?";
    $cmd = $cn->prepare($sql);
    $res = $cmd->execute([$id]);
    $e = $cmd->fetch(PDO::FETCH_OBJ);
    header("Content-type: image/jpg");
    echo $e->Foto;
?>