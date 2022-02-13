<?php
    include("conexion.php");
    include("funciones.php");
    $id=$_POST["0"];
    $codigo=$_POST["6"];
    

    if($codigo==generaCodigo($id)){
        $base->query("DELETE FROM reservacion WHERE id_reservacion='$id'");
        echo "Reservación cancelada exitosamente";
        return;

    }
    echo "Error en el código de cancelación";
    
    //header("Location:sesionIniciada.php");
?>