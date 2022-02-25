<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nota</title>
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
        
        include("funciones.php");
        include("conexion.php");
        
        $id=$_POST["0"];
        $descuento=$_POST["6"];

        $datos=datosReservacion($id, $descuento);



        //$base->query("DELETE FROM reservacion WHERE id_reservacion='$id'");
        //header("Location:CRUDcliente.php");
    ?>

        <h1>Nota</h1>
        <div class="contenedor factura">
            <table border="2" align="center">
                <tr>
                    <td class="primera_fila">Nombre del cliente:</td>
                    <td class="primera_fila"><?php echo $datos["nombre"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Teléfono:</td>
                    <td class="primera_fila"><?php echo $datos["telefono"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Correo:</td>
                    <td class="primera_fila"><?php echo $datos["correo"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Fecha de ingreso:</td>
                    <td class="primera_fila"><?php echo $datos["fecha_ingreso"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Fecha de salida:</td>
                    <td class="primera_fila"><?php echo $datos["fecha_salida"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Dias hospedado:</td>
                    <td class="primera_fila"><?php echo $datos["dias"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Subtotal:</td>
                    <td class="primera_fila"><?php echo "$" . $datos["totalP"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Descuento:</td>
                    <td class="primera_fila"><?php echo "$" . $datos["descuento"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Total:</td>
                    <td class="primera_fila" id="total"><?php echo "$" . $datos["total"]; ?></td>
                </tr>
                <tr>
                    <td class="primera_fila">Su pago:</td>
                    <td class="primera_fila" id="pagoC">---</td>
                </tr>
                <tr>
                    <td class="primera_fila">Cambio:</td>
                    <td class="primera_fila" id="cambio">---</td>
                </tr>

                 
            </table>
            <div class="pago">
                <label for="pago">Pago del cliente:</label>
                <input name="pago" type="text" id="pago" placeholder="Pago" required class="textoVerde">
                <button id="botonPago" class="boton botonVerde">Pagar</button>
                <div class="excepcion">
                    <p id="excepcion"></p>
                </div>
                
            </div>
            <a class="boton botonVerde" href="sesionIniciada.php">Volver</a>
        </div>
        <script src="../../build/js/bundle.js"></script>

        <p>&nbsp;</p>
</body>

</html>
