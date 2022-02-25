<?php
    include("conexion.php");
    try{
        $nombre=htmlentities(addslashes($_POST["nombre"]));
        $pass=htmlentities(addslashes($_POST["pass"]));

        $sql="SELECT * FROM administradores WHERE nombre = '" . $nombre . "' AND password = '" . $pass . "'";
        $resultado=$base->query($sql);
        if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){ //da el numero de filas afectadas por la consulta
            session_start();
            $_SESSION["nombre"]=$nombre;
            $_SESSION["pass"]=$pass;
            if($registro["rol"]=="admin"){
                $_SESSION["rol"]="admin";
                
            }else{
                $_SESSION["rol"]="recepcionista";
            }
            header("location:sesionIniciada.php");
            //
        }else{
            header("location:../inicioSesion.html");
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>