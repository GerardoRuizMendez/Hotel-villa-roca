<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cobrar</title>
    <link rel="stylesheet" href="../../build/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="sesionIniciada.php">
                    <img src="../../build/img/logo.svg" alt="hola">
                </a>

                <nav class="navegacion">
                    <a href="Nosotros.html"></a>
                    <a href="Anuncios.html"></a>
                    <a href="Contacto.html"></a>
                    <a href="../Reservar.php">Reservar</a>
                </nav>
            </div>
        </div>
    </header>
    <?php
        include("conexion.php");
        $conexion=$base->query("SELECT R.id_reservacion, C.nombre, telefono, email, R.fecha_ingreso, R.fecha_salida, R.descuento FROM reservacion R JOIN cliente C ON R.id_cliente=C.id_cliente");
    ?>

        <h1>Cobrar Reservación</h1>
        <table border="0" align="center">
            <tr>
                <td class="primera_fila">Nombre del cliente</td>
                <td class="primera_fila">Teléfono</td>
                <td class="primera_fila">Correo</td>
                <td class="primera_fila">Fecha de ingreso</td>
                <td class="primera_fila">Fecha de salida</td>
                <td class="primera_fila">Descuento(%)</td>
                <td class="primera_fila">Acción</td>
            </tr>

            <?php
                while($registro=$conexion->fetch(PDO::FETCH_OBJ)){
                    echo "<form action='cobrar.php' method='post'>"; //habra un formulario por cada tr
                    echo"<tr>";
                    $n=0;
                    foreach($registro as $r){
                        
                        if($n==0){//los que no sean el primero apareceran en cuadro de texto
                            echo "<input type='hidden' name='$n' value='$r'>";
                        }else if($n==6){
                            echo"<td class='noPad'>";
                            echo "<input class='ancho' type='text' name='$n' placeholder='$r'>";
                            echo"</td>";
                        }else{
                            echo"<td class='noPad'>";
                            echo "<input class='ancho' type='text' readonly name='$n' value='$r'>";
                            echo"</td>";
                            
                        }
                        $n++;
                    }
                    echo "<td><input type='submit' class='quitarMargen boton botonVerde' name='update' id='up' value='Cobrar'></td>";
                    echo "</tr>";
                    echo "</form>";
                }
            ?>
        </table>

        <p>&nbsp;</p>
</body>

</html>