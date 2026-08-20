document.addEventListener('DOMContentLoaded', function () {

    const pantalla = document.getElementById('pantalla-carga');
    if (!pantalla) return;

    const mascota = document.getElementById('carga-mascota');

    // GIFs disponibles
    const gifs = JSON.parse(mascota.dataset.gifs);

    // Elegir uno al azar
    const gifAleatorio = Math.floor(Math.random() * gifs.length);

    mascota.src = gifs[gifAleatorio];


    const TIEMPO_MINIMO = 450;
    const inicio = Date.now();

    function ocultar() {

        const transcurrido = Date.now() - inicio;

        const espera = Math.max(
            TIEMPO_MINIMO - transcurrido,
            0
        );

        setTimeout(() => {
            pantalla.classList.add('oculta');
        }, espera);
    }


    if (document.readyState === 'complete') {

        ocultar();

    } else {

        window.addEventListener('load', ocultar);

    }


    function mostrar() {

        // Cambiar GIF cada vez que aparece la pantalla
        const gifAleatorio = Math.floor(
            Math.random() * gifs.length
        );

        mascota.src = gifs[gifAleatorio];

        pantalla.classList.remove('oculta');
    }

    // A propósito, la pantalla de carga YA NO se dispara con cualquier
    // link o formulario del sitio. Solo se vuelve a mostrar en los
    // elementos marcados explícitamente con [data-mm-loading]:
    // registro, inicio de sesión, y entrar/salir del panel.

    document
        .querySelectorAll('[data-mm-loading]')
        .forEach((el) => {

            const evento =
                el.tagName === 'FORM'
                    ? 'submit'
                    : 'click';

            el.addEventListener(evento, mostrar);

        });

});
