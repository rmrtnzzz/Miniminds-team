<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
=======
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee

class ChatController extends Controller
{
    public function enviar(Request $request)
    {
<<<<<<< HEAD
        $mensaje = trim((string) $request->input('mensaje'));

        if ($mensaje === '') {
            return response()->json([
                'respuesta' => 'Escribe algo para que pueda ayudarte 💜',
                'mascota'   => $request->input('mascota_actual', 'nilo'),
            ], 200);
        }

        $rol           = auth()->user()->role ?? 'paciente';
        $sessionId     = $request->input('session_id', 'default');
        $mascotaActual = $request->input('mascota_actual');

        try {
            $respuesta = Http::timeout(20)->post('http://127.0.0.1:5000/chat', [
                'mensaje'        => $mensaje,
                'rol'            => $rol,
                'session_id'     => $sessionId,
                'mascota_actual' => $mascotaActual,
            ]);

            if ($respuesta->failed()) {
                Log::warning('Miniminds IA respondió con error', [
                    'status' => $respuesta->status(),
                    'body'   => $respuesta->body(),
                ]);

                return response()->json([
                    'respuesta' => 'Hubo un problema con el asistente. Intenta de nuevo en un momento 💜',
                    'mascota'   => $mascotaActual ?? 'nilo',
                ], 200);
            }

            return response()->json($respuesta->json());

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('No se pudo conectar con el servicio de IA (miniminds-ia): '.$e->getMessage());

            return response()->json([
                'respuesta' => 'No pude conectar con el asistente en este momento. Intenta de nuevo en unos minutos 💜',
                'mascota'   => $mascotaActual ?? 'nilo',
            ], 200);
        }
=======
        $mensaje = $request->input('mensaje');
        $rol = auth()->user()->role ?? 'paciente';

        $respuesta = Http::post('http://127.0.0.1:5000/chat', [
            'mensaje' => $mensaje,
            'rol' => $rol
        ]);

        return response()->json($respuesta->json());
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }

    public function index()
    {
<<<<<<< HEAD
        return view('chat.chat');
    }
}
=======
        return view('chat.index');
    }
}
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
