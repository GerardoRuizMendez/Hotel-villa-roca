<?php
    include("conexion.php");
    
    $numero=$_POST["1"];
    $precio=$_POST["2"];
    $id_tipo=$_POST["3"];
    $id_disponibilidad=$_POST["4"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM habitacion WHERE id_habitacion='$id'");
        
    }

    if($numero=="" || $id_disponibilidad==""){
        header("Location:CRUDhabitacion.php");
        return;
    }

    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO habitacion values(null, :numero, :precio, :id_tipo, :id_disponibilidad)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":numero"=>$numero, ":precio"=>$precio, ":id_tipo"=>$id_tipo, ":id_disponibilidad"=>$id_disponibilidad));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE habitacion SET numero=:numero, precio=:precio, id_tipo=:id_tipo, id_disponibilidad=:id_disponibilidad WHERE id_habitacion=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":numero"=>$numero, ":precio"=>$precio, ":id_tipo"=>$id_tipo, ":id_disponibilidad"=>$id_disponibilidad, ":id"=>$id));
    }
    header("Location:CRUDhabitacion.php");
?>