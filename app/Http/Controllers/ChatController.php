<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function enviar(Request $request)
    {
        $mensaje = $request->input('mensaje');
        $rol = auth()->user()->role ?? 'paciente';

        $respuesta = Http::post('http://127.0.0.1:5000/chat', [
            'mensaje' => $mensaje,
            'rol' => $rol
        ]);

        return response()->json($respuesta->json());
    }

    public function index()
    {
        return view('chat.index');
    }
}