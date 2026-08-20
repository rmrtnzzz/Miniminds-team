<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neurodivergencias</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/neurodiver.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/diverdark.css') }}">
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

        <div class="titulo-hero">
            NEURODIVERGENCIAS
        </div>

        <p class="subtitulo-hero">
            El término neurodivergencia no se refiere a una sola condición,<br> sino a un enorme paraguas que agrupa múltiples  formas en que <br> el cerebro procesa la información, las emociones y el entorno.   
        </p>

            <div class="buscar">
                <form id="form-buscador">
                    <input 
                        type="text" 
                        id="input-buscador"
                        name="buscar" 
                        placeholder="Busca aquí..." 
                        aria-label="Buscar"
                        autocomplete="off"
                    >

                    <button type="submit" aria-label="Buscar">
                        🔍
                    </button>
                </form>
            </div>

    </div>

</header>

<div id="sin-resultados" class="sin-resultados">
    <div class="sin-resultados-icono">🔎</div>

    <h2>No encontramos resultados</h2>

    <p>
        Intenta buscar otra condición o palabra.
    </p>
</div>

<section class="contenido-neuro">


    <h2 class="titulo-seccion">
        Condiciones del Neurodesarrollo y Procesamiento
    </h2>


    <div class="tarjetas-grid">

        <div class="tarjeta-neuro">

            <h3>TEA</h3>

            <p>
                Trastorno del Espectro Autista. Afecta la comunicación,
                socialización y puede presentar diferentes características.
            </p>

            <a href="{{ route('divergencia') }}">Ver información →</a>
        </div>


        <div class="tarjeta-neuro">

            <h3>TDAH</h3>

            <p>
                Trastorno por Déficit de Atención e Hiperactividad.
                Puede afectar la atención, impulsividad y organización.
            </p>

            <a href="{{ route('tdah') }}">Ver información →</a>
        </div>




        <div class="tarjeta-neuro">

            <h3>TDA</h3>

            <p>
                Puede presentar dificultades relacionadas con la atención,
                organización y concentración.
            </p>

            <a href="{{ route('tda') }}">Ver información →</a>
        </div>



        <div class="tarjeta-neuro">

            <h3>Dispraxia</h3>

            <p>
                Puede afectar la coordinación, planificación y ejecución
                de determinados movimientos.
            </p>

            <a href="#">Ver información →</a>
        </div>

                <div class="tarjeta-neuro">

            <h3>Sindrome de Tourette</h3>

            <p>
                Presencia de tics motores y vocales que ocurren de forma involuntaria.          
            </p>

            <a href="#">Ver información →</a>
        </div>


    </div>

</section>



<section class="contenido-neuro">


    <h2 class="titulo-seccion">
        Dificultades Específicas del Aprendizaje (Trastornos DYS)
    </h2>

    <div class="tarjetas-grid">


        <div class="tarjeta-neuro">

            <h3>Dislexia</h3>

            <p>
                Dificultad específica del aprendizaje relacionada
                principalmente con la lectura y escritura.
            </p>

            <a href="{{ route('dislexia') }}">Ver información →</a>
        </div>


        <div class="tarjeta-neuro">

            <h3>Discalculia</h3>

            <p>
                Dificultad específica relacionada con la comprensión
                y manejo de números y conceptos matemáticos.
            </p>

            <a href="#">Ver información →</a>
        </div>

        <div class="tarjeta-neuro">

            <h3>Disgrafía</h3>

            <p>
                 Obstáculos en la escritura a mano, la ortografía y las habilidades motoras finas.
            </p>

            <a href="#">Ver información →</a>
        </div>

    </div>

</section>



<section class="contenido-neuro">


    <h2 class="titulo-seccion">
        Neurodivergencias Psiquiátricas y de la Salud Mental
    </h2>

    <div class="tarjetas-grid">


        <div class="tarjeta-neuro">

            <h3>TOC (Trastorno Obsesivo-Compulsorio)</h3>

            <p>
                El cerebro se estanca en bucles de pensamientos intrusivos (obsesiones) y necesita ejecutar acciones repetitivas (compulsiones) para aliviar la ansiedad.         
           </p>

            <a href="#">Ver información →</a>
        </div>


        <div class="tarjeta-neuro">

            <h3>TLP o BPD (Trastorno Límite de la Personalidad)</h3>

            <p>
                Produce una forma intensamente divergente de procesar las emociones, el apego interpersonal y la identidad.
            </p>

            <a href="#">Ver información →</a>
        </div>

        <div class="tarjeta-neuro">

            <h3>Esquizofrenia</h3>

            <p>
                El cerebro experimenta una desconexión o procesamiento alternativo de la realidad a través de alucinaciones, delirios o un pensamiento desorganizado.
            </p>

            <a href="#">Ver información →</a>
        </div>

        <div class="tarjeta-neuro">

            <h3>Trastorno Bipolar</h3>

            <p>
                 Variaciones extremas y estructurales en la regulación de la energía, el pensamiento y el estado de ánimo (manía y depresión).
            </p>

            <a href="#">Ver información →</a>
        </div>



    </div>

</section>



<section class="contenido-neuro">


    <h2 class="titulo-seccion">
        Condiciones Genéticas y del Desarrollo Adicionales
    </h2>


    <div class="tarjetas-grid">

        <div class="tarjeta-neuro">

            <h3>Síndrome de Down</h3>

            <p>
                Una variación genética (cromosoma 21) que genera un desarrollo neurológico y cognitivo único.
            </p>

            <a href="#">Ver información →</a>
        </div>


        <div class="tarjeta-neuro">

            <h3>Trastorno del Procesamiento Sensorial (TPS)</h3>

            <p>
                 El cerebro tiene problemas para recibir y responder a la información que llega a través de los sentidos, independientemente de si se es autista o no.
            </p>

            <a href="#">Ver información →</a>
        </div>






    </div>

</section>



<br><br><br><br><br><br><br>




<footer>
    @include('components.footer')


</footer>



</body>
</html>