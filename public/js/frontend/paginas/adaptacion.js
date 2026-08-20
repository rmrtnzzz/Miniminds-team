document.addEventListener('DOMContentLoaded', () => {

    const barraNavegacion = document.querySelector('.navbarcontenido');
    if (barraNavegacion) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                barraNavegacion.classList.add('scrolled');
            } else {
                barraNavegacion.classList.remove('scrolled');
            }
        });
    }

    const botonesNavegacion = document.querySelectorAll('.nav-btn');
    botonesNavegacion.forEach((boton) => {
        boton.addEventListener('click', () => {
            botonesNavegacion.forEach(b => b.classList.remove('active'));
            boton.classList.add('active');
        });
    });

    const elementosNavegacion = document.querySelectorAll('.nav-item');
    elementosNavegacion.forEach((elemento) => {
        const menuDesplegable = elemento.querySelector('.dropdown');
        const flechaChevron = elemento.querySelector('.chevron');

        if (menuDesplegable) {
            elemento.addEventListener('mouseenter', () => {
                menuDesplegable.classList.add('show');
                if (flechaChevron) flechaChevron.classList.add('open');
            });

            elemento.addEventListener('mouseleave', () => {
                menuDesplegable.classList.remove('show');
                if (flechaChevron) flechaChevron.classList.remove('open');
            });
        }
    });

    const botonAbrirAjustes = document.getElementById('gear-icon');
    const contenedorVentana = document.querySelector('.ventana-contenedor');
    const botonCerrarAjustes = document.querySelector('.equis');

    if (botonAbrirAjustes && contenedorVentana && botonCerrarAjustes) {
        botonAbrirAjustes.addEventListener('click', () => {
            contenedorVentana.classList.add('show');
        });

        botonCerrarAjustes.addEventListener('click', () => {
            contenedorVentana.classList.remove('show');
        });

        contenedorVentana.addEventListener('click', (evento) => {
            if (evento.target === contenedorVentana) {
                contenedorVentana.classList.remove('show');
            }
        });
    }

    const botonesPestana = document.querySelectorAll('.botonPestanaAdaptacion');
    const panelesEstrategia = document.querySelectorAll('.panelEstrategiaAdaptacion');

    botonesPestana.forEach((boton) => {
        boton.addEventListener('click', () => {
            const identificadorPestana = boton.getAttribute('data-pestana');

            botonesPestana.forEach(b => b.classList.remove('activa'));
            panelesEstrategia.forEach(p => p.classList.remove('activo'));

            boton.classList.add('activa');

            if (identificadorPestana === 'aula') {
                const panelAula = document.getElementById('panelAula');
                if (panelAula) panelAula.classList.add('activo');
            } else if (identificadorPestana === 'hogar') {
                const panelHogar = document.getElementById('panelHogar');
                if (panelHogar) panelHogar.classList.add('activo');
            } else if (identificadorPestana === 'social') {
                const panelSocial = document.getElementById('panelSocial');
                if (panelSocial) panelSocial.classList.add('activo');
            }
        });
    });

    const tarjetasHerramienta = document.querySelectorAll('.tarjetaHerramientaAdaptacion');
    tarjetasHerramienta.forEach((tarjeta) => {
        const botonExpandir = tarjeta.querySelector('.botonExpandirAdaptacion');
        if (botonExpandir) {
            botonExpandir.addEventListener('click', () => {
                tarjeta.classList.toggle('abierta');
                const textoBoton = botonExpandir.querySelector('span');
                if (textoBoton) {
                    if (tarjeta.classList.contains('abierta')) {
                        textoBoton.textContent = 'Ocultar aplicación';
                    } else {
                        textoBoton.textContent = 'Ver aplicación';
                    }
                }
            });
        }
    });

    const tarjetasPregunta = document.querySelectorAll('.tarjetaPreguntaAdaptacion');
    tarjetasPregunta.forEach((tarjeta) => {
        tarjeta.addEventListener('click', () => {
            const estaActiva = tarjeta.classList.contains('activa');
            tarjetasPregunta.forEach(t => t.classList.remove('activa'));
            if (!estaActiva) {
                tarjeta.classList.add('activa');
            }
        });
    });

});