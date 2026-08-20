@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card-miniminds p-4">
            <h4 class="fw-bold mb-3">💬 Asistente Miniminds</h4>

            <!-- Ventana de chat -->
            <div id="chat-box" style="height:400px; overflow-y:auto; background:rgba(255,255,255,0.4); border-radius:15px; padding:15px; margin-bottom:15px;">
                <div class="mb-3">
                    <span style="background:#9B8EC4; color:white; padding:8px 15px; border-radius:15px; display:inline-block;">
                        👋 Hola! Soy tu asistente de Miniminds. ¿En qué puedo ayudarte hoy?
                    </span>
                </div>
            </div>

            <!-- Input del mensaje -->
            <div class="d-flex gap-2">
                <input type="text" id="mensaje" class="form-control" placeholder="Escribe tu pregunta..." style="border-radius:20px;">
                <button onclick="enviarMensaje()" class="btn-acento px-4">Enviar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function enviarMensaje() {
        const mensaje = document.getElementById('mensaje').value;
        if (!mensaje.trim()) return;

        const chatBox = document.getElementById('chat-box');

        // Mostrar mensaje del usuario
        chatBox.innerHTML += `
            <div class="mb-3 text-end">
                <span style="background:#F5A623; color:white; padding:8px 15px; border-radius:15px; display:inline-block;">
                    ${mensaje}
                </span>
            </div>`;

        document.getElementById('mensaje').value = '';

        // Enviar al servidor
        fetch('{{ route("chat.enviar") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ mensaje: mensaje })
        })
        .then(res => res.json())
        .then(data => {
            chatBox.innerHTML += `
                <div class="mb-3">
                    <span style="background:#9B8EC4; color:white; padding:8px 15px; border-radius:15px; display:inline-block;">
                        🤖 ${data.respuesta}
                    </span>
                </div>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    }

    // Enviar con Enter
    document.getElementById('mensaje').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') enviarMensaje();
    });
</script>

@endsection