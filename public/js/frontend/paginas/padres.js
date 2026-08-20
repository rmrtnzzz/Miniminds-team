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

    const diapositivasMitos = document.querySelectorAll('.diapositivaMito');
    const botonAnteriorMito = document.querySelector('.anteriorMito');
    const botonSiguienteMito = document.querySelector('.siguienteMito');
    let indiceMitoActual = 0;

    if (diapositivasMitos.length > 0) {
        function cambiarDiapositivaMito(indice) {
            diapositivasMitos.forEach(d => d.classList.remove('activa'));
            diapositivasMitos[indice].classList.add('activa');
        }

        if (botonSiguienteMito) {
            botonSiguienteMito.addEventListener('click', () => {
                indiceMitoActual++;
                if (indiceMitoActual >= diapositivasMitos.length) {
                    indiceMitoActual = 0;
                }
                cambiarDiapositivaMito(indiceMitoActual);
            });
        }

        if (botonAnteriorMito) {
            botonAnteriorMito.addEventListener('click', () => {
                indiceMitoActual--;
                if (indiceMitoActual < 0) {
                    indiceMitoActual = diapositivasMitos.length - 1;
                }
                cambiarDiapositivaMito(indiceMitoActual);
            });
        }
    }

});