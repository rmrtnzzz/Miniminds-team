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

    const diapositivasTdah = document.querySelectorAll('.slidetdah');
    const contenedorIndicadoresTdah = document.querySelector('.indicadorestdah');
    const botonSiguienteTdah = document.querySelector('.nexttdah');
    const botonAnteriorTdah = document.querySelector('.prevtdah');

    let indiceTdah = 0;

    if (diapositivasTdah.length > 0 && contenedorIndicadoresTdah) {
        contenedorIndicadoresTdah.innerHTML = '';

        diapositivasTdah.forEach((_, ind) => {
            const barra = document.createElement('div');
            barra.classList.add('indicadortdah');
            if (ind === 0) barra.classList.add('activotdah');

            barra.addEventListener('click', () => {
                mostrarSlideTdah(ind);
            });

            contenedorIndicadoresTdah.appendChild(barra);
        });

        const listaBarras = document.querySelectorAll('.indicadortdah');

        function mostrarSlideTdah(i) {
            diapositivasTdah.forEach(s => s.classList.remove('activotdah'));
            listaBarras.forEach(b => b.classList.remove('activotdah'));

            diapositivasTdah[i].classList.add('activotdah');
            if (listaBarras[i]) listaBarras[i].classList.add('activotdah');

            indiceTdah = i;
        }

        if (botonSiguienteTdah) {
            botonSiguienteTdah.addEventListener('click', () => {
                indiceTdah++;
                if (indiceTdah >= diapositivasTdah.length) indiceTdah = 0;
                mostrarSlideTdah(indiceTdah);
            });
        }

        if (botonAnteriorTdah) {
            botonAnteriorTdah.addEventListener('click', () => {
                indiceTdah--;
                if (indiceTdah < 0) indiceTdah = diapositivasTdah.length - 1;
                mostrarSlideTdah(indiceTdah);
            });
        }
    }

});