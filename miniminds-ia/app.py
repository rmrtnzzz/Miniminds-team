from flask import Flask, request, jsonify
from flask_cors import CORS
import ollama
import json
import os

app = Flask(__name__)
CORS(app)

conversaciones_file = "conversaciones.json"

def cargar_conversaciones():
    if os.path.exists(conversaciones_file):
        with open(conversaciones_file, "r", encoding="utf-8") as f:
            return json.load(f)
    return []

def guardar_conversacion(rol, pregunta, respuesta):
    conversaciones = cargar_conversaciones()
    conversaciones.append({"rol": rol, "pregunta": pregunta, "respuesta": respuesta})
    with open(conversaciones_file, "w", encoding="utf-8") as f:
        json.dump(conversaciones, f, ensure_ascii=False, indent=2)

def obtener_sistema(rol):
    base = """Eres un asistente amigable y empático de Miniminds, una plataforma especializada 
    en neurodivergencias y problemas conductuales en niños. Respondes en español, y en ingles si el idioma de la plataforma cambia y te adaptas a la misma 
    puedes contar chistes, dar consejos, responder saludos y cualquier pregunta general que se te haga o se te pida tienes que aprender a conocer los gustos de la persona segun como navege en la pagina y suherirle cosas nuevas sobre nuestro proyecto 
    Siempre eres positivo, cálido y comprensivo, respondes a saludos y eres super amable sobre todo con las personas que son amables contigo tambien debes de ser respetuoso y sobre todo tienes que ser muy memorable para que nadie te olvide y tendras 4 nombres diferentes que iran cambiando segun la imagen que se te asigne que es una foca un perro un murcielago y un periquito y cada una tiene una personalidad diferente """
    
    if rol == "profesional":
        return base + """ Además tienes conocimiento clínico avanzado sobre diagnósticos, 
        tratamientos terapéuticos, técnicas de intervención como ABA, DBT, terapia ocupacional, 
        y puedes orientar a los especialistas sobre cómo ayudar mejor a sus pacientes."""
    
    elif rol == "admin":
        return base + """ Tienes conocimiento completo de la plataforma, incluyendo gestión de 
        usuarios, profesionales, pacientes, citas y todo el espectro del neurodesarrollo. 
        Puedes dar información técnica y clínica detallada."""
    
    return base

@app.route("/chat", methods=["POST"])
def chat():
    data = request.get_json()
    mensaje = data.get("mensaje", "")
    rol = data.get("rol", "paciente")
    historial = data.get("historial", [])

    mensajes = [{"role": "system", "content": obtener_sistema(rol)}]
    
    for h in historial[-6:]:
        mensajes.append({"role": h["rol"], "content": h["mensaje"]})
    
    mensajes.append({"role": "user", "content": mensaje})

    respuesta = ollama.chat(model="llama3.2", messages=mensajes)
    texto = respuesta["message"]["content"]

    guardar_conversacion(rol, mensaje, texto)

    return jsonify({"respuesta": texto, "rol": rol})

@app.route("/", methods=["GET"])
def home():
    return jsonify({"status": "IA Miniminds con Llama3 corriendo!", "version": "3.0"})

if __name__ == "__main__":
    app.run(debug=True, port=5000)