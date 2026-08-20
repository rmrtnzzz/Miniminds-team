<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        @vite(['resources/css/diver.css ', 'resources/js/app.js'])

</head>
<body>
    
<header>
        <div class="NAVBARCONTENIDO scrolled">
                    <div class="navbar-wrapper">
                        <div class="navbar-container">
                            <div class="navbar-content">
                                <nav class="navbar">

                                    
                                <a href="{{ route('inicio') }}"><button class="nav-btn">
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
                                        Juegos interactivos
                                    </button>


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
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M12 15.5A3.5 3.5 0 0 1 8.5 12 3.5 3.5 0 0 1 12 8.5a3.5 3.5 0 0 1 3.5 3.5 3.5 3.5 0 0 1-3.5 3.5m7.43-2.92c.04-.3.07-.61.07-.93s-.03-.64-.07-1l2.19-1.68c.2-.15.25-.42.12-.64l-2.07-3.58c-.13-.22-.39-.3-.61-.22l-2.57 1.03c-.54-.41-1.11-.75-1.75-.99l-.39-2.73C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.39 2.73c-.64.24-1.21.58-1.75.99L4.8 5.11c-.22-.08-.48 0-.61.22L2.12 8.91c-.13.22-.07.49.12.64l2.19 1.68c-.04.36-.07.67-.07 1s.03.63.07.93l-2.19 1.68c-.19.15-.25.42-.12.64l2.07 3.58c.13.22.39.3.61.22l2.57-1.03c.54.41 1.11.75 1.75.99l.39 2.73c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.39-2.73c.64-.24 1.21-.58 1.75-.99l2.57 1.03c.22.08.48 0 .61-.22l2.07-3.58c.13-.22.07-.49-.12-.64z"/>
                </svg>


        <div class="log-reg">

            <a href=""><button class="iniciar">Iniciar sesión</button></a>

            <a href=""><button class="iniciar2">Registrarse</button></a>

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

    <div class="decoracion-fondo">        
        <span class="puntitos p1"></span>
        <span class="puntitos p2"></span>
        <span class="puntitos p3"></span>
    </div>



        <div class="qes">

            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="" class="">

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
        </div>

    <br><br><br><br><br>

        <div class="pq">
            <h1>¿Por qué se llama "espectro"?</h1>
            <p>El término "espectro" hace referencia a la enorme diversidad que existe entre las personas con autismo. No hay un único tipo de TEA ni dos personas que lo vivan exactamente de la misma manera. <br><br>
            Mientras algunos niños desarrollan el lenguaje desde edades tempranas y asisten a escuelas regulares con pocas adaptaciones, otros pueden presentar dificultades importantes para comunicarse verbalmente y requerir apoyo constante en sus actividades diarias. Del mismo modo, algunas personas pueden sentirse cómodas en ambientes concurridos, mientras que otras experimentan una gran sensibilidad ante el ruido, las luces o el contacto físico. <br><br>
            Estas diferencias hacen que el autismo no pueda entenderse como una escala de "más" o "menos" autismo, sino como una condición con múltiples formas de manifestarse. Cada persona posee fortalezas, intereses, desafíos y necesidades únicas que deben ser comprendidas de forma individual.
            </p>

                        <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="" class="">


        </div>


                <section class="funciona">

                    <h1>¿Cómo funciona?</h1>

                    <p class="descripcion">
                        El TEA afecta diferentes áreas del desarrollo. Cada persona lo experimenta de una forma diferente.
                        <br><br><br>
                        El cerebro de las personas con TEA se desarrolla de forma distinta desde las primeras etapas de la vida.
                        <br><br><br>
                        Esto influye en la manera en que procesan la información, aprenden, perciben el entorno y se comunican.
                    </p>
        



                    <div class="contenedor-funciona">

                        <!-- IZQUIERDA -->
                        <div class="lado izquierdo">

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Interacción social</h3>

                                    <p>
                                        Texto de ejemplo sobre la interacción social.
                                    </p>
                                </div>

                            </div>

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Comunicación</h3>

                                    <p>
                                        Texto de ejemplo.
                                    </p>
                                </div>

                            </div>

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Emociones</h3>

                                    <p>
                                        Texto de ejemplo.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="centro">

                            <model-viewer></model-viewer>
                            <img src="{{ asset('/IMG/SOPHI PNG.png') }}" alt="" class="">


                        </div>


                        <div class="lado derecho">

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Procesamiento sensorial</h3>

                                    <p>
                                        Texto de ejemplo.
                                    </p>
                                </div>

                            </div>

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Rutinas y cambios</h3>

                                    <p>
                                        Texto de ejemplo.
                                    </p>
                                </div>

                            </div>

                            <div class="card-funciona">
                                <div class="icono"></div>

                                <div>
                                    <h3>Intereses especiales</h3>

                                    <p>
                                        Texto de ejemplo.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>
                    <br>
                        <p>Pasa el cursor por cada área para saber más</p>
                </section>


        <div class="desarrollo-contenedor">
                <div class="qes">

                    <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="" class="">

                    <div class="qes-texto">
                        <h1>Conexiones neuronales</h1>
                        <br>
                        <p>
                            El cerebro está formado por aproximadamente 86 mil millones de neuronas, que se comunican entre sí mediante conexiones llamadas sinapsis. Estas conexiones crean una enorme red encargada de procesar información, aprender y responder al entorno.
                            <br><br>

                            En muchas personas con TEA, diversos estudios han encontrado diferencias en la forma en que estas redes cerebrales están organizadas. Algunas áreas presentan hiperconectividad, es decir, muchas conexiones entre neuronas cercanas, mientras que otras muestran hipoconectividad, con menos comunicación entre regiones alejadas del cerebro.                </p>
                    </div>
                </div>

            <br><br>

            <div class="qes">
                <div class="qes-texto">

                    <h1>Procesamiento sensorial</h1>

                    <p>
                        Las personas con Trastorno del Espectro Autista (TEA) pueden experimentar el mundo a través de los sentidos de una manera diferente a la de las personas neurotípicas.
                        <br><br>
                        Esto ocurre porque el cerebro procesa e interpreta la información sensorial de forma distinta, lo que puede hacer que determinados estímulos del entorno sean percibidos con mayor intensidad, con menor intensidad o de una manera diferente. Estas variaciones forman parte de las características del autismo y pueden influir significativamente en la vida cotidiana, la comunicación, el aprendizaje y el bienestar.    
                        <br><br>
                        Estas diferencias no deben interpretarse como una exageración o una elección de la persona, sino como una manifestación de la forma particular en que su sistema nervioso procesa la información. Comprender el procesamiento sensorial es fundamental para favorecer entornos más accesibles, reducir situaciones de sobrecarga sensorial y promover estrategias que mejoren la calidad de vida de las personas autistas.    </p>

                </div>

                    <div class="contenedor-sentidos">

                        <div class="sentidos">
                            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="">
                            <h3>Audición</h3>
                            <p>Algunos sonidos cotidianos, como una licuadora, una alarma o varias personas hablando al mismo tiempo, pueden resultar extremadamente molestos o incluso dolorosos.</p>
                        </div>

                        <div class="sentidos">
                            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="">
                            <h3>Vista</h3>
                            <p>Luces brillantes, focos, pantallas muy iluminadas o ambientes con mucho movimiento visual pueden generar incomodidad o distracción.</p>
                        </div>

                        <div class="sentidos">
                            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="">
                            <h3>Tacto</h3>
                            <p>Ciertas telas, etiquetas de la ropa, abrazos inesperados o el contacto físico pueden sentirse incómodos para algunas personas, mientras que otras disfrutan de una presión profunda, como mantas con peso.</p>
                        </div>

                        <div class="sentidos">
                            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="">
                            <h3>Olfato</h3>
                            <p>Algunas personas detectan olores que otros apenas perciben o presentan una gran sensibilidad hacia determinados sabores y texturas de los alimentos.</p>
                        </div>

                    </div>


                        </div>



                        </div>

                        <br><br><br>
                        
                        <div class="qes">

                            <img src="{{ asset('/IMG/LOGOTEMp.png') }}" alt="" class="">

                            <div class="qes-texto">
                                <h1>Flexibilidad cognitiva</h1>
                                <br>
                                <p>
                                    La flexibilidad cognitiva es la capacidad del cerebro para adaptarse a situaciones nuevas, modificar planes, cambiar de estrategia o alternar entre diferentes tareas cuando las circunstancias lo requieren. En muchas personas con Trastorno del Espectro Autista (TEA), esta habilidad puede funcionar de manera diferente, por lo que los cambios inesperados o las interrupciones de una rutina pueden generar incertidumbre, estrés o requerir un mayor tiempo de adaptación.
                                <br><br>
                                Por esta razón, muchas personas autistas prefieren mantener horarios, actividades o ambientes predecibles, ya que las rutinas proporcionan estabilidad y reducen la incertidumbre. Esto no significa que sean incapaces de afrontar cambios, sino que, en muchas ocasiones, necesitan anticipación, tiempo o estrategias específicas para adaptarse de forma más cómoda. Con el apoyo adecuado y un entorno comprensivo, es posible desarrollar herramientas que faciliten la adaptación a nuevas situaciones y permitan afrontar los cambios con mayor seguridad y confianza.
                            </p>
                        </div>
                </div>

                        <br><br><br><br>


                        <div class="random">
                            <h1>Niveles del TEA (DSM-5)</h1>
                                <p>En 2013, la Asociación Estadounidense de Psiquiatría (APA, American Psychiatric Association) publicó la quinta edición del Manual Diagnóstico y Estadístico de los Trastornos Mentales (DSM-5), el manual utilizado para diagnosticar los trastornos mentales, incluido el autismo. 
                                <br><br><br>
                                El DSM-5 introdujo tres niveles de severidad para el trastorno del espectro autista (TEA): nivel 1 ("requiere apoyo"), nivel 2 ("requiere apoyo sustancial") y nivel 3 ("requiere apoyo muy sustancial"). A continuación se proporciona el texto completo de los niveles de severidad del DSM-5 para el trastorno del espectro autista (TEA), con permiso de la APA.</p>
                                
                        </div>

                        <section class="cards">
                            <div class="card rosa">
                                <div class="icon">
                                    <h1>1</h1>
                                </div>

                                <h3>Requiere un apoyo muy sustancial</h3>

                                <p class="short">
                                    Las personas diagnosticadas con autismo de nivel 1, anteriormente conocidas como autismo de alto funcionamiento, tienen problemas con las interacciones sociales y la comunicación, pero estos desafíos a menudo se pueden abordar con el apoyo adecuado.
                                </p>

                                <button class="toggle">
                                    Ver más
                                    <span>▼</span>
                                </button>

                                <div class="extra">
                                    <p>
                                    Comunicación social
                                    </p>
                                    <ul>
                                        <li>Dificultad para iniciar o mantener conversaciones.</li>
                                        <li>Puede costar comprender gestos, expresiones y lenguaje corporal.</li>
                                        <li>Existe interés social, pero las interacciones pueden resultar complejas.</li>
                                    </ul>

                                    <p>
                                    Flexibilidad conductual
                                    </p>
                                    <ul>
                                        <li>Dificultad para adaptarse a cambios o transiciones.</li>
                                        <li>Preferencia por las rutinas.</li>
                                        <li>Intereses muy específicos e intensos.</li>
                                    </ul>

                                <p>
                                        Funcionamiento
                                    </p>
                                    <ul>
                                        <li>Suelen gestionar la vida diaria de forma independiente. Sin embargo, los sistemas de apoyo en la escuela, el trabajo o dentro de la comunidad pueden ser muy beneficiosos para fomentar un entorno en el que se reconozcan sus puntos fuertes y se apoyen los desafíos.</li>
                                    </ul>


                                </div>
                            </div>

                        

                            <div class="card naranja">
                                <div class="icon">
                                    <h1>2</h1>
                                </div>

                                <h3>Requiere un apoyo sustancial</h3>

                                <p class="short">
                                    Las personas diagnosticadas con autismo de nivel 2 enfrentan desafíos más pronunciados con la comunicación social y la flexibilidad conductual que las personas con nivel 1. Se beneficiarán enormemente de un apoyo constante y personalizado.               </p>

                                <button class="toggle">
                                    Ver más
                                    <span>▼</span>
                                </button>

                                <div class="extra">
                                    <p>
                                    Comunicación social
                                    </p>
                                    <ul>
                                        <li>Comunicación verbal limitada o mediante frases sencillas.</li>
                                        <li>Dificultad para comprender normas sociales y mantener conversaciones.</li>
                                        <li>Puede necesitar apoyo para desarrollar habilidades sociales.</li>
                                    </ul>

                                    <p>
                                    Flexibilidad conductual
                                    </p>
                                    <ul>
                                        <li>Cambios y transiciones generan mayor dificultad.</li>
                                        <li>Fuerte apego a rutinas e intereses específicos.</li>
                                        <li>Comportamientos repetitivos como forma de autorregulación.</li>
                                    </ul>

                                <p>
                                        Funcionamiento
                                    </p>
                                    <ul>
                                        <li>Se necesita apoyo en la vida diaria. Es probable que tenga dificultades para vivir de forma independiente. El acceso a modificaciones educativas, terapias y una red de personas de apoyo puede mejorar significativamente su calidad de vida.</li>
                                    
                                    </ul>


                                </div>
                            </div>


                            
                            <div class="card azul">
                                <div class="icon">
                                    <h1>3</h1>
                                </div>

                                <h3>Requiere un apoyo muy sustancial</h3>

                                <p class="short">
                                    El autismo de nivel 3, anteriormente conocido como autismo de bajo funcionamiento, presenta los desafíos más importantes en la comunicación social y la flexibilidad conductual. Las personas de este nivel requieren un apoyo intensivo y continuo en múltiples aspectos de la vida diaria.               </p>

                                <button class="toggle">
                                    Ver más
                                    <span>▼</span>
                                </button>

                                <div class="extra">
                                    <p>
                                    Comunicación social
                                    </p>
                                    <ul>
                                        <li>Comunicación muy limitada o no verbal.</li>
                                        <li>Dificultad para expresar necesidades e interactuar socialmente.</li>
                                    </ul>

                                    <p>
                                    Flexibilidad conductual
                                    </p>
                                    <ul>
                                        <li>Cambios inesperados provocan gran dificultad.</li>
                                        <li>Comportamientos repetitivos intensos para regularse o calmarse.</li>
                                    </ul>

                                <p>
                                        Funcionamiento
                                    </p>
                                    <ul>
                                        <li>Necesita un soporte considerable en la mayoría de los entornos. Pueden tener dificultades con las actividades de la vida diaria, y la comunicación de sus necesidades básicas puede ser un desafío importante.</li>
                                    </ul>


                                </div>
                            </div>

                            
                        </section>



                        <div class="random">
                            
                        <p><span>Nota importante:</span> La etiqueta "niveles" no significa que una persona tenga un autismo "leve" o "grave". Cada persona autista se enfrenta a experiencias únicas, y el objetivo es brindar un apoyo personalizado que le permita vivir una vida plena y significativa. 
                        </p>                
                    </div>


            </div>

            <br><br><br>


            <div class="guias-contenedor">
                <div class="guias">
                    g
                </div>
            </div>






            <br><br><br><br>


        </div>
    


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


<footer>
    <br>
    <div class="footer-contenido">

        <div class="footer-columna">
            <h1>Acerca de</h1>
            <a href="">Nuestro equipo</a>
            <a href="">Nuestra misión</a>
            <a href="">Sobre nosotros</a>

        </div>

        <div class="linea-vertical"></div>

                <div class="footer-columna">
            <h1>Recursos</h1>
            <a href="">Guía para padres</a>
            <a href="">Guía para maestros</a>
            <a href="">Juegos interactivos</a>

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
        <h1>MiniMinds!</h1>
        <p>Apoyo al desarrollo de infancias sanas y adaptivas</p>
    </div>

     <br><br>
    <div class="redes">
        <a href="{{ route('teainfo') }}"><img src="{{ asset('/IMG/insta icon.png') }}" alt="" class="sociales"></a>
        <a href=""><img src="{{ asset('/IMG/tt icon.png') }}" alt="" class="sociales"></a>

        <a href=""><img src="{{ asset('/IMG/yt icon.png') }}" alt="" class="sociales"></a>

    </div>


</footer>

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

                <div class="modebtn">
                    <svg
                        class="luna"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">

                        <path
                            d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"
                            fill="currentColor"/>

                        <path
                            d="M18 4 L18.6 5.4 L20 6 L18.6 6.6 L18 8 L17.4 6.6 L16 6 L17.4 5.4 Z"
                            fill="currentColor"/>

                        <path
                            d="M21 2 L21.4 3 L22.4 3.4 L21.4 3.8 L21 4.8 L20.6 3.8 L19.6 3.4 L20.6 3 Z"
                            fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <h3>Idioma</h3>

            <div class="idiomasbtn">
                <button class="idioma">ESPAÑOL</button>
                <button class="idioma2">ENGLISH</button>
            </div>

        </div>
    </div>



</body>
</html>