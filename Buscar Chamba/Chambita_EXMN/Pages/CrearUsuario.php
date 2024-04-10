<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesion</title>
    <?php
    include("../Layout/styles.php");
    ?>
</head>

<body class="bg-dark-subtle text-emphasis-dark">
<header>
        <nav class="navbar bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <span style="background-color: #2D6A4F; border-radius: 10px; padding: 5px;" class="navbar-brand mb-0 h1">Registrar Usuario</span>
            </div>
        </nav>
    </header>

    <form action="../Transactions/CrearUsuarioBD.php" method="post" class="container">
        <div class="col-md-4 offset-md-4 mt-4">

            <div class="card border-dark">
                <div class="card-header bg-success text-white h4 text-center ">
                    Registrarse
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid" width="175px" src="http://clipart-library.com/images_k/construction-worker-silhouette-vector/construction-worker-silhouette-vector-5.png" alt="No disponible">
                    </div>
                    <div class="row g-3">
                        <label for="txtUsuario">Nombre</label>
                        <input type="text" required name="nombre" id="txtUsuario" class="form-control-lg form-control">
                    </div>
                    <div class="row g-3">
                        <label for="txtUsuario">Usuario</label>
                        <input type="text" required name="usuario" id="txtUsuario" class="form-control-lg form-control">
                    </div>
                    <div class="row g-3">
                        <label for="txtPassword">Contraseña</label>
                        <input type="password" required name="contra" id="txtPassword" class="form-control-lg form-control">
                    </div>
                    <br>
                    <p>Rol a desempeñar</p>
                    <input class="form-check-input" type="radio" name="rol" value="1" /> Contratista<br />
                    <input class="form-check-input" type="radio" name="rol" value="2" /> Trabajador<br />

                    <div class="row g-3 mt-3">
                        <button class="btn btn-lg btn-info" type="submit">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php
    include("../Layout/scripts.php");
    ?>

    <?php
    if (isset($_GET['cod'])) {
        if ($_GET['cod'] == 1) {
            echo "<script>
                    Swal.fire(
                    'Información',
                    'Datos erróneos, inténtelo nuevamente',
                    'error'
                    );
                </script>";
        }
    }
    ?>

    <footer class="bg-dark text-center text-lg-start fixed">
        <!-- Copyright -->
        <div class="text-center text-light p-3">
            © 2023 Copyright:
            <a class="text-light" href="../Pages/Principal.php">Pagina.com</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>