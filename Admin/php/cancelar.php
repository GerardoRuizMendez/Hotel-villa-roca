<?php
    include("conexion.php");
    $id=$_POST["0"];
    $base->query("DELETE FROM reservacion WHERE id_reservacion='$id'");
    if($_SESSION["rol"]=="admin"){
        header("Location:sesionIniciada.php");
    }else{
        header("Location:sesionIniciadaR.php");
    }
?>