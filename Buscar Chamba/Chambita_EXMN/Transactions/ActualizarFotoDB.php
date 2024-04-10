<?php
session_start();
include("../Connection/cn.php");
$id = $_POST['idev'];
$descripcion = $_POST['descripcion'];
$directorio = $_FILES['evidencia']['tmp_name'];
$imagen = file_get_contents($directorio);
$fecha = date('Y-m-d H:i:s');

$sql = "UPDATE Evidencias SET Foto=?, Descripcion=?, Fecha=? WHERE Id=?";
try {
    $cmd = $cn->prepare($sql);
    $res = $cmd->execute([$imagen, $descripcion, $fecha, $id]);
    header("Location: ../Pages/Principal.php?cod=10");
    exit();
} catch (Exception $ex) {
    header("Location: ../Pages/ActualizarFoto.php?cod=1");
    exit();
}
