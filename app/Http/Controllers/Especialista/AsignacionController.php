<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use App\Models\Asignacion;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    private function profesionalDePaciente(Paciente $paciente): Profesional
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($paciente->profesional_id === $profesional->id, 403);

        return $profesional;
    }

    
    public function store(Request $request, Paciente $paciente)
    {
        $profesional = $this->profesionalDePaciente($paciente);

        $data = $request->validate([
            'tipo'        => 'required|in:terapia,juego',
            'titulo'      => 'required_if:tipo,terapia|nullable|string|max:150',
            'descripcion' => 'nullable|string|max:1000',
            'juego_ruta'  => 'required_if:tipo,juego|nullable|in:' . implode(',', array_keys(Asignacion::JUEGOS_DISPONIBLES)),
        ]);

        if ($data['tipo'] === 'juego') {
            $data['titulo'] = Asignacion::JUEGOS_DISPONIBLES[$data['juego_ruta']];
        }

        $paciente->asignaciones()->create([
            'profesional_id' => $profesional->id,
            'tipo'           => $data['tipo'],
            'titulo'         => $data['titulo'],
            'descripcion'    => $data['descripcion'] ?? null,
            'juego_ruta'     => $data['juego_ruta'] ?? null,
        ]);

        return back()->with('success', 'Asignación agregada al plan del paciente.');
    }

    
    public function completar(Request $request, Paciente $paciente, Asignacion $asignacion)
    {
        $this->profesionalDePaciente($paciente);
        abort_unless($asignacion->paciente_id === $paciente->id, 403);

        $request->validate(['nota_completado' => 'nullable|string|max:500']);

        $asignacion->update([
            'estado'          => 'completada',
            'nota_completado' => $request->nota_completado,
            'completada_at'   => now(),
        ]);

        return back()->with('success', 'Asignación marcada como completada.');
    }

    
    public function destroy(Paciente $paciente, Asignacion $asignacion)
    {
        $this->profesionalDePaciente($paciente);
        abort_unless($asignacion->paciente_id === $paciente->id, 403);

        $asignacion->delete();

        return back()->with('success', 'Asignación eliminada.');
    }
}
