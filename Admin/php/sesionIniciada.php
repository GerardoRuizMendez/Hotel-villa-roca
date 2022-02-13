<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Villa Roca</title>
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
                    <a href="../../Reservar.php">Reservar</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="contenedor sombra sesionIniciada">

        <div class="sistema">
            <div class="tablaHabitaciones">
                <H2 class="centrarTexto">Módulo de Habitaciones</H2>
                <div class="tiempo">
                    <h3 onclick="anterior()">< Anterior</h3>
                    <h3 id="hoy"></h3>
                    <h3 onclick="siguiente()">Siguiente ></h3>
                </div>
                <table>
                    <tr>
                        <td id="P1H1">P1H1</td>
                        <td id="P1H2">P1H2</td>
                        <td id="P1H3">P1H3</td>
                        <td id="P1H4">P1H4</td>
                        <td id="P1H5">P1H5</td>
                    </tr>
                    <tr>
                        <td id="P2H1">P2H1</td>
                        <td id="P2H2">P2H2</td>
                        <td id="P2H3">P2H3</td>
                        <td id="P2H4">P2H4</td>
                        <td id="P2H5">P2H5</td>
                    </tr>
                    <tr>
                        <td id="P3H1" colspan="2">P3H1</td>
                        <td id="P3H2" colspan="3">P3H2</td>
                    </tr>
                </table>
            </div>

            <div class="CRUD">
                <h2 class="centrarTexto">Opciones</h2>
                <a href="CRUDcliente.php">● Clientes</a><br>
                <a href="CRUDreservacion.php">● Reservación</a><br>
                <a href="CRUDdisponibilidad.php">● Disponibilidad</a><br>
                <a href="CRUDhabitacion.php">● Habitación</a><br>
                <a href="CRUDtipo.php">● Tipo</a><br>
                <a href="CRUDadmins.php">● Usuarios</a><br>
            </div>
        </div>

        <div class="simbologia">
            <div>
                <div class="disponible"></div>
                <p>ㅤDisponibleㅤㅤ</p>
            </div>
            <div>
                <div class="noDisponible"></div>
                <p>ㅤNo disponibleㅤㅤ</p>
            </div>
            <div>
                <div class="mantenimiento"></div>
                <p>ㅤEn mantenimientoㅤㅤ</p>
            </div>
        </div>

        <div class="botones">
            <div class="cobrar">
                <a class="boton botonVerde" href="cobrarFormulario.php">Cobrar reservación</a>
            </div>
            <div class="cobrar">
                <a class="boton botonVerde" href="cancelarFormulario.php">Cancelar reservación</a>
            </div>
            <div class="cobrar">
                <a class="boton botonVerde" href="correoFormulario.php">Enviar correo</a>
            </div>
            <div class="cobrar">
                <a class="boton botonVerde" href="reportes.php">Reportes</a>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="contenido-footer contenedor">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Anuncios.html">Anuncios</a>
                    <a href="blog.html">blog</a>
                    <a href="Contacto.html">Contacto</a>
                </nav>
            </div>
            <p class="copyright">Todos los derechos resevados &#174</p>
        </div>
    </footer>
    <script src="../../build/js/bundle.js"></script>
</body>

</html>