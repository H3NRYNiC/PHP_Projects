<?php

    include("../Connection/cn.php");
    include("../Layout/styles.php");

    $name = $_POST["nombre"];
    $usser = $_POST["usuario"];
    $pass = $_POST["contra"];
    $rol = $_POST["rol"];
    if ($rol != 2){
        $cmd = 'insert into Usuario (Nombre,Usuario,Contraseña,Id_Rol) values (?,?,?,?)';
    
    }else{
        $cmd = 'insert into Usuario (Nombre,Usuario,Contraseña,Id_Rol,Chambeando) values (?,?,?,?,0)';
    
    }
    try {
        $sql = $cn->prepare($cmd);
        $red = $sql->execute([$name,$usser,$pass,$rol]);
        header("Location: ../Pages/index.php?cod=2");

    } catch (Exception $ex) {
        $ex->getMessage();   
        header("Location: ../Pages/Login.php?error=203");
            die();  
    }
    


?>