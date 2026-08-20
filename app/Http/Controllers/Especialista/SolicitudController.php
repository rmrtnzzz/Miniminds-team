<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\SolicitudPaciente;
use App\Notifications\SolicitudPacienteResuelta;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    
    public function index()
    {
        $pendientes = SolicitudPaciente::pendientes()->with('user')->latest()->get();
        $resueltas  = SolicitudPaciente::where('estado', '!=', 'pendiente')
            ->with(['user', 'profesional'])
            ->latest('revisada_at')
            ->limit(20)
            ->get();

        return view('especialista.solicitudes.index', compact('pendientes', 'resueltas'));
    }

    
    public function aprobar(Request $request, SolicitudPaciente $solicitud)
    {
        if ($solicitud->estado !== 'pendiente') {
            return back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $request->validate([
            'nota_revision' => 'nullable|string|max:500',
        ]);

        $profesional = Profesional::where('user_id', auth()->id())->firstOrFail();

        $paciente = Paciente::create([
            'user_id'          => $solicitud->user_id,
            'profesional_id'   => $profesional->id,
            'nombre'           => $solicitud->nombre,
            'apellido'         => $solicitud->apellido,
            'fecha_nacimiento' => $solicitud->fecha_nacimiento,
            'genero'           => $solicitud->genero,
            'edad'             => $solicitud->edad,
            'foto'             => $solicitud->foto,
        ]);

        $solicitud->update([
            'estado'         => 'aprobada',
            'profesional_id' => $profesional->id,
            'paciente_id'    => $paciente->id,
            'nota_revision'  => $request->nota_revision,
            'revisada_at'    => now(),
        ]);

        $solicitud->user->notify(new SolicitudPacienteResuelta($solicitud));

        return back()->with('success', 'Paciente registrado e ingresado a tu cartera de pacientes.');
    }

    
    public function rechazar(Request $request, SolicitudPaciente $solicitud)
    {
        if ($solicitud->estado !== 'pendiente') {
            return back()->with('error', 'Esta solicitud ya fue procesada.');
        }

        $request->validate([
            'nota_revision' => 'required|string|max:500',
        ]);

        $profesional = Profesional::where('user_id', auth()->id())->first();

        $solicitud->update([
            'estado'         => 'rechazada',
            'profesional_id' => $profesional?->id, 
            'nota_revision'  => $request->nota_revision,
            'revisada_at'    => now(),
        ]);

        $solicitud->user->notify(new SolicitudPacienteResuelta($solicitud));

        return back()->with('success', 'Solicitud rechazada y usuario notificado.');
    }
}