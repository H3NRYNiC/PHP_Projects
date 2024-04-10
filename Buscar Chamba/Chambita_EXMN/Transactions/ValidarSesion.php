<?php

session_start();

    include("../Connection/cn.php");
    $usser = $_POST['usuario'];
    $pass = $_POST['pwd'];
    $query = "select * from Usuario where Usuario = ? and Contraseña = ?";
    $res = $cn->prepare($query);
    $cmd = $res->execute([$usser,$pass]);
    $usuario = $res->fetch(PDO::FETCH_OBJ);
    if (isset($usuario->Nombre)) {

            $_SESSION['id'] = $usuario->Id;
            $_SESSION['idrol'] = $usuario->Id_Rol;
            $_SESSION['nombre'] = $usuario->Nombre;
            $_SESSION['usuario'] = $usuario->Usuario;

            header("Location: ../Pages/Principal.php?cod=1");

       
    }else{
        header("Location: ../Pages/CrearUsuario.php?cod=1");
    }
?>