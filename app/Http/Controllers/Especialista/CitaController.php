<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitaController extends Controller
{
    
    public function index()
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();

        $citas = Cita::where('profesional_id', $profesional->id)
            ->with('paciente')
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        $pacientes = Paciente::where('profesional_id', $profesional->id)
            ->orderBy('nombre')
            ->get();

        return view('especialista.citas.index', compact('citas', 'pacientes'));
    }

    
    public function store(Request $request)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();

        $data = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha'       => 'required|date',
            'hora'        => 'required',
            'estado'      => 'required|in:pendiente,confirmada,cancelada,completada',
            'notas'       => 'nullable|string|max:500',
        ]);

        $paciente = Paciente::where('id', $data['paciente_id'])
            ->where('profesional_id', $profesional->id)
            ->firstOrFail();

        Cita::create([
            'paciente_id'    => $paciente->id,
            'profesional_id' => $profesional->id,
            'fecha'          => $data['fecha'],
            'hora'           => $data['hora'],
            'estado'         => $data['estado'],
            'notas'          => $data['notas'] ?? null,
        ]);

        return redirect()->route('especialista.citas.index')->with('success', 'Cita agendada correctamente.');
    }

    
    public function update(Request $request, Cita $cita)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($cita->profesional_id === $profesional->id, 403);

        $data = $request->validate([
            'fecha'  => 'required|date',
            'hora'   => 'required',
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada',
            'notas'  => 'nullable|string|max:500',
        ]);

        $cita->update($data);

        return redirect()->route('especialista.citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    
    public function destroy(Cita $cita)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($cita->profesional_id === $profesional->id, 403);

        $cita->delete();

        return redirect()->route('especialista.citas.index')->with('success', 'Cita eliminada.');
    }
}
