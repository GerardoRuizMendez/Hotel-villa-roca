<?php
    include("conexion.php");
    
    $nombre=$_POST["1"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM tipo_habitacion WHERE id_tipo='$id'");
        
    }

    if($nombre==""){
        header("Location:CRUDtipo.php");
        return;
    }

    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO tipo_habitacion values(null, :nombre)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE tipo SET nombre=:nombre WHERE id_tipo=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":id"=>$id));
    }
    header("Location:CRUDtipo.php");
?>