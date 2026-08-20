<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Cita;
use App\Models\SolicitudPaciente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PacienteController extends Controller
{
    
    public function inicio()
    {
        $pacientes = Paciente::where('user_id', auth()->id())->get();

        $proximaCita = Cita::with(['paciente', 'profesional'])
            ->whereIn('paciente_id', $pacientes->pluck('id'))
            ->where('fecha', '>=', Carbon::today())
            ->orderBy('fecha')
            ->orderBy('hora')
            ->first();

        $solicitudesPendientes = SolicitudPaciente::where('user_id', auth()->id())
            ->where('estado', 'pendiente')
            ->count();

        $asignacionesActivas = \App\Models\Asignacion::whereIn('paciente_id', $pacientes->pluck('id'))
            ->activas()
            ->with('paciente')
            ->latest()
            ->limit(6)
            ->get();

        return view('paciente.inicio', compact('pacientes', 'proximaCita', 'solicitudesPendientes', 'asignacionesActivas'));
    }

    
    public function perfil()
    {
        $pacientes = Paciente::where('user_id', auth()->id())->with('profesional')->get();
        $solicitudes = SolicitudPaciente::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('paciente.perfil', compact('pacientes', 'solicitudes'));
    }

    public function updateCuenta(Request $request)
    {
        $user = auth()->user();

        $data = $request->except(['foto', '_token', '_method', 'role']);

        
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $user->update(['foto' => $path]);
        }

        return redirect()->route('paciente.perfil')->with('success', 'Cuenta actualizada correctamente');
    }

    
    
    public function historial()
    {
        $user = auth()->user();
        $eventos = collect();

        foreach ($user->experiencias as $e) {
            $eventos->push([
                'tipo'    => 'publicacion',
                'icono'   => 'fa-pen-nib',
                'titulo'  => 'Publicó: "'.$e->titulo.'"',
                'detalle' => \Illuminate\Support\Str::limit($e->contenido, 140),
                'fecha'   => $e->created_at,
                'url'     => route('experiencias.show', $e),
            ]);
        }

        foreach ($user->comentarios()->with('experiencia')->get() as $c) {
            $eventos->push([
                'tipo'    => 'comentario',
                'icono'   => 'fa-comment',
                'titulo'  => 'Comentó en "'.($c->experiencia->titulo ?? 'una publicación').'"',
                'detalle' => \Illuminate\Support\Str::limit($c->contenido, 140),
                'fecha'   => $c->created_at,
                'url'     => $c->experiencia ? route('experiencias.show', $c->experiencia) : null,
            ]);
        }

        foreach ($user->solicitudesPacientes as $s) {
            $eventos->push([
                'tipo'    => 'solicitud_paciente',
                'icono'   => 'fa-user-plus',
                'titulo'  => 'Solicitud de registro de paciente: '.$s->nombre.' '.$s->apellido,
                'detalle' => 'Estado: '.ucfirst($s->estado).($s->nota_revision ? ' — '.$s->nota_revision : ''),
                'fecha'   => $s->created_at,
                'url'     => route('paciente.solicitudes.index'),
            ]);
        }

        foreach ($user->solicitudesEspecialista as $s) {
            $eventos->push([
                'tipo'    => 'solicitud_especialista',
                'icono'   => 'fa-user-doctor',
                'titulo'  => 'Solicitud para ser especialista ('.$s->especialidad.')',
                'detalle' => 'Estado: '.ucfirst($s->estado),
                'fecha'   => $s->created_at,
                'url'     => route('paciente.solicitud_especialista.index'),
            ]);
        }

        $eventos = $eventos->sortByDesc('fecha')->values();

        return view('paciente.historial', compact('eventos'));
    }

    
    public function citas()
    {
        $pacienteIds = Paciente::where('user_id', auth()->id())->pluck('id');

        $citas = Cita::with(['paciente', 'profesional'])
            ->whereIn('paciente_id', $pacienteIds)
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        return view('paciente.citas', compact('citas'));
    }

    
    public function recursos()
    {
        $pacienteIds = Paciente::where('user_id', auth()->id())->pluck('id');

        $actividad = Cita::with(['paciente', 'profesional'])
            ->whereIn('paciente_id', $pacienteIds)
            ->orderBy('fecha', 'desc')
            ->limit(8)
            ->get();

        return view('paciente.recursos', compact('actividad'));
    }

    
    public function calendario()
    {
        $hoy = Carbon::now();
        $pacienteIds = Paciente::where('user_id', auth()->id())->pluck('id');

        $citasDelMes = Cita::whereIn('paciente_id', $pacienteIds)
            ->whereMonth('fecha', $hoy->month)
            ->whereYear('fecha', $hoy->year)
            ->get();

        $citasPorDia = [];
        foreach ($citasDelMes as $cita) {
            $citasPorDia[$cita->fecha->day] = true;
        }

        $primerDiaMes = $hoy->copy()->startOfMonth();
        $offset = $primerDiaMes->dayOfWeekIso - 1; 

        return view('paciente.calendario', [
            'mesNombre'    => $hoy->locale('es')->isoFormat('MMMM'),
            'anio'         => $hoy->year,
            'diasEnMes'    => $hoy->daysInMonth,
            'diaHoy'       => $hoy->day,
            'offset'       => $offset,
            'citasPorDia'  => $citasPorDia,
        ]);
    }

    
    public function agenda()
    {
        $pacienteIds = Paciente::where('user_id', auth()->id())->pluck('id');

        $proximasCitas = Cita::with(['paciente', 'profesional'])
            ->whereIn('paciente_id', $pacienteIds)
            ->where('fecha', '>=', Carbon::today())
            ->orderBy('fecha')
            ->orderBy('hora')
            ->get();

        return view('paciente.agenda', compact('proximasCitas'));
    }
}
