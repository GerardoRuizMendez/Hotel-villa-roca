<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cancelar reservación</title>
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
        $conexion=$base->query("SELECT R.id_reservacion, C.nombre, email, R.fecha_ingreso, R.fecha_salida FROM reservacion R JOIN cliente C ON R.id_cliente=C.id_cliente WHERE R.id_reservacion=" . $_GET["id"]);
    ?>

        <h1>Ingresa el código de cancelacion para cancelar la reservación</h1>
        <table border="0" align="center">
            <tr>
                <td class="primera_fila">Nombre del cliente</td>
                <td class="primera_fila">Correo</td>
                <td class="primera_fila">Fecha de ingreso</td>
                <td class="primera_fila">Fecha de salida</td>
                <td class="primera_fila">Código de cancelación</td>
                
            </tr>

            <?php
                while($registro=$conexion->fetch(PDO::FETCH_OBJ)){
                    echo "<form action='clienteCancelar.php' method='post'>"; //habra un formulario por cada tr
                    echo"<tr>";
                    $n=0;
                    foreach($registro as $r){
                        
                        if($n==0){//los que no sean el primero apareceran en cuadro de texto
                            echo "<input type='hidden' name='$n' value='$r'>";
                        }else if($n==5){
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
                    echo"<td class='noPad'>";
                    echo "<input class='ancho' type='text' name='6'>";
                    echo"</td>";
                    echo "<td><input class='quitarMargen boton botonVerde' type='submit' name='update' id='up' value='Cancelar'></td>";
                    echo "</tr>";
                    echo "</form>";
                }
            ?>
        </table>

        <p>&nbsp;</p>
</body>

</html>