<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDAH — Miniminds</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/homedark.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/contenido-dark-fix.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/paginas/tdah2.css')); ?>">
    <script src="<?php echo e(asset('js/frontend/frontend-nav.js')); ?>" defer></script>
</head>
<body>


<header>
        <div class="NAVBARCONTENIDO scrolled">
                    <div class="navbar-wrapper">
                        <div class="navbar-container">
                            <div class="navbar-content">
                                <nav class="navbar">

                                <a href="<?php echo e(route('home')); ?>"><button class="nav-btn">Inicio</button></a>

                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Información

                            <svg class="chevron" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4L6 8L10 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <a class="dropdown-item" href="<?php echo e(route('divergencia')); ?>">Neurodiversidades</a>
                            <a class="dropdown-item" href="<?php echo e(route('tda')); ?>">Diagnóstico TDA</a>
                            <a class="dropdown-item" href="<?php echo e(route('tdah')); ?>">Diagnóstico TDAH</a>
                            <a class="dropdown-item" href="<?php echo e(route('adaptacion')); ?>">Adaptación</a>

                        </div>

                    </div>
                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Apoyo

                            <svg class="chevron" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4L6 8L10 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <a class="dropdown-item" href="<?php echo e(route('padres')); ?>">Guía para padres</a>
                            <a class="dropdown-item" href="<?php echo e(route('maestros')); ?>">Guía para maestros</a>
                            <a class="dropdown-item" href="<?php echo e(route('padresymaestros')); ?>">Guía para padres y maestros</a>

                        </div>

                    </div>
                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Servicios

                            <svg class="chevron" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4L6 8L10 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <button class="dropdown-item">Profesionales</button>
                            <button class="dropdown-item">Consultas</button>
                            <button class="dropdown-item">Desarrolladores</button>

                        </div>

                    </div>

                                <a href="<?php echo e(route('contacto')); ?>"><button class="nav-btn">Contacto</button></a>

                                </nav>

                            </div>
        </div>

    

                    <svg
                    id="gear-icon"
                    class="gear-icon"
                    width="30"
                    height="30"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m 12,15.5 c -1.932997,0 -4.1592136,-2.517206 -3.562622,-4.355834 0.6797572,-1.863064 2.180195,-0.969747 3.124268,-0.01404 0.725182,0.734117 0.762202,-0.997317 2.330635,-1.212666 C 14.861462,9.7843875 15.5,10.755363 15.5,12 c 0,1.932997 -1.567003,3.5 -3.5,3.5 m 7.43,-2.92 c 0.04,-0.3 0.07,-0.61 0.07,-0.93 0,-0.32 -0.03,-0.64 -0.07,-1 l 2.19,-1.68 c 0.2,-0.15 0.25,-0.42 0.12,-0.64 L 19.67,4.75 C 19.54,4.53 19.28,4.45 19.06,4.53 L 16.49,5.56 C 15.95,5.15 15.38,4.81 14.74,4.57 L 14.35,1.84 C 14.46,2.18 14.25,2 14,2 H 10 C 9.75,2 9.54,2.18 9.51,2.42 L 9.12,5.15 C 8.48,5.39 7.91,5.73 7.37,6.14 L 4.8,5.11 C 4.58,5.03 4.32,5.11 4.19,5.33 L 2.12,8.91 C 1.99,9.13 2.05,9.4 2.24,9.55 l 2.19,1.68 c -0.04,0.36 -0.07,0.67 -0.07,1 0,0.33 0.03,0.63 0.07,0.93 l -2.19,1.68 c -0.19,0.15 -0.25,0.42 -0.12,0.64 l 2.07,3.58 c 0.13,0.22 0.39,0.3 0.61,0.22 l 2.57,-1.03 c 0.54,0.41 1.11,0.75 1.75,0.99 l 0.39,2.73 c 0.03,0.24 0.24,0.42 0.49,0.42 h 4 c 0.25,0 0.46,-0.18 0.49,-0.42 l 0.39,-2.73 c 0.64,-0.24 1.21,-0.58 1.75,-0.99 l 2.57,1.03 c 0.22,0.08 0.48,0 0.61,-0.22 l 2.07,-3.58 c 0.13,-0.22 0.07,-0.49 -0.12,-0.64 z"
                        id="path1" />
                    </svg>

        <div class="log-reg">

            <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(auth()->user()->panelUrl()); ?>"><button class="iniciar2">Mi Panel</button></a>
                        <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"><button class="iniciar">Iniciar sesión</button></a>
                        <a href="<?php echo e(route('register')); ?>"><button class="iniciar2">Registrarse</button></a>
                        <?php endif; ?>

        </div>

            </div>

        </div>


<img src="<?php echo e(asset('/IMG/neurobanner.jpg')); ?>" alt="" class="imagenHero">

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
                            <img src="<?php echo e(asset('/IMG/tdah.png')); ?>" alt="" class="imagencarruseltdah">
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
                            <img src="<?php echo e(asset('/IMG/autismo.png')); ?>" alt="" class="imagencarruseltdah">
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
                            <img src="<?php echo e(asset('/IMG/desarrolloinfantil.jpg')); ?>" alt="" class="imagencarruseltdah">
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
                        <img src="<?php echo e(asset('/IMG/padres.png')); ?>" alt="" class="iconoambientetdah">
                        <h3>Estrategias en el Hogar</h3>
                    </div>
                    <p>Establecer rutinas fijas para horarios de comida, tareas y descanso. Emplear recordatorios visibles y felicitar los avances sin centrarse únicamente en los errores.</p>
                </div>

                <div class="tarjetaambiente">
                    <div class="encabezadocardambiente">
                        <img src="<?php echo e(asset('/IMG/maestros.png')); ?>" alt="" class="iconoambientetdah">
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

                <div class="ventana-contenedor">
                    <div class="ventana">

                        <h1 id="titulos">Ajustes</h1>

                        <svg
                            class="equis"
                            width="45"
                            height="45"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 6L18 18M18 6L6 18"
                                stroke="currentColor"
                                stroke-width="4"
                                stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>

                        <div class="darkmode-ventana">
                            <span>Modo oscuro</span>

                        <label class="switch">
                            <input type="checkbox" id="darkmode-toggle">
                            <span class="dm-slider">
                            </span>
                        </label>

                        </div>

                        <h3>Idioma</h3>

                        <div class="idiomasbtn">
                                <button class="idioma">ESPAÑOL</button>
                            <button class="idioma2">ENGLISH</button>
                        </div>

                </div>
    </div>

<footer>
    <br>
    <div class="footer-contenido">

        <div class="footer-columna">
            <h1>Acerca de</h1>
            <a href="<?php echo e(route('home')); ?>">Nuestro equipo</a>
            <a href="<?php echo e(route('Normas')); ?>">Normas de la comunidad</a>
            <a href="<?php echo e(route('divergencia')); ?>">Sobre nosotros</a>
        </div>

        <div class="linea-vertical"></div>

        <div class="footer-columna">
            <h1>Recursos</h1>
            <a href="<?php echo e(route('padres')); ?>">Guía para padres</a>
            <a href="<?php echo e(route('maestros')); ?>">Guía para maestros</a>
            <a href="<?php echo e(route('padresymaestros')); ?>">Padres y maestros</a>
            <a href="<?php echo e(route('adaptacion')); ?>">Adaptación</a>
        </div>

        <div class="linea-vertical"></div>

        <div class="footer-columna">
            <h1>Contacto</h1>
            <a href="<?php echo e(route('contacto')); ?>">Correo</a>
            <a href="<?php echo e(route('contacto')); ?>">Teléfono</a>
            <a href="<?php echo e(route('contacto')); ?>">Horarios</a>
        </div>

    </div>

    <br><br><br><br><br>
    <div class="footer-logo">
        <h1>Neuro-MiniMinds!</h1>
        <p>Apoyo al desarrollo de infancias sanas y adaptivas</p>
    </div>

     <br><br>
    <div class="redes">
        <a href=""><img src="<?php echo e(asset('/IMG/insta icon.png')); ?>" alt="" class="sociales"></a>
        <a href=""><img src="<?php echo e(asset('/IMG/tt icon.png')); ?>" alt="" class="sociales"></a>

        <a href=""><img src="<?php echo e(asset('/IMG/yt icon.png')); ?>" alt="" class="sociales"></a>

    </div>


</footer>


</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/tdah.blade.php ENDPATH**/ ?>