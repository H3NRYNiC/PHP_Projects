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
    <title>Eliminar</title>
    <?php
    include("../Layout/styles.php");
    include("../Connection/cn.php");

    $id = $_GET['id'];
    $cmd = "SELECT * FROM Evidencias WHERE Id = $id";
    $res = $cn->query($cmd);
    $evid = $res->fetch(PDO::FETCH_OBJ);
    ?>
</head>

<body>
    <?php
    include("../Layout/navInicio.php");
    ?>
    <form action="../Transactions/EliminarEvidenciaBD.php" method="post">
        <input type="hidden" name="id" value="<?php echo $evid->Id;?>">
        <div class="container">
            <div class="card">
                <h5 class="card-header">Eliminar</h5>
                <div class="card-body">
                    <h5 class="card-title">Esta a punto de eliminar un registro</h5>
                    <p class="card-text">Esta seguro de eliminar el registro <b><?php echo $evid->Descripcion;?></b></p>
                    <a href="Principal.php" class="btn btn-secondary ml-2 mt-2">Regresar</a>
                    <button type="submit" class="btn btn-warning mt-2">Eliminar</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    include("../Layout/scripts.php");
    ?>
</body>

</html>