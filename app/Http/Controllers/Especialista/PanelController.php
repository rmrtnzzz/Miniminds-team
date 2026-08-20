<?php

namespace App\Http\Controllers\Especialista;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\SolicitudPaciente;
use Carbon\Carbon;

class PanelController extends Controller
{
    public function inicio()
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();

        $totalPacientes = $profesional
            ? Paciente::where('profesional_id', $profesional->id)->count()
            : 0;

        $solicitudesPendientes = SolicitudPaciente::pendientes()->count();

        $citasHoy = $profesional
            ? Cita::where('profesional_id', $profesional->id)
                ->whereDate('fecha', Carbon::today())
                ->with('paciente')
                ->orderBy('hora')
                ->get()
            : collect();

        $proximasCitas = $profesional
            ? Cita::where('profesional_id', $profesional->id)
                ->where('fecha', '>=', Carbon::today())
                ->with('paciente')
                ->orderBy('fecha')->orderBy('hora')
                ->limit(6)
                ->get()
            : collect();

        return view('especialista.inicio', compact(
            'profesional', 'totalPacientes', 'solicitudesPendientes', 'citasHoy', 'proximasCitas'
        ));
    }
}
