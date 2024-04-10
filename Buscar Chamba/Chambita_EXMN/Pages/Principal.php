<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgb(217, 235, 235);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(12, 114, 81, 0.7);
            color: rgb(112, 24, 78);
        }

        .thead-green {
            background-color: rgb(0, 99, 71);
            color: white;
        }
    </style>
    <title>Trabajos</title>
    <?php
    include("../Layout/styles.php");
    include("../Connection/cn.php");
    ?>
</head>

<body class="bg-dark-subtle text-emphasis-dark">
    <?php
    include("../Layout/navInicio.php");
    ?>
    <!-- <a href='CerrarSesion.php' class='btn btn-danger' style="float: right;">Cerrar sesión <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg></a> -->
    <?php
    include("../Layout/scripts.php");
    if (!isset($_SESSION['id'])) {
        header('Location: index.php?cod=3');
    }
    ?>
    <br>
    <div class="container-fluid">
        <?php
        $idUss = $_SESSION['id'];
        if ($_SESSION['idrol'] == 1) {

            ?>
            <div class="container">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Contratados
                </button>
            </div>
        </div>
            <?php
            echo "
            <div class='container'>
            <h3>Trabajadores disponibles</h3>
                    <table class='table table-striped table-hover' style='margin-bottom:50px'>
                        <thead class='thead-green'>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Disponibilidad</th>
                                <th></th>
                                <th>Calificacion</th>
                            </tr>
                        </thead>
                        <tbody>";

            $sql = "select * from Usuario where Chambeando=0 AND Id_Rol=2;";
            $res = $cn->query($sql);
            $usuarios = $res->fetchAll(PDO::FETCH_OBJ);
            foreach ($usuarios as $uss) {

                $sql1 = "select avg(Calificacion) as Promedio from Valoraciones where Id_Trabajador = $uss->Id;";
                $res1 = $cn->query($sql1);
                $prom = $res1->fetch(PDO::FETCH_OBJ);

                if ($prom) {
                    $promedio = $prom->Promedio;
                    echo "
                            <tr>
                                <td>$uss->Nombre</td>
                                <td>$uss->Usuario</td>
                                <td>Disponible</td>
                                <td>
                                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                    <a href='VisualizarEvidencia.php?id=$uss->Id' class='btn btn-info'>Ver trabajos</a>
                                    <a href='VisualizarRecomendaciones.php?id=$uss->Id' class='btn btn-warning'>Comentarios</a>
                                    <a href='Contratar.php?id=$uss->Id' class='btn btn-danger'>Contratar</a>
                                    </div>
                                </td>
                            ";
                    if ($promedio >= 1 && $promedio <= 1.99) {
                        echo "
                                <td>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                    </td>
                                </tr>
                                ";
                    }
                    if ($promedio >= 2 && $promedio <= 2.99) {
                        echo "
                                <td>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                    </td>
                                </tr>
                                ";
                    }
                    if ($promedio >= 3 && $promedio <= 3.99) {
                        echo "
                                <td>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                    </td>
                                </tr>
                                ";
                    }
                    if ($promedio >= 4 && $promedio < 4.99) {
                        echo "
                                <td>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                    </td>
                                </tr>
                                ";
                    }
                    if ($promedio == 5) {
                        echo "
                                <td>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                    </td>
                                </tr>
                                ";
                    }
                    if ($promedio == 0) {
                        echo "
                        <td>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                    </td>
                                </tr>
                        ";
                    }
                }
            }
        ?>
            </tbody>
            </table>
            <hr>
            <div class="collapse" id="collapseExample" style="margin-bottom: 75px;">
                <div class="card card-body">
                    <h3>Trabajadores contratados</h3>
                    <table class="table table-striped table-hover">
                        <thead class='thead-green'>
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Disponibilidad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from Usuario where Chambeando=1 AND Id_Rol=2 AND Id_Contratista=?;";
                            $res = $cn->prepare($query);
                            $cmd = $res->execute([$idUss]);
                            $usua = $res->fetchAll(PDO::FETCH_OBJ);
                            foreach ($usua as $us) {
                                echo "<tr>
                <td>$us->Nombre</td>
                <td>$us->Usuario</td>
                <td>Trabajando</td>
                <td><a href='LiberarTrabajador.php?id=$us->Id' class='btn btn-info'>Liberar </a></td>
                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        } else if ($_SESSION['idrol'] == 2) {
            echo "<a href='../Pages/AgregarTrabajo.php' class='btn btn-success'>Agregar evidencias de trabajo <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-node-plus-fill' viewBox='0 0 16 16'>
                <path d='M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z' />
            </svg></a>";
        ?>

            <!-- Espacio de trabajadores -->
            <!--  -->
            <!--  -->
            <div class="container" style="margin-bottom: 75px;">
                <?php
                $id = $_SESSION['id'];
                $cmd = "SELECT u1.Nombre AS contratado, u2.Nombre AS contratista
        FROM Usuario u1
        INNER JOIN Usuario u2 ON u1.Id_Contratista = u2.Id WHERE u1.Id = $id;";
                $res = $cn->query($cmd);
                $usr = $res->fetch(PDO::FETCH_OBJ);

                if (!empty($usr->contratado) || !empty($usr->contratista)) {
                    echo "<h3 class='display-6'>Hola <b>{$usr->contratado}</b> aqui estan tus evidencias</h3>
                                <h5>Fuiste contratado por <b>{$usr->contratista}</b></h5>";

                    $sql1 = "select avg(Calificacion) as Promedio from Valoraciones where Id_Trabajador = $idUss;";
                    $res1 = $cn->query($sql1);
                    $prom = $res1->fetch(PDO::FETCH_OBJ);

                    if ($prom) {
                        $promedio = $prom->Promedio;
                        if ($promedio >= 1 && $promedio <= 1.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Debes esforzarte mas
                                    </p>
                                ";
                        }
                        if ($promedio >= 2 && $promedio <= 2.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Debes esforzarte mas
                                    <p>
                                ";
                        }
                        if ($promedio >= 3 && $promedio <= 3.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Podria mejorar
                                    </p>

                                ";
                        }
                        if ($promedio >= 4 && $promedio < 4.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                Muy bien
                                    </p>
                                ";
                        }
                        if ($promedio == 5) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                Excelente
                                    </p>
                                ";
                        }
                        if ($promedio == 0) {
                            echo "<p>Todo a su tiempo</p>";
                        }
                    }
                } else {
                    $id = $_SESSION['id'];
                    $cmd = "SELECT * FROM Usuario WHERE Id = $id;";
                    $res = $cn->query($cmd);
                    $usr = $res->fetch(PDO::FETCH_OBJ);
                    echo "<h3 class='display-6'>Hola <b>{$usr->Nombre}</b> aqui estan tus evidencias</h3>
                                <h5>Sin ningun contrato por el momento, no pierdas los animos</h5>";

                    $sql1 = "select avg(Calificacion) as Promedio from Valoraciones where Id_Trabajador = $idUss;";
                    $res1 = $cn->query($sql1);
                    $prom = $res1->fetch(PDO::FETCH_OBJ);

                    if ($prom) {
                        $promedio = $prom->Promedio;
                        if ($promedio >= 1 && $promedio <= 1.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Debes esforzarte mas
                                    </p>
                                ";
                        }
                        if ($promedio >= 2 && $promedio <= 2.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Debes esforzarte mas
                                    <p>
                                ";
                        }
                        if ($promedio >= 3 && $promedio <= 3.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                <i class='bi bi-star'></i>
                                Podria mejorar
                                    </p>

                                ";
                        }
                        if ($promedio >= 4 && $promedio < 4.99) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star'></i>
                                Muy bien
                                    </p>
                                ";
                        }
                        if ($promedio == 5) {
                            echo "
                                <p>Actualmente tienes:
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                <i class='bi bi-star-fill'></i>
                                Excelente
                                    </p>
                                ";
                        }
                        if ($promedio == 0) {
                            echo "<p>Todo a su tiempo</p>";
                        }
                    }
                }
                ?>

                <hr>
                <!--  -->
                <div class="d-flex flex-wrap mb-4">
                <?php
                $query = "select * from Evidencias where Id_Trabajador=?;";
                $res = $cn->prepare($query);
                $cmd = $res->execute([$idUss]);
                $evidencias = $res->fetchAll(PDO::FETCH_OBJ);
                foreach ($evidencias as $evidencia) {
                    echo "
                <div class='card m-2' style='width: 15rem;'>
                    <img src='../Transactions/GetEvidencia.php?Id=$evidencia->Id' class='card-img-top' alt='Not Found'>
                    <div class='card-body'>
                    <h5 class='card-title'>Descripción</h5>
                    <p class='card-text'>$evidencia->Descripcion</p>
                    <div class='align-self-end'>
                        <a href='../Pages/ActualizarFoto.php?id=$evidencia->Id' class='btn btn-info'>Editar</a>
                        <a href='../Pages/EliminarEvidencia.php?id=$evidencia->Id' class='btn btn-danger'>Eliminar</a>
                    </div>
                    </div>
                </div>
                ";
                }
            }
                ?>
                </div>
            </div>
            <?php
            $ids = $_SESSION['id'];
            $cmd = "SELECT * FROM Usuario WHERE Id = $ids";
            $res = $cn->query($cmd);
            $usr = $res->fetch(PDO::FETCH_OBJ);
            if (isset($_GET['cod'])) {
                $codigo = $_GET['cod'];
                $mensaje = "";
                $icono = "";
                switch ($codigo) {
                    case '1':
                        $mensaje = "Un placer tenerte de vuelta <b>$usr->Nombre</b>";
                        $icono = "success";
                        break;
                    case '2':
                        $mensaje = "Usted a contratado un trabajador";
                        $icono = "success";
                        break;
                    case '3':
                        $mensaje = "Error al contratar, vuelva a intentarlo";
                        $icono = "error";
                        break;
                    case '4':
                        $mensaje = "Error al contratar, el trabajador ya está trabajando y no se puede asignar";
                        $icono = "error";
                        break;
                    case '5':
                        $mensaje = "Error al liberar, el trabajador no está trabajando";
                        $icono = "success";
                        break;
                    case '6':
                        $mensaje = "Trabajador liberado";
                        $icono = "warning";
                        break;
                    case '7':
                        $mensaje = "Error al liberar, vuelva a intentarlo";
                        $icono = "error";
                        break;
                    case '8':
                        $mensaje = "Usuario y/o contraseña incorrecto";
                        $icono = "error";
                        break;
                    case '9':
                        $mensaje = "Evidencia Eliminada";
                        $icono = "error";
                        break;
                    case '10':
                        $mensaje = "Actualizado";
                        $icono = "warning";
                        break;
                        case '11':
                            $mensaje = "No tiene autorización para ingresar a esta página ";
                            $icono = "error";
                            break;

                    default:
                        $mensaje = "Error";
                        $icono = "question";
                        break;
                }
                echo "
                    <script>
                    Swal.fire(
                        'Informacion',
                        '$mensaje',
                        '$icono'
                        );
                    </script>
                    ";
            }
            ?>
            <footer class="bg-dark text-center text-lg-start fixed-bottom   ">
        <!-- Copyright -->
        <div class="text-center text-light p-3">
            © 2023 Copyright:
            <a class="text-light" href="../Pages/Principal.php">Chambas.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>