<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reportes</title>
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

    <body>
        <div class="seccion contenedor">
            <h2>Reporte de reservaciones diario</h2>
            <div class="tiempo">
                <h3 onclick="anteriorDiario()">< Anterior</h3>
                <h3 id="hoyReporte"></h3>
                <h3 onclick="siguienteDiario()">Siguiente ></h3>
            </div>
            <div>
                <p id="disponible"></p>
                <p id="ocupados"></p>
                <p id="mantenimiento"></p>
                <p id="total"></p>
            </div>
        </div>
        <div class="seccion contenedor">
            <h2>Reporte de reservaciones semanal</h2>
            <div class="tiempo">
                <h3 onclick="anteriorSemanal()">< Anterior</h3>
                <h3 id="hoyReporteS"></h3>
                <h3 onclick="siguienteSemanal()">Siguiente ></h3>
            </div>
            <h3 id="totalSemanal"></h3>
            <div class="dias">
                <div class="dia" id="lunes">ㅤㅤㅤ</div>
                <div class="dia" id="martes">ㅤㅤㅤ</div>
                <div class="dia" id="miercoles">ㅤㅤㅤ</div>
                <div class="dia" id="jueves">ㅤㅤㅤ</div>
                <div class="dia" id="viernes">ㅤㅤㅤ</div>
                <div class="dia" id="sabado">ㅤㅤㅤ</div>
                <div class="dia" id="domingo">ㅤㅤㅤ</div>
            </div>
            <div class="dias">
                <div>Lunes</div>
                <div>Martes</div>
                <div>Miercoles</div>
                <div>Jueves</div>
                <div>Viernes</div>
                <div>Sabado</div>
                <div>Domingo</div>
            </div>
        </div>
        <footer class="footer">
        <div class="contenido-footer contenedor">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="Nosotros.html">ㅤ</a>
                </nav>
            </div>
            <p class="copyright">Todos los derechos resevados &#174</p>
        </div>
    </footer>
    </body>

    <script src="../../build/js/bundle.js"></script>
</body>

</html>
