<?php
    
    function registrar($nombre, $telefono, $email, $fechaI, $fechaS, $nombreHabitacion){
        include("conexion.php");

        $consulta="SELECT id_cliente FROM cliente WHERE email='" . $email . "'";
        $consulta=$base->query($consulta);
        
        if($consulta=$consulta->fetch(PDO::FETCH_ASSOC)){
            $id_cliente=$consulta["id_cliente"];
        }else{
            $id_cliente="SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'cliente' AND table_schema = 'villaroca'";//Esta instruccion devuelve el id a ingresar
            $id_cliente=$base->query($id_cliente);
            $id_cliente=$id_cliente->fetch(PDO::FETCH_ASSOC);
            $id_cliente=$id_cliente["auto_increment"];

            $sql="INSERT INTO cliente VALUES(null, :nombre, :telefono, :email)";
            $resultado=$base->prepare($sql);
            $resultado->bindValue(":nombre",$nombre);
            $resultado->bindValue(":telefono",$telefono);
            $resultado->bindValue(":email",$email);
            $resultado->execute(); //no hay que pasar array por el bindValue
        }
        
        $id_habitacion="SELECT id_habitacion FROM habitacion WHERE numero='" . $nombreHabitacion . "'";//Esta instruccion devuelve el id a ingresar
        $id_habitacion=$base->query($id_habitacion);
        $id_habitacion=$id_habitacion->fetch(PDO::FETCH_ASSOC);
        $id_habitacion=$id_habitacion["id_habitacion"];
        echo $id_habitacion . "<br>";

        $sql="INSERT INTO reservacion VALUES(null, '" . $fechaI . "', '" . $fechaS . "', 0, 0, " . $id_cliente . ", " . $id_habitacion . ")";
        var_dump($sql);
        $resultado=$base->query($sql); //no hay que pasar array por el bindValue
    }
    function calcularDisponibilidad($hora, $inicio, $fin){
        $hora=date($hora);
        $inicio=date($inicio);
        $fin=date($fin);
        
        //var_dump(!($hora>=$inicio && $hora<=$fin));
        //echo "a<br>";
        return !($hora>=$inicio && $hora<=$fin);
    }
    
    function obtenerHabitaciones($dias){ //Obtenemos el estado de las habitaciones para ser imprimidas en pantalla
        
        try {
            date_default_timezone_set("America/Mexico_City"); //Configuramos la zona horaria a nuestro país
            
            include("conexion.php"); //conexion a la base de datos
            $reservaciones=[];

            $numeroHabitacion="SELECT numero FROM habitacion";
            $numeroHabitacion=$base->query($numeroHabitacion);  //consultamos las habitaciones existentes

            while($registro=$numeroHabitacion->fetch(PDO::FETCH_ASSOC)){
                //obtenemos los datos de las reservaciones existentes actualmente
                $consulta="SELECT fecha_ingreso, fecha_salida, H.id_disponibilidad FROM reservacion R JOIN habitacion H ON R.id_habitacion=H.id_habitacion WHERE H.numero='" . $registro["numero"] . "'"; 
                $consulta=$base->query($consulta);
                $posible=0; //la variable posible determinara el estado de la habitacion. su estado inicial es 0
                //0=disponible, 1=no disponible y 2=en mantenimiento
                while($registro2=$consulta->fetch(PDO::FETCH_ASSOC)){
                    
                    if(!calcularDisponibilidad(date("Y-m-d 00:00:00", strtotime("+" . $dias . "day")), substr($registro2["fecha_ingreso"], 0, 10) . " 00:00:00", substr($registro2["fecha_salida"], 0, 10) . " 00:00:00")){ //se va a calcular que no haya colisiones entre las horas de entrada y salida con las reservaciones existentes
                        $posible=1; //al no estar disponible, la variable vale 1
                    }
                    
                }
                $consulta3=$base->query("SELECT id_disponibilidad FROM habitacion WHERE numero='" . $registro["numero"] . "'");
                $consulta3=$consulta3->fetch(PDO::FETCH_ASSOC);
                if($consulta3["id_disponibilidad"]==3)$posible=2; //al no estar disponible, la variable vale 2
                
                if($posible==0){ 
                    $consulta3="UPDATE habitacion SET id_disponibilidad=1 WHERE numero='" . $registro["numero"] . "'";
                    $consulta3=$base->query($consulta3);
                    $reservaciones[$registro["numero"]]="verde"; //guardamos en el arreglo el color en que sera dibujado
                    
                }else if($posible==1){
                    $consulta3="UPDATE habitacion SET id_disponibilidad=1 WHERE numero='" . $registro["numero"] . "'";
                    $consulta3=$base->query($consulta3);
                    $reservaciones[$registro["numero"]]="rojo"; //guardamos en el arreglo el color en que sera dibujado
                }else if($posible==2){
                    $reservaciones[$registro["numero"]]="naranja"; //guardamos en el arreglo el color en que sera dibujado
                }
                
            }
            return $reservaciones; //retornamos el arreglo que contiene las habitaciones y sus respectivos colores
    
    
        } catch (\Throwable $th) {
            var_dump($th); //en caso de haber error, se imprimira en pantalla el problema y en que linea sucede
        }
    }
    function diasEntre($fechaI, $fechaS){
    $fechaI = strtotime($fechaI);
    $fechaS = strtotime($fechaS);
    $dif = $fechaS - $fechaI;
    return round($dif / 86400)+1;
}
function datosReservacion($id, $descuento){
    include("conexion.php");
    $datos=[];
    $datos["descuento"]=$descuento;
    if($descuento=="")$datos["descuento"]="0";
    

    $consulta=$base->query("SELECT H.id_tipo, R.fecha_ingreso, R.fecha_salida, C.nombre, C.telefono, C.email FROM habitacion H JOIN reservacion R ON R.id_habitacion=H.id_habitacion JOIN CLIENTE c ON R.id_cliente=C.id_cliente WHERE R.id_reservacion='" . $id . "'");
    $consulta=$consulta->fetch(PDO::FETCH_ASSOC);
    switch ($consulta["id_tipo"]){
        case 1: $datos["totalP"]=200; break;
        case 2: $datos["totalP"]=300; break;
        case 3: $datos["totalP"]=500; break;
        case 4: $datos["totalP"]=1000; break;
    }
    $datos["fecha_ingreso"]=$consulta["fecha_ingreso"];
    $datos["fecha_salida"]=$consulta["fecha_salida"];

    $datos["dias"]=diasEntre(substr($consulta["fecha_ingreso"], 0, 10), substr($consulta["fecha_salida"], 0, 10));
    $datos["totalP"]=$datos["totalP"]*$datos["dias"];
    
    $datos["descuento"]=$datos["totalP"]*$datos["descuento"]/100;
    $datos["total"]=$datos["totalP"]-$datos["descuento"];

    $datos["nombre"]=$consulta["nombre"];
    $datos["telefono"]=$consulta["telefono"];
    $datos["correo"]=$consulta["email"];

    return $datos;
}
function generaCodigo($id){
    include("conexion.php");
    $consulta=$base->query("SELECT C.nombre, C.email FROM reservacion R JOIN cliente C ON R.id_cliente=C.id_cliente WHERE R.id_reservacion=" . $id);
    $consulta=$consulta->fetch(PDO::FETCH_ASSOC);

    srand($id);

    $codigo=substr($consulta["nombre"],0,2) . rand(100,999) . substr($id, 0,2) . substr($consulta["email"],0,2);

    return strtoupper($codigo);
    
}
    //date_default_timezone_set('UTC');
    //date_default_timezone_set("America/Mexico_City");
    //$mañana=Date("d-m-Y", strtotime("++0 day"));
    //echo $mañana;
    //var_dump(calcularDisponibilidad("2021-12-25 00:00:00","2021-12-25 00:00:00","2021-12-28 00:00:00"));
    //var_dump(generaCodigo(133));
    
    
?>