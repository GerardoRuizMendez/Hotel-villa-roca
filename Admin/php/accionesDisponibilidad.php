<?php
    include("conexion.php");
    
    $nombre=$_POST["1"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM disponibilidad WHERE id_disponibilidad='$id'");
        
    }

    if($nombre==""){
        header("Location:CRUDdisponibilidad.php");
        return;
    }

    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO disponibilidad values(null, :nombre)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE disponibilidad SET nombre=:nombre WHERE id_disponibilidad=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":id"=>$id));
    }
    header("Location:CRUDdisponibilidad.php");
?>