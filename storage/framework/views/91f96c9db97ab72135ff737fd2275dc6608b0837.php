<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDA — Miniminds</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/homedark.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/contenido-dark-fix.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/paginas/tda2.css')); ?>">
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
        <p class="subtitulo-hero">Predominio inatento en la infancia</p>
        <h1 class="titulo-hero">TRASTORNO POR DÉFICIT DE ATENCIÓN (TDA)</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionbloque" id="conceptotda">
        <div class="cuadroconceptotda">
            <div class="bloquepremisa">
                <span class="badgetda">Perfil Inatento</span>
                <h1>¿Qué es el Trastorno por Déficit de Atención?</h1>
                <p>
                    El Trastorno por Déficit de Atención con predominio inatento es una variante neurobiológica caracterizada por dificultades persistentes para mantener la concentración, organizar tareas cotidianas y procesar estímulos auditivos o escritos con la misma velocidad que otros niños.
                </p>
                <p>
                    A diferencia de otras manifestaciones, en el TDA no predomina la inquietud motora ni la hiperactividad visible. Por esta razón, suele pasar desapercibido en las primeras etapas escolares, siendo confundido frecuentemente con desinterés o falta de esfuerzo.
                </p>
            </div>
            <div class="imagencontenidotda">
                <img src="<?php echo e(asset('/IMG/desarrolloinfantil.jpg')); ?>" alt="" class="imagendestacadatda">
            </div>
        </div>
    </section>

    <section class="seccionbloque">
        <div class="cuadropilaresinatencion">
            <div class="encabezadosecciontda">
                <span class="badgetda">Manifestaciones Clave</span>
                <h1>Características Principales del TDA</h1>
                <p class="textocentradotda">
                    El perfil inatento afecta principalmente las funciones ejecutivas del cerebro infantil, manifestándose de formas específicas durante las actividades diarias.
                </p>
            </div>

            <div class="filatarjetascaracteristicas">
                <div class="tarjetacaracteristicatda">
                    <div class="circulonumerotda">1</div>
                    <h3>Atención Sostenida</h3>
                    <p>Dificultad para mantener el foco en actividades extensas o rutinarias que carecen de estímulos novedosos o interactivos.</p>
                </div>

                <div class="tarjetacaracteristicatda">
                    <div class="circulonumerotda">2</div>
                    <h3>Memoria de Trabajo</h3>
                    <p>Tendencia a olvidar instrucciones complejas con múltiples pasos o perder la secuencia de las tareas indicadas en el aula.</p>
                </div>

                <div class="tarjetacaracteristicatda">
                    <div class="circulonumerotda">3</div>
                    <h3>Organización y Materiales</h3>
                    <p>Desafíos frecuentes para planificar tiempos de estudio, mantener cuadernos ordenados y conservar pertenencias escolares.</p>
                </div>

                <div class="tarjetacaracteristicatda">
                    <div class="circulonumerotda">4</div>
                    <h3>Procesamiento Lento</h3>
                    <p>Necesidad de mayor tiempo para asimilar información verbal o escrita y estructurar sus respuestas de forma clara.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionbloque">
        <div class="cuadrocomparativotda">
            <div class="encabezadosecciontda">
                <h1>Mitos y Realidades del TDA Inatento</h1>
                <p class="textocentradotda">Aclarar las ideas equivocadas ayuda a brindar una mejor comprensión y un apoyo afectivo libre de etiquetas.</p>
            </div>

            <div class="contenedortabs">
                <div class="panelmitorealidad">
                    <div class="columnamito">
                        <span class="etiquetamito">MITO</span>
                        <h3>"El niño es perezoso o no presta atención porque no quiere"</h3>
                    </div>
                    <div class="columnarealidad">
                        <span class="etiquetarealidad">REALIDAD</span>
                        <p>El TDA implica un esfuerzo cognitivo mayor para filtrar distracciones. La falta de atención no es una decisión del niño, sino una diferencia en la autorregulación cerebral.</p>
                    </div>
                </div>

                <div class="panelmitorealidad">
                    <div class="columnamito">
                        <span class="etiquetamito">MITO</span>
                        <h3>"Si no se mueve constantemente, no puede tener déficit de atención"</h3>
                    </div>
                    <div class="columnarealidad">
                        <span class="etiquetarealidad">REALIDAD</span>
                        <p>El TDA inatento no presenta hiperactividad física. La inquietud en estos niños suele ser interna, manifestándose como ensueño excesivo o desconexión del entorno.</p>
                    </div>
                </div>

                <div class="panelmitorealidad">
                    <div class="columnamito">
                        <span class="etiquetamito">MITO</span>
                        <h3>"No necesita adecuaciones porque aprueba las materias"</h3>
                    </div>
                    <div class="columnarealidad">
                        <span class="etiquetarealidad">REALIDAD</span>
                        <p>Muchos niños compensan las dificultades con un alto nivel de esfuerzo emocional, lo que genera fatiga mental, ansiedad y baja autoestima a mediano plazo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionbloque">
        <div class="cuadroguiatda">
            <div class="encabezadosecciontda">
                <span class="badgetda">Estrategias de Acompañamiento</span>
                <h1>Estrategias Prácticas para el Desarrollo</h1>
                <p class="textocentradotda">Pequeños ajustes en la rutina escolar y familiar facilitan la autonomía y la concentración del niño.</p>
            </div>

            <div class="gridestrategiastda">
                <div class="tarjetaestrategiatda">
                    <div class="cabeceraestrategia">
                        <img src="<?php echo e(asset('/IMG/padres.png')); ?>" alt="" class="iconoestrategiatda">
                        <h3>Estructura Visual</h3>
                    </div>
                    <p>Implementar listas de cotejo con imágenes o palabras clave para organizar los deberes y mochilas de forma autónoma.</p>
                </div>

                <div class="tarjetaestrategiatda">
                    <div class="cabeceraestrategia">
                        <img src="<?php echo e(asset('/IMG/maestros.png')); ?>" alt="" class="iconoestrategiatda">
                        <h3>Pasos Segmentados</h3>
                    </div>
                    <p>Dividir asignaciones extensas en pequeñas metas cortas para evitar la saturación mental y mantener la motivación.</p>
                </div>

                <div class="tarjetaestrategiatda">
                    <div class="cabeceraestrategia">
                        <img src="<?php echo e(asset('/IMG/test.png')); ?>" alt="" class="iconoestrategiatda">
                        <h3>Entornos Reducidos</h3>
                    </div>
                    <p>Ubicar el área de estudio lejos de ventanas, pantallas o ruidos intensos que compitan por su foco de atención.</p>
                </div>

                <div class="tarjetaestrategiatda">
                    <div class="cabeceraestrategia">
                        <img src="<?php echo e(asset('/IMG/cerebromorado.jpg')); ?>" alt="" class="iconoestrategiatda">
                        <h3>Pausas Breves</h3>
                    </div>
                    <p>Programar descansos de dos a tres minutos entre tareas para refrescar la memoria de trabajo y la energía cognitiva.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionbloque">
        <div class="acordeontdafrecuente">
            <h1>Preguntas Frecuentes sobre el TDA</h1>
            <p class="textocentradotda">Respuestas orientativas para familias y educadores.</p>

            <div class="contenedoracordeontda">
                <div class="itemacordeontda">
                    <button type="button" class="botonacordeontda">
                        <span>¿A qué edad se suele identificar el TDA inatento?</span>
                        <span class="simboloacordeon">+</span>
                    </button>
                    <div class="contenidoacordeontda">
                        <p>Se suele identificar con mayor claridad entre los 7 y 9 años, cuando las exigencias académicas requieren mayor organización independiente y lectura comprensiva prolongada.</p>
                    </div>
                </div>

                <div class="itemacordeontda">
                    <button type="button" class="botonacordeontda">
                        <span>¿Cómo diferenciar la distracción común del TDA?</span>
                        <span class="simboloacordeon">+</span>
                    </button>
                    <div class="contenidoacordeontda">
                        <p>La distracción ocasional ocurre en situaciones específicas de cansancio. En el TDA, la inatención es frecuente, persistente en múltiples entornos y afecta la vida diaria del niño.</p>
                    </div>
                </div>

                <div class="itemacordeontda">
                    <button type="button" class="botonacordeontda">
                        <span>¿Qué papel juegan los docentes en el acompañamiento?</span>
                        <span class="simboloacordeon">+</span>
                    </button>
                    <div class="contenidoacordeontda">
                        <p>Los docentes son fundamentales al brindar instrucciones directas, permitir tiempos adicionales en evaluaciones y mantener una comunicación fluida con la familia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionbloque">
        <div class="cuadroredirecciontda">
            <p class="textoredirecciontda">
                ¿Buscas información sobre hiperactividad o combinaciones conductuales? Conoce más en la sección especializada.
            </p>
            <a href="tdah" class="enlacebotonredireccion">
                <button type="button" class="botonredirecciontdah">
                    Ver Sección TDAH <span class="flecha-btn">→</span>
                </button>
            </a>
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
<?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/tda.blade.php ENDPATH**/ ?>