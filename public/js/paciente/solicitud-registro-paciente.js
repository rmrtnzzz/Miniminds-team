(function () {
    var fechaInput = document.getElementById('fecha_nacimiento');
    var edadTexto = document.getElementById('edad-calculada');
    var btnEnviar = document.getElementById('btn-enviar-solicitud');
    var EDAD_MAXIMA = 12;

    function calcularEdad(fechaStr) {
        var hoy = new Date();
        var nacimiento = new Date(fechaStr + 'T00:00:00');
        var edad = hoy.getFullYear() - nacimiento.getFullYear();
        var m = hoy.getMonth() - nacimiento.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < nacimiento.getDate())) {
            edad--;
        }
        return edad;
    }

    function actualizarEdad() {
        if (!fechaInput.value) {
            edadTexto.textContent = '';
            edadTexto.style.color = '#6b6280';
            fechaInput.setCustomValidity('');
            return;
        }
        var edad = calcularEdad(fechaInput.value);

        if (edad < 0) {
            edadTexto.textContent = 'La fecha de nacimiento no puede ser futura.';
            edadTexto.style.color = '#C23A52';
            fechaInput.setCustomValidity('Fecha inválida');
            return;
        }

        if (edad > EDAD_MAXIMA) {
            edadTexto.textContent = 'Edad detectada: ' + edad + ' años. Miniminds es un servicio especializado para niños hasta los ' + EDAD_MAXIMA + ' años.';
            edadTexto.style.color = '#C23A52';
            fechaInput.setCustomValidity('La edad máxima permitida es ' + EDAD_MAXIMA + ' años.');
        } else {
            edadTexto.textContent = 'Edad detectada: ' + edad + (edad === 1 ? ' año' : ' años');
            edadTexto.style.color = '#2ba36b';
            fechaInput.setCustomValidity('');
        }
    }

    fechaInput.addEventListener('change', actualizarEdad);
    fechaInput.addEventListener('input', actualizarEdad);
    actualizarEdad();
})();
