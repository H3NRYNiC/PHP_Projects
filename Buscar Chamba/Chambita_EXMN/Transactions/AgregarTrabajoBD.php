<?php
session_start();
include("../Connection/cn.php");
$descripcion = $_POST["descripcion"];
$directorio = $_FILES['evidencia']['tmp_name'];
$imagen = file_get_contents($directorio);
$trabajador = $_POST["IdTrabajador"];
$fecha = date('Y-m-d H:i:s');

$sql = "INSERT INTO Evidencias (Foto,Descripcion,Id_trabajador,Fecha) value (?,?,?,?)";
try {
    $cmd = $cn->prepare($sql);
    $res = $cmd->execute([$imagen,$descripcion,$trabajador,$fecha]);
    header("Location: ../Pages/Principal.php?codigo=2");
    exit();
} catch (Exception $ex) {
    header("Location: ../Pages/AgregarTrabajo.php?codigo=1");
    exit();
}
