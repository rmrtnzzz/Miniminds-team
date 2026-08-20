<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat — Miniminds</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shared/chat.css') }}">
</head>
<body>

<div class="mm-chat">

    
    <aside class="mm-chat__sidebar">
        <a href="{{ auth()->check() ? auth()->user()->panelUrl() : route('home') }}" class="mm-chat__brand" style="text-decoration:none;">
            <span class="mm-chat__brand-dot"></span>
            Miniminds
        </a>
        <a href="{{ auth()->check() ? auth()->user()->panelUrl() : route('home') }}" style="display:inline-block;font-size:12px;color:inherit;opacity:.7;text-decoration:none;margin:-8px 0 8px;">&larr; Volver</a>

        <p class="mm-chat__sidebar-label">Elige a tu compañero</p>

        <div class="mm-pets" id="mmPets">
            <button class="mm-pet mm-pet--nilo is-active" data-pet="nilo">
                <span class="mm-pet__avatar">🦭</span>
                <span class="mm-pet__info">
                    <span class="mm-pet__name">Nilo</span>
                    <span class="mm-pet__role">Te escucha con calma</span>
                </span>
            </button>

            <button class="mm-pet mm-pet--kairo" data-pet="kairo">
                <span class="mm-pet__avatar">🦇</span>
                <span class="mm-pet__info">
                    <span class="mm-pet__name">Kairo</span>
                    <span class="mm-pet__role">Aventuras y energía</span>
                </span>
            </button>

            <button class="mm-pet mm-pet--pipo" data-pet="pipo">
                <span class="mm-pet__avatar">🐦</span>
                <span class="mm-pet__info">
                    <span class="mm-pet__name">Pipo</span>
                    <span class="mm-pet__role">Ideas y estrategias</span>
                </span>
            </button>

            <button class="mm-pet mm-pet--luma" data-pet="luma">
                <span class="mm-pet__avatar">⭐</span>
                <span class="mm-pet__info">
                    <span class="mm-pet__name">Luma</span>
                    <span class="mm-pet__role">Brilla contigo</span>
                </span>
            </button>
        </div>

        <div class="mm-chat__sidebar-footer">
            <p>¿Necesitas ayuda urgente?</p>
            <a href="{{ url('/contacto') }}" class="mm-chat__help-link">Habla con un profesional →</a>
        </div>
    </aside>

    
    <main class="mm-chat__main">

        <header class="mm-chat__header">
            <div class="mm-chat__header-pet">
                <span class="mm-chat__header-avatar" id="mmHeaderAvatar">🦭</span>
                <div>
                    <h1 class="mm-chat__header-name" id="mmHeaderName">Nilo</h1>
                    <p class="mm-chat__header-status">
                        <span class="mm-chat__status-dot"></span>
                        En línea
                    </p>
                </div>
            </div>
        </header>

        <section class="mm-chat__messages" id="mmMessages">
            <div class="mm-msg mm-msg--bot">
                <span class="mm-msg__avatar">🦭</span>
                <div class="mm-msg__bubble">
                    ¡Hola! Soy Nilo 🌊 Estoy aquí para escucharte con calma.
                    ¿Cómo te sientes hoy?
                </div>
            </div>
        </section>

        <div class="mm-chat__typing" id="mmTyping" hidden>
            <span class="mm-msg__avatar">🦭</span>
            <div class="mm-typing-bubble">
                <span></span><span></span><span></span>
            </div>
        </div>

        <form class="mm-chat__composer" id="mmComposer" autocomplete="off">
            <input
                type="text"
                id="mmInput"
                class="mm-chat__input"
                placeholder="Escribe tu mensaje..."
                maxlength="500"
            />
            <button type="submit" class="mm-chat__send" aria-label="Enviar mensaje">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M2.5 10L17.5 2.5L12.5 17.5L9.5 11L2.5 10Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" stroke-linecap="round"/>
                </svg>
            </button>
        </form>
    </main>
</div>

<script>
    window.MM_CHAT = {
        apiUrl: "{{ route('chat.enviar') }}",
        csrfToken: "{{ csrf_token() }}",
        rol: "{{ auth()->check() ? (auth()->user()->role ?? 'paciente') : 'paciente' }}"
    };
</script>
<script src="{{ asset('js/shared/chat.js') }}"></script>
</body>
</html>
