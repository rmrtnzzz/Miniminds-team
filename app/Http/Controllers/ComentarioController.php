<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Experiencia;
use App\Services\FiltroContenidoService;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Experiencia $experiencia, FiltroContenidoService $filtro)
    {
        $puedeVer = $experiencia->estado === 'publicada'
            || $experiencia->user_id === auth()->id()
            || auth()->user()->isAdmin();

        abort_unless($puedeVer, 404);

        $request->validate([
            'contenido' => 'required|string|max:600',
        ]);

        $resultado = $filtro->analizar($request->contenido);

        if ($resultado['flagged']) {
            return back()->with('error', 'Tu comentario no se pudo publicar porque infringe las normas de la comunidad.')
                ->withInput();
        }

        $experiencia->comentarios()->create([
            'user_id'   => auth()->id(),
            'contenido' => $request->contenido,
        ]);

        return back()->with('success', 'Comentario publicado.');
    }

    public function destroy(Experiencia $experiencia, Comentario $comentario)
    {
        abort_unless($comentario->experiencia_id === $experiencia->id, 404);
        abort_unless(auth()->id() === $comentario->user_id || auth()->user()->isAdmin(), 403);

        $comentario->delete();

        return back()->with('success', 'Comentario eliminado.');
    }
}
