<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Services\BaneoService;
use App\Services\FiltroContenidoService;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    
    protected function layoutSegunRol(): string
    {
        return match (auth()->user()->role ?? 'usuario') {
            'especialista' => 'layouts.especialista',
            'admin' => 'layouts.admin',
            default => 'layouts.paciente',
        };
    }

    
    public function index()
    {
        $experiencias = Experiencia::publicadas()
            ->with('user')
            ->withCount('comentarios')
            ->latest()
            ->paginate(10);

        $layout = $this->layoutSegunRol();

        return view('experiencias.index', compact('experiencias', 'layout'));
    }

    
    public function misPublicaciones()
    {
        $experiencias = auth()->user()
            ->experiencias()
            ->withCount('comentarios')
            ->latest()
            ->paginate(10);

        $layout = $this->layoutSegunRol();

        return view('experiencias.mias', compact('experiencias', 'layout'));
    }

    
    public function feed(Request $request)
    {
        $query = Experiencia::publicadas()->with('user')->latest();

        if ($request->filled('after_id')) {
            $query->where('id', '>', (int) $request->input('after_id'));
        }

        $experiencias = $query->limit(20)->get();

        return response()->json([
            'experiencias' => $experiencias->map(function (Experiencia $e) {
                return [
                    'id' => $e->id,
                    'titulo' => $e->titulo,
                    'resumen' => \Illuminate\Support\Str::limit($e->contenido, 220),
                    'autor' => $e->user->name ?? 'Usuario',
                    'foto' => $e->user && $e->user->foto ? asset('storage/'.$e->user->foto) : null,
                    'fecha' => $e->created_at->diffForHumans(),
                    'url' => route('experiencias.show', $e),
                ];
            }),
        ]);
    }

    public function create()
    {
        $layout = $this->layoutSegunRol();

        return view('experiencias.create', compact('layout'));
    }

    public function store(Request $request, FiltroContenidoService $filtro, BaneoService $baneoService)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'contenido' => 'required|string|max:3000',
        ]);

        $resultado = $filtro->analizar($request->titulo . ' ' . $request->contenido);

        $experiencia = Experiencia::create([
            'user_id' => $request->user()->id,
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'estado' => $resultado['flagged'] ? 'bloqueada' : 'publicada',
            'motivo_bloqueo' => $resultado['flagged'] ? $resultado['motivo'] : null,
        ]);

        if ($resultado['flagged']) {
            $baneoService->registrarInfraccion(
                $request->user(),
                $experiencia,
                $resultado['motivo'],
                $request->ip()
            );

            return redirect()->route('experiencias.mias')->with(
                'error',
                'Tu experiencia fue bloqueada por infringir las normas de la comunidad. Revisa tu inbox de avisos.'
            );
        }

        return redirect()->route('experiencias.mias')->with('success', 'Tu experiencia fue publicada. ¡Gracias por compartirla!');
    }

    public function show(Experiencia $experiencia)
    {
        
        
        $puedeVerBloqueada = auth()->id() === $experiencia->user_id || auth()->user()->isAdmin();

        if ($experiencia->estado === 'bloqueada' && !$puedeVerBloqueada) {
            abort(404);
        }

        $experiencia->load(['comentarios.user']);

        $layout = $this->layoutSegunRol();

        return view('experiencias.show', compact('experiencia', 'layout'));
    }

    public function edit(Experiencia $experiencia)
    {
        abort_unless(auth()->id() === $experiencia->user_id, 403);

        $layout = $this->layoutSegunRol();

        return view('experiencias.edit', compact('experiencia', 'layout'));
    }

    public function update(Request $request, Experiencia $experiencia, FiltroContenidoService $filtro, BaneoService $baneoService)
    {
        abort_unless(auth()->id() === $experiencia->user_id, 403);

        $request->validate([
            'titulo' => 'required|string|max:150',
            'contenido' => 'required|string|max:3000',
        ]);

        $resultado = $filtro->analizar($request->titulo . ' ' . $request->contenido);

        $experiencia->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'estado' => $resultado['flagged'] ? 'bloqueada' : 'publicada',
            'motivo_bloqueo' => $resultado['flagged'] ? $resultado['motivo'] : null,
        ]);

        if ($resultado['flagged']) {
            $baneoService->registrarInfraccion(
                $request->user(),
                $experiencia,
                $resultado['motivo'],
                $request->ip()
            );

            return redirect()->route('experiencias.mias')->with(
                'error',
                'Tu experiencia fue bloqueada por infringir las normas de la comunidad. Revisa tu inbox de avisos.'
            );
        }

        return redirect()->route('experiencias.show', $experiencia)->with('success', 'Experiencia actualizada.');
    }

    public function destroy(Experiencia $experiencia)
    {
        abort_unless(auth()->id() === $experiencia->user_id || auth()->user()->isAdmin(), 403);

        $experiencia->delete();

        return redirect()->route('experiencias.mias')->with('success', 'Experiencia eliminada.');
    }
}
