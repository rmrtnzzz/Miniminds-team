<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href=""><title>Inicio</title></a>
        <link rel="stylesheet" href="<?php echo e(asset('css/frontend/home.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/homedark.css')); ?>">
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

                    <h3>Neuro-MiniMinds</h3>

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

            <div class="NAVBARCONTENIDO">
                    <div class="navbar-wrapper">

                        <div class="navbar-container">
                            <div class="navbar-content">
                                <nav class="navbar">

                                    
                                    <a href="<?php echo e(route('home')); ?>">
                                    <button class="nav-btn">Inicio</button></a>
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

                            <a href="#neurodiversidades"><button class="dropdown-item">
                            Neurodiversidades
                            </button></a>


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




            <div class="hero-contenido">

                <img src="<?php echo e(asset('/IMG/LOGO_NM.png')); ?>" class="LOGO">

                    <p class="descripcion-hero">
                        APOYO AL DESARROLLO DE INFANCIAS SANAS Y ADAPTIVAS
                    </p>

                    <a href="#informacion" class="hero-btn">
                        Conocer más
                    </a>

                    <p class="desliza">
                        ↓ Desliza para descubrir más
                    </p>

        </div>


</header>

<div class="contenedorinfo" id="informacion">

        <section class="aboutsecc1">

            <div class="about-img">

                <img src="<?php echo e(asset('/IMG/SOPHI PNG.png')); ?>" alt="MiniMinds">

            </div>

            <div class="about-info">
                <h2>
                    ¿Qué es Neuro-MiniMinds?
                </h2>

                <p>
                    MiniMinds es una plataforma creada para acompañar el desarrollo infantil
                    desde la gestación hasta los 12 años de edad. Aquí encontrarás
                    información confiable, recursos interactivos, orientación para
                    familias y apoyo de profesionales, promoviendo una infancia sana
                    y adaptativa.
                </p>

                <div class="about-caracteristicas">

                    <div class="about-item">
                        <img src="<?php echo e(asset('/IMG/SOPHI PNG.png')); ?>" alt="">
                        <span>Información confiable</span>
                    </div>

                    <div class="about-item">
                        <img src="<?php echo e(asset('/IMG/SOPHI PNG.png')); ?>" alt="">
                        <span>Lenguaje sencillo</span>
                    </div>

                    <div class="about-item">
                        <img src="<?php echo e(asset('/IMG/SOPHI PNG.png')); ?>" alt="">
                        <span>Apoyo profesional</span>
                    </div>

                </div>
            </div>

                                <img src="<?php echo e(asset('IMG/DIBUJOS/mancha1.svg')); ?>" class="mancha m1">


                                


        </section>



            <section class="equipo-miniminds">

                <div class="equipo-encabezado">

                    <span class="etiqueta-equipo">MINIMINDS</span>

                    <h1>Tu equipo de apoyo</h1>

                    <p>
                         Conoce a los personajes que te acompañaran durante tu recorrido
                    por Neuro-MiniMinds. Cada uno tiene una función especial para orientarte,
                    resolver tus dudas y guiarte a travez de la plataforma.
                    </p>

                </div>


                <div class="personajes-contenedor">


                    <!-- PERSONAJE 1 -->

                    <article class="personaje-card">

                        <div class="personaje-card-inner">

                            <div class="personaje-frente">

                                <span class="personaje-numero">01</span>

                                <div class="personaje-imagen">

                                    <img
                                        src="<?php echo e(asset('/IMG/KELLY PNG.png')); ?>"
                                        alt="Personaje 1 de MiniMinds"
                                    >

                                </div>

                                <div class="personaje-nombre">

                                    <h2>NILO</h2>

                                    <span>Conoce más →</span>

                                </div>

                            </div>


                            <div class="personaje-atras p1">

                                <span class="personaje-numero">01</span>

                                <span class="personaje-funcion">
                                    SE ENCARGA DE
                                </span>

                                <h2>INFORMACIÓN</h2>

                                <p>
                                   Es el principal guía de NEURO-MINIMINDS!. Ayuda a encontrar información, conocer los servicios y comprender los recursos disponibles dentro de la plataforma.
                                </p>

                                <div class="linea-nilo"></div>

                                <span class="volver">
                                    Pasa el mouse para volver
                                </span>

                            </div>

                        </div>

                    </article>



                    <!-- PERSONAJE 2 -->

                    <article class="personaje-card">

                        <div class="personaje-card-inner">

                            <div class="personaje-frente">

                                <span class="personaje-numero">02</span>

                                <div class="personaje-imagen">

                                    <img
                                        src="<?php echo e(asset('/IMG/personaje2.png')); ?>"
                                        alt="Personaje 2 de MiniMinds"
                                    >

                                </div>

                                <div class="personaje-nombre">

                                    <h2>KAIRO</h2>

                                    <span>Conoce más →</span>

                                </div>

                            </div>


                            <div class="personaje-atras p2">

                                <span class="personaje-numero">02</span>

                                <span class="personaje-funcion">
                                    SE ENCARGA DE
                                </span>

                                <h2>Apoyar al especialista</h2>

                                <p>
                                   Acompaña al especialista durante la atención, ayudando con la gestión de citas, el seguimiento de pacientes y las herramientas necesarias para su trabajo.
                                </p>

                                <div class="linea-kairo"></div>

                                <span class="volver">
                                    Pasa el mouse para volver
                                </span>

                            </div>

                        </div>

                    </article>



                    <!-- PERSONAJE 3 -->

                    <article class="personaje-card">

                        <div class="personaje-card-inner">

                            <div class="personaje-frente">

                                <span class="personaje-numero">03</span>

                                <div class="personaje-imagen">

                                    <img
                                        src="<?php echo e(asset('/IMG/personaje3.png')); ?>"
                                        alt="Personaje 3 de MiniMinds"
                                    >

                                </div>

                                <div class="personaje-nombre">

                                    <h2>PIPO</h2>

                                    <span>Conoce más →</span>

                                </div>

                            </div>


                            <div class="personaje-atras p3">

                                <span class="personaje-numero">03</span>

                                <span class="personaje-funcion">
                                    SE ENCARGA DE 
                                </span>

                                <h2>Guía tecnológica</h2>

                                <p>
                                    Ayuda a los usuarios a utilizar NEURO-MINIMINDS!, orientándolos con sus cuentas, registros, navegación y las diferentes funciones de la plataforma.
                                </p>

                                <div class="linea-pipo"></div>

                                <span class="volver">
                                    Pasa el mouse para volver
                                </span>

                            </div>

                        </div>

                    </article>



                    <!-- PERSONAJE 4 -->

                    <article class="personaje-card">

                        <div class="personaje-card-inner">

                            <div class="personaje-frente">

                                <span class="personaje-numero">04</span>

                                <div class="personaje-imagen">

                                    <img
                                        src="<?php echo e(asset('/IMG/personaje4.png')); ?>"
                                        alt="Personaje 4 de MiniMinds"
                                    >

                                </div>

                                <div class="personaje-nombre">

                                    <h2>LUMA</h2>

                                    <span>Conoce más →</span>

                                </div>

                            </div>


                            <div class="personaje-atras p4">

                                <span class="personaje-numero">04</span>

                                <span class="personaje-funcion">
                                    SE ENCARGA DE
                                </span>

                                <h2>Acompañar al paciente</h2>

                                <p>
                                    Acompaña al paciente durante su proceso, ayudándolo con recordatorios, citas, actividades e información importante para que pueda mantenerse orientado.
                                </p>

                                <div class="linea-luma"></div>

                                <span class="volver">
                                    Pasa el mouse para volver
                                </span>

                            </div>

                        </div>

                    </article>

                </div>

            </section>




        <section class="explorasecc1">

            <div class="explora-info">


                <h2>
                    Servicios de apoyo
                    
                </h2>

                <p>
                    Encuentra información, herramientas y recursos
                    pensados para acompañar cada etapa del desarrollo
                    infantil y apoyar a familias, docentes y profesionales.
                </p>


            </div>

            <div class="explora-cards">

                <div class="explora-card padres">

                    <img src="<?php echo e(asset('/IMG/DIBUJOS/gael1.svg')); ?>" alt="">

                    <h3>Para familias</h3>

                    <p>
                        Consejos, guías y actividades para acompañar
                        el crecimiento de tus hijos.
                    </p>

                </div>

                <div class="explora-card maestros">

                    <img src="<?php echo e(asset('/IMG/DIBUJOS/para maestros.svg')); ?>" alt="">

                    <h3>Para docentes</h3>

                    <p>
                        Recursos educativos y estrategias para
                        una enseñanza inclusiva.
                    </p>

                </div>

                <div class="explora-card juegos">

                    <img src="<?php echo e(asset('/IMG/DIBUJOS/juegos.svg')); ?>" alt="">

                    <h3>Juegos y actividades</h3>

                    <p>
                        Aprende mientras juegas con actividades
                        diseñadas para cada edad.
                    </p>

                </div>

            </div>

        </section>





<br>

            <section class="carrusel" id="neurodiversidades">

                <button class="flecha prev">←</button>

                <div class="slider">

                    <div class="slide activo">

                        <div class="slide-texto">
                            <h2>DISLEXIA</h2>

                            <p>
                                La dislexia es un trastorno específico del aprendizaje de origen neurobiológico. Provoca dificultades para leer, escribir y deletrear con precisión y fluidez. No está relacionada con la inteligencia y ocurre porque el cerebro procesa los sonidos del lenguaje de manera diferente.
                            </p>

                            <a href="<?php echo e(route('dislexia')); ?>"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                            <img src="<?php echo e(asset('/IMG/dislexia.jpg')); ?>" alt="" class="">
                        </div>

                    </div>

                    
                    <div class="slide">

                        <div class="slide-texto">
                            <h2>TEA</h2>

                            <p>
                                El Trastorno del Espectro Autista (TEA) es una condición del neurodesarrollo que afecta la manera en que una persona percibe y se relaciona con el mundo. Sus características principales incluyen dificultades en la comunicación social, la interacción con otros y la presencia de comportamientos o intereses repetitivos.      
                                    </p>

                            <a href="<?php echo e(route('divergencia')); ?>"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                        <img src="<?php echo e(asset('/IMG/tea.jpg')); ?>" alt="">
                        </div>

                    </div>

                    <div class="slide">

                        <div class="slide-texto">
                            <h2>TDAH</h2>

                            <p>
                                El TDAH (Trastorno por Déficit de Atención e Hiperactividad) es una condición neurobiológica del desarrollo que suele manifestarse en la infancia y, a menudo, persiste en la edad adulta. Se caracteriza principalmente por tres síntomas: dificultad para mantener la atención (inatención), exceso de movimiento (hiperactividad) y dificultad para controlar reacciones (impulsividad).
                        </p>

                            <a href=""><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                        <img src="<?php echo e(asset('/IMG/tdah.jpg')); ?>" alt="">
                        </div>

                    </div>

                    <div class="slide">

                        <div class="slide-texto">
                            <h2>DISPRAXIA</h2>

                            <p>
                                La dispraxia (o trastorno del desarrollo de la coordinación) es un trastorno del neurodesarrollo que dificulta la planificación y ejecución de movimientos físicos coordinados. Afecta las habilidades motoras finas y gruesas, haciendo que tareas cotidianas parezcan lentas o torpes, aunque no existe ningún problema en los músculos.           
                            </p>

                            <a href=""><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                        <img src="<?php echo e(asset('/IMG/dispraxia.jpg')); ?>" alt="">
                        </div>

                    </div>

                            <div class="slide">

                        <div class="slide-texto">
                            <h2>DISCALCULIA</h2>

                            <p>
                                La discalculia es un trastorno específico del aprendizaje que dificulta la comprensión de conceptos numéricos y el cálculo matemático. Ocurre por diferencias neurobiológicas en cómo el cerebro procesa la información numérica, no por falta de esfuerzo o mala enseñanza.
                                La discalculia afecta exclusivamente al procesamiento numérico y espacial, por lo que es completamente independiente del coeficiente intelectual         
                            </p>

                            <a href="<?php echo e(route('discalculia')); ?>"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>






                        <div class="slide-imagen">
                        <img src="<?php echo e(asset('/IMG/dISCALCULIA.jpg')); ?>" alt="">
                        </div>

                    </div>





                </div>

                <button class="flecha next">→</button>

                <div class="indicadores"></div>

            </section>


</div>

<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>




<!-- ===== Secciones traídas del backend: Cerebro 3D + Comunidad ===== -->
<link href="<?php echo e(asset('css/frontend/home-extra.css')); ?>" rel="stylesheet">

<div class="mm-extra-sections">

    <section class="cerebro3d-section" id="cerebro3d">
        <h2 class="section-title">Explora un cerebro en 3D</h2>
        <p class="section-intro">Una experiencia interactiva pensada para que niños y familias descubran, jugando, cómo funciona el cerebro.</p>
        <?php echo $__env->make('partials.cerebro-brain', ['height' => '560px', 'showHeader' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div style="text-align:center;margin-top:20px;">
            <a href="<?php echo e(route('juegos.cerebro')); ?>" class="btn-hero-out">Abrir en pantalla completa →</a>
        </div>
    </section>

    <div class="checker"></div>

    <section class="seccion-info" id="comunidad">

        <h1 class="titulo-seccion">Lo que dice la comunidad</h1>

        <p class="texto-intro">Experiencias publicadas por nuestra comunidad, actualizadas en tiempo real.</p>

        <div id="feed-list" class="contenedor-tarjetas"></div>
        <p id="feed-empty" class="mm-feed-empty">Todavía no hay publicaciones. ¡Sé el primero en compartir tu experiencia!</p>

        <?php if(auth()->guard()->check()): ?>
        <a href="<?php echo e(route('experiencias.create')); ?>" class="boton-abajo">Comparte tu experiencia</a>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>" class="boton-abajo">Inicia sesión para publicar</a>
        <?php endif; ?>
    </section>

</div>

<script src="<?php echo e(asset('js/home/comunidad-feed.js')); ?>"></script>
<script>initComunidadFeed('<?php echo e(route('experiencias.feed')); ?>');</script>

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

</html><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/home.blade.php ENDPATH**/ ?>