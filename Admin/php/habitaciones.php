<?php 

include("funciones.php");
$dias=0;
if(isset($_GET["dias"])){
    $dias=$_GET["dias"];
}
$servicios=obtenerHabitaciones($dias);

//var_dump($servicios);

echo json_encode($servicios);
?>