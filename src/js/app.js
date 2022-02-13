var dias = 0;
var semanas = 0;
var diasSemanas = 0;

async function mostrarDisponibilidad() {
    try {
        const url = "http://localhost/Hotel%20villa%20roca/Admin/php/habitaciones.php?dias=" + dias;
        const resultado = await fetch(url);
        const habitaciones = await resultado.json();
        //console.log(servicios);
        //console.log(habitaciones);
        var fecha = new Date(new Date().getTime() + 24 * 60 * 60 * 1000 * dias);

        const hoy = document.querySelector("#hoy");
        hoy.innerHTML = (fecha.getDate()) + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear();

        for (const n in habitaciones) {
            const h = document.querySelector("#" + n);
            //console.log(`${n}: ${habitaciones[n]}`);
            if (habitaciones[n] == "verde") {
                h.classList.remove("mantenimiento");
                h.classList.remove("noDisponible");
                h.classList.add("disponible");
            } else if (habitaciones[n] == "naranja") {
                h.classList.remove("disponible");
                h.classList.remove("noDisponible");
                h.classList.add("mantenimiento");
            } else {
                h.classList.remove("mantenimiento");
                h.classList.remove("disponible");
                h.classList.add("noDisponible");
            }
        }



        //console.log(habitaciones);
    } catch (error) {
        console.log(error);
    }
}

function siguiente() {
    dias++;
    mostrarDisponibilidad();
}

function anterior() {
    dias--;
    mostrarDisponibilidad();
}

function siguienteDiario() {
    dias++;
    reporteDiario();
}

function anteriorDiario() {
    dias--;
    reporteDiario();
}

function siguienteSemanal() {
    semanas++;
    reporteSemanal();
}

function anteriorSemanal() {
    semanas--;
    reporteSemanal();
}

function calcularDisponibilidad(inicio, fin) {
    hora = new Date();
    inicio = new Date(inicio);
    fin = new Date(fin);

    if (hora - inicio > 0 && hora - fin < 0) {
        return true;
    } else {
        return false;
    }

    //return !(hora >= inicio && hora <= fin);
}
/*var actual = calcularDisponibilidad("2021-12-18 00:00:00", "2021-12-20 00:00:00");
var hoy = new Date();
var manana = new Date("2021-12-19 00:00:00");
var tiempo = hoy - manana;*/



document.addEventListener("DOMContentLoaded", function() {
    console.log("hola");
    inicializaReservacion();
    mostrarDisponibilidad();
    calcularPago();
    reporteDiario();
    reporteSemanal();
});

function inicializaReservacion() {
    try {
        var nombre = document.querySelector("#nombre");

        var email = document.querySelector("#email");
        email.disabled = true;
        var telefono = document.querySelector("#telefono");
        telefono.disabled = true;
        var mensaje = document.querySelector("#mensaje");
        mensaje.disabled = true;
        var opciones = document.querySelector("#opciones");
        opciones.disabled = true;
        var fechaI = document.querySelector("#fechaI");
        fechaI.disabled = true;
        var fechaS = document.querySelector("#fechaS");
        fechaS.disabled = true;
        var enviar = document.querySelector("#enviar");
        enviar.disabled = true;
        evaluaInput(nombre, email, /^[a-zA-Z]{3,}[\s[a-zA-Z]*]*$/);
        evaluaInput(email, telefono, /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/);
        evaluaInput(telefono, mensaje, /^[0-9]{10}$/);
        evaluaInput(mensaje, opciones, /^.*$/);
        evaluaInput(opciones, fechaI, /^.*$/);
        evaluaInput(fechaI, horaI, /^.*$/);
        evaluaInput(horaI, fechaS, /^.*$/);
        evaluaInput(fechaS, horaS, /^.*$/);
        evaluaInput(horaS, enviar, /^.*$/);

    } catch (error) {
        console.log(error);
    }
}

function evaluaInput(input, siguiente, regrex) {


    input.addEventListener("input", e => {

        const nombreTexto = e.target.value;

        if (regrex.test(nombreTexto)) {
            input.classList.add("textoVerde");
            input.classList.remove("textoRojo");
            siguiente.disabled = false;
        } else {
            input.classList.remove("textoVerde");
            input.classList.add("textoRojo");
            siguiente.value = "";
            siguiente.disabled = true;
        }

    });
}

function evaluaInputOtros(input, siguiente, regrex) {


    input.addEventListener("onChange", e => {

        const nombreTexto = e.target.value;

        if (regrex.test(nombreTexto)) {
            siguiente.disabled = false;
        } else {
            siguiente.value = "";
            siguiente.disabled = true;
        }

    });
}

function calcularPago() {
    try {

        document.querySelector("#botonPago").addEventListener("click", e => {

            console.log("siii");
            var total = document.querySelector("#total").innerHTML;
            total = total.substring(1, total.length);

            var pago = document.querySelector("#pago").value;


            cambio = pago - total;
            document.querySelector("#excepcion").innerHTML = "";
            if (cambio < 0) {
                document.querySelector("#excepcion").innerHTML = "Pago incompleto";
                document.querySelector("#pagoC").innerHTML = "---";
                document.querySelector("#cambio").innerHTML = "---";
                return;
            }

            cambio = pago - total;
            console.log(cambio);
            document.querySelector("#pagoC").innerHTML = "$" + pago;
            document.querySelector("#cambio").innerHTML = "$" + cambio;
            document.querySelector("#excepcion").innerHTML = "Pago registrado existosamente";

        });
    } catch (error) {
        console.log(error);
    }
}

async function reporteDiario() {
    try {
        const url = "http://localhost/Hotel%20villa%20roca/Admin/php/habitaciones.php?dias=" + dias;
        const resultado = await fetch(url);
        const habitaciones = await resultado.json();
        //console.log(servicios);
        console.log(habitaciones);
        var fecha = new Date(new Date().getTime() + 24 * 60 * 60 * 1000 * dias);

        const hoy = document.querySelector("#hoyReporte");
        hoy.innerHTML = (fecha.getDate()) + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear();

        var disponibles = 0;
        var ocupadas = 0;
        var mantenimiento = 0;

        var total = 0;
        for (const n in habitaciones) {
            const h = document.querySelector("#" + n);
            //console.log(`${n}: ${habitaciones[n]}`);
            if (habitaciones[n] == "verde") {

                disponibles++;
            } else if (habitaciones[n] == "naranja") {
                mantenimiento++;
            } else {
                total += evaluaHabitacion(n);
                ocupadas++;
            }
        }
        document.querySelector("#disponible").innerHTML = "Habitaciones disponibles: " + disponibles;
        document.querySelector("#ocupados").innerHTML = "Habitaciones ocupadas: " + ocupadas;
        document.querySelector("#mantenimiento").innerHTML = "Habitaciones en mantenimiento: " + mantenimiento;
        document.querySelector("#total").innerHTML = "Ganancias del día: $" + total;



        //console.log(habitaciones);
    } catch (error) {
        console.log(error);
    }
}

function evaluaHabitacion(habitacion) {
    switch (habitacion) {
        case "P1H1":
            return 200;
            break;
        case "P1H2":
            return 200;
            break;
        case "P1H3":
            return 200;
            break;
        case "P1H4":
            return 200;
            break;
        case "P1H5":
            return 200;
            break;
        case "P2H1":
            return 300;
            break;
        case "P2H2":
            return 300;
            break;
        case "P2H3":
            return 300;
            break;
        case "P2H4":
            return 300;
            break;
        case "P2H5":
            return 300;
            break;
        case "P3H1":
            return 500;
            break;
        case "P3H2":
            return 1000;
            break;
    }
}

async function reporteSemanal() {
    try {
        var total = 0;
        for (i = -1; i < 6; i++) {
            console.log("si");
            diasSemanas = semanas * 7 + i;
            const url = "http://localhost/Hotel%20villa%20roca/Admin/php/habitaciones.php?dias=" + diasSemanas;
            const resultado = await fetch(url);
            const habitaciones = await resultado.json();
            //console.log(servicios);
            console.log(habitaciones);
            var fecha = new Date(new Date().getTime() + 24 * 60 * 60 * 1000 * (semanas * 7 - 1));
            var fechaSig = new Date(new Date().getTime() + 24 * 60 * 60 * 1000 * (semanas * 7 + 5));
            const hoy = document.querySelector("#hoyReporteS");
            hoy.innerHTML = (fecha.getDate()) + "/" + (fecha.getMonth() + 1) + "/" + fecha.getFullYear() + " - " + (fechaSig.getDate()) + "/" + (fechaSig.getMonth() + 1) + "/" + fechaSig.getFullYear();

            var disponibles = 0;
            var ocupadas = 0;
            var mantenimiento = 0;


            for (const n in habitaciones) {
                const h = document.querySelector("#" + n);
                //console.log(`${n}: ${habitaciones[n]}`);
                if (habitaciones[n] == "rojo") {

                    total += evaluaHabitacion(n);
                    ocupadas++;
                }
            }
            //document.querySelector("#disponible").innerHTML = "Habitaciones disponibles: " + disponibles;
            var tam = ocupadas * 10;
            var selector;
            switch (i) {
                case -1:
                    selector = "lunes";
                    break;
                case 0:
                    selector = "martes";
                    break;
                case 1:
                    selector = "miercoles";
                    break;
                case 2:
                    selector = "jueves";
                    break;
                case 3:
                    selector = "viernes";
                    break;
                case 4:
                    selector = "sabado";
                    break;
                case 5:
                    selector = "domingo";
                    break;

            }
            document.querySelector("#" + selector).style.height = tam + "rem";
            document.querySelector("#" + selector).innerHTML = ocupadas;
            document.querySelector("#totalSemanal").innerHTML = "Las ganancias de esta semana son: $" + total;
            //document.querySelector("#mantenimiento").innerHTML = "Habitaciones en mantenimiento: " + mantenimiento;
            //document.querySelector("#total").innerHTML = "Ganancias del día: " + total;


        }
        //console.log(habitaciones);
    } catch (error) {
        console.log(error);
    }
}