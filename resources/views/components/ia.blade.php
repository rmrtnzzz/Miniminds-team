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
            <input type="text" placeholder="Escribe tu pregunta...">
            <button class="btn-enviar">
                <img src="{{ asset('/IMG/DIBUJOS/enviar mensaje.svg') }}" alt="">
            </button>
        </div>

    </div>

</div>