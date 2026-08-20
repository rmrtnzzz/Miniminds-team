document.addEventListener('DOMContentLoaded', function () {
    var btnEnviar = document.querySelector('.iapanel .btn-enviar');
    var input = document.querySelector('.iapanel .chat-footer input');
    var chatBody = document.querySelector('.iapanel .chat-body');

    if (!btnEnviar || !input || !chatBody || !window.MM_CHAT) return;

    var escribiendo = chatBody.querySelector('.mensaje.ia.escribiendo');

    // Quitar la burbuja vacía de ejemplo que trae la maqueta
    var vacio = chatBody.querySelector('.mensaje.usuario');
    if (vacio && vacio.textContent.trim() === '') vacio.remove();

    function agregarMensaje(texto, tipo) {
        var div = document.createElement('div');
        div.className = 'mensaje ' + tipo;
        div.textContent = texto;
        if (escribiendo) {
            chatBody.insertBefore(div, escribiendo);
        } else {
            chatBody.appendChild(div);
        }
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function mostrarEscribiendo(mostrar) {
        if (!escribiendo) return;
        escribiendo.style.display = mostrar ? 'flex' : 'none';
    }

    function enviarMensaje() {
        var texto = input.value.trim();
        if (!texto) return;

        if (!window.MM_CHAT.authenticated) {
            window.location.href = window.MM_CHAT.loginUrl;
            return;
        }

        agregarMensaje(texto, 'usuario');
        input.value = '';
        mostrarEscribiendo(true);

        fetch(window.MM_CHAT.enviarUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.MM_CHAT.csrf
            },
            body: JSON.stringify({ mensaje: texto })
        })
            .then(function (res) { return res.json(); })
            .then(function (data) {
                mostrarEscribiendo(false);
                agregarMensaje(data.respuesta || 'Lo siento, no pude procesar eso. ¿Puedes intentar de nuevo?', 'ia');
            })
            .catch(function () {
                mostrarEscribiendo(false);
                agregarMensaje('Hubo un problema de conexión. Intenta de nuevo en un momento.', 'ia');
            });
    }

    btnEnviar.addEventListener('click', function (e) {
        e.preventDefault();
        enviarMensaje();
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            enviarMensaje();
        }
    });
});
