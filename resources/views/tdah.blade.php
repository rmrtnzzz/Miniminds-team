<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDAH — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">
            <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/contenido-dark-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/paginas/tdah2.css') }}">
    <script src="{{ asset('js/frontend/frontend-nav.js') }}" defer></script>
</head>
<body>


<header>



<img src="{{ asset('/IMG/neurobanner.jpg') }}" alt="" class="imagenHero">

    <div class="hero-contenido">
        <p class="subtitulo-hero">Energía, impulsividad y autorregulación</p>
        <h1 class="titulo-hero">TRASTORNO POR DÉFICIT DE ATENCIÓN E HIPERACTIVIDAD (TDAH)</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionbloquetdah" id="presentaciontdah">
        <div class="cabeceratdahcentrada">
            <span class="badgetdah">Acompañamiento e Inclusión</span>
            <h1>Comprendiendo el TDAH en la Infancia</h1>
            <p class="introducciontdah">
                El TDAH es una condición del neurodesarrollo en la que convergen variaciones en la atención sostenida, altos niveles de energía física e impulsividad en la toma de decisiones cotidianas.
            </p>
        </div>

        <div class="triadacontenedortdah">
            <div class="bloquetriadatdah rosa border-rosa">
                <div class="cabeceratriada">
                    <h2>01</h2>
                    <h3>Inatención Variable</h3>
                </div>
                <p>Ocurre cuando el foco atencional oscila rápidamente ante múltiples estímulos del entorno, dificultando terminar tareas extensas sin apoyo.</p>
            </div>

            <div class="bloquetriadatdah naranja border-naranja">
                <div class="cabeceratriada">
                    <h2>02</h2>
                    <h3>Hiperactividad Motora</h3>
                </div>
                <p>Necesidad constante de movimiento corporal, manipulación de objetos o desplazamiento frecuente en momentos de reposo exigido.</p>
            </div>

            <div class="bloquetriadatdah azul border-azul">
                <div class="cabeceratriada">
                    <h2>03</h2>
                    <h3>Impulsividad</h3>
                </div>
                <p>Tendencia a responder de forma inmediata sin evaluar consecuencias previas, interrumpiendo o anticipando respuestas verbales.</p>
            </div>
        </div>
    </section>

    <section class="seccionbloquetdah">
        <div class="seccioncarruseltdah">
            <h1 class="titulocarruseltdah">Pilares para el Acompañamiento Efectivo</h1>

            <div class="carruseltdah">
                <button type="button" class="flechatdah prevtdah">&lt;</button>

                <div class="slidertdah">

                    <div class="slidetdah activotdah">
                        <div class="slidetdah-texto">
                            <h2>Pausas Activas y Canalización</h2>
                            <p>
                                Permitir pequeños intervalos de movimiento estructurado durante las actividades académicas ayuda a liberar tensión física, mejorando la concentración en el siguiente bloque de estudio.
                            </p>
                        </div>
                        <div class="slidetdah-imagen">
                            <img src="{{ asset('/IMG/tdah.png') }}" alt="" class="imagencarruseltdah">
                        </div>
                    </div>

                    <div class="slidetdah">
                        <div class="slidetdah-texto">
                            <h2>Estructura y Reglas Anticipadas</h2>
                            <p>
                                Explicar claramente los límites y las secuencias del día reduce la ansiedad conductual, permitiendo al niño saber exactamente qué se espera de él en cada momento.
                            </p>
                        </div>
                        <div class="slidetdah-imagen">
                            <img src="{{ asset('/IMG/autismo.png') }}" alt="" class="imagencarruseltdah">
                        </div>
                    </div>

                    <div class="slidetdah">
                        <div class="slidetdah-texto">
                            <h2>Refuerzo Positivo Inmediato</h2>
                            <p>
                                Reconocer el esfuerzo y los logros en el instante en que ocurren fortalece la motivación intrínseca y consolida pautas de conducta adaptativas.
                            </p>
                        </div>
                        <div class="slidetdah-imagen">
                            <img src="{{ asset('/IMG/desarrolloinfantil.jpg') }}" alt="" class="imagencarruseltdah">
                        </div>
                    </div>

                </div>

                <button type="button" class="flechatdah nexttdah">&gt;</button>

                <div class="indicadorestdah"></div>
            </div>
        </div>
    </section>

    <section class="seccionbloquetdah">
        <div class="cuadrobloquesestrategicos">
            <div class="cabeceratdahcentrada">
                <h1>Entornos Adaptativos para el TDAH</h1>
                <p class="introducciontdah">Estrategias divididas por ámbitos para canalizar el potencial del niño.</p>
            </div>

            <div class="gridambientes">
                <div class="tarjetaambiente">
                    <div class="encabezadocardambiente">
                        <img src="{{ asset('/IMG/padres.png') }}" alt="" class="iconoambientetdah">
                        <h3>Estrategias en el Hogar</h3>
                    </div>
                    <p>Establecer rutinas fijas para horarios de comida, tareas y descanso. Emplear recordatorios visibles y felicitar los avances sin centrarse únicamente en los errores.</p>
                </div>

                <div class="tarjetaambiente">
                    <div class="encabezadocardambiente">
                        <img src="{{ asset('/IMG/maestros.png') }}" alt="" class="iconoambientetdah">
                        <h3>Estrategias en el Aula</h3>
                    </div>
                    <p>Ubicar al estudiante en las primeras filas, intercalar explicaciones teóricas con tareas prácticas y asignar pequeñas responsabilidades dinámicas dentro del salón.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionbloquetdah">
        <div class="cuadroenlacestdah">
            <p class="textoenlacestdah">
                ¿Deseas explorar otras manifestaciones neurodivergentes o la guía de adecuaciones generales?
            </p>
            <div class="botonesenlacesflex">
                <a href="tda" class="enlacebtn">
                    <button type="button" class="btnsecundariotdah">Conocer Sección TDA</button>
                </a>
                <a href="adaptacion" class="enlacebtn">
                    <button type="button" class="btnprincipaltdah">Estrategias de Adaptación →</button>
                </a>
            </div>
        </div>
    </section>

</main>


<footer>


</footer>


</body>
</html>
