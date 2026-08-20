<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía para Padres — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
            <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/contenido-dark-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/paginas/padres.css') }}">
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


<img src="{{ asset('/IMG/padresbanner.jpg') }}" alt="" class="imagenHero">

    <div class="hero-contenido">
        <p class="subtitulo-hero">Acompañamiento familiar consciente</p>
        <h1 class="titulo-hero">GUÍA PARA PADRES</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionEspecíficaPadres">
        <div class="cuadroIntroHogar">
            <div class="textoIntroHogar">
                <h1>Crear un entorno seguro en el hogar</h1>
                <p>
                    El hogar es el primer espacio de desarrollo y aprendizaje. Brindar un ambiente predecible, afectuoso y estructurado permite a las niñas y niños sentirse seguros, facilitando su autorregulación emocional y el fortalecimiento de su autonomía diaria.
                </p>
            </div>
            <div class="imagenIntroHogar">
                <img src="{{ asset('/IMG/hogarSeguro.jpg') }}" alt="" class="imagenFamiliaHogar">
            </div>
        </div>
    </section>

    <section class="seccionEspecíficaPadres">
        <span class="badgeSubtituloSeccion">Herramientas prácticas</span>
        <h1 class="tituloSeccionCentral">Estrategias Clave para la Rutina Diaria</h1>

        <div class="tableroCuadrosPadres">
            <div class="tarjetaEstrategiaHogar">
                <div class="iconoEstrategia">
                    <img src="{{ asset('/IMG/horario.png') }}" alt="" class="imagenIconoEstrategia">
                </div>
                <h3>Estructura Visual</h3>
                <p>Implementa pictogramas y horarios ilustrados en lugares visibles para anticipar las actividades del día.</p>
            </div>

            <div class="tarjetaEstrategiaHogar">
                <div class="iconoEstrategia">
                    <img src="{{ asset('/IMG/emociones.png') }}" alt="" class="imagenIconoEstrategia">
                </div>
                <h3>Regulación Emocional</h3>
                <p>Ofrece un rincón de calma con cojines, texturas suaves o música relajante para momentos de sobrecarga.</p>
            </div>

            <div class="tarjetaEstrategiaHogar">
                <div class="iconoEstrategia">
                    <img src="{{ asset('/IMG/comunicacion.png') }}" alt="" class="imagenIconoEstrategia">
                </div>
                <h3>Lenguaje Claro</h3>
                <p>Da instrucciones simples, directas y paso a paso, manteniendo un tono de voz sereno y empático.</p>
            </div>

            <div class="tarjetaEstrategiaHogar">
                <div class="iconoEstrategia">
                    <img src="{{ asset('/IMG/juego.png') }}" alt="" class="imagenIconoEstrategia">
                </div>
                <h3>Juego Libre</h3>
                <p>Respeta los intereses espontáneos del niño y acompáñalo en sus juegos sin imponer reglas complejas.</p>
            </div>
        </div>
    </section>

    <section class="seccionEspecíficaPadres">
        <h1 class="tituloSeccionCentral">Secuencia Diaria en Casa</h1>
        <p class="descripcionCentral">Organizar los momentos principales del día reduce la ansiedad y mejora la convivencia familiar.</p>

        <div class="lineaTiempoPasos">
            <div class="pasoMomentoDia">
                <div class="cabeceraPaso">
                    <span class="etiquetaPaso">Momento 1</span>
                    <h3>Mañanas y Salida a la Escuela</h3>
                </div>
                <p>Dejar la ropa y la mochila preparadas la noche anterior evita prisas y reduce el estrés matutino.</p>
            </div>

            <div class="pasoMomentoDia">
                <div class="cabeceraPaso">
                    <span class="etiquetaPaso">Momento 2</span>
                    <h3>Regreso a Casa y Descanso</h3>
                </div>
                <p>Permitir un tiempo de desconexión o merienda tranquila antes de iniciar tareas o actividades estructuradas.</p>
            </div>

            <div class="pasoMomentoDia">
                <div class="cabeceraPaso">
                    <span class="etiquetaPaso">Momento 3</span>
                    <h3>Rutina Nocturna y Sueño</h3>
                </div>
                <p>Mantener horarios fijos para el baño, cena y lectura de cuentos favorece un descanso reparador.</p>
            </div>
        </div>
    </section>

    <section class="seccionEspecíficaPadres">
        <h1 class="tituloSeccionCentral">Mitos y Realidades sobre el Acompañamiento</h1>

        <div class="carruselMitos">
            <button type="button" class="flechaCarruselPadres anteriorMito">&lt;</button>

            <div class="contenedorMitoDiapositiva">

                <div class="diapositivaMito activa">
                    <div class="tarjetaMitoBloque">
                        <span class="etiquetaMito">Mito</span>
                        <h3>"Las rutinas estrictas limitan la creatividad del niño."</h3>
                    </div>
                    <div class="tarjetaRealidadBloque">
                        <span class="etiquetaRealidad">Realidad</span>
                        <p>Las rutinas estructuradas le brindan previsibilidad, lo que reduce la ansiedad y le da tranquilidad para explorar su creatividad de forma segura.</p>
                    </div>
                </div>

                <div class="diapositivaMito">
                    <div class="tarjetaMitoBloque">
                        <span class="etiquetaMito">Mito</span>
                        <h3>"Si no habla a la misma edad que otros, no se está esforzando."</h3>
                    </div>
                    <div class="tarjetaRealidadBloque">
                        <span class="etiquetaRealidad">Realidad</span>
                        <p>Cada niño tiene ritmos de desarrollo particulares. Existen múltiples formas válidas de comunicación que deben ser respetadas y apoyadas.</p>
                    </div>
                </div>

            </div>

            <button type="button" class="flechaCarruselPadres siguienteMito">&gt;</button>
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
