<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Villa Roca</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="index.html">
                    <img src="build/img/logo.svg" alt="hola">
                </a>

                <nav class="navegacion">
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Anuncios.html">Anuncios</a>
                    <a href="Contacto.html">Contacto</a>
                    <a href="Reservar.html">Reservar</a>
                </nav>
            </div>
        </div>
    </header>
    <h1 class="fw-300 centrarTexto">Contacto</h1>
    <div class="Contacto-bg"></div>

    <main class="contenedor formulario sombra">
        <h2 class="fw-300 centrarTexto">Llena el formulario de Contacto</h2>
        <form action="Admin/php/agregaCliente.php" method="post" class="caja1">
            <fieldset class="caja2">
                <legend>Información personal</legend>
                <label for="nombre"><span>* Necesario rellenar</span></label>
                <label for="nombre">Nombre completo:<span>*</span></label> <input name="nombre" type="text" id="nombre" placeholder="Tu nombre" required class="textoVerde">
                <label for="nombre">E-mail:<span>*</span></label> <input name="email" type="email" id="email" placeholder="ejemplo@gmail.com" required class="textoVerde">
                <label for="Telefóno">Telefóno:<span>*</span></label> <input name="telefono" type="tel" id="telefono" required class="textoVerde">
                <label for="Mensaje">Mensaje:</label> <textarea id="mensaje"></textarea class="textoVerde">

                <label for="opciones">Tipo de habitación<span>*</span></label>
                <select id="opciones" name="habitacion">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="1">Una Cama - $200</option>
                    <option value="2">Dos Camas - $300</option>
                    <option value="3">Semi Suite - $500</option>
                    <option value="4">Suite - $1000</option>
                </select>

                <label for="fecha">Fecha de ingreso:<span>*</span></label>
                <input type="date" min="<?php echo Date("Y-m-d"); ?>" id="fechaI" name="fechaI">
                <label for="hora">Hora de entrada:</label>
                <input type="time" id="horaI" name="horaI">
                <label for="fecha">Fecha de salida:<span>*</span></label>
                <input type="date" min="<?php echo Date("Y-m-d"); ?>" id="fechaS" name="fechaS">
                <label for="hora">Hora de salida:</label>
                <input type="time" id="horaS" name="horaS">
                <p>Como desea ser Contactado para confirmar la reservación:<span style="color: #af0000">*</span></p>
                <div class="formaContacto">
                    <label for="tel">Teléfono</label>
                    <input type="radio" name="Contacto" value="tel" id="tel">
                    <label for="correo">E-mail</label>
                    <input type="radio" name="Contacto" value="correo" id="correo">
                </div>
            </fieldset>
            <input type="submit" id="enviar" value="Enviar" class="boton botonVerde">
        </form>
    </main>
    <footer class="footer">
        <div class="contenido-footer contenedor">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Anuncios.html">Anuncios</a>
                    <a href="blog.html">blog</a>
                    <a href="Reservar.php">Contacto</a>
                </nav>
            </div>
            <p class="copyright">Todos los derechos resevados &#174</p>
        </div>
    </footer>
    <script src="build/js/bundle.js"></script>
</body>

</html>