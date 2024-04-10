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
if ($usua->Chambeando==1) {
    header("Location: ../Pages/Principal.php?cod=4");
}else{
    $idUss = $_SESSION['id'];
    $sql = "update Usuario set Id_Contratista=?, Chambeando=cast(1 as signed) where Id=?;";
    $cmd = $cn->prepare($sql);
    $res = $cmd->execute([$idUss,$id]);
    
    header("Location: ../Pages/Principal.php?cod=2");
}
    
} catch (Exception $ex) {
    header("Location: ../Pages/Principal.php?cod=3");
}
    
?>