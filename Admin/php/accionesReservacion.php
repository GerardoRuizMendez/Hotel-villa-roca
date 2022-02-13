<?php
    include("conexion.php");
    
    $ingreso=$_POST["1"];
    $salida=$_POST["2"];
    $total=$_POST["3"];
    $descuento=$_POST["4"];
    $id_cliente=$_POST["5"];
    $id_habitacion=$_POST["6"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM reservacion WHERE id_reservacion='$id'");
        
    }

    if($ingreso=="" || $descuento=="" || $id_cliente==""){
        header("Location:CRUDreservacion.php");
        return;
    }

    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO reservacion values(null, :ingreso, :salida, :total, :descuento, :id_cliente, :id_habitacion)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":ingreso"=>$ingreso, ":salida"=>$salida, ":total"=>$total, ":descuento"=>$descuento, ":id_cliente"=>$id_cliente, ":id_habitacion"=>$id_habitacion));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE reservacion SET fecha_ingreso=:ingreso, fecha_salida=:salida, total=:total, descuento=:descuento, id_cliente=:id_cliente WHERE id_reservacion=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":ingreso"=>$ingreso, ":salida"=>$salida, ":total"=>$total, ":descuento"=>$descuento, ":id_cliente"=>$id_cliente, ":id"=>$id));
    }
    header("Location:CRUDreservacion.php");
?>