<?php
    include("conexion.php");
    $id=$_POST["0"];
    $base->query("DELETE FROM reservacion WHERE id_reservacion='$id'");
    header("Location:sesionIniciada.php");
?>