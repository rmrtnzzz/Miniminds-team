<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href=""><title>Inicio</title></a>
        <link rel="stylesheet" href="{{ asset('css/frontend/home.css') }}">
                        <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/homedark.css') }}">
    <script src="{{ asset('js/frontend/frontend-nav.js') }}" defer></script>
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


    @include('components.decoraciones')
        @include('components.ia')





<header>

    @include('components.navbar')
    @include('components.ventana')




            <div class="hero-contenido">

                <img src="{{ asset('/IMG/LOGO_NM.png') }}" class="LOGO">

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

                <img src="{{ asset('/IMG/SOPHI PNG.png') }}" alt="MiniMinds">

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
                        <img src="{{ asset('/IMG/SOPHI PNG.png') }}" alt="">
                        <span>Información confiable</span>
                    </div>

                    <div class="about-item">
                        <img src="{{ asset('/IMG/SOPHI PNG.png') }}" alt="">
                        <span>Lenguaje sencillo</span>
                    </div>

                    <div class="about-item">
                        <img src="{{ asset('/IMG/SOPHI PNG.png') }}" alt="">
                        <span>Apoyo profesional</span>
                    </div>

                </div>
            </div>

                                <img src="{{ asset('IMG/DIBUJOS/mancha1.svg') }}" class="mancha m1">


                                


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
                                        src="{{ asset('/IMG/KELLY PNG.png') }}"
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
                                        src="{{ asset('/IMG/personaje2.png') }}"
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
                                        src="{{ asset('/IMG/personaje3.png') }}"
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
                                        src="{{ asset('/IMG/personaje4.png') }}"
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

                    <img src="{{ asset('/IMG/DIBUJOS/gael1.svg') }}" alt="">

                    <h3>Para familias</h3>

                    <p>
                        Consejos, guías y actividades para acompañar
                        el crecimiento de tus hijos.
                    </p>

                </div>

                <div class="explora-card maestros">

                    <img src="{{ asset('/IMG/DIBUJOS/para maestros.svg') }}" alt="">

                    <h3>Para docentes</h3>

                    <p>
                        Recursos educativos y estrategias para
                        una enseñanza inclusiva.
                    </p>

                </div>

                <div class="explora-card juegos">

                    <img src="{{ asset('/IMG/DIBUJOS/juegos.svg') }}" alt="">

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

                            <a href="{{ route('dislexia') }}"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                            <img src="{{ asset('/IMG/dislexia.jpg') }}" alt="" class="">
                        </div>

                    </div>

                    
                    <div class="slide">

                        <div class="slide-texto">
                            <h2>TEA</h2>

                            <p>
                                El Trastorno del Espectro Autista (TEA) es una condición del neurodesarrollo que afecta la manera en que una persona percibe y se relaciona con el mundo. Sus características principales incluyen dificultades en la comunicación social, la interacción con otros y la presencia de comportamientos o intereses repetitivos.      
                                    </p>

                            <a href="{{ route('divergencia') }}"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>

                        <div class="slide-imagen">
                        <img src="{{ asset('/IMG/tea.jpg') }}" alt="">
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
                        <img src="{{ asset('/IMG/tdah.jpg') }}" alt="">
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
                        <img src="{{ asset('/IMG/dispraxia.jpg') }}" alt="">
                        </div>

                    </div>

                            <div class="slide">

                        <div class="slide-texto">
                            <h2>DISCALCULIA</h2>

                            <p>
                                La discalculia es un trastorno específico del aprendizaje que dificulta la comprensión de conceptos numéricos y el cálculo matemático. Ocurre por diferencias neurobiológicas en cómo el cerebro procesa la información numérica, no por falta de esfuerzo o mala enseñanza.
                                La discalculia afecta exclusivamente al procesamiento numérico y espacial, por lo que es completamente independiente del coeficiente intelectual         
                            </p>

                            <a href="{{ route('discalculia') }}"><button class="btn-slide">
                                Conocer más
                            </button></a>
                        </div>






                        <div class="slide-imagen">
                        <img src="{{ asset('/IMG/dISCALCULIA.jpg') }}" alt="">
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
<link href="{{ asset('css/frontend/home-extra.css') }}" rel="stylesheet">

<div class="mm-extra-sections">

    <section class="cerebro3d-section" id="cerebro3d">
        <h2 class="section-title">Explora un cerebro en 3D</h2>
        <p class="section-intro">Una experiencia interactiva pensada para que niños y familias descubran, jugando, cómo funciona el cerebro.</p>
        @include('partials.cerebro-brain', ['height' => '560px', 'showHeader' => false])
        <div style="text-align:center;margin-top:20px;">
            <a href="{{ route('juegos.cerebro') }}" class="btn-hero-out">Abrir en pantalla completa →</a>
        </div>
    </section>

    <section class="seccion-info" id="comunidad">

        <h1 class="titulo-seccion">Lo que dice la comunidad</h1>

        <p class="texto-intro">Experiencias publicadas por nuestra comunidad, actualizadas en tiempo real.</p>

        <div id="feed-list" class="contenedor-tarjetas"></div>
        <p id="feed-empty" class="mm-feed-empty">Todavía no hay publicaciones. ¡Sé el primero en compartir tu experiencia!</p>

        @auth
        <a href="{{ route('experiencias.create') }}" class="boton-abajo">Comparte tu experiencia</a>
        @else
        <a href="{{ route('login') }}" class="boton-abajo">Inicia sesión para publicar</a>
        @endauth
    </section>

</div>

<script src="{{ asset('js/home/comunidad-feed.js') }}"></script>
<script>initComunidadFeed('{{ route('experiencias.feed') }}');</script>

<footer>
    @include('components.footer') 


</footer>

</body>

</html>