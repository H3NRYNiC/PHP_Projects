<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('Location: index.php?cod=3');
        
    }
try {
    include("../Connection/cn.php");
    
    $id = $_GET['id'];
    $query = "select * from Usuario where Id=?;";
            $res = $cn->prepare($query);
            $cmd = $res->execute([$id]);
            $usua = $res->fetch(PDO::FETCH_OBJ);
if ($usua->Chambeando==0) {
    header("Location: ../Pages/Principal.php?cod=5");
}else{
    $sql = "update Usuario set Id_Contratista=?, Chambeando=cast(0 as signed) where Id=?;";
    $cmd = $cn->prepare($sql);
    $res = $cmd->execute([null,$id]);
    header("Location: ../Pages/Principal.php?cod=6");
}
} catch (Exception $ex) {
    header("Location: ../Pages/Principal.php?cod=7");
}
    
?>