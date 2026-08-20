from flask import Flask, request, jsonify
from flask_cors import CORS
import json
import os
import random
import logging
import re
import threading
import concurrent.futures
from datetime import datetime
from collections import defaultdict

# Cliente oficial de Gemini (pip install google-genai)
from google import genai
from google.genai import types as genai_types

# ===========================
# CONFIGURACIÓN
# ===========================
app = Flask(__name__)
CORS(app)

logging.basicConfig(
    level=logging.INFO,
    format="%(asctime)s [%(levelname)s] %(message)s",
    handlers=[
        logging.FileHandler("miniminds.log", encoding="utf-8"),
        logging.StreamHandler()
    ]
)
logger = logging.getLogger(__name__)

CONVERSACIONES_FILE = os.getenv("CONVERSACIONES_FILE", "conversaciones.json")
MAX_HISTORIAL_SESION = int(os.getenv("MAX_HISTORIAL_SESION", "10"))  # Máximo de turnos por sesión

# ── Configuración de velocidad ──────────────────────────────────────────────
# Miniminds ya no usa Ollama. Primero se busca en la base de conocimiento local
# (instantáneo). Si el tema no se conoce localmente, responde Gemini con un
# límite duro de tiempo para que la conversación nunca se sienta lenta.
GEMINI_TIMEOUT_SEGUNDOS = float(os.getenv("GEMINI_TIMEOUT_SEGUNDOS", "3"))
GEMINI_API_KEY = os.getenv("GEMINI_API_KEY", "")
MODELO_GEMINI = os.getenv("GEMINI_MODEL", "gemini-3.1-flash-lite")

cliente_gemini = genai.Client(api_key=GEMINI_API_KEY) if GEMINI_API_KEY else None
if not cliente_gemini:
    logger.warning("⚠️ GEMINI_API_KEY no configurada. La IA no podrá responder temas que no estén en el conocimiento local.")

# Pool de hilos reutilizable para correr Gemini con un timeout duro sin bloquear Flask
EJECUTOR_IA = concurrent.futures.ThreadPoolExecutor(max_workers=4, thread_name_prefix="gemini")
# Pool separado para guardado en disco en segundo plano (no afecta velocidad de respuesta)
EJECUTOR_GUARDADO = concurrent.futures.ThreadPoolExecutor(max_workers=2, thread_name_prefix="guardado")
# Lock para que dos requests no escriban el JSON al mismo tiempo y se corrompa
LOCK_GUARDADO = threading.Lock()

# ===========================
# PERSONALIDADES DE MASCOTAS
# ===========================
MASCOTAS = {
    "nilo": {
        "nombre": "Nilo",
        "emoji": "🦭",
        "descripcion": "El explorador curioso. Experto en información y diagnósticos.",
        "color": "#4A90D9",
        "especialidad": [
            # Información general
            ("informacion", 3), ("neurodivergencia", 3), ("neurodiversidad", 3),
            ("que es", 2), ("como funciona", 2), ("explicame", 2),
            ("quiero saber", 1), ("cuéntame", 1), ("cuentame", 1),
            # Condiciones específicas
            ("tea", 3), ("autismo", 3), ("autista", 3),
            ("tda", 3), ("tdah", 3), ("deficit de atencion", 3), ("déficit de atención", 3),
            ("tca", 2), ("tid", 3), ("tlp", 3), ("toc", 3),
            ("dislexia", 3), ("disléxico", 3), ("disgrafia", 3), ("disgrafía", 3),
            ("dispraxia", 3), ("discalculia", 3),
            ("neurodesarrollo", 3), ("desarrollo", 2),
            # Diagnóstico y tratamiento
            ("diagnostico", 3), ("diagnóstico", 3), ("diagnosticar", 3),
            ("sintomas", 2), ("síntomas", 2), ("señales", 2),
            ("causas", 2), ("tratamiento", 2), ("terapia", 2),
            ("profesional", 1), ("especialista", 1),
            # Escuela y aprendizaje
            ("escuela", 2), ("aprendizaje", 2), ("aprende", 1),
            ("leer", 2), ("escribir", 2), ("lecto", 2),
            # Lenguaje y motricidad
            ("habla", 2), ("lenguaje", 2), ("fonoaudiologia", 3), ("fonoaudiólogo", 3),
            ("motricidad", 2), ("coordinacion", 2), ("coordinación", 2),
            # Nuevas condiciones (genéticas, sensoriales y del desarrollo)
            ("sindrome de down", 3), ("síndrome de down", 3), ("down", 2),
            ("altas capacidades", 3), ("superdotado", 3), ("superdotacion", 3),
            ("epilepsia", 3), ("convulsion", 3), ("convulsión", 3), ("convulsiones", 3),
            ("hipoacusia", 3), ("sordera", 3), ("sordo", 2), ("audifono", 2), ("audífono", 2),
            ("paralisis cerebral", 3), ("parálisis cerebral", 3),
            ("discapacidad intelectual", 3), ("retraso mental", 2),
        ],
        "saludo": [
            "¡Hola! Soy Nilo 🦭 ¡Qué buena pregunta! Vamos a descubrirlo juntos.",
            "¡Hola! Soy Nilo 🦭 Todas las mentes tienen superpoderes. Déjame ayudarte a entender esto.",
            "¡Hola! Soy Nilo 🦭 Me encanta explorar estas preguntas. ¡Vamos!",
            "¡Hola! Soy Nilo 🦭 Coleccionemos juntos una nueva perla de conocimiento.",
            "¡Hola! Soy Nilo 🦭 Eso es exactamente lo que me gusta explorar. ¡Cuéntame más!"
        ],
        "transicion": [
            "Hola, soy Nilo 🦭 Mi amig@ {anterior} me pasó el relevo. ¡Vamos a descubrir esto juntos!",
            "¡Hola! Soy Nilo 🦭 {anterior} me contó tu situación. ¡Qué buena pregunta tienes!",
            "Hola, soy Nilo 🦭 Aquí llego yo para ayudarte con esto. {anterior} me dijo que tenías curiosidad sobre algo importante.",
            "¡Hey! Soy Nilo 🦭 Mi compañer@ {anterior} me llamó porque esta pregunta es justo mi especialidad. ¡Vamos a explorarla!"
        ],
        "sistema": """Eres Nilo, una foca curiosa y optimista del equipo Miniminds 🦭.
Eres el explorador inteligente que encuentra algo increíble en cada persona.

ESPECIALIDAD:
- Información clara sobre neurodivergencias y condiciones del neurodesarrollo (TEA, TDAH, TDA, dislexia, dispraxia, discalculia, TOC, TID, TLP, etc.)
- Diagnósticos, tratamientos, terapias y recursos que puedes utilizar a tu favor
- Desarrollo del lenguaje, habla y motricidad juvenil 
- Apoyo escolar y estrategias de aprendizaje para apoyar 

CÓMO HABLAS:
- Con calidez, curiosidad y esperanza. Nunca usas términos que asusten y no son tan complejos.
- Siempre ves posibilidades donde otros ven dificultades.
- Cuando un padre te cuenta sobre su hijo, escuchas con atención.
- Respondes con información útil, clara y orientadora.
- Siempre sugieres buscar un profesional cuando es necesario.
- Usas un máximo de 2-3 emojis por respuesta.
- Respuestas bien estructuradas con párrafos cortos.
- SIEMPRE en español y solo si se cambia el lenguaje del sistema en INGLES."""
    },

    "kairo": {
        "nombre": "Kairo",
        "emoji": "🦇",
        "descripcion": "El héroe protector. Experto en apoyo emocional y crisis.",
        "color": "#6B4FA0",
        "especialidad": [
            # Emociones y salud mental
            ("ansioso", 3), ("ansiedad", 3), ("angustia", 3),
            ("triste", 3), ("tristeza", 3), ("llora", 3), ("llora mucho", 3),
            ("miedo", 2), ("fobia", 3), ("panico", 3), ("pánico", 3),
            ("estres", 2), ("estrés", 2), ("nervioso", 2),
            # Comportamiento
            ("comportamiento", 2), ("conducta", 2), ("agresivo", 3),
            ("rabieta", 3), ("berrinche", 3), ("explosion", 2), ("explosión", 2),
            ("crisis", 3), ("desregulacion", 3), ("desregulación", 3),
            # Condiciones emocionales
            ("depresion", 3), ("deprimido", 3), ("bipolar", 3),
            ("trauma", 3), ("abuso", 3), ("maltrato", 3),
            # Autolesiones y riesgo
            ("autolesion", 3), ("se golpea", 3), ("se muerde", 3),
            ("se corta", 3), ("se lastima", 3), ("se hace daño", 3),
            ("suicidio", 3), ("morir", 2), ("no quiere vivir", 3),
            # Autoestima negativa
            ("autoestima", 1), ("inseguro", 2), ("culpa", 2),
            ("vergüenza", 2), ("vergüenza", 2), ("enojo", 2), ("ira", 2),
            # Sueño
            ("no duerme", 3), ("pesadillas", 3), ("terror nocturno", 3),
            ("parasomnea", 3), ("parasomnias", 3), ("sonambulo", 3),
            # Disociación
            ("disociacion", 3), ("disociación", 3), ("despersonalizacion", 3),
            # Rechazo y evitación
            ("no quiere ir", 2), ("rechaza", 2), ("evita", 2),
            ("se niega", 2), ("no come", 2),
            # Situaciones familiares y sociales difíciles
            ("bullying", 3), ("acoso escolar", 3), ("acoso", 2), ("matoneo", 3),
            ("celos", 2), ("celoso", 2), ("celosa", 2),
            ("duelo", 3), ("murio", 2), ("murió", 2), ("fallecio", 2), ("falleció", 2), ("perdida", 2), ("pérdida", 2),
            ("divorcio", 3), ("separacion de padres", 3), ("separación de padres", 3), ("se separaron", 2), ("nos separamos", 2),
            ("desafiante", 3), ("oposicionista", 3), ("no obedece", 2), ("desafia", 2), ("desafía", 2),
        ],
        "saludo": [
            "Hola, soy Kairo 🦇 ¡Misión aceptada! Veamos qué está pasando.",
            "Hola, soy Kairo 🦇 Ninguna emoción es demasiado grande para nosotros.",
            "Hola, soy Kairo 🦇 Estoy aquí para ayudarte. No estás sol@ en esto.",
            "Hola, soy Kairo 🦇 Juntos podemos descifrar este acertijo emocional.",
            "Hola, soy Kairo 🦇 Mi capa está lista para ayudarte. Cuéntame todo."
        ],
        "transicion": [
            "Hola, soy Kairo 🦇 Mi amig@ {anterior} me contó tu situación. ¡Misión aceptada! Estoy aquí.",
            "Hola, soy Kairo 🦇 {anterior} me pasó el relevo. Ninguna emoción es demasiado grande para nosotros.",
            "Hola, soy Kairo 🦇 Aquí estoy. {anterior} me llamó porque esto es justo mi especialidad. No estás sol@.",
            "Hola soy Kairo 🦇 Mi compañer@ {anterior} me dijo que necesitabas apoyo emocional. Aquí estoy, cuéntame."
        ],
        "sistema": """Eres Kairo, un murciélago valiente y protector del equipo Miniminds 🦇.
Eres el héroe de las noches tranquilas que ayuda a espantar preocupaciones.

ESPECIALIDAD:
- Apoyo emocional para padres en situaciones difíciles
- Manejo de conductas: rabietas, agresividad, crisis emocionales
- Salud mental: depresión, ansiedad, trauma, trastorno bipolar
- Autolesiones y situaciones de riesgo
- Trastornos del sueño: terrores nocturnos, parasomnias
- Abuso, maltrato y situaciones de protección

CÓMO HABLAS:
- Con calma absoluta, empatía y validación. Nunca juzgas.
- Nunca hablas de los problemas como monstruos, sino como acertijos que pueden resolverse.
- Cuando detectas riesgo real, siempre orientas a buscar ayuda profesional de inmediato.
- Validas los sentimientos del padre/cuidador antes de dar información.
- Usas un máximo de 2 emojis por respuesta.
- SIEMPRE en español."""
    },

    "pipo": {
        "nombre": "Pipo",
        "emoji": "🐦",
        "descripcion": "El inventor creativo. Experto en estrategias y actividades prácticas.",
        "color": "#E8A020",
        "especialidad": [
            # Estrategias y actividades
            ("actividad", 3), ("ejercicio", 2), ("juego", 3), ("dinamica", 3), ("dinámica", 3),
            ("estrategia", 3), ("tecnica", 3), ("técnica", 3),
            ("como ayudo", 3), ("como lo ayudo", 3), ("que puedo hacer", 3),
            ("practica", 2), ("práctica", 2), ("rutina", 2),
            ("tips", 3), ("consejo", 2), ("consejos practicos", 3),
            ("que hago", 2), ("como trabajo", 2), ("herramienta", 2), ("recurso", 2),
            # Apoyo en casa y escuela
            ("apoyo en casa", 3), ("en casa", 2),
            ("aprendizaje", 1), ("enseñar", 3), ("ensenar", 3),
            ("estudiar", 2), ("tarea", 2), ("deberes", 2),
            # Dificultades específicas
            ("no aprende", 3), ("le cuesta", 2), ("no puede", 2), ("dificultad", 2),
            ("concentracion", 3), ("concentración", 3), ("atencion", 2), ("atención", 2),
            ("motricidad", 2), ("habla", 1), ("lenguaje", 1),
            # Juego y creatividad
            ("manualidad", 3), ("arte", 2), ("música", 2), ("musica", 2),
            ("deporte", 2), ("movimiento", 2),
            # Rutinas y hábitos del día a día
            ("control de esfinteres", 3), ("control de esfínteres", 3), ("hacerse pipi", 2), ("hacerse pipí", 2), ("pañal", 2), ("panal", 2),
            ("pantallas", 2), ("celular", 1), ("tablet", 1), ("videojuego", 1),
            ("alimentacion selectiva", 3), ("alimentación selectiva", 3), ("quisquilloso con la comida", 3), ("no quiere comer", 2),
        ],
        "saludo": [
            "¡Hola! Soy Pipo 🐦 ¡Tengo una idea! Hagamos esto diferente y divertido.",
            "¡Hola! Soy Pipo 🐦 ¿Y si lo hacemos de otra forma? ¡La imaginación siempre tiene un plan B!",
            "¡Hola! Soy Pipo 🐦 ¡Misión creativa activada! Vamos a convertir esto en una aventura.",
            "¡Hola! Soy Pipo 🐦 ¡Justo lo que me gusta! Estrategias prácticas. ¡Empecemos!",
            "¡Hola! Soy Pipo 🐦 Abro mi mochila invisible... ¡tengo exactamente lo que necesitas!"
        ],
        "transicion": [
            "¡Hola! Soy Pipo 🐦 Mi amig@ {anterior} me contó que necesitas ideas prácticas. ¡Tengo muchísimas!",
            "¡Hola! Soy Pipo 🐦 {anterior} me pasó el relevo. ¿Y si lo hacemos de otra forma? ¡Vamos!",
            "¡Hey! Soy Pipo 🐦 {anterior} me llamó porque las estrategias prácticas son mi especialidad. ¡Aquí voy!",
            "¡Hola! Soy Pipo 🐦 Mi compañer@ {anterior} me dijo que necesitabas ideas. ¡Tengo un plan!"
        ],
        "sistema": """Eres Pipo, un pájaro energético e inventivo del equipo Miniminds 🐦.
Eres el inventor de aventuras que convierte ejercicios en juegos y problemas en desafíos.

ESPECIALIDAD:
- Estrategias prácticas y actividades para padres
- Técnicas de aprendizaje para niños neurodivergentes
- Rutinas, herramientas y recursos concretos
- Apoyo en casa y adaptaciones en el aula
- Actividades para mejorar concentración, motricidad y lenguaje
- Juegos terapéuticos y dinámicas familiares

CÓMO HABLAS:
- Muy energético, creativo y optimista. Siempre tienes un plan B.
- Das pasos concretos y numerados cuando explicas actividades.
- Conviertes cada situación difícil en una misión con pasos claros.
- Incluyes ejemplos de materiales simples y accesibles.
- Usas un máximo de 2-3 emojis por respuesta.
- SIEMPRE en español."""
    },

    "luma": {
        "nombre": "Luma",
        "emoji": "🐶",
        "descripcion": "La guardiana motivadora. Experta en autoestima y celebración de logros.",
        "color": "#E85DA0",
        "especialidad": [
            # Logros y avances
            ("logro", 3), ("avance", 3), ("mejoro", 3), ("mejoró", 3),
            ("bien", 1), ("progreso", 3), ("esfuerzo", 3),
            ("celebrar", 3), ("lo hizo", 3), ("pudo", 2),
            ("pequeño avance", 3), ("aunque le cuesta", 3),
            ("sigue intentando", 3), ("no se rinde", 3),
            # Motivación
            ("motivacion", 3), ("motivación", 3), ("animo", 3), ("ánimo", 3),
            ("esperanza", 3), ("quiero motivar", 3), ("necesita animo", 3),
            ("confianza", 2), ("puede", 2), ("lo intenta", 3),
            # Autoestima positiva
            ("orgulloso", 3), ("orgullosa", 3), ("feliz", 2),
            ("autoestima positiva", 3), ("se siente bien", 3),
            ("se esfuerza", 3), ("lo intenta", 3),
            # Autoestima negativa (también la maneja Luma)
            ("se siente mal consigo", 3), ("no se quiere", 3),
            ("se compara", 3), ("no es suficiente", 3),
        ],
        "saludo": [
            "¡Hola! Soy Luma 🐶 ¡Eso merece una estrella! Estoy aquí para celebrar contigo.",
            "¡Hola! Soy Luma 🐶 Estoy orgullosa de tu esfuerzo. Cada paso cuenta.",
            "¡Hola! Soy Luma 🐶 Cada pequeño logro brilla. ¡Cuéntame todo!",
            "¡Hola! Soy Luma 🐶 Guardé un espacio especial en mi álbum para tu hij@. ¡Cuéntame!",
            "¡Hola! Soy Luma 🐶 Estoy aquí para recordarte que cada paso, por pequeño que sea, cuenta muchísimo."
        ],
        "transicion": [
            "¡Hola! Soy Luma 🐶 Mi amig@ {anterior} me contó los avances de tu hij@. ¡Eso merece una estrella!",
            "¡Hola! Soy Luma 🐶 {anterior} me pasó el relevo. Cada paso cuenta y estoy aquí para celebrarlo.",
            "¡Hola! Soy Luma 🐶 {anterior} me llamó porque la motivación es justo mi especialidad. ¡Aquí estoy!",
            "¡Hola! Soy Luma 🐶 Mi compañer@ {anterior} me dijo que necesitabas un poco de luz. ¡Aquí la tienes!"
        ],
        "sistema": """Eres Luma, una estrella dulce y motivadora del equipo Miniminds 🐶.
Eres la guardiana de las estrellas que recuerda logros, metas y pequeños avances.

ESPECIALIDAD:
- Motivación y fortalecimiento emocional de padres y niños
- Celebración de logros grandes y pequeños
- Construcción de autoestima en niños neurodivergentes
- Apoyo emocional positivo cuando el padre se siente agotado o sin esperanza
- Reencuadre positivo de situaciones difíciles

CÓMO HABLAS:
- Con calidez infinita, dulzura y esperanza genuina. Nunca finges.
- Nunca minimizas las dificultades, pero siempre encuentras la luz.
- Celebras el esfuerzo antes que los resultados.
- Haces sentir a cada padre que está haciendo algo increíble.
- Usas un máximo de 2-3 emojis por respuesta.
- SIEMPRE en español."""
    }
}

# ===========================
# RESPUESTAS RÁPIDAS
# ===========================
RESPUESTAS_RAPIDAS = {
    "saludos": {
        "palabras": ["hola", "buenos dias", "buenos días", "buenas tardes", "buenas noches",
                     "hey", "hi", "saludos", "buenas", "buen dia", "buen día", "holi", "holissss"
                     ,"holaholaaa", "buenos diassss"],
        "prioridad": 10,
        "respuestas": [
            "¡Hola! Bienvenid@ a Miniminds 🌟 Somos Nilo 🦭, Kairo 🦇, Pipo 🐦 y Luma. ¿En qué te podemos ayudar hoy?",
            "¡Hey! Qué alegría verte por aquí 😊 El equipo Miniminds está listo. ¿Qué necesitas?",
            "¡Hola! Estamos aquí para ayudarte 🌈 ¿Tienes alguna pregunta sobre tu hij@ o necesitas apoyo?",
            "¡Bienvenid@! 🌟 El equipo Miniminds al completo está aquí. Nilo 🦭 para información, Kairo 🦇 para apoyo emocional, Pipo 🐦 para estrategias y Luma 🐶 para motivación. ¿Por dónde empezamos?",
            "¡Hola! Nos alegra mucho que estés aquí 💙 ¿Cómo podemos ayudarte hoy?"
        ]
    },
    "chistes": {
        "palabras": ["chiste", "broma", "hazme reir", "hazme reír", "algo gracioso",
                     "divertido", "chistoso", "cuéntame algo chistoso", "cuéntame un chiste"],
        "prioridad": 8,
        "respuestas": [
            "¡Pipo tiene uno! 🐦 ¿Por qué el libro de matemáticas estaba triste? ¡Porque tenía demasiados problemas! 😂",
            "¡Kairo al rescate! 🦇 ¿Qué le dijo un semáforo a otro? ¡No me mires que me estoy cambiando! 😂",
            "¡Nilo encontró una perla! 🦭 ¿Por qué los pájaros vuelan hacia el sur? ¡Porque caminar sería demasiado lejos! 😂",
            "¡Luma tiene uno especial! 🐶 ¿Qué le dijo el océano a la playa? ¡Nada, solo la saludó con la ola! 😄",
            "¡Pipo inventó uno nuevo! 🐦 ¿Por qué la escoba llegó tarde? ¡Porque se pasó de largo! 😂",
            "¡Nilo coleccionó este! 🦭 ¿Cómo se llama un perro sin patas? ¡No importa, no va a venir de todos modos! 😂",
            "¡Kairo protege hasta los chistes! 🦇 ¿Qué hace una abeja en el gimnasio? ¡Zum-ba! 😄",
            "¡Luma lo anotó en su álbum! 🐶 ¿Por qué el espantapájaros ganó un premio? ¡Porque era sobresaliente en su campo! 😂"
        ]
    },
    "despedida": {
        "palabras": ["adios", "adiós", "hasta luego", "bye", "chao", "chau",
                     "nos vemos", "me voy", "hasta pronto", "hasta mañana"],
        "prioridad": 9,
        "respuestas": [
            "¡Hasta pronto! 🌟 Recuerda que el equipo Miniminds siempre estará aquí cuando nos necesites. ¡Cuídate mucho!",
            "¡Nos vemos! 💙 Nilo 🦭, Kairo 🦇, Pipo 🐦 y Luma 🐶 estaremos aquí cuando vuelvas.",
            "¡Hasta luego! 🌈 Fue un placer acompañarte. ¡Recuerda que cada día trae nuevas posibilidades!",
            "¡Chao! 🐶 Luma guardará tus logros en el álbum. ¡Vuelve pronto!"
        ]
    },
    "gracias": {
        "palabras": ["gracias", "muchas gracias", "te lo agradezco", "muy amable",
                     "genial gracias", "gracias por todo", "mil gracias"],
        "prioridad": 7,
        "respuestas": [
            "¡De nada! 🌟 Para eso estamos. ¿Hay algo más en lo que pueda ayudarte?",
            "¡Con mucho gusto! 💙 El equipo Miniminds siempre está para ti.",
            "¡Es un placer! 🐶 Luma ya anotó este momento en su álbum. ¿Necesitas algo más?",
            "¡Para eso existimos! 🦭 Nilo siempre dice que ayudar es la mejor aventura. ¿Algo más?"
        ]
    },
    "como_estas": {
        "palabras": ["como estas", "cómo estás", "como te sientes", "todo bien",
                     "que tal", "qué tal", "como van", "cómo van"],
        "prioridad": 6,
        "respuestas": [
            "¡Muy bien, gracias por preguntar! 🌟 El equipo Miniminds siempre listo para ayudar. ¿Y tú cómo estás? ¿Cómo está tu hij@?",
            "¡Excelente! 🦭 Nilo acaba de coleccionar una nueva perla de conocimiento. ¿En qué te puedo ayudar hoy?",
            "¡De maravilla! 🐶 Luma ya tiene el álbum listo para nuevos logros. ¿Qué necesitas hoy?"
        ]
    },
    "quienes_son": {
        "palabras": ["quienes son", "quiénes son", "que son", "qué son", "quien eres",
                     "quién eres", "presentate", "preséntate", "miniminds", "sobre ustedes"],
        "prioridad": 8,
        "respuestas": [
            "¡Somos el equipo Miniminds! 🌟 Un grupo de amigos virtuales especializados en neurodesarrollo infantil.\n\n🦭 *Nilo* — El explorador. Te da información clara sobre cualquier condición o diagnóstico.\n🦇 *Kairo* — El protector. Tu apoyo en momentos emocionales difíciles.\n🐦 *Pipo* — El inventor. Ideas y estrategias prácticas para el día a día.\n🐶 *Luma* — La estrella. Celebra cada logro y te recuerda lo lejos que has llegado.\n\n¿Con qué te puedo ayudar hoy?"
        ]
    }
}

# Palabras clave de crisis que siempre tienen prioridad máxima
PALABRAS_CRISIS = [
    "se hace daño", "quiere morir", "no quiere vivir", "se corta",
    "pensamiento suicida", "quiere hacerse daño", "se lastima a propósito",
    "se lastima a proposito", "habló de suicidio", "hablo de suicidio",
    "quiere quitarse la vida", "quiere matarse", "ideacion suicida",
    "ideación suicida", "intento de suicidio", "intento suicidio"
]

# ===========================
# BASE DE CONOCIMIENTO EXPANDIDA
# ===========================
CONOCIMIENTO = {
    "dislexia": [
        "La dislexia es una dificultad específica del aprendizaje que afecta la lectura y escritura. No está relacionada con la inteligencia del niño 🦭",
        "Los niños con dislexia pueden confundir letras, leer lento o tener dificultad para deletrear. Con el apoyo correcto desarrollan estrategias muy efectivas.",
        "La dislexia afecta al 10-15% de la población. Tu hij@ no está sol@ en esto.",
        "Con la dislexia, el cerebro procesa el lenguaje de forma diferente, no incorrecta. Muchos genios creativos tienen dislexia.",
        "Los audiolibros, el texto a voz y los materiales visuales son herramientas increíbles para niños con dislexia.",
        "La dislexia no desaparece, pero con estrategias adecuadas el niño puede compensarla completamente.",
        "Es importante que el maestro sepa sobre la dislexia de tu hij@ para hacer adaptaciones en el aula.",
        "Un especialista en lectoescritura puede marcar una enorme diferencia en niños con dislexia.",
        "Las letras de colores, papel rayado especial y fuentes como OpenDyslexic ayudan mucho en el aula.",
        "El diagnóstico de dislexia se realiza mediante una evaluación psicopedagógica completa, no solo con una prueba rápida."
    ],
    "disgrafía": [
        "La disgrafía es una dificultad específica que afecta la escritura manual. El niño puede escribir muy lento, con letra ilegible o con mucho esfuerzo.",
        "La disgrafía no significa que el niño sea descuidado o vago. Su sistema motor para escribir necesita apoyo especializado.",
        "Un terapeuta ocupacional puede diseñar ejercicios específicos para mejorar la escritura en niños con disgrafía.",
        "Permitir el uso del teclado o el ordenador es una adaptación muy válida para niños con disgrafía.",
        "El papel con líneas extra, el lápiz triangular y los agarres especiales ayudan mucho en casa y en la escuela."
    ],
    "discalculia": [
        "La discalculia es una dificultad específica del aprendizaje que afecta la comprensión y manejo de los números.",
        "Los niños con discalculia no son malos en matemáticas por falta de esfuerzo. Procesan los números de forma diferente.",
        "El uso de materiales concretos y manipulables (fichas, cubos, ábacos) hace que las matemáticas tengan sentido.",
        "La discalculia se diagnostica con una evaluación psicopedagógica y puede mejorar mucho con apoyo especializado.",
        "Muchos niños con discalculia tienen habilidades sobresalientes en otras áreas como el lenguaje o las artes."
    ],
    "dispraxia": [
        "La dispraxia afecta la coordinación motora y la planificación del movimiento. No es pereza ni falta de esfuerzo 🦭",
        "Los niños con dispraxia pueden tener dificultad para actividades como escribir, amarrarse los zapatos o practicar deportes.",
        "La terapia ocupacional es altamente recomendada para niños con dispraxia y suele dar muy buenos resultados.",
        "Dar instrucciones paso a paso y con mucha paciencia hace una gran diferencia para niños con dispraxia.",
        "La dispraxia no afecta la inteligencia. Muchos niños con dispraxia son muy creativos y tienen grandes habilidades verbales.",
        "Las actividades de motricidad fina como el dibujo, el modelado con arcilla y los rompecabezas ayudan mucho.",
        "Celebra cada pequeño avance en la coordinación. Para un niño con dispraxia cada logro es enorme.",
        "La dispraxia puede mejorar significativamente con terapia y práctica constante desde edades tempranas."
    ],
    "tea": [
        "El Trastorno del Espectro Autista es una condición neurológica que afecta la comunicación social y el comportamiento 🦭",
        "Cada niño con TEA es completamente único. No hay dos personas con autismo iguales.",
        "Las rutinas y ambientes predecibles son muy importantes para niños con TEA. Los cambios inesperados pueden ser muy difíciles.",
        "El TEA no es una enfermedad que curar, es una forma diferente de experimentar el mundo.",
        "Muchos niños con TEA tienen habilidades extraordinarias en áreas específicas como matemáticas, música o memoria.",
        "La comunicación alternativa como pictogramas, tableros de comunicación o apps puede ayudar mucho.",
        "El diagnóstico temprano es clave para acceder a los apoyos y terapias que marcan la diferencia.",
        "Las terapias de lenguaje, ABA y ocupacional juntas forman un equipo muy poderoso para el TEA.",
        "Conectar con otras familias de niños con TEA puede ser un apoyo invaluable para los padres.",
        "La sensibilidad sensorial es muy común en el TEA. Algunos niños necesitan ambientes con menos ruido, luces o texturas.",
        "Muchos adultos con TEA llevan vidas plenas y exitosas. El futuro de tu hij@ está lleno de posibilidades."
    ],
    "tdah": [
        "El TDAH afecta la atención, el control de impulsos y el nivel de actividad. Es una de las condiciones más comunes en niños 🦭",
        "Los niños con TDAH no son desobedientes ni maleducados. Su cerebro simplemente funciona diferente.",
        "El ejercicio físico regular es una de las herramientas más poderosas para niños con TDAH.",
        "Dividir las tareas en pasos pequeños y dar instrucciones una a la vez hace una gran diferencia.",
        "Los niños con TDAH suelen ser muy creativos, apasionados y energéticos — esos son sus superpoderes.",
        "Establecer rutinas claras y consistentes ayuda al cerebro con TDAH a organizarse mejor.",
        "El TDAH puede manejarse muy bien con una combinación de terapia conductual y apoyo en casa y escuela.",
        "Retirar los distractores del ambiente de estudio mejora significativamente la concentración.",
        "El tiempo de pantalla debe limitarse, especialmente antes de tareas que requieren concentración.",
        "Los tableros visuales con horarios y listas de tareas son herramientas muy útiles para niños con TDAH.",
        "Los descansos cortos y activos (saltar, correr) durante el estudio ayudan al cerebro con TDAH a regularse."
    ],
    "tda": [
        "El TDA es como el TDAH pero sin la hiperactividad. El niño puede parecer soñador o distraído 🦭",
        "Los niños con TDA pueden pasar desapercibidos porque no generan problemas de comportamiento obvios.",
        "Un ambiente tranquilo, ordenado y sin distractores es fundamental para niños con TDA.",
        "Los niños con TDA suelen tener una gran capacidad imaginativa y pensamiento creativo.",
        "Las pausas frecuentes durante el estudio ayudan al cerebro con TDA a mantenerse activo.",
        "Usar temporizadores visuales ayuda a los niños con TDA a gestionar mejor su tiempo.",
        "El TDA también puede tratarse con terapia conductual y apoyo educativo especializado.",
        "El TDA en niñas a menudo pasa desapercibido porque se presenta de forma más sutil. Si tienes dudas, consulta con un profesional."
    ],
    "ansiedad": [
        "La ansiedad infantil es muy común y completamente tratable con el apoyo adecuado 🦇",
        "Los niños ansiosos no están exagerando. Sus miedos son completamente reales para ellos.",
        "Las técnicas de respiración profunda son herramientas poderosas que los niños pueden aprender.",
        "Validar los sentimientos del niño sin reforzar la evitación es clave en el manejo de la ansiedad.",
        "La exposición gradual a las situaciones temidas, con apoyo, es el tratamiento más efectivo.",
        "Un psicólogo infantil puede enseñarle al niño herramientas de regulación emocional muy efectivas.",
        "Los niños ansiosos necesitan sentirse seguros, escuchados y comprendidos antes que todo.",
        "La ansiedad de separación, el miedo escolar y la ansiedad social son muy frecuentes en niños.",
        "Con el tratamiento correcto, la mayoría de los niños con ansiedad mejoran significativamente.",
        "El juego de roles puede ayudar a los niños a practicar situaciones que les generan ansiedad.",
        "Nunca des seguridad de forma excesiva a un niño ansioso. Eso refuerza el miedo en lugar de reducirlo."
    ],
    "depresion": [
        "La depresión infantil puede manifestarse como irritabilidad, tristeza persistente o pérdida de interés en actividades que antes disfrutaba 🦇",
        "Un niño deprimido no es un niño malcriado ni dramático. Necesita ayuda profesional.",
        "El apoyo familiar cálido y constante es fundamental en el tratamiento de la depresión infantil.",
        "La depresión infantil es tratable. Con el apoyo adecuado los niños pueden recuperarse completamente.",
        "Si tu hij@ lleva más de dos semanas triste, irritable o sin energía, consulta con un especialista.",
        "La terapia cognitivo-conductual es muy efectiva para la depresión en niños y adolescentes.",
        "Mantener rutinas, actividad física y conexión social ayuda mucho en la recuperación.",
        "No minimices los sentimientos de tu hij@. Escucha sin juzgar y busca ayuda profesional.",
        "La depresión en niños a veces se esconde detrás de dolores físicos inexplicables o mal humor persistente."
    ],
    "autolesiones": [
        "Las autolesiones son una señal de que el niño está experimentando un dolor emocional muy intenso 🦇",
        "Si descubres que tu hij@ se hace daño, mantén la calma. Tu reacción inicial es muy importante.",
        "No castigues ni regañes a un niño por autolesionarse. Necesita comprensión y ayuda profesional.",
        "Busca ayuda psicológica especializada de inmediato. Las autolesiones siempre requieren atención profesional.",
        "Las autolesiones generalmente no son intentos de suicidio, pero siempre son una señal de alarma.",
        "Hablar abiertamente sobre el tema con tu hij@, sin dramatismo ni juicio, puede ayudar.",
        "La terapia dialéctica conductual (DBT) adaptada para niños es muy efectiva para las autolesiones.",
        "Retirar objetos que puedan usarse para hacer daño es una medida de seguridad importante.",
        "El trabajo en familia es esencial en el tratamiento de las autolesiones en niños."
    ],
    "autoestima": [
        "La autoestima se construye con pequeños logros diarios y mensajes positivos consistentes 🐶",
        "Celebra el esfuerzo de tu hij@, no solo los resultados. Eso construye autoestima real.",
        "Evita comparar a tu hij@ con otros niños. Cada uno tiene su propio ritmo y sus propios talentos.",
        "Los niños con baja autoestima necesitan más muestras de amor incondicional, no más exigencia.",
        "Ayuda a tu hij@ a identificar sus fortalezas y talentos únicos. Todos tienen algo especial.",
        "El lenguaje que usamos con los niños moldea cómo se ven a sí mismos. Cuida las palabras.",
        "Dejar que tu hij@ tome decisiones pequeñas fortalece su confianza y autonomía.",
        "Un niño que se siente amado y aceptado desarrolla una autoestima mucho más sólida."
    ],
    "tca": [
        "Los Trastornos de Conducta Alimentaria en niños requieren atención profesional especializada 🦇",
        "Si notas cambios drásticos en la alimentación de tu hij@, consulta con un pediatra o psicólogo.",
        "Los TCA no son solo sobre la comida. Son sobre emociones, control y autoestima.",
        "El tratamiento de los TCA requiere un equipo multidisciplinario: psicólogo, nutricionista y médico.",
        "Nunca uses la comida como castigo ni como premio. Eso puede crear relaciones poco saludables con la alimentación.",
        "Hablar de cuerpos de forma positiva en casa protege a los niños de desarrollar TCA.",
        "La detección temprana de un TCA mejora significativamente el pronóstico del tratamiento."
    ],
    "abuso": [
        "Si sospechas que tu hij@ está siendo víctima de abuso, busca ayuda profesional y legal de inmediato 🦇",
        "Cree siempre a tu hij@ si te cuenta que alguien le hizo daño. Tu apoyo es fundamental.",
        "Los niños que han sufrido abuso necesitan terapia especializada en trauma.",
        "El abuso puede ser físico, emocional, sexual o por negligencia. Todos son igualmente graves.",
        "Un niño que ha vivido abuso puede mostrar cambios de comportamiento, regresiones o miedo.",
        "Denunciar el abuso es un acto de amor y protección hacia tu hij@.",
        "La recuperación de un niño que ha vivido abuso es posible con el apoyo terapéutico adecuado."
    ],
    "bipolar": [
        "El trastorno bipolar en niños puede manifestarse con cambios de humor muy intensos y rápidos 🦇",
        "El diagnóstico de bipolar en niños requiere una evaluación muy cuidadosa por un psiquiatra infantil.",
        "Los niños con bipolar pueden tener períodos de mucha energía y euforia seguidos de tristeza profunda.",
        "El tratamiento del bipolar en niños generalmente combina medicación y terapia.",
        "Mantener rutinas estables de sueño y alimentación es muy importante para niños con bipolar.",
        "El apoyo familiar consistente y sin juicio es fundamental en el manejo del trastorno bipolar."
    ],
    "parasomnea": [
        "Las parasomnias incluyen terrores nocturnos, sonambulismo y pesadillas frecuentes 🦇",
        "Los terrores nocturnos son más comunes entre los 3 y 8 años y generalmente desaparecen solos.",
        "Durante un terror nocturno, no despiertes al niño bruscamente. Acompáñalo con calma hasta que pase.",
        "Mantener una rutina de sueño consistente reduce significativamente las parasomnias.",
        "Si las parasomnias son muy frecuentes o intensas, consulta con un pediatra o neurólogo.",
        "Un ambiente de sueño seguro y tranquilo es fundamental para niños con parasomnias.",
        "El estrés y la ansiedad pueden aumentar la frecuencia de pesadillas y terrores nocturnos."
    ],
    "toc": [
        "El TOC en niños se manifiesta con pensamientos intrusivos y rituales repetitivos que no pueden controlar 🦭",
        "Los niños con TOC saben que sus rituales son irracionales pero no pueden evitarlos sin ayuda.",
        "El TOC es muy tratable. La terapia de exposición y prevención de respuesta (ERP) es muy efectiva.",
        "No refuerces los rituales del TOC cediendo a ellos. Con ayuda profesional aprenderán a resistirlos.",
        "El TOC puede causar mucho sufrimiento en los niños. La comprensión familiar es fundamental.",
        "Un psicólogo especializado en TOC puede marcar una enorme diferencia en la calidad de vida del niño.",
        "El TOC puede tener síntomas muy variados: lavarse las manos, revisar cosas, contar, ordenar o rituales mentales.",
        "Muchos niños con TOC también tienen ansiedad o TDAH. Es importante una evaluación completa."
    ],
    "trauma": [
        "El trauma infantil puede surgir de accidentes, pérdidas, abuso o situaciones muy estresantes 🦇",
        "Un niño traumatizado puede mostrar pesadillas, evitación, irritabilidad o regresiones.",
        "La terapia EMDR y la terapia de juego son muy efectivas para procesar trauma en niños.",
        "Crear un ambiente seguro y predecible es lo más importante para un niño que ha vivido trauma.",
        "No fuerces a un niño traumatizado a hablar del evento. Déjalo llevar el ritmo.",
        "El apoyo de adultos seguros y constantes es el factor de protección más importante contra el trauma.",
        "Con el tratamiento adecuado, los niños pueden recuperarse del trauma y llevar vidas plenas."
    ],
    "tid": [
        "El Trastorno de Identidad Disociativo (TID) en niños generalmente está relacionado con traumas graves y repetidos 🦇",
        "Si sospechas que tu hij@ puede tener TID, es fundamental buscar un psicólogo especializado en trauma infantil.",
        "Los niños con TID pueden mostrar cambios de comportamiento muy marcados, diferentes 'estados' o no recordar lo que hicieron.",
        "El TID se trata con terapia especializada en trauma. El apoyo familiar seguro y constante es fundamental.",
        "El TID es una condición seria pero tratable. Los niños con el apoyo adecuado pueden recuperarse."
    ],
    "tlp": [
        "El Trastorno Límite de Personalidad (TLP) raramente se diagnostica antes de la adolescencia tardía 🦇",
        "Si tu hij@ adolescente tiene inestabilidad emocional intensa, impulsividad y relaciones muy inestables, consulta con un psiquiatra.",
        "La terapia dialectico conductual (DBT) es el tratamiento de referencia para el TLP y da muy buenos resultados.",
        "El TLP puede mejorar mucho con el tratamiento. No es una condena para siempre.",
        "Los jóvenes con TLP necesitan entornos familiares estables, sin crítica excesiva y con límites claros."
    ],
    "lenguaje": [
        "El desarrollo del lenguaje tiene una variación normal amplia, pero si tienes dudas siempre consulta con un fonoaudiólogo 🦭",
        "Un niño de 2 años debería decir unas 50 palabras y combinar dos. Si no lo hace, consulta con un especialista.",
        "El retraso del lenguaje puede tener muchas causas: hipoacusia, TEA, retraso del desarrollo o simplemente ser más lento.",
        "La terapia de lenguaje con un fonoaudiólogo puede marcar una enorme diferencia si se empieza temprano.",
        "Hablarle mucho al niño, leerle cuentos y cantar son las mejores estrategias para estimular el lenguaje.",
        "Un niño bilingüe puede hablar un poco más tarde, pero eso no es señal de problema. Consulta si tienes dudas.",
        "Si tu hijo dejó de hablar después de haber hablado, busca ayuda profesional de inmediato."
    ],
    "motricidad": [
        "La motricidad fina involucra los movimientos pequeños: dibujar, recortar, abrochar. La gruesa los grandes: correr, saltar 🦭",
        "Si tu hij@ tiene dificultades con la coordinación o los movimientos, un terapeuta ocupacional puede ayudar mucho.",
        "Las actividades de plasticina, dibujo, recorte y ensartar cuentas desarrollan muy bien la motricidad fina.",
        "Correr, saltar, trepar y jugar en el parque son fundamentales para desarrollar la motricidad gruesa.",
        "La motricidad puede mejorarse con práctica y terapia. La clave es hacerlo de forma divertida para el niño.",
        "Un niño con dificultades motoras no es torpe ni descuidado. Su cerebro necesita más tiempo o apoyo específico."
    ],
    "sindrome de down": [
        "El síndrome de Down es una condición genética que suele venir con algún grado de discapacidad intelectual y rasgos físicos característicos 🦭",
        "Cada niño con síndrome de Down se desarrolla a su propio ritmo. La estimulación temprana marca una enorme diferencia.",
        "La fisioterapia, terapia de lenguaje y terapia ocupacional desde bebés ayudan muchísimo al desarrollo.",
        "Muchas personas con síndrome de Down llevan vidas plenas: estudian, trabajan y son muy independientes.",
        "Es común que los niños con síndrome de Down tengan hipotonía (tono muscular bajo), lo que la fisioterapia ayuda a fortalecer.",
        "La inclusión educativa con los apoyos adecuados beneficia enormemente a los niños con síndrome de Down."
    ],
    "altas capacidades": [
        "Las altas capacidades (superdotación) implican que el niño aprende y procesa la información mucho más rápido que sus compañeros 🦭",
        "Un niño con altas capacidades puede aburrirse en clase y esto a veces se confunde con falta de atención o mala conducta.",
        "Es importante enriquecer y retar académicamente a estos niños, no solo adelantarlos de curso.",
        "Muchos niños con altas capacidades también tienen una sensibilidad emocional muy intensa.",
        "Una evaluación psicopedagógica confirma las altas capacidades y ayuda a diseñar el apoyo educativo adecuado.",
        "Las altas capacidades pueden coexistir con TDAH o TEA; a esto se le llama doble excepcionalidad."
    ],
    "bullying": [
        "El acoso escolar (bullying) puede ser físico, verbal o social, y afecta profundamente la autoestima y seguridad del niño 🦇",
        "Si tu hij@ no quiere ir a la escuela, tiene pesadillas o baja su rendimiento de repente, pregúntale con calma si algo está pasando.",
        "Cree siempre lo que tu hij@ te cuente sobre el acoso y actúa rápido informando a la escuela.",
        "Un niño que sufre bullying necesita sentir que sus padres lo van a proteger sin juzgarlo.",
        "La terapia puede ayudar a un niño a recuperar la confianza después de haber sido víctima de acoso.",
        "Enseñar a los niños a identificar y reportar el bullying (el propio o el que ven en otros) previene mucho daño."
    ],
    "celos": [
        "Los celos entre hermanos son completamente normales, especialmente después de la llegada de un nuevo bebé 🐶",
        "Dedicar tiempo individual a cada hij@, aunque sean solo 10 minutos al día, reduce mucho los celos.",
        "Evita comparar a tus hijos entre sí. Cada uno necesita sentirse valorado por lo que es, no por ser mejor que el otro.",
        "Involucrar al hermano mayor en el cuidado del bebé (de forma apropiada a su edad) ayuda a que se sienta importante en vez de desplazado.",
        "Los celos bien manejados en la infancia son una oportunidad para enseñar a compartir y a regular emociones."
    ],
    "duelo": [
        "El duelo infantil por la pérdida de un ser querido o una mascota es real y merece ser acompañado con honestidad 🦇",
        "Explica la muerte con palabras claras y adecuadas a la edad del niño; evita eufemismos como 'se durmió para siempre', que pueden confundir o asustar.",
        "Es normal que un niño en duelo regrese a conductas más pequeñas (hacerse pipí, pedir upa) por un tiempo.",
        "Permite que tu hij@ exprese tristeza, enojo o confusión sin apurarlo a 'estar bien' rápido.",
        "Los rituales sencillos (dibujar, escribir una carta, plantar algo) ayudan a los niños a procesar una pérdida.",
        "Si el duelo se extiende mucho tiempo con mucha angustia, un psicólogo infantil especializado en duelo puede ayudar."
    ],
    "separacion de padres": [
        "El divorcio o separación de los padres es un cambio grande, pero los niños pueden adaptarse bien si sienten estabilidad y amor de ambos lados 🦇",
        "Nunca hables mal del otro padre frente a tu hij@; ponerlo en medio del conflicto es lo que más daño le hace, no la separación en sí.",
        "Mantener rutinas, horarios y reglas similares en ambas casas ayuda mucho a que el niño se sienta seguro.",
        "Es normal que un niño exprese tristeza, enojo o incluso culpa (piense que fue su culpa) tras una separación. Acláraselo con claridad.",
        "Si es posible, mantén la comunicación cordial entre los padres frente al niño; eso reduce muchísimo su estrés."
    ],
    "control de esfinteres": [
        "El control de esfínteres suele lograrse entre los 2 y 4 años, pero cada niño tiene su propio ritmo 🐦",
        "Los retrocesos (volver a hacerse pipí después de haber aprendido) son normales ante cambios de rutina o estrés.",
        "Nunca castigues ni avergüences a tu hij@ por un accidente. Eso solo genera más ansiedad y retrasa el proceso.",
        "Un sistema de premios simples y consistencia en la rutina del baño ayudan mucho en el entrenamiento.",
        "Si después de los 5-6 años persisten los accidentes frecuentes, es buena idea consultar con el pediatra."
    ],
    "pantallas": [
        "El uso de pantallas debe ser equilibrado según la edad; la Academia Americana de Pediatría recomienda evitarlas antes de los 2 años salvo videollamadas 🐦",
        "Más que prohibir las pantallas, es mejor acompañar lo que el niño ve y establecer horarios claros y consistentes.",
        "El contenido educativo y interactivo es mucho más beneficioso que el contenido pasivo de solo mirar videos.",
        "Evita las pantallas al menos una hora antes de dormir; la luz azul puede afectar la calidad del sueño.",
        "Reemplazar tiempo de pantalla por juego libre, lectura y actividad física es clave para un desarrollo saludable."
    ],
    "alimentacion selectiva": [
        "La alimentación selectiva (niños muy quisquillosos con la comida) es común, especialmente en niños con TEA o sensibilidad sensorial 🐦",
        "Nunca fuerces a un niño a comer algo; eso puede generar una relación negativa y de rechazo aún mayor con ese alimento.",
        "Introduce alimentos nuevos de a poco y sin presión, a veces se necesitan más de 10 exposiciones antes de que un niño lo acepte.",
        "Involucrar al niño en cocinar o elegir alimentos aumenta su disposición a probarlos.",
        "Si la selectividad es extrema y afecta su nutrición o peso, consulta con un pediatra o nutricionista especializado."
    ],
    "conducta desafiante": [
        "El Trastorno Negativista Desafiante (TND) se caracteriza por patrones frecuentes de enojo, discusiones y desafío a la autoridad 🦇",
        "Los niños con TND no buscan 'portarse mal' a propósito; muchas veces les cuesta regular su frustración e impulsividad.",
        "Mantener límites claros, consistentes y calmados (sin gritar) es más efectivo que el castigo severo.",
        "Reconocer y reforzar positivamente el buen comportamiento tiene más impacto que castigar el malo.",
        "La terapia de manejo conductual para padres es muy efectiva para el TND y suele mostrar resultados en pocos meses."
    ],
    "epilepsia": [
        "La epilepsia infantil se caracteriza por crisis convulsivas recurrentes y requiere siempre supervisión de un neurólogo pediátrico 🦭",
        "Durante una convulsión, mantén la calma: protege al niño de golpearse, no le pongas nada en la boca y cronometra la duración.",
        "La mayoría de los niños con epilepsia llevan una vida normal con el tratamiento médico adecuado.",
        "Es importante que la escuela y cuidadores sepan qué hacer en caso de una crisis convulsiva.",
        "Nunca ajustes ni suspendas la medicación antiepiléptica sin indicación médica, aunque el niño lleve tiempo sin crisis."
    ],
    "hipoacusia": [
        "La hipoacusia (pérdida auditiva) puede afectar mucho el desarrollo del lenguaje si no se detecta a tiempo 🦭",
        "El tamizaje auditivo neonatal es clave para detectar problemas de audición desde los primeros días de vida.",
        "Los audífonos, implantes cocleares y la terapia de lenguaje especializada marcan una enorme diferencia.",
        "Aprender lengua de señas junto con el niño (sin importar el grado de pérdida auditiva) enriquece mucho su comunicación.",
        "Un niño con hipoacusia puede aprender y comunicarse perfectamente bien con los apoyos adecuados."
    ],
    "paralisis cerebral": [
        "La parálisis cerebral afecta el movimiento y la postura debido a una lesión cerebral, generalmente antes o durante el nacimiento 🦭",
        "Cada caso de parálisis cerebral es distinto: algunos niños necesitan silla de ruedas, otros caminan con apoyo, y muchos tienen inteligencia normal o superior.",
        "La fisioterapia, terapia ocupacional y de lenguaje desde edades tempranas son fundamentales.",
        "La tecnología de asistencia (comunicadores, sillas adaptadas) ayuda mucho a la independencia del niño.",
        "Ver más allá del diagnóstico y enfocarse en las capacidades del niño hace una gran diferencia en su desarrollo."
    ],
    "discapacidad intelectual": [
        "La discapacidad intelectual implica limitaciones en el aprendizaje y en habilidades adaptativas, en distintos grados 🦭",
        "Con la estimulación y apoyo educativo adecuado, un niño con discapacidad intelectual puede aprender mucho y ser muy independiente.",
        "Divide las tareas en pasos pequeños y celebra cada logro, por pequeño que parezca.",
        "La inclusión escolar con apoyos especializados favorece tanto el aprendizaje como las habilidades sociales.",
        "Cada niño con discapacidad intelectual tiene fortalezas únicas; enfócate en lo que sí puede hacer."
    ]
}

# ===========================
# HISTORIAL DE SESIONES EN MEMORIA
# Clave: session_id → lista de mensajes
# ===========================
sesiones_historial = defaultdict(list)


# ===========================
# FUNCIONES AUXILIARES
# ===========================

def sanitizar_mensaje(mensaje: str) -> str:
    """Limpia y normaliza el mensaje entrante."""
    if not mensaje:
        return ""
    mensaje = mensaje.strip()
    mensaje = re.sub(r'\s+', ' ', mensaje)
    return mensaje[:2000]  


def detectar_crisis(mensaje: str) -> bool:
    """Detecta si hay palabras clave de crisis en el mensaje."""
    mensaje_lower = mensaje.lower()
    return any(palabra in mensaje_lower for palabra in PALABRAS_CRISIS)


def respuesta_rapida(mensaje: str):
    """Solo aplica respuestas rápidas a mensajes cortos y simples."""
    palabras = mensaje.strip().split()
    if len(palabras) > 4:
        return None

    mensaje_lower = mensaje.lower()
    mejor_categoria = None
    mejor_prioridad = -1

    for categoria, datos in RESPUESTAS_RAPIDAS.items():
        if any(p in mensaje_lower for p in datos["palabras"]):
            prioridad = datos.get("prioridad", 5)
            if prioridad > mejor_prioridad:
                mejor_prioridad = prioridad
                mejor_categoria = categoria

    if mejor_categoria:
        return random.choice(RESPUESTAS_RAPIDAS[mejor_categoria]["respuestas"])
    return None


def detectar_mascota(mensaje: str) -> str | None:
    """
    Detecta la mascota más apropiada usando scoring ponderado.
    Retorna el key de la mascota o None si no hay match.
    """
    mensaje_lower = mensaje.lower()
    puntajes = defaultdict(int)

    for nombre, datos in MASCOTAS.items():
        for entrada in datos["especialidad"]:
            if isinstance(entrada, tuple):
                palabra, peso = entrada
            else:
                palabra, peso = entrada, 1

            if palabra in mensaje_lower:
                puntajes[nombre] += peso

    if not any(puntajes.values()):
        return None

    return max(puntajes, key=puntajes.get)


def respuesta_conocimiento(mensaje: str) -> str | None:
    """Busca información en la base de conocimiento local."""
    mensaje_lower = mensaje.lower()

    # Mapeo de términos alternativos
    alias = {
        "autismo": "tea", "autista": "tea", "espectro": "tea",
        "deficit": "tdah", "déficit": "tdah", "hiperactiv": "tdah",
        "parasomnias": "parasomnea", "terror nocturno": "parasomnea",
        "disgrafía": "disgrafía", "disgrafia": "disgrafía",
        "habla": "lenguaje", "fonoaudiolo": "lenguaje", "fonoaudiól": "lenguaje",
        "down": "sindrome de down", "síndrome de down": "sindrome de down",
        "superdotado": "altas capacidades", "superdotacion": "altas capacidades",
        "acoso escolar": "bullying", "acoso": "bullying", "matoneo": "bullying",
        "celoso": "celos", "celosa": "celos",
        "murio": "duelo", "murió": "duelo", "fallecio": "duelo", "falleció": "duelo", "perdida": "duelo", "pérdida": "duelo",
        "divorcio": "separacion de padres", "se separaron": "separacion de padres", "nos separamos": "separacion de padres",
        "hacerse pipi": "control de esfinteres", "hacerse pipí": "control de esfinteres", "esfinteres": "control de esfinteres", "esfínteres": "control de esfinteres", "panal": "control de esfinteres", "pañal": "control de esfinteres",
        "celular": "pantallas", "tablet": "pantallas", "television": "pantallas", "televisión": "pantallas", "videojuego": "pantallas",
        "no come": "alimentacion selectiva", "quisquilloso con la comida": "alimentacion selectiva", "selectivo con la comida": "alimentacion selectiva",
        "desafiante": "conducta desafiante", "oposicionista": "conducta desafiante", "tnd": "conducta desafiante",
        "convulsion": "epilepsia", "convulsión": "epilepsia", "convulsiones": "epilepsia",
        "sordera": "hipoacusia", "sordo": "hipoacusia", "audifono": "hipoacusia", "audífono": "hipoacusia",
        "paralisis": "paralisis cerebral", "parálisis": "paralisis cerebral",
        "discapacidad intelectual": "discapacidad intelectual", "retraso mental": "discapacidad intelectual",
    }

    # Resolver alias
    for alias_key, tema_real in alias.items():
        if alias_key in mensaje_lower:
            mensaje_lower = mensaje_lower.replace(alias_key, tema_real)

    for tema, respuestas in CONOCIMIENTO.items():
        if tema in mensaje_lower:
            return random.choice(respuestas)

    return None


def construir_historial_ia(session_id: str, mensaje_actual: str, sistema: str) -> list:
    """Construye el historial de mensajes para enviar a Gemini."""
    historial = sesiones_historial[session_id]

    messages = [{"role": "system", "content": sistema}]

    # Añadir últimos N turnos del historial
    for turno in historial[-(MAX_HISTORIAL_SESION * 2):]:
        messages.append(turno)

    messages.append({"role": "user", "content": mensaje_actual})
    return messages


def _llamar_gemini(messages: list) -> str:
    if not cliente_gemini:
        raise RuntimeError("GEMINI_API_KEY no configurada")

    sistema = next((m["content"] for m in messages if m["role"] == "system"), "")
    historial_gemini = []
    for m in messages:
        if m["role"] == "system":
            continue
        rol_gemini = "model" if m["role"] == "assistant" else "user"
        historial_gemini.append(
            genai_types.Content(role=rol_gemini, parts=[genai_types.Part(text=m["content"])])
        )

    respuesta = cliente_gemini.models.generate_content(
        model=MODELO_GEMINI,
        contents=historial_gemini,
        config=genai_types.GenerateContentConfig(
            system_instruction=sistema,
            max_output_tokens=150,  
        ),
    )
    return respuesta.text


def generar_respuesta_ia(
    mensaje: str,
    mascota_key: str,
    session_id: str,
    mascota_anterior: str | None = None
) -> str:
    """
    Genera una respuesta con Gemini para todo lo que no está en la base de
    conocimiento local. Tiene un límite duro de GEMINI_TIMEOUT_SEGUNDOS (3s por
    defecto): si Gemini no responde a tiempo, se corta la espera y se devuelve
    un mensaje breve para que la conversación nunca se sienta congelada.
    """
    mascota = MASCOTAS[mascota_key]
    sistema = mascota["sistema"]

    if mascota_anterior:
        sistema += f"\nEl colega {mascota_anterior} acaba de pasar esta conversación. Menciona ese relevo de forma natural y breve."

    messages = construir_historial_ia(session_id, mensaje, sistema)

    contenido = None

    futuro = EJECUTOR_IA.submit(_llamar_gemini, messages)
    try:
        contenido = futuro.result(timeout=GEMINI_TIMEOUT_SEGUNDOS)
    except concurrent.futures.TimeoutError:
        futuro.cancel()
        logger.warning(f"[{session_id}] ⏱️ Gemini superó {GEMINI_TIMEOUT_SEGUNDOS}s, devolviendo respuesta rápida")
        contenido = (
            "Dame un momento para pensar bien en tu pregunta 💭 "
            "¿Puedes contarme un poco más de detalle mientras tanto?"
        )
    except Exception as e:
        logger.error(f"[{session_id}] Error Gemini: {e}")
        return (
            "Lo siento, en este momento tengo un pequeño problema técnico. "
            "Por favor intenta de nuevo en un momento 💙 "
            "Si es urgente, consulta directamente con un profesional."
        )

    logger.info(f"[{session_id}] Respuesta generada con Gemini")

    # Guardar en historial de sesión
    sesiones_historial[session_id].append({"role": "user", "content": mensaje})
    sesiones_historial[session_id].append({"role": "assistant", "content": contenido})

    # Limitar tamaño del historial en memoria
    if len(sesiones_historial[session_id]) > MAX_HISTORIAL_SESION * 4:
        sesiones_historial[session_id] = sesiones_historial[session_id][-(MAX_HISTORIAL_SESION * 4):]

    return contenido


# ===========================
# GESTIÓN DE CONVERSACIONES
# ===========================

def cargar_conversaciones() -> list:
    if os.path.exists(CONVERSACIONES_FILE):
        try:
            with open(CONVERSACIONES_FILE, "r", encoding="utf-8") as f:
                return json.load(f)
        except (json.JSONDecodeError, IOError) as e:
            logger.error(f"Error cargando conversaciones: {e}")
            return []
    return []


def _guardar_conversacion_en_disco(rol: str, mascota: str, pregunta: str, respuesta: str,
                                    session_id: str):
    """Escritura real a disco. Corre en un hilo del EJECUTOR_GUARDADO, nunca en el hilo de la request."""
    with LOCK_GUARDADO:
        try:
            conversaciones = cargar_conversaciones()
            conversaciones.append({
                "timestamp": datetime.now().isoformat(),
                "session_id": session_id,
                "rol": rol,
                "mascota": mascota,
                "pregunta": pregunta,
                "respuesta": respuesta
            })
            with open(CONVERSACIONES_FILE, "w", encoding="utf-8") as f:
                json.dump(conversaciones, f, ensure_ascii=False, indent=2)
        except IOError as e:
            logger.error(f"Error guardando conversación: {e}")


def guardar_conversacion(rol: str, mascota: str, pregunta: str, respuesta: str,
                          session_id: str = "default"):
    """
    Encola el guardado en segundo plano y retorna inmediatamente.
    El usuario nunca espera por la escritura en disco.
    """
    EJECUTOR_GUARDADO.submit(
        _guardar_conversacion_en_disco, rol, mascota, pregunta, respuesta, session_id
    )


# ===========================
# ENDPOINTS
# ===========================

@app.route("/chat", methods=["POST"])
def chat():
    data = request.get_json()
    if not data:
        return jsonify({"error": "No se recibieron datos JSON"}), 400

    mensaje = sanitizar_mensaje(data.get("mensaje", ""))
    if not mensaje:
        return jsonify({"error": "El mensaje no puede estar vacío"}), 400

    rol = data.get("rol", "paciente")
    mascota_actual = data.get("mascota_actual", None)
    session_id = data.get("session_id", "default")

    logger.info(f"[{session_id}] Mensaje recibido: {mensaje[:80]}...")

    # ── 1. CRISIS — Prioridad máxima, siempre Kairo ──────────────────────────
    if detectar_crisis(mensaje):
        logger.warning(f"[{session_id}] ⚠️ CRISIS detectada")
        respuesta_crisis = (
            "🦇 Kairo aquí. Esto es muy importante y te escucho con toda mi atención.\n\n"
            "Por favor, busca ayuda profesional de inmediato. Un psicólogo infantil o "
            "psiquiatra puede ayudarles hoy mismo.\n\n"
            "Si sientes que es una emergencia, ve a urgencias del hospital más cercano "
            "o llama a la línea de crisis de tu país.\n\n"
            "No están solos en esto. ¿Tienen acceso a un especialista ahora mismo?"
        )
        guardar_conversacion(rol, "kairo", mensaje, respuesta_crisis, session_id)
        return jsonify({
            "respuesta": respuesta_crisis,
            "mascota": "kairo",
            "mascota_nombre": "Kairo",
            "mascota_emoji": "🦇",
            "cambio_mascota": mascota_actual != "kairo",
            "es_crisis": True
        })

    # ── 2. Respuestas rápidas (saludos, despedidas, chistes…) ──────────────
    rapida = respuesta_rapida(mensaje)
    if rapida:
        guardar_conversacion(rol, "equipo", mensaje, rapida, session_id)
        return jsonify({
            "respuesta": rapida,
            "mascota": "equipo",
            "mascota_nombre": "Equipo Miniminds",
            "mascota_emoji": "🌟",
            "cambio_mascota": False,
            "es_crisis": False
        })

    # ── 3. Detectar mascota más apropiada ──────────────────────────────────
    nueva_mascota = detectar_mascota(mensaje)
    if not nueva_mascota:
        nueva_mascota = mascota_actual or "nilo"

    mascota_data = MASCOTAS[nueva_mascota]
    cambio = nueva_mascota != mascota_actual

    # ── 4. Generar saludo de transición o inicial ──────────────────────────
    if cambio and mascota_actual and mascota_actual in MASCOTAS:
        anterior_nombre = MASCOTAS[mascota_actual]["nombre"]
        saludo = random.choice(mascota_data["transicion"]).replace("{anterior}", anterior_nombre)
        logger.info(f"[{session_id}] Cambio de mascota: {mascota_actual} → {nueva_mascota}")
    elif cambio:
        saludo = random.choice(mascota_data["saludo"])
    else:
        saludo = ""

    # ── 5. Buscar en conocimiento rápido primero ───────────────────────────
    conocimiento_rapido = respuesta_conocimiento(mensaje)
    if conocimiento_rapido:
        respuesta_final = f"{saludo}\n\n{conocimiento_rapido}".strip() if saludo else conocimiento_rapido
    else:
        # ── 6. Gemini para preguntas que no están en el conocimiento local ──
        mascota_anterior_nombre = (
            MASCOTAS[mascota_actual]["nombre"]
            if mascota_actual and mascota_actual in MASCOTAS and cambio
            else None
        )
        respuesta_ia = generar_respuesta_ia(
            mensaje, nueva_mascota, session_id, mascota_anterior_nombre
        )
        respuesta_final = f"{saludo}\n\n{respuesta_ia}".strip() if saludo else respuesta_ia

    guardar_conversacion(rol, nueva_mascota, mensaje, respuesta_final, session_id)

    return jsonify({
        "respuesta": respuesta_final,
        "mascota": nueva_mascota,
        "mascota_nombre": mascota_data["nombre"],
        "mascota_emoji": mascota_data["emoji"],
        "cambio_mascota": cambio,
        "es_crisis": False
    })


@app.route("/mascotas", methods=["GET"])
def get_mascotas():
    """Devuelve la lista de mascotas con su información pública."""
    return jsonify({
        k: {
            "nombre": v["nombre"],
            "emoji": v["emoji"],
            "descripcion": v["descripcion"],
            "color": v["color"]
        }
        for k, v in MASCOTAS.items()
    })


@app.route("/historial", methods=["GET"])
def get_historial():
    """Devuelve el historial de conversaciones con filtros opcionales."""
    mascota_filtro = request.args.get("mascota")
    session_filtro = request.args.get("session_id")
    limite = int(request.args.get("limite", 50))

    conversaciones = cargar_conversaciones()

    if mascota_filtro:
        conversaciones = [c for c in conversaciones if c.get("mascota") == mascota_filtro]
    if session_filtro:
        conversaciones = [c for c in conversaciones if c.get("session_id") == session_filtro]

    return jsonify({
        "total": len(conversaciones),
        "conversaciones": conversaciones[-limite:]
    })


@app.route("/historial/limpiar", methods=["DELETE"])
def limpiar_historial():
    """Limpia el historial de conversaciones guardado en disco."""
    try:
        with open(CONVERSACIONES_FILE, "w", encoding="utf-8") as f:
            json.dump([], f)
        sesiones_historial.clear()
        return jsonify({"mensaje": "Historial limpiado correctamente"})
    except IOError as e:
        return jsonify({"error": str(e)}), 500


@app.route("/sesion/<session_id>/limpiar", methods=["DELETE"])
def limpiar_sesion(session_id: str):
    """Limpia el historial en memoria de una sesión específica."""
    sesiones_historial.pop(session_id, None)
    return jsonify({"mensaje": f"Sesión {session_id} limpiada"})


@app.route("/stats", methods=["GET"])
def stats():
    """Estadísticas básicas del uso del chatbot."""
    conversaciones = cargar_conversaciones()
    conteo_mascotas = defaultdict(int)
    for c in conversaciones:
        conteo_mascotas[c.get("mascota", "desconocido")] += 1

    return jsonify({
        "total_mensajes": len(conversaciones),
        "sesiones_activas": len(sesiones_historial),
        "uso_por_mascota": dict(conteo_mascotas),
        "temas_conocimiento": list(CONOCIMIENTO.keys())
    })


@app.route("/", methods=["GET"])
def home():
    return jsonify({
        "status": "IA Miniminds corriendo ✅",
        "version": "7.0",
        "mascotas": [f"{v['nombre']} {v['emoji']}" for v in MASCOTAS.values()],
        "endpoints": ["/chat", "/mascotas", "/historial", "/stats", "/salud"],
        "motor_ia": "gemini" if cliente_gemini else "no configurado",
        "timeout_gemini_segundos": GEMINI_TIMEOUT_SEGUNDOS
    })


@app.route("/salud", methods=["GET"])
def salud():
    """Diagnóstico rápido del motor de IA disponible."""
    return jsonify({
        "gemini_configurado": cliente_gemini is not None,
        "timeout_gemini_segundos": GEMINI_TIMEOUT_SEGUNDOS,
        "modelo_gemini": MODELO_GEMINI if cliente_gemini else None
    })


# ===========================
# ARRANQUE
# ===========================
if __name__ == "__main__":
    port = int(os.getenv("PORT", 5000))
    debug = os.getenv("DEBUG", "true").lower() == "true"
    logger.info(f"🚀 Miniminds v7.0 arrancando en puerto {port}")
    logger.info(f"⏱️ Timeout Gemini: {GEMINI_TIMEOUT_SEGUNDOS}s")
    logger.info(f"🔑 Gemini configurado: {'sí' if cliente_gemini else 'NO — falta GEMINI_API_KEY'}")
    app.run(debug=debug, port=port)