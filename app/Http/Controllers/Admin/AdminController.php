<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\SolicitudPaciente;
use App\Models\User;

class AdminController extends Controller
{
    
    public function inicio()
    {
        $metrica = [
            'usuarios'      => User::where('role', User::ROLE_USUARIO)->count(),
            'especialistas' => User::where('role', User::ROLE_ESPECIALISTA)->count(),
            'admins'        => User::where('role', User::ROLE_ADMIN)->count(),
            'pacientes'     => Paciente::count(),
            'citas'         => Cita::count(),
            'solicitudes_pendientes' => SolicitudPaciente::pendientes()->count(),
        ];

        $ultimasCitas = Cita::with(['paciente', 'profesional'])
            ->latest()
            ->limit(8)
            ->get();

        return view('admin.inicio', compact('metrica', 'ultimasCitas'));
    }

    
    public function usuarios()
    {
        $usuarios = User::orderBy('role')->orderBy('name')->get();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    
    public function cambiarRol(\Illuminate\Http\Request $request, User $usuario)
    {
        $request->validate([
            'role' => 'required|in:usuario,especialista,admin',
        ]);

        $usuario->update(['role' => $request->role]);

        
        if ($request->role === User::ROLE_ESPECIALISTA && !Profesional::where('user_id', $usuario->id)->exists()) {
            Profesional::create([
                'user_id'   => $usuario->id,
                'nombre'    => $usuario->name,
                'apellido'  => $usuario->apellido ?? '',
                'telefono'  => $usuario->telefono,
            ]);
        }

        return back()->with('success', 'Rol actualizado correctamente.');
    }

    public function pacientes()
    {
        $pacientes = Paciente::with(['user', 'profesional'])->orderBy('nombre')->get();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    public function profesionales()
    {
        $profesionales = Profesional::with('user')->orderBy('nombre')->get();
        return view('admin.profesionales.index', compact('profesionales'));
    }

    public function citas()
    {
        $citas = Cita::with(['paciente', 'profesional'])
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();
        return view('admin.citas.index', compact('citas'));
    }

    public function solicitudes()
    {
        $solicitudes = SolicitudPaciente::with(['user', 'profesional', 'paciente'])
            ->latest()
            ->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function eliminarUsuario(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        if ($usuario->role === User::ROLE_ADMIN && User::where('role', User::ROLE_ADMIN)->count() <= 1) {
            return back()->with('error', 'Debe quedar al menos un administrador en el sistema.');
        }

        Paciente::where('user_id', $usuario->id)->get()->each(fn ($p) => $this->borrarPacienteConDependencias($p));
        Profesional::where('user_id', $usuario->id)->get()->each(fn ($p) => $this->borrarProfesionalConDependencias($p));

        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function eliminarPaciente(Paciente $paciente)
    {
        $this->borrarPacienteConDependencias($paciente);

        return back()->with('success', 'Paciente eliminado correctamente.');
    }

    public function eliminarProfesional(Profesional $profesional)
    {
        $this->borrarProfesionalConDependencias($profesional);

        return back()->with('success', 'Especialista eliminado correctamente.');
    }

    private function borrarPacienteConDependencias(Paciente $paciente)
    {
        $paciente->citas()->delete();
        $paciente->asignaciones()->delete();
        $paciente->delete();
    }

    private function borrarProfesionalConDependencias(Profesional $profesional)
    {
        $profesional->citas()->delete();
        Paciente::where('profesional_id', $profesional->id)->update(['profesional_id' => null]);
        $profesional->delete();
    }
}
