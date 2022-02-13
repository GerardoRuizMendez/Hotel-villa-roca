<?php
    include("conexion.php");
    
    $nombre=$_POST["1"];
    $password=$_POST["2"];
    $rol=$_POST["3"];

    if(isset($_POST["delete"])){
        echo "Borrar";
        $id=$_POST["0"];
        $base->query("DELETE FROM administradores WHERE id_administradores='$id'");
        
    }


    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO administradores values(null, :nombre, :password, :rol)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":password"=>$password, ":rol"=>$rol));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE administradores SET nombre=:nombre, password=:password, rol=:rol WHERE id_administradores=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":password"=>$password, ":rol"=>$rol, ":id"=>$id));
    }
    header("Location:CRUDadmins.php");
?>