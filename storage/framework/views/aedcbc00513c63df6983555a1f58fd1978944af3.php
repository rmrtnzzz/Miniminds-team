<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEA-Neurodivergencia</title>
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


                            <a class="dropdown-item" href="<?php echo e(route('tda')); ?>">Diagnóstico TDA</a>
                            <a class="dropdown-item" href="<?php echo e(route('tdah')); ?>">Diagnóstico TDAH</a>
                            <a class="dropdown-item" href="<?php echo e(route('adaptacion')); ?>">Adaptación</a>

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




                            <a class="dropdown-item" href="<?php echo e(route('padres')); ?>">Guía para padres</a>

                                    <a class="dropdown-item" href="<?php echo e(route('maestros')); ?>">Guía para maestros</a>
                                    <a class="dropdown-item" href="<?php echo e(route('padresymaestros')); ?>">Guía para padres y maestros</a>

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
            Neurodivergencias y desarrollo infantil
        </p>

        <h1 class="titulo-hero">
            TRANSTORNO DEL ESPECTRO AUTISTA
        </h1> 

                <p class="desliza">↓ Desliza hacia abajo ↓</p>


    </div>
</header>




<div class="contenedorinfo">
        <div class="qes">

            <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>" alt="" class="">

            <!-- info 1 que es -->
            <div class="qes-texto">
                <br>
                <p>
                    El Trastorno del Espectro Autista (TEA) es una condición del neurodesarrollo que influye en la manera en que una persona percibe el mundo, procesa la información, se comunica y se relaciona con quienes la rodean. A diferencia de una enfermedad, el autismo no se contagia, no aparece por una mala crianza y tampoco existe una cura, ya que forma parte de la persona durante toda su vida.

                    <br><br>

                    Las personas con TEA tienen una forma diferente de experimentar su entorno. Esto significa que pueden interpretar los sonidos, las luces, las emociones o las interacciones sociales de una manera distinta a la mayoría de las personas. Estas diferencias no representan una limitación en sí mismas; simplemente muestran que existen diversas maneras de aprender, comprender y desenvolverse en la sociedad.

                    <br><br>

                    El autismo acompaña a la persona desde la infancia, aunque en algunos casos sus características pueden identificarse más tarde. Gracias al apoyo familiar, educativo y profesional, muchas personas autistas desarrollan habilidades que les permiten alcanzar una vida plena e independiente, siempre respetando su forma de ser y sus necesidades particulares.
                </p>
            </div>

                    <img src="<?php echo e(asset('IMG/DIBUJOS/mancha1.svg')); ?>" class="mancha m1">


        </div>

    <br><br><br><br><br>

    
    <!-- info 2 por que -->

    <section class="seccion-bloque pq-destacado">
        <div class="tarjeta-blanca-destacada">
            <div class="pq-contenido-grid">
                <div class="pq-texto-col">
                    <h1>¿Por qué se llama "espectro"?</h1>
                    <p>
                        El término "espectro" hace referencia a la enorme diversidad que existe entre las personas con autismo. No hay un único tipo de TEA ni dos personas que lo vivan exactamente de la misma manera.
                    </p>
                    <p>
                        Mientras algunos niños desarrollan el lenguaje desde edades tempranas y asisten a escuelas regulares con pocas adaptaciones, otros pueden presentar dificultades importantes para comunicarse verbalmente y requerir apoyo constante en sus actividades diarias. Del mismo modo, algunas personas pueden sentirse cómodas en ambientes concurridos, mientras que otras experimentan una gran sensibilidad ante el ruido, las luces o el contacto físico.
                    </p>
                    <p>
                        Estas diferencias hacen que el autismo no pueda entenderse como una escala de "más" o "menos" autismo, sino como una condición con múltiples formas de manifestarse. Cada persona posee fortalezas, intereses, desafíos y necesidades únicas que deben ser comprendidas de forma individual.
                    </p>
                </div>
                <div class="pq-img-col">
                    <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>" alt="Ilustración Espectro Autista">
                </div>
            </div>
        </div>
    </section>

    <!-- info 3 como funciona -->

    <section class="seccion-bloque funciona">
        <span class="badge-subtitulo">Comprendiendo la Neurodiversidad</span>
        <h1>¿Cómo funciona?</h1>
        
        <p class="descripcion-intro">
            El TEA afecta diferentes áreas del desarrollo de forma única. El cerebro de las personas con TEA se desarrolla de forma distinta desde las primeras etapas, influyendo en la manera en que procesan la información, aprenden y se comunican.
        </p>

        <div class="contenedor-funciona">
            <!-- IZQUIERDA -->
            <div class="lado izquierdo">
                <div class="card-funciona">                    <div>
                        <h3>Interacción social</h3>
                        <p>Diferencias en la forma de conectar y comprender los códigos sociales implícitos.</p>
                    </div>
                </div>

                <div class="card-funciona">
                    <div>
                        <h3>Comunicación</h3>
                        <p>Variabilidad en la expresión verbal y no verbal, desde lenguaje literal hasta uso de apoyos gráficos.</p>
                    </div>
                </div>

                <div class="card-funciona">
                    <div>
                        <h3>Emociones</h3>
                        <p>Expresión e identificación de sentimientos desde una perspectiva propia y profunda.</p>
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
                        <h3>Procesamiento sensorial</h3>
                        <p>Mayor o menor sensibilidad ante estímulos del entorno como sonidos o luces.</p>
                    </div>
                </div>

                <div class="card-funciona">
                    <div>
                        <h3>Rutinas y cambios</h3>
                        <p>Preferencia por la predictibilidad y estructura para brindar seguridad emocional.</p>
                    </div>
                </div>

                <div class="card-funciona">

                    <div>
                        <h3>Intereses especiales</h3>
                        <p>Enfoque apasionado e intenso en temas específicos de alto conocimiento.</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <p class="indicador-interaccion"> Toca el cerebro o los botones para explorar cada zona </p>
    </section>

    <!-- info 4 conexion -->

    <section class="seccion-bloque desarrollo-contenedor">
        <div class="qes tarjeta-suave">
            <div class="qes-imagen-wrapper">
                <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>" alt="Ilustración Redes Neuronales">
            </div>
            <div class="qes-texto">
                <h1>Conexiones neuronales</h1>
                <p>
                    El cerebro está formado por aproximadamente 86 mil millones de neuronas que se comunican mediante sinapsis para procesar información. En personas con TEA, los estudios muestran patrones únicos de organización neuronal: algunas áreas presentan hiperconectividad (conexiones intensas cercanas) y otras hipoconectividad, creando rutas de procesamiento singulares.
                </p>
            </div>
        </div>

        <!-- Procesamiento Sensorial -->
        <div class="bloque-sensorial">
            <div class="encabezado-centrado">
                <h1>Procesamiento sensorial</h1>
                <p class="texto-ancho">
                    Las personas con TEA pueden experimentar el mundo sensorial de manera distinta. El cerebro interpreta los estímulos con intensidades variadas, lo cual influye en la vida cotidiana, el aprendizaje y el bienestar.
                </p>
            </div>

            <div class="contenedor-sentidos">
                <div class="sentidos">
                    <div class="icono-sentido">👂</div>
                    <h3>Audición</h3>
                    <p>Sonidos cotidianos como alarmas o electrodomésticos pueden percibirse extremadamente intensos o incómodos.</p>
                </div>

                <div class="sentidos">
                    <div class="icono-sentido">👁️</div>
                    <h3>Vista</h3>
                    <p>Luces brillantes, parpadeos o entornecimientos visuales concurridos pueden generar saturación.</p>
                </div>

                <div class="sentidos">
                    <div class="icono-sentido">✋</div>
                    <h3>Tacto</h3>
                    <p>Sensibilidad especial a texturas de ropa o contacto físico, necesitando a veces estimulación o presión profunda.</p>
                </div>

                <div class="sentidos">
                    <div class="icono-sentido">👃</div>
                    <h3>Olfato y Gusto</h3>
                    <p>Detección aguda de olores sutiles y alta selectividad ante sabores o texturas alimentarias.</p>
                </div>
            </div>
        </div>

        <!-- Flexibilidad Cognitiva -->
        <div class="qes tarjeta-suave inverso">
            <div class="qes-texto">
                <h1>Flexibilidad cognitiva</h1>
                <p>
                    La flexibilidad cognitiva permite adaptarse a situaciones nuevas y cambiar de planes. En el TEA, los cambios inesperados pueden requerir mayor tiempo de autorregulación. Por ello, las rutinas predecibles aportan calma y estabilidad, facilitando un entorno seguro para desenvolverse con confianza.
                </p>
            </div>
            <div class="qes-imagen-wrapper">
                <img src="<?php echo e(asset('/IMG/LOGOTEMp.png')); ?>" alt="Ilustración Flexibilidad Cognitiva">
            </div>
        </div>
    </section>
    
    <!-- info 5 nvieles -->

    <section class="seccion-bloque niveles-seccion">
        <div class="random">
            <h1>Niveles del TEA (DSM-5)</h1>
            <p>
                El Manual Diagnóstico y Estadístico de los Trastornos Mentales (DSM-5) establece tres niveles de severidad para orientar el grado de ayuda necesario:
            </p>
        </div>

        <div class="cards">
            <!-- Nivel 1 -->
            <div class="card rosa">
                <div class="icon">
                    <h1>1</h1>
                </div>
                <h3>Requiere apoyo</h3>
                <p class="short">
                    Presentan dificultades en la interacción social y comunicación, pero se desenvuelven de manera autónoma con los apoyos adecuados.
                </p>
                <button class="toggle">
                    Ver más detalles <span>▼</span>
                </button>
                <div class="extra">
                    <p>Comunicación social</p>
                    <ul>
                        <li>Dificultad para iniciar o mantener conversaciones fluidas.</li>
                        <li>Retos para interpretar el lenguaje figurado o gestual.</li>
                    </ul>
                    <p>Flexibilidad conductual</p>
                    <ul>
                        <li>Intereses focalizados e intensos.</li>
                        <li>Incomodidad ante cambios imprevistos de rutina.</li>
                    </ul>
                </div>
            </div>

            <!-- Nivel 2 -->
            <div class="card naranja">
                <div class="icon">
                    <h1>2</h1>
                </div>
                <h3>Requiere apoyo sustancial</h3>
                <p class="short">
                    Desafíos más notables en la comunicación verbal y adaptabilidad conductual que requieren intervenciones continuas.
                </p>
                <button class="toggle">
                    Ver más detalles <span>▼</span>
                </button>
                <div class="extra">
                    <p>Comunicación social</p>
                    <ul>
                        <li>Frases sencillas y comunicación no verbal acentuada.</li>
                        <li>Limitación clara en la interacción e intercambio social.</li>
                    </ul>
                    <p>Flexibilidad conductual</p>
                    <ul>
                        <li>Apego significativo a rutinas establecidas.</li>
                        <li>Conductas repetitivas para la autorregulación.</li>
                    </ul>
                </div>
            </div>

            <!-- Nivel 3 -->
            <div class="card azul">
                <div class="icon">
                    <h1>3</h1>
                </div>
                <h3>Requiere apoyo muy sustancial</h3>
                <p class="short">
                    Necesidades intensas en la vida diaria con un grado alto de acompañamiento individualizado en todos los entornos.
                </p>
                <button class="toggle">
                    Ver más detalles <span>▼</span>
                </button>
                <div class="extra">
                    <p>Comunicación social</p>
                    <ul>
                        <li>Comunicación no verbal o de muy pocas palabras.</li>
                        <li>Interacción limitada a la expresión de necesidades básicas.</li>
                    </ul>
                    <p>Flexibilidad conductual</p>
                    <ul>
                        <li>Gran malestar ante alteración de entornos.</li>
                        <li>Requerimiento de apoyo especializado permanente.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="random nota-aclaratoria">
            <p>
                <span>Nota importante:</span> Los niveles señalan las necesidades de apoyo en un momento determinado y no definen el potencial personal ni las capacidades de desarrollo de cada individuo.
            </p>                
        </div>
    </section>


    <!-- info 6 test -->

    <section class="seccion-test-redisenada container-general">
            <div class="test-header">
                <span class="test-badge">Herramienta de Guía</span>
                <h1 class="test-titulo">TEA TEST</h1>
                <p class="test-descripcion">Responde nuestro test de referencia para obtener orientación inicial y entender mejor las necesidades de apoyo.</p>
            </div>

            <div class="test-footer-info">
                <div class="advertencia-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#856404" stroke-width="2"/><path d="M12 8V12" stroke="#856404" stroke-width="2" stroke-linecap="round"/><path d="M12 16H12.01" stroke="#856404" stroke-width="2" stroke-linecap="round"/></svg>
                    <p class="test-nota-importante">
                        **Importante:** Este test es solo una herramienta de referencia y **no reemplaza** una evaluación profesional ni debe utilizarse para un autodiagnóstico. Los resultados sirven como información complementaria para orientar a un especialista.
                    </p>
                </div>
                
                <a href="" class="boton-test-wrapper">
                    <button class="boton-iniciar-test-bonito">
                        Iniciar Test
                        <span class="flecha-btn">→</span>
                    </button>
                </a>
            </div>
    </section>

    


    <!-- info 7 footer -->


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
            <a href="<?php echo e(route('padres')); ?>">Guía para padres</a>
            <a href="<?php echo e(route('maestros')); ?>">Guía para maestros</a>
            <a href="<?php echo e(route('padresymaestros')); ?>">Padres y maestros</a>
            <a href="<?php echo e(route('adaptacion')); ?>">Adaptación</a>

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
</html><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/divergencia.blade.php ENDPATH**/ ?>