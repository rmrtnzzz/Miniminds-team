<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía para Maestros — Miniminds</title>
                <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/paginas/maestros.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">

    <script src="{{ asset('js/frontend/frontend-nav.js') }}" defer></script>
</head>
<body>


<header>
        <div class="NAVBARCONTENIDO scrolled">
                    <div class="navbar-wrapper">
                        <div class="navbar-container">
                            <div class="navbar-content">
                                <nav class="navbar">

                                <a href="{{ route('home') }}"><button class="nav-btn">Inicio</button></a>

                    <div class="nav-item">

                        <button class="nav-btn dropdown-toggle">

                            Información

                            <svg class="chevron" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 4L6 8L10 4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>

                        <div class="dropdown">

                            <a class="dropdown-item" href="{{ route('divergencia') }}">Neurodiversidades</a>
                            <a class="dropdown-item" href="{{ route('tda') }}">Diagnóstico TDA</a>
                            <a class="dropdown-item" href="{{ route('tdah') }}">Diagnóstico TDAH</a>
                            <a class="dropdown-item" href="{{ route('adaptacion') }}">Adaptación</a>

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

                            <a class="dropdown-item" href="{{ route('padres') }}">Guía para padres</a>
                            <a class="dropdown-item" href="{{ route('maestros') }}">Guía para maestros</a>
                            <a class="dropdown-item" href="{{ route('padresymaestros') }}">Guía para padres y maestros</a>

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

                                <a href="{{ route('contacto') }}"><button class="nav-btn">Contacto</button></a>

                                </nav>

                            </div>
        </div>

    {{--ENGRANAJE PARA OPCIONES DE IDIOMA Y MODO OSCURO-CLARO Y VENTANA EMERGENTE--}}

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

            @auth
                        <a href="{{ auth()->user()->panelUrl() }}"><button class="iniciar2">Mi Panel</button></a>
                        @else
                        <a href="{{ route('login') }}"><button class="iniciar">Iniciar sesión</button></a>
                        <a href="{{ route('register') }}"><button class="iniciar2">Registrarse</button></a>
                        @endauth

        </div>

            </div>

        </div>


<img src="{{ asset('/IMG/maestrosbanner.jpg') }}" alt="" class="imagenHero">

    <div class="hero-contenido">
        <p class="subtitulo-hero">Estrategias para un aula inclusiva</p>
        <h1 class="titulo-hero">GUÍA PARA MAESTROS</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionEspecificaMaestros">
        <div class="cuadroIntroAula">
            <div class="textoIntroAula">
                <h1>El aula como espacio de aprendizaje inclusivo</h1>
                <p>
                    Adaptar el entorno educativo beneficia a todo el grupo escolar. Las adaptaciones no significan reducir exigencias, sino proporcionar vías diversas para que cada estudiante comprenda, participe y demuestre lo aprendido según sus fortalezas.
                </p>
            </div>
            <div class="imagenIntroAula">
                <img src="{{ asset('/IMG/aulaInclusiva.jpg') }}" alt="" class="imagenAulaEscolar">
            </div>
        </div>
    </section>

    <section class="seccionEspecificaMaestros">
        <span class="badgeSubtituloSeccion">Metodología en el aula</span>
        <h1 class="tituloSeccionCentral">Adaptaciones Pedagógicas Principales</h1>

        <div class="filasAdaptacionesMaestros">
            <div class="bloqueFilaMetodologia">
                <div class="cabeceraFila">
                    <span class="iconoFila">01</span>
                    <h3>Organización del Espacio y Estímulos</h3>
                </div>
                <p>Ubicación estratégica cerca del docente o lejos de distracciones visuales/auditivas intensas. Uso de rincones tranquilos para pausas breves de autorregulación.</p>
            </div>

            <div class="bloqueFilaMetodologia">
                <div class="cabeceraFila">
                    <span class="iconoFila">02</span>
                    <h3>Presentación de las Actividades</h3>
                </div>
                <p>Segmentar tareas largas en instrucciones cortas y numeradas. Incorporar apoyos visuales, esquemas gráficos y materiales manipulativos prácticos.</p>
            </div>

            <div class="bloqueFilaMetodologia">
                <div class="cabeceraFila">
                    <span class="iconoFila">03</span>
                    <h3>Evaluación Diversificada</h3>
                </div>
                <p>Ofrecer opciones para responder de forma oral, mediante proyectos prácticos o respuestas cortas, respetando los tiempos de procesamiento del estudiante.</p>
            </div>
        </div>
    </section>

    <section class="seccionEspecificaMaestros">
        <h1 class="tituloSeccionCentral">Estrategias Específicas por Necesidad</h1>

        <div class="contenedorDesplegableMaestros">
            <div class="tarjetaDesplegableAula">
                <button type="button" class="botonToggleMaestros">
                    <span>Atención y Funciones Ejecutivas</span>
                    <span class="signoDesplegable">+</span>
                </button>
                <div class="contenidoDesplegableAula">
                    <ul>
                        <li>Uso de temporizadores visuales para marcar tiempos de trabajo.</li>
                        <li>Pausas activas cortas entre clases extensas.</li>
                        <li>Verificación individual del inicio de la tarea.</li>
                    </ul>
                </div>
            </div>

            <div class="tarjetaDesplegableAula">
                <button type="button" class="botonToggleMaestros">
                    <span>Procesamiento Sensorial en el Colegio</span>
                    <span class="signoDesplegable">+</span>
                </button>
                <div class="contenidoDesplegableAula">
                    <ul>
                        <li>Anticipación previa de timbres o simulacros ruidosos.</li>
                        <li>Permiso para usar auriculares con cancelación en momentos de trabajo individual.</li>
                        <li>Flexibilidad postural durante lecturas prolongadas.</li>
                    </ul>
                </div>
            </div>

            <div class="tarjetaDesplegableAula">
                <button type="button" class="botonToggleMaestros">
                    <span>Interacción Social y Trabajo en Equipo</span>
                    <span class="signoDesplegable">+</span>
                </button>
                <div class="contenidoDesplegableAula">
                    <ul>
                        <li>Asignación clara de roles concretos dentro de los grupos.</li>
                        <li>Sensibilización empática hacia la diversidad en la clase.</li>
                        <li>Mediación serena en situaciones de conflicto o desacuerdo.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionEspecificaMaestros">
        <h1 class="tituloSeccionCentral">Protocolo de Actuación ante Sobrecarga</h1>

        <div class="cuadroProtocoloPasos">
            <div class="tarjetaPasoProtocolo">
                <div class="numeroProtocolo">1</div>
                <h4>Detectar Señales</h4>
                <p>Identificar inquietud motora o aislamiento antes de que ocurra el malestar.</p>
            </div>

            <div class="tarjetaPasoProtocolo">
                <div class="numeroProtocolo">2</div>
                <h4>Ofrecer Espacio</h4>
                <p>Invitar de forma discreta al rincón tranquilo sin exponerlo ante sus compañeros.</p>
            </div>

            <div class="tarjetaPasoProtocolo">
                <div class="numeroProtocolo">3</div>
                <h4>Validar Emoción</h4>
                <p>Mantener un tono bajo y dar tiempo para restablecer la calma sin presionar.</p>
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

@include('components.footer')
</footer>


</body>
</html>
