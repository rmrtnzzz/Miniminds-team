<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Normas de la comunidad | NEURO-MINIMINDS!</title>

        <link rel="stylesheet" href="<?php echo e(asset('css/frontend/normas.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/modo-oscuro/normasdark.css')); ?>">
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

</header>    





<div class="contenedorinfo" id="informacion">
    <main class="pagina-normas">
        <section class="intro-normas">

            <div class="intro-contenido">

                <h1>
                    Normas de la Comunidad
                <img src="<?php echo e(asset('/IMG/LOGO_NM.png')); ?>" class="LOGO">
                </h1>

                <p>
                    NEURO-MINIMINDS! es una plataforma orientada al
                    acompañamiento psicológico de la primera infancia.
                    Además de ofrecer información sobre desarrollo,
                    bienestar emocional y neurodivergencia, permite
                    gestionar citas y establecer contacto con especialistas.
                </p>

                <br>

                <p>
                    Debido a que la plataforma puede involucrar información
                    personal y sensible de niñas, niños, familias y
                    profesionales, estas normas buscan mantener un espacio
                    seguro, respetuoso y responsable.
                </p>

            </div>


            <div class="intro-imagen">

                <img src="<?php echo e(asset('IMG/oso-calma.png')); ?>"
                    alt="">

            </div>

        </section>



        <!-- =========================================================
            PRINCIPIOS
        ========================================================== -->

        <section class="normas-principales">

            <div class="titulo-seccion">

                <span>01</span>

                <h2>
                    Medidas ante incumplimientos
                </h2>

                <p>
                    Las medidas dependen de la gravedad, frecuencia
                    y contexto de cada incumplimiento.
                </p>

            </div>


            <div class="normas-grid">


                <!-- RESPETO -->

                <article class="norma-card">

                    <span class="norma-numero">
                        01
                    </span>

                    <h3>
                        Advertencia
                    </h3>


                    <p>
                        Para incumplimientos leves o aislados.
                    </p>

                    <ul>
                        <li>Comentarios ofensivos ocasionales.</li>
                        <li>Uso inadecuado del lenguaje.</li>
                        <li>Incumplir una norma de forma aislada.</li>
                    </ul>


                </article>



                <!-- INCLUSIÓN -->

                <article class="norma-card">

                    <span class="norma-numero">
                        02
                    </span>

                    <h3>
                        Retiro de contenido
                    </h3>

                    <p>
                        El contenido que incumpla las normas
                        puede ser eliminado.
                    </p>

                    <ul>
                        <li>Publicaciones inapropiadas.</li>
                        <li>Información falsa o engañosa.</li>
                        <li>Contenido que infrinja las normas de la comunidad.</li>
                    </ul>

                </article>



                <!-- RESPONSABILIDAD -->

                <article class="norma-card">

                    <span class="norma-numero">
                        03
                    </span>

                    <h3>
                        Restricción o suspensión
                    </h3>

                    <p>
                        Los incumplimientos repetidos o graves
                        pueden provocar restricciones o una
                        suspensión temporal.
                    </p>

                    <ul>
                        <li>Repetir conductas inapropiadas.</li>
                        <li>Acoso constante a otros usuarios.</li>
                        <li>Ignorar advertencias anteriores.</li>
                        <li>Incumplimientos graves de las normas.</li>
                    </ul>

                </article>



                <!-- PRIVACIDAD -->

                <article class="norma-card">


                    <span class="norma-numero">
                        04
                    </span>

                    <h3>
                        Baneo permanente
                    </h3>

                    <p>
                        Se reserva para las conductas más graves
                        que representen un riesgo serio para la
                        seguridad de la comunidad.
                    </p>

                    <ul>
                        <li>Amenazas graves.</li>
                        <li>Acoso grave o persistente.</li>
                        <li>Intentos de poner en peligro a otros usuarios.</li>
                        <li>Conductas que representen un riesgo serio para la comunidad.</li>
                    </ul>

                </article>

            </div>

        </section>



        <!-- =========================================================
            PROTECCIÓN DE LA PRIMERA INFANCIA
        ========================================================== -->

        <section class="proteccion">

            <div class="proteccion-imagen">

                <img src="<?php echo e(asset('IMG/proteccion-infantil.png')); ?>"
                    alt="Ilustración sobre protección de la primera infancia">

            </div>


            <div class="proteccion-contenido">

                <span class="etiqueta">
                    02 · PROTECCIÓN INFANTIL
                </span>

                <h2>
                    Conductas que pueden provocar un baneo permanente
                </h2>

                <p>
                    Algunas conductas son incompatibles con la seguridad
                    de NEURO-MINIMINDS! y pueden provocar la eliminación
                    permanente de la cuenta, sin necesidad de aplicar
                    previamente una advertencia.
                </p>


                <div class="proteccion-lista">

                    <div class="proteccion-item">
                        <span class="check">01</span>

                        <p>
                            Intentar contactar o manipular a una niña
                            o niño con fines inapropiados.
                        </p>
                    </div>


                    <div class="proteccion-item">
                        <span class="check">02</span>

                        <p>
                            Compartir o solicitar contenido relacionado
                            con la explotación o abuso sexual infantil.
                        </p>
                    </div>


                    <div class="proteccion-item">
                        <span class="check">03</span>

                        <p>
                            Utilizar información de usuarios o menores
                            para localizarlos, acosarlos o contactarlos
                            fuera de los canales autorizados.
                        </p>
                    </div>


                    <div class="proteccion-item">
                        <span class="check">04</span>

                        <p>
                            Amenazar o poner deliberadamente en riesgo
                            la integridad de una niña, niño u otra
                            persona de la comunidad.
                        </p>
                    </div>

                                        <div class="proteccion-item">
                        <span class="check">05</span>

                        <p>
                            Suplantar deliberadamente a un especialista
                            o representante de NEURO-MINIMINDS! para
                            obtener información o confianza.
                        </p>
                    </div>

                                        <div class="proteccion-item">
                        <span class="check">06</span>

                        <p>
                            Crear cuentas adicionales para evadir una
                            suspensión o continuar una conducta grave.
                        </p>
                    </div>


                </div>

            </div>

        </section>
                <div class="baneo-nota">

                    <strong>
                        ⚠️ Importante
                    </strong>

                    <p>
                        Las medidas podrán adaptarse a la gravedad y
                        circunstancias del caso. Cuando exista un posible
                        riesgo para una niña o niño, la situación podrá
                        recibir atención prioritaria y seguir los
                        procedimientos de protección correspondientes.
                    </p>

                </div>





        <!-- =========================================================
            COMENTARIOS
        ========================================================== -->

        <section class="comentarios-normas">

            <div class="comentarios-texto">

                <span class="etiqueta">
                    04 · PRIVACIDAD
                </span>

                <h2>
                    Protege la información de cada familia
                </h2>

                <p>
                    Debido a las características de NEURO-MINIMINDS!,
                        algunas cuentas pueden involucrar información
                        relacionada con citas, atención y desarrollo
                        infantil.
                </p>

                <p>
                        Esta información no debe publicarse en comentarios,
                        utilizarse para fines personales ni compartirse
                        con personas que no estén autorizadas.
                    </p>

                                            <strong>
                            🔐 Nunca compartas públicamente:
                        </strong>


                <div class="comentarios-reglas">

                    <div>
                        <span>✓</span>
                        <p>Datos personales de menores.</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Direcciones o teléfonos.</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Contraseñas.</p>
                    </div>

                    <div>
                        <span>✓</span>
                        <p>Información médica privada.</p>
                    </div>

                                        <div>
                        <span>✓</span>
                        <p>Fotografías privadas.</p>
                    </div>


                                        <div>
                        <span>✓</span>
                        <p>Información de citas o atención.</p>
                    </div>


                </div>

            </div>


            <div class="comentarios-ilustracion">

                <img src="<?php echo e(asset('IMG/comentarios.png')); ?>"
                    alt="Ilustración sobre comentarios respetuosos">

            </div>

        </section>



        <!-- =========================================================
            CITAS
        ========================================================== -->

        <section class="citas-normas">

            <div class="titulo-seccion">

                <span>05</span>

                <h2>
                    Uso responsable de las citas
                </h2>

                <p>
                    Las citas conectan a familias y responsables con
                    especialistas, por lo que deben utilizarse de manera
                    responsable y respetuosa.
                </p>

            </div>


            <div class="citas-grid">


                <article class="cita-card">

                    <span>📋</span>

                    <h3>
                        Información correcta
                    </h3>

                    <p>
                        Proporciona información verdadera y necesaria
                        al momento de gestionar una cita.
                    </p>

                </article>


                <article class="cita-card">

                    <span>📅</span>

                    <h3>
                        Citas reales
                    </h3>

                    <p>
                        No reserves citas deliberadamente si no existe
                        intención de utilizarlas.
                    </p>

                </article>


                <article class="cita-card">

                    <span>🔄</span>

                    <h3>
                        Cancelaciones
                    </h3>

                    <p>
                        Si necesitas cancelar o modificar una cita,
                        utiliza las opciones disponibles dentro
                        de la plataforma.
                    </p>

                </article>


                <article class="cita-card">

                    <span>🤝</span>

                    <h3>
                        Respeto profesional
                    </h3>

                    <p>
                        Respeta el tiempo, trabajo y disponibilidad
                        de los especialistas.
                    </p>

                </article>

            </div>

        </section>





        <!-- =========================================================
            PROFESIONALES
        ========================================================== -->

        <section class="profesionales">

            <div class="profesionales-imagen">

                <img src="<?php echo e(asset('IMG/profesional.png')); ?>"
                    alt="Ilustración relacionada con profesionales">

            </div>


            <div class="profesionales-contenido">

                <span class="etiqueta">
                    07 · PROFESIONALES
                </span>

                <h2>
                    Responsabilidad de los especialistas
                </h2>

                <p>
                    Los especialistas y personal autorizado tienen
                    responsabilidades adicionales debido al acceso
                    a información relacionada con usuarios y citas.
                </p>

                <ul>

                    <li>
                        Mantener la confidencialidad de la información.
                    </li>

                    <li>
                        Utilizar los datos únicamente para las funciones
                        autorizadas.
                    </li>

                    <li>
                        Mantener una comunicación profesional.
                    </li>

                    <li>
                        No utilizar la información de usuarios para
                        fines personales.
                    </li>

                    <li>
                        No contactar a usuarios fuera de los canales
                        autorizados con fines personales.
                    </li>

                </ul>

            </div>

        </section>



        <!-- =========================================================
            REPORTES
        ========================================================== -->

        <section class="reportes">

            <div class="reportes-imagen">

                <img src="<?php echo e(asset('IMG/reporte.png')); ?>"
                    alt="Ilustración sobre reportes">

            </div>


            <div class="reportes-contenido">

                <span class="etiqueta">
                    08 · REPORTAR
                </span>

                <h2>
                    Si algo no está bien, repórtalo
                </h2>

                <p>
                    Si encuentras contenido o comportamiento que
                    incumpla estas normas, utiliza las herramientas
                    de denuncia disponibles en la plataforma.
                </p>

                <p>
                    No necesitas enfrentarte directamente con la
                    persona involucrada. Una denuncia permite que
                    la situación sea revisada por quienes administran
                    NEURO-MINIMINDS!.
                </p>


                <a href="#" class="boton-principal">
                    Denunciar contenido
                </a>

            </div>

        </section>








        <!-- =========================================================
            FUENTES
        ========================================================== -->

        <section class="fuentes-normas">

            <div class="titulo-seccion">

                <span>11</span>

                <h2>
                    Fuentes y marco de referencia
                </h2>

                <p>
                    Estas normas se elaboraron tomando como referencia
                    recomendaciones de organismos especializados en
                    protección infantil y normativa relacionada con
                    la primera infancia en El Salvador.
                </p>

            </div>


            <div class="fuentes-grid">


                <!-- UNICEF SEGURIDAD -->

                <article class="fuente-card">

                    <span class="fuente-icono">
                        🛡️
                    </span>

                    <h3>
                        UNICEF · Seguridad infantil en línea
                    </h3>

                    <p>
                        Recomendaciones y principios para crear entornos
                        digitales más seguros para niñas y niños.
                    </p>

                    <a href="https://www.unicef.org/documents/child-safety-online"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="fuente-link">

                        Leer fuente oficial →

                    </a>

                </article>



                <!-- UNICEF DATOS -->

                <article class="fuente-card">

                    <span class="fuente-icono">
                        🔐
                    </span>

                    <h3>
                        UNICEF · Seguridad y protección de datos
                    </h3>

                    <p>
                        Orientaciones sobre seguridad digital y protección
                        de datos, incluyendo información relacionada
                        con niñas y niños.
                    </p>

                    <a href="https://www.unicef.org/digitaleducation/online-safety-and-data-protection"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="fuente-link">

                        Leer fuente oficial →

                    </a>

                </article>



                <!-- UNICEF PRIVACIDAD -->

                <article class="fuente-card">

                    <span class="fuente-icono">
                        👧
                    </span>

                    <h3>
                        UNICEF · Privacidad infantil
                    </h3>

                    <p>
                        Información sobre los riesgos relacionados con
                        la privacidad de niñas y niños en entornos
                        digitales.
                    </p>

                    <a href="https://www.unicef.org/childrightsandbusiness/reports/children-and-online-privacy"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="fuente-link">

                        Leer fuente oficial →

                    </a>

                </article>



                <!-- LEY CRECER JUNTOS -->

                <article class="fuente-card">

                    <span class="fuente-icono">
                        🇸🇻
                    </span>

                    <h3>
                        El Salvador · Ley Crecer Juntos
                    </h3>

                    <p>
                        Marco salvadoreño para la protección integral
                        de la primera infancia, niñez y adolescencia.
                    </p>

                    <a href="https://www.unicef.org/elsalvador/documents/ley-crecer-juntos"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="fuente-link">

                        Consultar normativa →

                    </a>

                </article>



                <!-- ASAMBLEA -->

                <article class="fuente-card">

                    <span class="fuente-icono">
                        ⚖️
                    </span>

                    <h3>
                        Asamblea Legislativa de El Salvador
                    </h3>

                    <p>
                        Información legislativa relacionada con la
                        protección de la primera infancia, niñez
                        y adolescencia.
                    </p>

                    <a href="https://www.asamblea.gob.sv/taxonomy/term/2136"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="fuente-link">

                        Consultar fuente →

                    </a>

                </article>

            </div>


        </section>

    </main>
</div>










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

</html><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/Normas.blade.php ENDPATH**/ ?>