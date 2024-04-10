<?php

    include("../Connection/cn.php");
    include("../Layout/styles.php");

    $trabajador = $_POST["IdTrabajador"];
    $contratista = $_POST["IdContratista"];
    $comentarios = $_POST["comentarios"];
    $calificacion = $_POST["calificacion"];

        $cmd = 'insert into Valoraciones (Id_Contratista,Id_Trabajador,Comentarios,Calificacion) values (?,?,?,?)';
    
    try {
        $sql = $cn->prepare($cmd);
        $red = $sql->execute([$contratista,$trabajador,$comentarios,$calificacion]);
        header("Location: LiberarBD.php?id=$trabajador");

    } catch (Exception $ex) {
        $ex->getMessage();   
        //header("Location: ../Pages/Comentar.php?cod=1");
          //  die();  
    }
    


?>