<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Profesional;
use App\Models\SolicitudPaciente;
use App\Models\User;
use App\Notifications\NuevaSolicitudPaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SolicitudPacienteController extends Controller
{
    
    public function index()
    {
        $solicitudes = SolicitudPaciente::where('user_id', auth()->id())
            ->with('profesional')
            ->latest()
            ->get();

        return view('paciente.solicitudes.index', compact('solicitudes'));
    }

    
    public function create()
    {
        return view('paciente.solicitudes.crear');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'           => 'required|string|max:100',
            'apellido'         => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before_or_equal:today',
            'genero'           => 'nullable|in:masculino,femenino,otro',
            'motivo'           => 'nullable|string|max:1000',
            'foto'             => 'nullable|image|max:2048',
        ]);

        $edad = \Carbon\Carbon::parse($data['fecha_nacimiento'])->age;

        if ($edad > 12) {
            return back()->withInput()->withErrors([
                'fecha_nacimiento' => 'Miniminds es un servicio especializado para niños hasta los 12 años. La edad calculada (' . $edad . ' años) supera ese límite.',
            ]);
        }

        $data['edad'] = $edad;
        $data['user_id'] = auth()->id();
        $data['estado'] = 'pendiente';

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $solicitud = SolicitudPaciente::create($data);

        
        $especialistas = User::where('role', User::ROLE_ESPECIALISTA)->get();
        Notification::send($especialistas, new NuevaSolicitudPaciente($solicitud));

        return redirect()->route('paciente.solicitudes.index')
            ->with('success', 'Tu solicitud fue enviada. Un especialista la revisará y registrará al paciente.');
    }
}