<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class AdminExperienciaController extends Controller
{
    public function index()
    {
        $bloqueadas = Experiencia::bloqueadas()->with('user')->latest()->get();
        $publicadas = Experiencia::publicadas()->with('user')->latest()->limit(20)->get();

        return view('admin.experiencias.index', compact('bloqueadas', 'publicadas'));
    }

    
    public function aprobar(Experiencia $experiencia)
    {
        $experiencia->update(['estado' => 'publicada', 'motivo_bloqueo' => null]);

        return back()->with('success', 'Experiencia aprobada y publicada.');
    }

    public function destroy(Experiencia $experiencia)
    {
        $experiencia->delete();

        return back()->with('success', 'Experiencia eliminada definitivamente.');
    }
}
