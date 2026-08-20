<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    
    public function index(Request $request)
    {
        $avisos = $request->user()->notifications()->latest()->paginate(15);

        return view('paciente.avisos.index', compact('avisos'));
    }

    public function marcarLeida(Request $request, string $id)
    {
        $aviso = $request->user()->notifications()->where('id', $id)->firstOrFail();
        $aviso->markAsRead();

        return back();
    }
}
