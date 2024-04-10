<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php?cod=3');
}
if($_SESSION['idrol']!=1){
    header('Location: Principal.php?cod=11');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajos</title>
    <?php
    include("../Layout/styles.php");
    include("../Layout/navInicio.php");
    include("../Layout/scripts.php");
    include("../Connection/cn.php");

    $id = $_GET['id'];
    $cmd = "SELECT * FROM Usuario WHERE Id = $id";
    $res = $cn->query($cmd);
    $usr = $res->fetch(PDO::FETCH_OBJ);
    ?>
</head>
<style>
    .border-success {
        --bs-border-opacity: 1;
        border-color: rgba(var(--bs-success-rgb), var(--bs-border-opacity)) !important;
    }
</style>

<body class="bg-dark-subtle text-emphasis-dark">
    <div class="container">
        <h1 class="display-6">
            Evidencias de trabajo de <b><?php echo $usr->Nombre; ?></b>
        </h1>
        <div align="right">
                <a class="btn btn-primary" href="../Pages/Principal.php" role="button">Regresar</a>
            </div>
        <br>
        <div class='row row-cols-1 row-cols-md-3 g-4'>
            <?php
            $idCham = $_GET['id'];
            $sql = "select * from Evidencias where Id_Trabajador=$idCham;";
            $res = $cn->query($sql);
            $evidencias = $res->fetchAll(PDO::FETCH_OBJ);
            foreach ($evidencias as $evidencia) {

                echo "
                <div class='col'>
                <div class='card h-100'>
                    <img src='../Transactions/GetEvidencia.php?Id=$evidencia->Id' class='card-img-top' alt='Not Found'>
                    <div class='card-body'>
                        <p class='card-text'><b>Descripcion: </b>$evidencia->Descripcion</p>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>$evidencia->Fecha</small>
                    </div>
                </div>
            </div>
                ";
            }
            ?>
        </div>
        <br>
        <br>
        <br>
        <?php
        include("../Layout/footerInicio.php");
        ?>
    </div>
</body>

</html>