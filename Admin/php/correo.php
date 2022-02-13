<?php
    include("funciones.php");
    $id=$_POST["0"];
    $descuento=$_POST["6"];
    $mensaje="";

    $datos=datosReservacion($id, $descuento);

    $mensaje=$mensaje . "Confirmación de la reservación con número " . generaCodigo($id) . " para el Hotel Villa Roca\n\n";
    $mensaje=$mensaje . "A nombre de " . $datos["nombre"] . "\n";
    $mensaje=$mensaje . "Del día " . $datos["fecha_ingreso"] . " a " . $datos["fecha_ingreso"] . "\n\n";
    $mensaje=$mensaje . "---URGENTE---\n";
    $mensaje=$mensaje . "En caso de querer cancelar su reservación, ingrese su número de reservación al siguiente link: \nhttp://localhost/Hotel%20villa%20roca/Admin/php/clienteCancelarFormulario.php?id=" . $id . "\n";
    $mensaje=$mensaje . "Si cancela su reservación antes de las 18:00 horas del día inicial no habrán cargos. En caso contrario, se le cargará el equivalente a la primera noche de la habitación\n\n";
    $mensaje=$mensaje . "Datos del establecimiento:\n";
    $mensaje=$mensaje . "Número de teléfono: 954 118 9485\n";
    $mensaje=$mensaje . "Direccion: ALFONSO, Av. Alfonso Pérez Gasga #602, Centro, 71980 Oax.\n";

    mail("gatitol.grm@gmail.com","Correo de confirmacion",$mensaje);

    header("Location:correoFormulario.php");
?>