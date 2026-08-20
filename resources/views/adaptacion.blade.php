<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaptación — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/contenido-dark-fix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/paginas/adaptacion.css') }}">
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


<img src="{{ asset('/IMG/adaptacionbanner.jpg') }}" alt="" class="imagenHero">

    <div class="hero-contenido">
        <p class="subtitulo-hero">Acompañamiento e inclusión efectiva</p>
        <h1 class="titulo-hero">ESTRATEGIAS DE ADAPTACIÓN</h1>
        <p class="desliza">↓ Desliza hacia abajo ↓</p>
    </div>
</header>

<main class="contenedorinfo">

    <section class="seccionBloqueAdaptacion">
        <div class="encabezadoSeccionAdaptacion">
            <span class="etiquetaSeccionAdaptacion">Fundamentos prácticos</span>
            <h1 class="tituloPrincipalAdaptacion">Los Tres Pilares de la Adaptación</h1>
            <p class="textoIntroduccionAdaptacion">
                Adaptar los entornos no significa cambiar las exigencias del aprendizaje, sino ajustar los medios y el acompañamiento para que cada niña y niño neurodivergente pueda desenvolverse con confianza, seguridad y autonomía.
            </p>
        </div>

        <div class="gridPilaresAdaptacion">
            <div class="tarjetaPilarAdaptacion">
                <div class="numeroPilarAdaptacion">01</div>
                <h3 class="tituloPilarAdaptacion">Observación Activa</h3>
                <p class="textoPilarAdaptacion">
                    Identificar de forma anticipada las variables que generan sobrecarga sensorial, cansancio o frustración en las actividades cotidianas.
                </p>
            </div>

            <div class="tarjetaPilarAdaptacion">
                <div class="numeroPilarAdaptacion">02</div>
                <h3 class="tituloPilarAdaptacion">Ajuste del Entorno</h3>
                <p class="textoPilarAdaptacion">
                    Modificar la estructura física, los tiempos de trabajo y las formas de presentación de tareas para facilitar la comprensión.
                </p>
            </div>

            <div class="tarjetaPilarAdaptacion">
                <div class="numeroPilarAdaptacion">03</div>
                <h3 class="tituloPilarAdaptacion">Co-regulación Afectiva</h3>
                <p class="textoPilarAdaptacion">
                    Brindar un espacio de calma y orientación clara cuando se presentan momentos de desorganización emocional o conductual.
                </p>
            </div>
        </div>
    </section>

    <section class="seccionBloqueAdaptacion">
        <div class="cuadroEstrategiasEspeciales">
            <div class="encabezadoPestanasAdaptacion">
                <h1 class="tituloPrincipalAdaptacion">Adaptación según el Contexto</h1>
                <p class="textoIntroduccionAdaptacion">
                    Selecciona el área donde deseas implementar estrategias para conocer las pautas de apoyo recomendadas:
                </p>

                <div class="botonesPestanasAdaptacion">
                    <button type="button" class="botonPestanaAdaptacion activa" data-pestana="aula">En el Aula</button>
                    <button type="button" class="botonPestanaAdaptacion" data-pestana="hogar">En el Hogar</button>
                    <button type="button" class="botonPestanaAdaptacion" data-pestana="social">Entornos Sociales</button>
                </div>
            </div>

            <div class="contenedorPanelesAdaptacion">
                <div class="panelEstrategiaAdaptacion activo" id="panelAula">
                    <div class="contenidoPanelAdaptacion">
                        <div class="columnaTextoPanelAdaptacion">
                            <h2 class="subtituloPanelAdaptacion">Estrategias en el Aula de Clases</h2>
                            <p class="textoPanelAdaptacion">
                                En el ámbito escolar, pequeños cambios en la dinámica diaria reducen significativamente la ansiedad y mejoran el rendimiento escolar.
                            </p>
                            <ul class="listaEstrategiasAdaptacion">
                                <li><strong>Ubicación estratégica:</strong> Asignar asientos alejados de fuentes directas de distracción visual o ruidos intensos.</li>
                                <li><strong>Instrucciones escalonadas:</strong> Dividir las consignas largas en pasos individuales presentados en apoyos visuales.</li>
                                <li><strong>Tiempos de pausa:</strong> Incorporar pausas activas breves para permitir el movimiento regulado entre asignaturas.</li>
                                <li><strong>Evaluación flexible:</strong> Permitir respuestas orales o uso de formatos digitales según la fortaleza de la niña o niño.</li>
                            </ul>
                        </div>
                        <div class="columnaImagenPanelAdaptacion">
                            <img src="{{ asset('/IMG/salondeclases.png') }}" alt="" class="imagenContextoAdaptacion">
                        </div>
                    </div>
                </div>

                <div class="panelEstrategiaAdaptacion" id="panelHogar">
                    <div class="contenidoPanelAdaptacion">
                        <div class="columnaTextoPanelAdaptacion">
                            <h2 class="subtituloPanelAdaptacion">Estrategias en el Entorno Familiar</h2>
                            <p class="textoPanelAdaptacion">
                                El hogar representa el espacio principal para brindar predictibilidad, contención emocional y hábitos estructurados.
                            </p>
                            <ul class="listaEstrategiasAdaptacion">
                                <li><strong>Rutinas visuales:</strong> Organizar horarios mediante imágenes o paneles con las actividades fijas del día.</li>
                                <li><strong>Anticipación de cambios:</strong> Avisar con minutos de antelación el fin de una actividad gustosa o el inicio de una tarea.</li>
                                <li><strong>Zona de calma:</strong> Diseñar un rincón tranquilo con cojines, texturas agradables o juguetes sensoriales.</li>
                                <li><strong>Refuerzo positivo:</strong> Valorar el esfuerzo realizado en lugar de concentrarse únicamente en el resultado.</li>
                            </ul>
                        </div>
                        <div class="columnaImagenPanelAdaptacion">
                            <img src="{{ asset('/IMG/hogar.png') }}" alt="" class="imagenContextoAdaptacion">
                        </div>
                    </div>
                </div>

                <div class="panelEstrategiaAdaptacion" id="panelSocial">
                    <div class="contenidoPanelAdaptacion">
                        <div class="columnaTextoPanelAdaptacion">
                            <h2 class="subtituloPanelAdaptacion">Estrategias en Actividades Comunitarias</h2>
                            <p class="textoPanelAdaptacion">
                                Acompañar la participación social facilita la integración paulatina en parques, reuniones o eventos recreativos.
                            </p>
                            <ul class="listaEstrategiasAdaptacion">
                                <li><strong>Guiones sociales:</strong> Explicar previamente qué sucederá, quiénes asistirán y la duración del evento.</li>
                                <li><strong>Protección sensorial:</strong> Utilizar audífonos de cancelación o lentes según la sensibilidad individual.</li>
                                <li><strong>Salidas pactadas:</strong> Acordar una señal discreta si la niña o niño necesita tomar un descanso fuera del grupo.</li>
                                <li><strong>Empatía de pares:</strong> Fomentar dinámicas grupales centradas en la colaboración e intereses compartidos.</li>
                            </ul>
                        </div>
                        <div class="columnaImagenPanelAdaptacion">
                            <img src="{{ asset('/IMG/socializando.png') }}" alt="" class="imagenContextoAdaptacion">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionBloqueAdaptacion">
        <div class="encabezadoSeccionAdaptacion">
            <span class="etiquetaSeccionAdaptacion">Herramientas pedagógicas</span>
            <h1 class="tituloPrincipalAdaptacion">Metodologías Prácticas de Apoyo</h1>
            <p class="textoIntroduccionAdaptacion">
                Explora las técnicas que facilitan la organización del pensamiento y el desarrollo de habilidades clave:
            </p>
        </div>

        <div class="gridHerramientasAdaptacion">
            <div class="tarjetaHerramientaAdaptacion">
                <div class="cabeceraHerramientaAdaptacion">
                    <img src="{{ asset('/IMG/agenda.png') }}" alt="" class="iconoHerramientaAdaptacion">
                    <h3 class="tituloHerramientaAdaptacion">Agendas y Pictogramas</h3>
                </div>
                <p class="resumenHerramientaAdaptacion">
                    Herramientas gráficas que secuencian las actividades diarias para brindar orden temporal y reducir la incertidumbre.
                </p>
                <button type="button" class="botonExpandirAdaptacion">
                    <span>Ver aplicación</span>
                </button>
                <div class="detalleHerramientaAdaptacion">
                    <p class="textoDetalleAdaptacion">
                        Se colocan a la altura de la niña o niño con imágenes claras de cada momento del día (desayuno, escuela, juego, descanso). Al completar cada acción, se desliza o retira el gráfico correspondiente.
                    </p>
                </div>
            </div>

            <div class="tarjetaHerramientaAdaptacion">
                <div class="cabeceraHerramientaAdaptacion">
                    <img src="{{ asset('/IMG/relojarena.jpg') }}" alt="" class="iconoHerramientaAdaptacion">
                    <h3 class="tituloHerramientaAdaptacion">Relojes Visuales</h3>
                </div>
                <p class="resumenHerramientaAdaptacion">
                    Temporizadores con disco de color que muestran físicamente cuánto tiempo resta para finalizar una tarea.
                </p>
                <button type="button" class="botonExpandirAdaptacion">
                    <span>Ver aplicación</span>
                </button>
                <div class="detalleHerramientaAdaptacion">
                    <p class="textoDetalleAdaptacion">
                        Ayudan a comprender la noción del tiempo sin depender del reloj digital o de agujas tradicional, facilitando transiciones fluidas entre el trabajo escolar y los momentos de recreación.
                    </p>
                </div>
            </div>

            <div class="tarjetaHerramientaAdaptacion">
                <div class="cabeceraHerramientaAdaptacion">
                    <img src="{{ asset('/IMG/audifonos.png') }}" alt="" class="iconoHerramientaAdaptacion">
                    <h3 class="tituloHerramientaAdaptacion">Kits de Regulación</h3>
                </div>
                <p class="resumenHerramientaAdaptacion">
                    Maletines con elementos táctiles y auditivos orientados a bajar niveles elevados de estimulación o ansiedad.
                </p>
                <button type="button" class="botonExpandirAdaptacion">
                    <span>Ver aplicación</span>
                </button>
                <div class="detalleHerramientaAdaptacion">
                    <p class="textoDetalleAdaptacion">
                        Incluyen mordedores seguros, pelotas antiestrés, plastilina terapéutica y audífonos. Su uso permite autorregularse en minutos sin necesidad de abandonar del todo el entorno escolar.
                    </p>
                </div>
            </div>

            <div class="tarjetaHerramientaAdaptacion">
                <div class="cabeceraHerramientaAdaptacion">
                    <img src="{{ asset('/IMG/librito.jpg') }}" alt="" class="iconoHerramientaAdaptacion">
                    <h3 class="tituloHerramientaAdaptacion">Historias Sociales</h3>
                </div>
                <p class="resumenHerramientaAdaptacion">
                    Relatos breves ilustrados que explican situaciones sociales nuevas, normas o soluciones a conflictos cotidianos.
                </p>
                <button type="button" class="botonExpandirAdaptacion">
                    <span>Ver aplicación</span>
                </button>
                <div class="detalleHerramientaAdaptacion">
                    <p class="textoDetalleAdaptacion">
                        Describen qué se espera en determinado lugar (como una visita médica o un cumpleaños), validando las emociones asociadas y ofreciendo alternativas de respuesta comprensibles.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionBloqueAdaptacion">
        <div class="contenedorPreguntasAdaptacion">
            <h1 class="tituloPrincipalAdaptacion">Preguntas Frecuentes sobre la Adaptación</h1>
            <p class="textoIntroduccionAdaptacion">
                Resuelve dudas habituales sobre la implementación de apoyos y ajustes razonables:
            </p>

            <div class="listaPreguntasAdaptacion">
                <div class="tarjetaPreguntaAdaptacion">
                    <div class="cabeceraPreguntaAdaptacion">
                        <h3 class="tituloPreguntaAdaptacion">¿Dar adaptaciones no crea una ventaja injusta frente a otros niños?</h3>
                        <span class="simboloDespliegueAdaptacion">+</span>
                    </div>
                    <div class="respuestaPreguntaAdaptacion">
                        <p>
                            No. La equidad no consiste en dar a todos exactamente lo mismo, sino en ofrecer a cada niña o niño lo que necesita para estar en igualdad de condiciones para aprender y participar.
                        </p>
                    </div>
                </div>

                <div class="tarjetaPreguntaAdaptacion">
                    <div class="cabeceraPreguntaAdaptacion">
                        <h3 class="tituloPreguntaAdaptacion">¿Las adaptaciones deben mantenerse para siempre?</h3>
                        <span class="simboloDespliegueAdaptacion">+</span>
                    </div>
                    <div class="respuestaPreguntaAdaptacion">
                        <p>
                            Los apoyos se evalúan periódicamente. A medida que el niño desarrolla mayores estrategias de autorregulación y autonomía, algunos apoyos se retiran gradualmente mientras otros evolucionan según sus necesidades.
                        </p>
                    </div>
                </div>

                <div class="tarjetaPreguntaAdaptacion">
                    <div class="cabeceraPreguntaAdaptacion">
                        <h3 class="tituloPreguntaAdaptacion">¿Quiénes deben participar en el diseño del plan de adaptación?</h3>
                        <span class="simboloDespliegueAdaptacion">+</span>
                    </div>
                    <div class="respuestaPreguntaAdaptacion">
                        <p>
                            Es un trabajo colaborativo entre el equipo docente, profesionales de apoyo (psicología, psicopedagogía), la familia y, en la medida de lo posible, la propia niña o niño expresando sus gustos y comodidades.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccionBloqueAdaptacion">
        <div class="cuadroRegresoAdaptacion">
            <div class="contenidoRegresoAdaptacion">
                <h2 class="subtituloRegresoAdaptacion">¿Deseas repasar los conceptos fundamentales?</h2>
                <p class="textoRegresoAdaptacion">
                    Puedes regresar a la sección de Neurodiversidad para profundizar en el desarrollo neurológico, los tipos de procesamiento sensorial y los niveles de apoyo.
                </p>
                <a href="neurodiversidad" class="enlaceBotonRegresoAdaptacion">
                    <button type="button" class="botonRegresoAdaptacion">
                        ← Volver a Neurodiversidad
                    </button>
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
