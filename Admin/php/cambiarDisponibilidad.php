<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Habitaciones</title>
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
        $conexion=$base->query("SELECT * FROM habitacion");
    ?>

        <h1>Módulo de habitaciones</h1>
        <table border="0" align="center">
            <tr>
                <td class="primera_fila">Numero</td>
                <td class="primera_fila">Disponibilidad</td>
            </tr>

            <?php
                while($registro=$conexion->fetch(PDO::FETCH_OBJ)){
                    ?><form action='accionesHabitacion.php' method='post'><?php
                    ?><tr><?php
                    $n=0;
                    foreach($registro as $r){
                        
                        if($n==1){//los que no sean el primero apareceran en cuadro de texto
                            ?><td class='noPad'><?php
                            ?><input class='ancho' type='text' name='<?php echo $n;?>' value='<?php echo $r;?>'><?php
                            ?></td><?php
                        }else if($n==4){
                            ?><td class='noPad'><?php
                            ?><select id="4" name="4"><?php
                                ?><option value="1" <?php if($r==1)echo "selected"; ?>>Activa</option><?php
                                ?><option value="2" <?php if($r==2)echo "selected"; ?>>Mantenimiento</option><?php
                            ?></select><?php
                            ?></td><?php
                        }else{
                            ?><input type='hidden' name='<?php echo $n;?>' value='<?php echo $r;?>'><?php
                        }
                        $n++;
                    }
                    ?><td><input type='submit' class='quitarMargen boton botonVerde' name='update' id='up' value='Actualizar'></td><?php
                    ?></tr><?php
                    ?></form><?php
                }
            ?>
        </table>

        <p>&nbsp;</p>
</body>

</html>