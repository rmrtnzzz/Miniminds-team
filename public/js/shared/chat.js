(function () {
    const config = window.MM_CHAT || {};
    const API_URL = config.apiUrl || "/chat/enviar";
    const CSRF_TOKEN = config.csrfToken
        || document.querySelector('meta[name="csrf-token"]')?.content
        || "";
    const ROL = config.rol || "paciente";

    const PETS = {
        nilo:  { emoji: "🦭", name: "Nilo",  greeting: "¡Hola! Soy Nilo 🌊 Estoy aquí para escucharte con calma. ¿Cómo te sientes hoy?" },
        kairo: { emoji: "🦇", name: "Kairo", greeting: "¡Ey! Soy Kairo ⚡ ¿List@ para una aventura? Cuéntame qué tienes en mente." },
        pipo:  { emoji: "🐦", name: "Pipo",  greeting: "¡Hola! Soy Pipo 🐦 Me encanta ayudar a encontrar ideas. ¿En qué te ayudo hoy?" },
        luma:  { emoji: "⭐", name: "Luma",  greeting: "¡Hola! Soy Luma ✨ Brillemos juntos. ¿Qué quieres platicar?" }
    };

    let mascotaActual = "nilo";
    const sessionId = "web_" + Math.random().toString(36).slice(2, 10);

    const elPets = document.querySelectorAll(".mm-pet");
    const elMessages = document.getElementById("mmMessages");
    const elForm = document.getElementById("mmComposer");
    const elInput = document.getElementById("mmInput");
    const elTyping = document.getElementById("mmTyping");
    const elHeaderAvatar = document.getElementById("mmHeaderAvatar");
    const elHeaderName = document.getElementById("mmHeaderName");
    const elSendBtn = elForm ? elForm.querySelector(".mm-chat__send") : null;

    function escapeHtml(str) {
        const div = document.createElement("div");
        div.textContent = str;
        return div.innerHTML;
    }

    function addMessage(text, sender, emoji) {
        const wrap = document.createElement("div");
        wrap.className = "mm-msg mm-msg--" + sender;

        if (sender === "bot") {
            wrap.innerHTML = `
                <span class="mm-msg__avatar">${emoji}</span>
                <div class="mm-msg__bubble">${escapeHtml(text)}</div>
            `;
        } else {
            wrap.innerHTML = `<div class="mm-msg__bubble">${escapeHtml(text)}</div>`;
        }

        elMessages.appendChild(wrap);
        elMessages.scrollTop = elMessages.scrollHeight;
    }

    function setMascota(key) {
        if (!PETS[key]) return;
        mascotaActual = key;
        const pet = PETS[key];

        elPets.forEach(btn => btn.classList.toggle("is-active", btn.dataset.pet === key));
        elHeaderAvatar.textContent = pet.emoji;
        elHeaderName.textContent = pet.name;
        elTyping.querySelector(".mm-msg__avatar").textContent = pet.emoji;
    }

    elPets.forEach(btn => {
        btn.addEventListener("click", () => {
            const key = btn.dataset.pet;
            if (key === mascotaActual || !PETS[key]) return;
            setMascota(key);
            addMessage(PETS[key].greeting, "bot", PETS[key].emoji);
        });
    });

    elForm.addEventListener("submit", async function (e) {
        e.preventDefault();
        const mensaje = elInput.value.trim();
        if (!mensaje) return;

        addMessage(mensaje, "user");
        elInput.value = "";
        elInput.disabled = true;
        if (elSendBtn) elSendBtn.disabled = true;
        elTyping.hidden = false;
        elMessages.scrollTop = elMessages.scrollHeight;

        try {
            const res = await fetch(API_URL, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": CSRF_TOKEN,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    mensaje: mensaje,
                    rol: ROL,
                    session_id: sessionId,
                    mascota_actual: mascotaActual
                })
            });

            if (!res.ok) {
                throw new Error("HTTP " + res.status);
            }

            const data = await res.json();
            elTyping.hidden = true;

            const mascotaRespuesta = data.mascota || mascotaActual;
            if (mascotaRespuesta !== mascotaActual && PETS[mascotaRespuesta]) {
                setMascota(mascotaRespuesta);
            }

            addMessage(
                data.respuesta || "Lo siento, no pude procesar eso. ¿Puedes intentar de nuevo?",
                "bot",
                PETS[mascotaRespuesta]?.emoji || PETS[mascotaActual].emoji
            );

        } catch (err) {
            elTyping.hidden = true;
            addMessage("Hubo un problema de conexión. Intenta de nuevo en un momento 💜", "bot", PETS[mascotaActual].emoji);
        } finally {
            elInput.disabled = false;
            if (elSendBtn) elSendBtn.disabled = false;
            elInput.focus();
        }
    });
})();
