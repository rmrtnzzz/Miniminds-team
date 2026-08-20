<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Profesional;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    
    public function index()
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();

        $pacientes = Paciente::where('profesional_id', $profesional->id)
            ->with('user')
            ->orderBy('nombre')
            ->get();

        return view('especialista.pacientes.index', compact('pacientes'));
    }

    
    public function show(Paciente $paciente)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($paciente->profesional_id === $profesional->id, 403);

        $paciente->load(['user', 'citas' => function ($q) {
            $q->orderBy('fecha', 'desc')->orderBy('hora', 'desc');
        }, 'asignaciones' => function ($q) {
            $q->latest();
        }]);

        return view('especialista.pacientes.show', compact('paciente'));
    }

    
    public function edit(Paciente $paciente)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($paciente->profesional_id === $profesional->id, 403);

        return view('especialista.pacientes.editar', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();
        abort_unless($paciente->profesional_id === $profesional->id, 403);

        $data = $request->validate([
            'nombre'           => 'required|string|max:100',
            'apellido'         => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'genero'           => 'nullable|in:masculino,femenino,otro',
            'edad'             => 'nullable|integer|min:0|max:120',
            'foto'             => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $paciente->update($data);

        return redirect()->route('especialista.pacientes.show', $paciente)
            ->with('success', 'Datos del paciente actualizados.');
    }
}
