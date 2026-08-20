<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dislexia</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/frontend/diver.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/homedark.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/diverdark.css')); ?>">
    <script src="<?php echo e(asset('js/frontend/frontend-nav.js')); ?>" defer></script>

</head>
<body>
<script>
    window.MM_CHAT = {
        authenticated: <?php echo e(auth()->check() ? 'true' : 'false'); ?>,
        loginUrl: "<?php echo e(route('login')); ?>",
        enviarUrl: "<?php echo e(route('chat.enviar')); ?>",
        csrf: "<?php echo e(csrf_token()); ?>"
    };
</script>
<script src="<?php echo e(asset('js/frontend/frontend-chat-widget.js')); ?>"></script>

    
    <div class="decoracionesfondo">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona1.svg')); ?>" class="neurona n1">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona2.svg')); ?>" class="neurona n2">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona3.svg')); ?>" class="neurona n3">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona4.svg')); ?>" class="neurona n4">

        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona2.svg')); ?>" class="neurona n5">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona1.svg')); ?>" class="neurona n6">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona3.svg')); ?>" class="neurona n7">
        <img src="<?php echo e(asset('IMG/DIBUJOS/neurona4.svg')); ?>" class="neurona n8">
    </div>


    <div class="iapanel">
        <button class="chat-toggle">

            IA

        </button>


        <!-- FONDO OSCURO -->

        <div class="chat-overlay"></div>


        <!-- CHAT -->

        <div class="chat-panel">

            <div class="chat-header">

                <div class="chat-info">

                    <img src="<?php echo e(asset('/IMG/GAEL PNG.png')); ?>" alt="">

                    <div>

                        <h3>MiniMinds</h3>

                        <span>Siempre listo para ayudarte</span>

                    </div>

                </div>

                <button class="cerrar-chat">

                    ✕

                </button>

            </div>


            <div class="chat-body">

                <div class="mensaje ia">

                    ¡Hola! 👋

                    Soy el asistente de MiniMinds.

                    ¿En qué puedo ayudarte?

                </div>


                <div class="mensaje usuario">

                </div>


                <div class="mensaje ia escribiendo">

                    <span></span>
                    <span></span>
                    <span></span>

                </div>

            </div>


            <div class="chat-footer">

                <input
                type="text"
                placeholder="Escribe tu pregunta...">

                <button class="btn-enviar">

                    <img src="<?php echo e(asset('/IMG/DIBUJOS/enviar mensaje.svg')); ?>" alt="">

                </button>

            </div>

        </div>

    </div>

<header>
        <div class="NAVBARCONTENIDO scrolled">
                    <div class="navbar-wrapper">
                        <div class="navbar-container">
                            <div class="navbar-content">
                                <nav class="navbar">

                                    
                                <a href="<?php echo e(route('home')); ?>"><button class="nav-btn">
                                        Inicio
                                    </a></button>
                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Información

                            <svg
                                class="chevron"
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                            >
                                <path
                                    d="M2 4L6 8L10 4"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <button class="dropdown-item">
                            Conductas
                            </button>

                                    <button class="dropdown-item">
                            Neurodiversidades
                            </button>


                            <button class="dropdown-item">
                                Diagnostico
                            </button>

                        </div>

                    </div>                
                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Apoyo

                            <svg
                                class="chevron"
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                            >
                                <path
                                    d="M2 4L6 8L10 4"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                        </button>

                        <div class="dropdown">




                            <button class="dropdown-item">
                                Guía para padres
                            </button>

                                    <button class="dropdown-item">
                                Guía para maestros
                            </button>

                                            <button class="dropdown-item">
                                Test
                            </button>



                        </div>

                    </div>                <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Servicios

                            <svg
                                class="chevron"
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                            >
                                <path
                                    d="M2 4L6 8L10 4"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <button class="dropdown-item">
                                Profesionales
                            </button>

                            <button class="dropdown-item">
                                Consultas
                            </button>

                            <button class="dropdown-item">
                                Desarrolladores
                            </button>

                            <button class="dropdown-item">
                                Tests
                            </button>

                        </div>

                    </div>

                                <a href="<?php echo e(route('contacto')); ?>">
                                <button class="nav-btn">Contacto</button></a>
                                    <a href=""><button class="nav-btn">Ayuda</button></a>

                                    
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
                    version="1.1"
                    sodipodi:docname="gear hearth.svg"
                    inkscape:version="1.4.2 (f4327f4, 2025-05-13)"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <defs
                        id="defs1" />
                    <sodipodi:namedview
                        id="namedview1"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        inkscape:zoom="19.162594"
                        inkscape:cx="18.760508"
                        inkscape:cy="19.334543"
                        inkscape:window-width="1920"
                        inkscape:window-height="1094"
                        inkscape:window-x="-11"
                        inkscape:window-y="-11"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="gear-icon" />
                    <path
                        d="m 12,15.5 c -1.932997,0 -4.1592136,-2.517206 -3.562622,-4.355834 0.6797572,-1.863064 2.180195,-0.969747 3.124268,-0.01404 0.725182,0.734117 0.762202,-0.997317 2.330635,-1.212666 C 14.861462,9.7843875 15.5,10.755363 15.5,12 c 0,1.932997 -1.567003,3.5 -3.5,3.5 m 7.43,-2.92 c 0.04,-0.3 0.07,-0.61 0.07,-0.93 0,-0.32 -0.03,-0.64 -0.07,-1 l 2.19,-1.68 c 0.2,-0.15 0.25,-0.42 0.12,-0.64 L 19.67,4.75 C 19.54,4.53 19.28,4.45 19.06,4.53 L 16.49,5.56 C 15.95,5.15 15.38,4.81 14.74,4.57 L 14.35,1.84 C 14.46,2.18 14.25,2 14,2 H 10 C 9.75,2 9.54,2.18 9.51,2.42 L 9.12,5.15 C 8.48,5.39 7.91,5.73 7.37,6.14 L 4.8,5.11 C 4.58,5.03 4.32,5.11 4.19,5.33 L 2.12,8.91 C 1.99,9.13 2.05,9.4 2.24,9.55 l 2.19,1.68 c -0.04,0.36 -0.07,0.67 -0.07,1 0,0.33 0.03,0.63 0.07,0.93 l -2.19,1.68 c -0.19,0.15 -0.25,0.42 -0.12,0.64 l 2.07,3.58 c 0.13,0.22 0.39,0.3 0.61,0.22 l 2.57,-1.03 c 0.54,0.41 1.11,0.75 1.75,0.99 l 0.39,2.73 c 0.03,0.24 0.24,0.42 0.49,0.42 h 4 c 0.25,0 0.46,-0.18 0.49,-0.42 l 0.39,-2.73 c 0.64,-0.24 1.21,-0.58 1.75,-0.99 l 2.57,1.03 c 0.22,0.08 0.48,0 0.61,-0.22 l 2.07,-3.58 c 0.13,-0.22 0.07,-0.49 -0.12,-0.64 z"
                        id="path1"
                        sodipodi:nodetypes="cssssccsccccccccssccccccccsccccccccsscccccccc" />
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

    <div class="hero-contenido">

        <p class="subtitulo-hero">
            Neurodivergencias y dificultades de aprendizaje
        </p>

        <h1 class="titulo-hero">
            DISLEXIA
        </h1>

        <p class="desliza">
            ↓ Desliza hacia abajo ↓
        </p>

    </div>
</header>

<div class="contenedorinfo">
    <section class="seccion-bloque qes">

    <div class="qes-imagen-wrapper">
        <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>"
             alt="Ilustración relacionada con la dislexia">
    </div>

    <div class="qes-texto">

        <h1>¿Qué es la dislexia?</h1>

        <p>
            La dislexia es una dificultad específica del aprendizaje que
            afecta principalmente la adquisición y el desarrollo de la
            lectura y la escritura. Puede influir en la manera en que una
            persona identifica, relaciona y procesa los sonidos del
            lenguaje y sus representaciones escritas.
            
            <br><br>

            Las personas con dislexia pueden presentar dificultades para
            reconocer palabras con precisión y fluidez, relacionar letras
            con sonidos, leer palabras nuevas o escribir correctamente.
            Estas dificultades pueden variar considerablemente de una
            persona a otra.

            <br><br>

            La dislexia no significa tener menor inteligencia ni falta de
            interés por aprender. Con estrategias educativas adecuadas,
            acompañamiento y apoyo especializado, los estudiantes pueden
            desarrollar sus habilidades y encontrar formas eficaces de
            aprender.
        </p>

    </div>

</section>



<section class="seccion-bloque pq-destacado">

    <div class="tarjeta-blanca-destacada">

        <div class="pq-contenido-grid">

            <div class="pq-texto-col">

                <h1>¿Por qué aparece la dislexia?</h1>

                <p>
                    La dislexia está relacionada con diferencias en la
                    manera en que el cerebro procesa determinados aspectos
                    del lenguaje, especialmente la relación entre los
                    sonidos del habla y las letras que los representan.
                </p>

                <p>
                    Una de las áreas que puede presentar mayores desafíos
                    es el procesamiento fonológico, es decir, la capacidad
                    de identificar y manipular los sonidos que forman las
                    palabras.
                </p>

                <p>
                    La dislexia no aparece por falta de esfuerzo, poca
                    inteligencia, una mala crianza o simplemente por no
                    practicar suficiente. Cada persona puede presentar
                    diferentes dificultades y fortalezas.
                </p>

            </div>

            <div class="pq-img-col">

                <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>"
                     alt="Ilustración relacionada con el procesamiento del lenguaje">

            </div>

        </div>

    </div>

</section>


<section class="seccion-bloque funciona">

    <span class="badge-subtitulo">
        Comprendiendo la Dislexia
    </span>

    <h1>¿Cómo puede manifestarse?</h1>

    <p class="descripcion-intro">
        La dislexia puede presentarse de diferentes maneras y no todas
        las personas experimentan las mismas dificultades. Algunas
        pueden ser más evidentes durante la lectura, mientras que otras
        aparecen principalmente durante la escritura o el aprendizaje.
    </p>

    <div class="contenedor-funciona">

        <!-- IZQUIERDA -->

        <div class="lado izquierdo">

            <div class="card-funciona">

                <div>
                    <h3>Lectura</h3>

                    <p>
                        Dificultad para leer con precisión, fluidez o
                        automatización, especialmente ante palabras nuevas.
                    </p>
                </div>

            </div>

            <div class="card-funciona">

                <div>
                    <h3>Escritura</h3>

                    <p>
                        Puede haber dificultades para escribir palabras,
                        organizar letras y aplicar correctamente algunas
                        reglas ortográficas.
                    </p>
                </div>

            </div>

            <div class="card-funciona">

                <div>
                    <h3>Sonidos del lenguaje</h3>

                    <p>
                        Puede resultar difícil identificar, separar o
                        combinar los sonidos que forman una palabra.
                    </p>
                </div>

            </div>

        </div>


        <!-- CENTRO -->

        <div class="centro centro-cerebro">

            <?php echo $__env->make('partials.cerebro-brain', ['height' => '480px', 'showHeader' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>


        <!-- DERECHA -->

        <div class="lado derecho">

            <div class="card-funciona">

                <div>
                    <h3>Comprensión lectora</h3>

                    <p>
                        La dificultad para leer con fluidez puede hacer
                        que comprender un texto requiera mayor esfuerzo.
                    </p>

                </div>

            </div>

            <div class="card-funciona">

                <div>
                    <h3>Memoria verbal</h3>

                    <p>
                        Algunas personas pueden tener dificultades para
                        recordar temporalmente información verbal.
                    </p>

                </div>

            </div>

            <div class="card-funciona">

                <div>
                    <h3>Organización</h3>

                    <p>
                        Pueden aparecer dificultades para organizar
                        información escrita o seguir instrucciones
                        con varios pasos.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <br>

    <p class="indicador-interaccion">
        Toca el cerebro o los botones para explorar cada zona
    </p>

</section>


<section class="seccion-bloque desarrollo-contenedor">

    <div class="qes tarjeta-suave">

        <div class="qes-imagen-wrapper">

            <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>"
                 alt="Ilustración relacionada con el aprendizaje">

        </div>

        <div class="qes-texto">

            <h1>Procesamiento del lenguaje</h1>

            <p>
                La lectura requiere coordinar diferentes habilidades,
                como reconocer letras, relacionarlas con sonidos,
                identificar palabras y comprender su significado.
                En la dislexia, algunas de estas habilidades pueden
                requerir más tiempo y práctica para desarrollarse.
            </p>

        </div>

    </div>


    <div class="bloque-sensorial">

        <div class="encabezado-centrado">

            <h1>Áreas que pueden presentar desafíos</h1>

            <p class="texto-ancho">
                Las dificultades pueden variar entre personas. Estas
                son algunas de las habilidades relacionadas con el
                aprendizaje de la lectura y la escritura.
            </p>

        </div>


        <div class="contenedor-sentidos">

            <div class="sentidos">

                <div class="icono-sentido">🔤</div>

                <h3>Conciencia fonológica</h3>

                <p>
                    Identificar y manipular los sonidos que forman
                    las palabras puede resultar más difícil.
                </p>

            </div>


            <div class="sentidos">

                <div class="icono-sentido">📖</div>

                <h3>Fluidez lectora</h3>

                <p>
                    La lectura puede requerir más tiempo y esfuerzo
                    para alcanzar precisión y fluidez.
                </p>

            </div>


            <div class="sentidos">

                <div class="icono-sentido">✏️</div>

                <h3>Escritura</h3>

                <p>
                    Pueden presentarse dificultades relacionadas con
                    la ortografía y la organización de las palabras.
                </p>

            </div>


            <div class="sentidos">

                <div class="icono-sentido">🧠</div>

                <h3>Memoria verbal</h3>

                <p>
                    Algunas tareas que requieren mantener información
                    verbal temporalmente pueden resultar más exigentes.
                </p>

            </div>

        </div>

    </div>


    <div class="qes tarjeta-suave inverso">

        <div class="qes-texto">

            <h1>Aprender de una manera diferente</h1>

            <p>
                Las dificultades de lectura no significan que una
                persona no pueda aprender. El uso de apoyos visuales,
                instrucciones claras, práctica guiada y estrategias
                adaptadas puede facilitar el aprendizaje y fortalecer
                la confianza del estudiante.
            </p>

        </div>

        <div class="qes-imagen-wrapper">

            <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>"
                 alt="Ilustración sobre diferentes formas de aprender">

        </div>

    </div>

</section>


<section class="seccion-bloque niveles-seccion">

    <div class="random">

        <h1>Fortalezas y necesidades de apoyo</h1>

        <p>
            La dislexia se presenta de manera diferente en cada persona.
            Por eso, los apoyos deben adaptarse a las necesidades y
            fortalezas individuales.
        </p>

    </div>


    <div class="cards">

        <div class="card rosa">

            <div class="icon">
                <h1>📖</h1>
            </div>

            <h3>Lectura</h3>

            <p class="short">
                Puede necesitarse práctica guiada y estrategias para
                mejorar la precisión y fluidez lectora.
            </p>

            <button class="toggle">
                Ver más detalles <span>▼</span>
            </button>

            <div class="extra">

                <p>Apoyos útiles</p>

                <ul>
                    <li>Lectura acompañada.</li>
                    <li>Textos adaptados al nivel del estudiante.</li>
                    <li>Tiempo adicional cuando sea necesario.</li>
                </ul>

            </div>

        </div>


        <div class="card naranja">

            <div class="icon">
                <h1>✏️</h1>
            </div>

            <h3>Escritura</h3>

            <p class="short">
                La escritura puede requerir estrategias específicas
                para organizar palabras e ideas.
            </p>

            <button class="toggle">
                Ver más detalles <span>▼</span>
            </button>

            <div class="extra">

                <p>Apoyos útiles</p>

                <ul>
                    <li>Uso de esquemas y organizadores visuales.</li>
                    <li>Corrección guiada.</li>
                    <li>Práctica progresiva de ortografía.</li>
                </ul>

            </div>

        </div>


        <div class="card azul">

            <div class="icon">
                <h1>🧠</h1>
            </div>

            <h3>Aprendizaje</h3>

            <p class="short">
                Las estrategias multisensoriales y el acompañamiento
                pueden facilitar el acceso a la información.
            </p>

            <button class="toggle">
                Ver más detalles <span>▼</span>
            </button>

            <div class="extra">

                <p>Apoyos útiles</p>

                <ul>
                    <li>Instrucciones claras y breves.</li>
                    <li>Apoyos visuales.</li>
                    <li>Actividades divididas en pasos.</li>
                </ul>

            </div>

        </div>

    </div>


    <div class="random nota-aclaratoria">

        <p>
            <span>Nota importante:</span>
            Las dificultades de lectura y escritura no determinan la
            inteligencia ni el potencial de aprendizaje de una persona.
            La identificación y el acompañamiento profesional permiten
            encontrar estrategias adecuadas para cada estudiante.
        </p>

    </div>

</section>


    <section class="seccion-test-redisenada container-general">
            <div class="test-header">
                <span class="test-badge">Herramienta de Guía</span>
                <h1 class="test-titulo">ORIENTACIÓN EN LECTURA</h1>
                <p class="test-descripcion">
                    Responde nuestro test de referencia para obtener orientación inicial
                    y entender mejor las posibles dificultades relacionadas con la
                    lectura y la escritura.
                </p>       
            
            </div>

            <div class="test-footer-info">
                <div class="advertencia-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#856404" stroke-width="2"/><path d="M12 8V12" stroke="#856404" stroke-width="2" stroke-linecap="round"/><path d="M12 16H12.01" stroke="#856404" stroke-width="2" stroke-linecap="round"/></svg>
                    <p class="test-nota-importante">
                        <strong>Importante:</strong> Esta herramienta es únicamente
                        orientativa. No sustituye una evaluación educativa o profesional
                        ni permite establecer por sí sola un diagnóstico de dislexia.
                        Sus resultados pueden servir como referencia para identificar
                        posibles áreas que requieran mayor atención.
                    </p>       
                         </div>
                
                <a href="" class="boton-test-wrapper">
                    <button class="boton-iniciar-test-bonito">
                        Realizar orientación
                          <span class="flecha-btn">→</span>
                    </button>
                </a>
            </div>
    </section>

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










<br><br><br><br><br><br>
<br><br><br>

<br><br><br>
    
<footer>
    <br>
    <div class="footer-contenido">

        <div class="footer-columna">
            <h1>Acerca de</h1>
            <a href="">Nuestro equipo</a>
        <a href="<?php echo e(route('Normas')); ?>">Normas de la comunidad</a>
            <a href="">Sobre nosotros</a>

        </div>

        <div class="linea-vertical"></div>

                <div class="footer-columna">
            <h1>Recursos</h1>
            <a href="">Guía para padres</a>
            <a href="">Guía para maestros</a>

        </div>

        <div class="linea-vertical"></div>


        <div class="footer-columna">
            <h1>Contacto</h1>
            <a href="">Correo</a>
            <a href="">Teléfono</a>
            <a href="">Horarios</a>
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
</html><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/dislexia.blade.php ENDPATH**/ ?>