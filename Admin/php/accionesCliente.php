<?php
    include("conexion.php");
    
    $nombre=$_POST["1"];
    $apellidoP=$_POST["2"];
    $apellidoM=$_POST["3"];
    $telefono=$_POST["4"];
    $email=$_POST["5"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM cliente WHERE id_cliente='$id'");
        
    }

    if($nombre=="" || $telefono=="" || $email==""){
        header("Location:CRUDcliente.php");
        return;
    }

    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO cliente values(null, :nombre, :apellidoP, :apellidoM, :telefono, :email)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":apellidoP"=>$apellidoP, ":apellidoM"=>$apellidoM, ":telefono"=>$telefono, ":email"=>$email));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE cliente SET nombre=:nombre, ap_paterno=:apellidoP, ap_materno=:apellidoM, telefono=:telefono, email=:email WHERE id_cliente=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":apellidoP"=>$apellidoP, ":apellidoM"=>$apellidoM, ":telefono"=>$telefono, ":email"=>$email, ":id"=>$id));
    }
    header("Location:CRUDcliente.php");
?>