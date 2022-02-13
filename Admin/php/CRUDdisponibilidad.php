<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Disponibilidad</title>
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
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Anuncios.html">Anuncios</a>
                    <a href="Contacto.html">Contacto</a>
                    <a href="../Reservar.php">Reservar</a>
                </nav>
            </div>
        </div>
    </header>
    <?php
        include("conexion.php");
        $conexion=$base->query("SELECT * FROM disponibilidad");
    ?>

        <h1>CRUD (Disponibilidad)</h1>
        <table border="0" align="center">
            <tr>
                <td class="primera_fila">Disponibilidad</td>
            </tr>

            <?php
                while($registro=$conexion->fetch(PDO::FETCH_OBJ)){
                    echo "<form action='accionesDisponibilidad.php' method='post'>"; //habra un formulario por cada tr
                    echo"<tr>";
                    $n=0;
                    foreach($registro as $r){
                        
                        if($n>0){//los que no sean el primero apareceran en cuadro de texto
                            echo"<td class='noPad'>";
                            echo "<input class='ancho' type='text' name='$n' value='$r'>";
                            echo"</td>";
                        }else{
                            echo "<input type='hidden' name='$n' value='$r'>";
                        }
                        $n++;
                    }
                    echo "<td><input type='submit' class='quitarMargen boton botonVerde' name='delete' id='del' value='Borrar'></td>";
                    echo "<td><input type='submit' class='quitarMargen boton botonVerde' name='update' id='up' value='Actualizar'></td>";
                    echo "</tr>";
                    echo "</form>";
                }
            ?>
                <form action='accionesDisponibilidad.php' method='post'>
                    <tr>
                        <td><input type='text' name='1'></td>
                        <td class=''><input type='submit' class='quitarMargen boton botonVerde' name='create' id='cr' value='Insertar'></td>
                    </tr>
                </form>
        </table>

        <p>&nbsp;</p>
</body>

</html>