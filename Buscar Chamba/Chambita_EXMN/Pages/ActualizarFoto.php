<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php?cod=3');
}
if($_SESSION['idrol']!=2){
    header('Location: Principal.php?cod=11');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Evidencia</title>
</head>

<body>
    <?php
    include("../Layout/navInicio.php");
    include("../Connection/cn.php");
    include("../Layout/styles.php");

    $id = $_GET['id'];
    $cmd = "SELECT Evidencias.Id, Evidencias.Foto, Evidencias.Descripcion, Usuario.Nombre FROM Evidencias
    INNER JOIN Usuario ON evidencias.Id_Trabajador = Usuario.Id  WHERE Evidencias.Id = $id;";
    $res = $cn->query($cmd);
    $evi = $res->fetch(PDO::FETCH_OBJ);
    ?>
    <div class="container">
        <div class="row align-items-start">
            <h3>Actualizar evidencia de trabajos</h3>
            <form action="../Transactions/ActualizarFotoDB.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $evi->Id;?>" name="idev">
                <div class="row">
                    <div class="col">
                        <label for="txtDesc">Descripcion</label>
                        <textarea name="descripcion" id="txtDesc" class="form-control"><?php echo $evi->Descripcion;?></textarea>
                    </div>

                    <div class="col-6">
                        <img class='rounded float-end' style="width: 100px;" src='../Transactions/GetEvidencia.php?Id=<?php echo $evi->Id;?>' alt='Not Found'>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="txtComentarios">Nombre</label>
                        <input class="form-control" disabled name="nombre" value="<?php echo $evi->Nombre; ?>" type="text">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="txtComentarios">Hora Servidor</label>
                        <input class="form-control" disabled name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>" type="datetime">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="txtEvidencia" class="form-label">Seleccione una evidencia</label>
                            <input required class="form-control" type="file" id="txtEvidencia" name="evidencia">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-lg btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>