<?php
    include("conexion.php");
    include("funciones.php");
    try{
        $nombre=htmlentities(addslashes($_POST["nombre"]));
        $email=htmlentities(addslashes($_POST["email"]));
        $telefono=htmlentities(addslashes($_POST["telefono"]));
        $fechaI=$_POST["fechaI"] . " " . $_POST["horaI"];
        $fechaS=$_POST["fechaS"] . " " . $_POST["horaS"];
        $id_habitacion=$_POST["habitacion"];
        echo $id_habitacion . "<br>";

        echo $fechaI . "<br>";
        echo $fechaS . "<br>";

        $numeroHabitacion="SELECT numero FROM habitacion WHERE id_tipo='" . $id_habitacion . "'";
        $numeroHabitacion=$base->query($numeroHabitacion);

        while($registro=$numeroHabitacion->fetch(PDO::FETCH_ASSOC)){
                $consulta="SELECT fecha_ingreso, fecha_salida FROM reservacion R JOIN habitacion H ON R.id_habitacion=H.id_habitacion WHERE H.numero='" . $registro["numero"] . "'";
                $consulta=$base->query($consulta);
                $posible=true;
                while($registro2=$consulta->fetch(PDO::FETCH_ASSOC)){
                    if(!calcularDisponibilidad($fechaI, $registro2["fecha_ingreso"], $registro2["fecha_salida"]) || !calcularDisponibilidad($fechaS, $registro2["fecha_ingreso"], $registro2["fecha_salida"])){
                        $posible=false;
                    }
                }
                if($posible){
                    $consulta="SELECT id_disponibilidad FROM habitacion WHERE numero='" . $registro["numero"] . "'";
                    $consulta=$base->query($consulta);
                    $registro2=$consulta->fetch(PDO::FETCH_ASSOC);;
                    if($registro2["id_disponibilidad"]!=2){
                        echo "Registrado correctamente while<br>";
                        registrar($nombre, $telefono, $email, $fechaI, $fechaS, $registro["numero"]);
                        break;
                    }
                }
        }

    
        //header("location:../../Reservar.php");
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>