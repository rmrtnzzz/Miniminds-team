<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Normas de la comunidad | NEURO-MINIMINDS!</title>

        <link rel="stylesheet" href="{{ asset('css/frontend/normas.css') }}">
                <link rel="stylesheet" href="{{ asset('css/frontend/components.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/modo-oscuro/normasdark.css') }}">
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


</header>    





<div class="contenedorinfo" id="informacion">
    <main class="pagina-normas">
        <section class="intro-normas">

            <div class="intro-contenido">

                <h1>
                    Normas de la Comunidad
                <img src="{{ asset('/IMG/LOGO_NM.png') }}" class="LOGO">
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

                <img src="{{ asset('IMG/oso-calma.png') }}"
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

                <img src="{{ asset('IMG/proteccion-infantil.png') }}"
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

                <img src="{{ asset('IMG/comentarios.png') }}"
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

                <img src="{{ asset('IMG/profesional.png') }}"
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

                <img src="{{ asset('IMG/reporte.png') }}"
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

    @include('components.footer')


</footer>






</body>

</html>