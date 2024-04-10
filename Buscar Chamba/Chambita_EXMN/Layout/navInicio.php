<?php
include("../Connection/cn.php");
try {
    if (isset($_SESSION['id'])) {
        if ($_SESSION['idrol'] == 2) {
            $id = $_SESSION['id'];
            $cmd = "SELECT * FROM Usuario WHERE Id = $id";
            $res = $cn->query($cmd);
            $usr = $res->fetch(PDO::FETCH_OBJ);
?>
            <header>
                <!-- Navbar -->
                <div class="container-fluid bg-dark p-2 mb-3">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="navbar-brand" href="#"><i class="bi bi-house-gear pe-2"></i>Chambas <b><?php echo $usr->Nombre; ?></b></a>
                        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto align-items-center">
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="../Pages/AgregarTrabajo.php"><abbr title="Agregar evidencias"><i class="bi bi-plus-circle pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="#"><abbr title="Notificaciones"><i class="bi bi-bell pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="#!"><abbr title="Valoraciones"><i class="bi bi-heart pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="../Pages/CerrarSesion.php"><abbr title="Cerrar sesion"><i class="bi bi-box-arrow-right pe-2"></i></abbr></a>

                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Navbar -->
            </header>
        <?php
        } elseif ($_SESSION['idrol'] == 1) {
            $id = $_SESSION['id'];
            $cmd = "SELECT * FROM Usuario WHERE Id = $id";
            $res = $cn->query($cmd);
            $usr = $res->fetch(PDO::FETCH_OBJ);
        ?>
            <header>
                <!-- Navbar -->
                <div class="container-fluid bg-dark p-2 mb-3">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="navbar-brand" href="#"><i class="bi bi-house-gear pe-2"></i>Chambas<b><?php echo $usr->Nombre; ?></b></a>
                        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto align-items-center">
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="#"><abbr title="Agregar evidencias"><i class="bi bi-plus-circle pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="#"><abbr title="Notificaciones"><i class="bi bi-bell pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="#!"><abbr title="Valoraciones"><i class="bi bi-heart pe-2"></i></abbr></a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="nav-link mx-2" href="../Pages/CerrarSesion.php"><abbr title="Cerrar sesion"><i class="bi bi-box-arrow-right pe-2"></i></abbr></a>

                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Navbar -->
            </header>
        <?php
        }
        ?>

<?php
    }
} catch (Exception $th) {
    header("Location: ../Pages/index.php");
}
?>