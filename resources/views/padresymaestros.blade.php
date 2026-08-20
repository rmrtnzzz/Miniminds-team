<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía para Padres y Maestros — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
            <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/contenido-dark-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/paginas/padresmaestros.css') }}">
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


<img src="{{ asset('/IMG/padresmaestrosbanner.jpg') }}" alt="" class="imagenHero">

    <div class="hero-contenido">
        <p class="subtitulo-hero">Acompañamiento en el hogar y la escuela</p>
        <h1 class="titulo-hero">PORTAL PADRES Y MAESTROS</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionGeneralHub">
        <div class="bloqueBannerIntro">
            <div class="textoBannerIntro">
                <h1>Trabajo en equipo para el desarrollo infantil</h1>
                <p>
                    El bienestar de los niños neurodivergentes se fortalece cuando la familia y los educadores caminan en la misma dirección. Este espacio conecta las pautas del hogar con las estrategias del aula para ofrecer un apoyo coherente y constante.
                </p>
            </div>
            <div class="imagenBannerIntro">
                <img src="{{ asset('/IMG/alianzaeducativa.jpg') }}" alt="" class="imagenAlianzaEducativa">
            </div>
        </div>
    </section>

    <section class="seccionGeneralHub">
        <span class="badgeSubtituloSeccion">Selecciona tu guía</span>
        <h1 class="tituloSeccionCentral">¿Qué guía deseas consultar?</h1>
        <p class="descripcionCentral">
            Hemos preparado dos guías completas adaptadas a las necesidades específicas de la familia y del entorno escolar.
        </p>

        <div class="contenedorTarjetasAcceso">
            <div class="tarjetaAccesoDirecto tarjetaColorPadres">
                <div class="iconoTarjetaAcceso">
                    <img src="{{ asset('/IMG/padres.png') }}" alt="" class="imagenTarjetaAcceso">
                </div>
                <h2>Guía para Padres</h2>
                <p>
                    Encuentra pautas para organizar rutinas en casa, acompañar la regulación emocional y crear un ambiente seguro e inclusivo para tus hijos.
                </p>
                <a href="padres" class="enlaceBotonGuias">
                    <button type="button" class="botonNavegarGuia">
                        Ver Guía para Padres <span class="flechaBoton">→</span>
                    </button>
                </a>
            </div>

            <div class="tarjetaAccesoDirecto tarjetaColorMaestros">
                <div class="iconoTarjetaAcceso">
                    <img src="{{ asset('/IMG/maestros.png') }}" alt="" class="imagenTarjetaAcceso">
                </div>
                <h2>Guía para Maestros</h2>
                <p>
                    Descubre metodologías adaptadas, organización del espacio de clases y técnicas pedagógicas para potenciar el aprendizaje inclusivo.
                </p>
                <a href="maestros" class="enlaceBotonGuias">
                    <button type="button" class="botonNavegarGuia">
                        Ver Guía para Maestros <span class="flechaBoton">→</span>
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section class="seccionGeneralHub">
        <h1 class="tituloSeccionCentral">Pilares del Acompañamiento Conjunto</h1>

        <div class="cuadroPilaresGrid">
            <div class="tarjetaPilarTrabajo">
                <div class="numeroPilar">1</div>
                <h3>Comunicación Fluida</h3>
                <p>Mantener un intercambio continuo de observaciones entre el hogar y la escuela ayuda a anticipar dificultades y celebrar logros.</p>
            </div>

            <div class="tarjetaPilarTrabajo">
                <div class="numeroPilar">2</div>
                <h3>Acuerdos en Rutinas</h3>
                <p>Sincronizar normas y expectativas simplifica la adaptación del niño y le brinda mayor seguridad emocional.</p>
            </div>

            <div class="tarjetaPilarTrabajo">
                <div class="numeroPilar">3</div>
                <h3>Estrategias Compartidas</h3>
                <p>Utilizar apoyos visuales y herramientas de autorregulación similares tanto en casa como en el aula genera consistencia.</p>
            </div>

            <div class="tarjetaPilarTrabajo">
                <div class="numeroPilar">4</div>
                <h3>Respeto a los Tiempos</h3>
                <p>Cada infancia evoluciona a su propio ritmo. Reconocer y valorar cada avance fortalece la autoestima del estudiante.</p>
            </div>
        </div>
    </section>

    <section class="seccionGeneralHub">
        <h1 class="tituloSeccionCentral">Preguntas Frecuentes de la Comunidad</h1>

        <div class="contenedorAcordeonHub">
            <div class="bloqueAcordeonItem">
                <button type="button" class="botonAcordeonPregunta">
                    <span>¿Cómo iniciar una reunión entre padres y maestros?</span>
                    <span class="simboloAcordeon">+</span>
                </button>
                <div class="contenidoAcordeonRespuesta">
                    <p>
                        Se recomienda preparar una lista corta con fortalezas, intereses del niño y puntos específicos donde se necesite apoyo. Mantener un tono colaborativo facilita la creación de metas comunes.
                    </p>
                </div>
            </div>

            <div class="bloqueAcordeonItem">
                <button type="button" class="botonAcordeonPregunta">
                    <span>¿Qué hacer si una estrategia funciona en casa pero no en la escuela?</span>
                    <span class="simboloAcordeon">+</span>
                </button>
                <div class="contenidoAcordeonRespuesta">
                    <p>
                        El entorno del aula presenta dinámicas distintas al hogar. Es útil analizar qué elementos varían (cantidad de estímulos, tiempos) y hacer pequeñas adaptaciones progresivas en el colegio.
                    </p>
                </div>
            </div>

            <div class="bloqueAcordeonItem">
                <button type="button" class="botonAcordeonPregunta">
                    <span>¿Cuándo es necesario acudir a un profesional externo?</span>
                    <span class="simboloAcordeon">+</span>
                </button>
                <div class="contenidoAcordeonRespuesta">
                    <p>
                        Si se observan dificultades continuas en el aprendizaje, la comunicación o la regulación de emociones que sobrepasan las herramientas habituales, la valoración experta aportará orientaciones precisas.
                    </p>
                </div>
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
            <a href="{{ route('home') }}">Nuestro equipo</a>
            <a href="{{ route('Normas') }}">Normas de la comunidad</a>
            <a href="{{ route('divergencia') }}">Sobre nosotros</a>
        </div>

        <div class="linea-vertical"></div>

        <div class="footer-columna">
            <h1>Recursos</h1>
            <a href="{{ route('padres') }}">Guía para padres</a>
            <a href="{{ route('maestros') }}">Guía para maestros</a>
            <a href="{{ route('padresymaestros') }}">Padres y maestros</a>
            <a href="{{ route('adaptacion') }}">Adaptación</a>
        </div>

        <div class="linea-vertical"></div>

        <div class="footer-columna">
            <h1>Contacto</h1>
            <a href="{{ route('contacto') }}">Correo</a>
            <a href="{{ route('contacto') }}">Teléfono</a>
            <a href="{{ route('contacto') }}">Horarios</a>
        </div>

    </div>

    <br><br><br><br><br>
    <div class="footer-logo">
        <h1>Neuro-MiniMinds!</h1>
        <p>Apoyo al desarrollo de infancias sanas y adaptivas</p>
    </div>

     <br><br>
    <div class="redes">
        <a href=""><img src="{{ asset('/IMG/insta icon.png') }}" alt="" class="sociales"></a>
        <a href=""><img src="{{ asset('/IMG/tt icon.png') }}" alt="" class="sociales"></a>

        <a href=""><img src="{{ asset('/IMG/yt icon.png') }}" alt="" class="sociales"></a>

    </div>


</footer>


</body>
</html>
