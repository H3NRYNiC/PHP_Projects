<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php?cod=3');
}if ($_SESSION['idrol']!=2) {
    header('Location: Principal.php?cod=11');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Evidencia</title>
</head>

<body>
    <?php
    include("../Layout/navInicio.php");
    include("../Connection/cn.php");
    include("../Layout/styles.php");

    $id = $_SESSION['id'];
    $cmd = "SELECT * FROM Usuario WHERE Id = $id";
    $res = $cn->query($cmd);
    $usr = $res->fetch(PDO::FETCH_OBJ);

    ?>
    <h3>Subir fotos de trabajos</h3>
    <div class="container">
        <form action="../Transactions/AgregarTrabajoBD.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id?>" name="IdTrabajador">
            <div class="row">
                <div class="col-md-6">
                    <label for="txtDesc">Descripcion</label>
                    <textarea name="descripcion" id="txtDesc" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="txtComentarios">Nombre: </label>
                    <input class="form-control" disabled name="nombre" value="<?php echo $usr->Nombre; ?>" type="text">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="txtComentarios">Hora Servidor: </label>
                    <input class="form-control" disabled name="fecha" value="<?php echo date('Y-m-d'); ?>" type="date">
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
        <?php
        include("../Layout/footerInicio.php");
        ?>
    </div>
</body>

</html>