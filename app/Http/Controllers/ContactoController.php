<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'mensaje'  => 'required|string|max:2000',
        ]);

        $datos = $request->only(['nombre', 'apellido', 'correo', 'telefono', 'mensaje']);

        Mail::to(config('mail.from.address'))->send(new ContactoMail($datos));

        return back()->with('success', '¡Mensaje enviado! Te responderemos pronto.');
    }
}
