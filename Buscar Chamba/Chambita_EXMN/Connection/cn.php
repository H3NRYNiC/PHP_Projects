<?php
    $usuario = "henry";
    $pwd = "12345";
    $db = "Chambas_BD";
    try {
        $cn = new PDO("mysql:host=localhost; dbname=$db",$usuario,$pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"Set names utf8"));
    } catch (Exception $ex) {
        echo"Error en la conexion!!!".$ex->getMessage();
    }
?>