<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/frontend/contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/contactodark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
    <script src="{{ asset('js/frontend/frontend-nav.js') }}" defer></script>


        <title>Contacto</title>

</head>
<body>


<script>
    window.MM_CHAT = {
        authenticated: {{ auth()->check() ? 'true' : 'false' }},
        loginUrl: "{{ route('login') }}",
        enviarUrl: "{{ route('chat.enviar') }}",
        csrf: "{{ csrf_token() }}"
    };
</script>
<script src="{{ asset('js/frontend/frontend-chat-widget.js') }}"></script>



    <div class="decoracionesfondo">
        <img src="{{ asset('IMG/DIBUJOS/neurona1.svg') }}" class="neurona n1">
        <img src="{{ asset('IMG/DIBUJOS/neurona2.svg') }}" class="neurona n2">
        <img src="{{ asset('IMG/DIBUJOS/neurona3.svg') }}" class="neurona n3">
        <img src="{{ asset('IMG/DIBUJOS/neurona4.svg') }}" class="neurona n4">

        <img src="{{ asset('IMG/DIBUJOS/neurona2.svg') }}" class="neurona n5">
        <img src="{{ asset('IMG/DIBUJOS/neurona1.svg') }}" class="neurona n6">
        <img src="{{ asset('IMG/DIBUJOS/neurona3.svg') }}" class="neurona n7">
        <img src="{{ asset('IMG/DIBUJOS/neurona4.svg') }}" class="neurona n8">
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

                <img src="{{ asset('/IMG/GAEL PNG.png') }}" alt="">

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

                <img src="{{ asset('/IMG/DIBUJOS/enviar mensaje.svg') }}" alt="">

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

                                    
                                    <a href="{{ route('home') }}">
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


                            <a class="dropdown-item" href="{{ route('tda') }}">Diagnóstico TDA</a>
                            <a class="dropdown-item" href="{{ route('tdah') }}">Diagnóstico TDAH</a>
                            <a class="dropdown-item" href="{{ route('adaptacion') }}">Adaptación</a>

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




                                <a class="dropdown-item" href="{{ route('padres') }}">Guía para padres</a>

                                        <a class="dropdown-item" href="{{ route('maestros') }}">Guía para maestros</a>
                                    <a class="dropdown-item" href="{{ route('padresymaestros') }}">Guía para padres y maestros</a>

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

                                    <a href="{{ route('contacto') }}">
                                    <button class="nav-btn">Contacto</button></a>
                                        <a href=""><button class="nav-btn">Ayuda</button></a>

                                        
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

                        @auth
                        <a href="{{ auth()->user()->panelUrl() }}"><button class="iniciar2">Mi Panel</button></a>
                        @else
                        <a href="{{ route('login') }}"><button class="iniciar">Iniciar sesión</button></a>
                        <a href="{{ route('register') }}"><button class="iniciar2">Registrarse</button></a>
                        @endauth

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


<br><br><br><br>

<section class="contactsecc1">

    <div class="contact-izquierda">

        <img src="{{ asset('/IMG/DIBUJOS/contacto2.svg') }}"  class="mascota">

        <h1>¡Contáctanos!</h1>

        <p class="descripcion">
            Estamos felices de ayudarte. Si tienes alguna duda o sugerencia,
            puedes escribirnos y responderemos lo antes posible.
        </p>

        <div class="dato-contacto">
            <img src="{{ asset('/IMG/telefono.png') }}" alt="">
            <p>(+503) 1234-5678</p>
        </div>

        <div class="dato-contacto">
            <img src="{{ asset('/IMG/correo.png') }}" alt="">
            <p>contacto@miniminds.com</p>
        </div>

    </div>

    <div class="contact-derecha">

        @if(session('success'))
        <div class="alert alert-success" style="background:#d1f7d6;padding:10px 14px;border-radius:8px;margin-bottom:14px;">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-error" style="background:#ffd6d6;padding:10px 14px;border-radius:8px;margin-bottom:14px;">
            @foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach
        </div>
        @endif

        <form action="{{ route('contacto.enviar') }}" method="POST">
            @csrf

            <div class="fila">

                <div class="campo">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div class="campo">
                    <label>Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido') }}" required>
                </div>

            </div>

            <div class="campo">
                <label>Correo electrónico</label>
                <input type="email" name="correo" value="{{ old('correo') }}" required>
            </div>

            <div class="campo">
                <label>Número de teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}">
            </div>

            <div class="campo">
                <label>Mensaje</label>
                <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>
            </div>

            <button class="enviar">
                Enviar mensaje
            </button>

        </form>

    </div>

</section>

<br><br><br><br><br><br><br>
<br><br><br><br>


<footer>
    <br>
    <div class="footer-contenido">

        <div class="footer-columna">
            <h1>Acerca de</h1>
            <a href="">Nuestro equipo</a>
        <a href="{{route('Normas') }}">Normas de la comunidad</a>
            <a href="">Sobre nosotros</a>

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
        <a href=""><img src="{{ asset('/IMG/insta icon.png') }}" alt="" class="sociales"></a>
        <a href=""><img src="{{ asset('/IMG/tt icon.png') }}" alt="" class="sociales"></a>

        <a href=""><img src="{{ asset('/IMG/yt icon.png') }}" alt="" class="sociales"></a>

    </div>


</footer>



</div>




</body>
</html>