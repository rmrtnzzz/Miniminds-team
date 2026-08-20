<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SolicitudDesbaneo;
use App\Models\SolicitudEspecialista;
use App\Models\SolicitudPaciente;
use App\Models\User;
use App\Models\Profesional;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $solicitudesPaciente     = SolicitudPaciente::with(['user','profesional','paciente'])->latest()->get();
        $solicitudesEspecialista = SolicitudEspecialista::with('user')->latest()->get();
        $solicitudesDesbaneo     = SolicitudDesbaneo::with('user')->latest()->get();
        $infracciones            = User::where('advertencias','>',0)->orWhere('baneado',true)->orderByDesc('advertencias')->get();
        return view('admin.inbox', compact('solicitudesPaciente','solicitudesEspecialista','solicitudesDesbaneo','infracciones'));
    }

    public function aprobarEspecialista(SolicitudEspecialista $solicitud)
    {
        $solicitud->update(['estado'=>'aprobada']);
        $user = $solicitud->user;
        $user->update(['role' => User::ROLE_ESPECIALISTA]);
        if (!Profesional::where('user_id',$user->id)->exists()) {
            Profesional::create(['user_id'=>$user->id,'nombre'=>$user->name,'apellido'=>$user->apellido ?? '','telefono'=>$user->telefono,'especialidad'=>$solicitud->especialidad]);
        }
        return back()->with('success','Solicitud aprobada. Usuario convertido a especialista.');
    }

    public function rechazarEspecialista(Request $request, SolicitudEspecialista $solicitud)
    {
        $request->validate(['notas_admin'=>'nullable|string|max:500']);
        $solicitud->update(['estado'=>'rechazada','notas_admin'=>$request->notas_admin]);
        return back()->with('success','Solicitud rechazada.');
    }

    public function aprobarDesbaneo(SolicitudDesbaneo $solicitud)
    {
        $solicitud->update(['estado'=>'aprobada','respuesta_admin'=>'Solicitud aprobada por el equipo de administración.']);
        $solicitud->user->update(['baneado'=>false,'tipo_baneo'=>'ninguno','baneado_hasta'=>null,'motivo_baneo'=>null]);
        return back()->with('success','Usuario desbaneado correctamente.');
    }

    public function rechazarDesbaneo(Request $request, SolicitudDesbaneo $solicitud)
    {
        $request->validate(['respuesta_admin'=>'nullable|string|max:500']);
        $solicitud->update(['estado'=>'rechazada','respuesta_admin'=>$request->respuesta_admin ?? 'Solicitud rechazada.']);
        return back()->with('success','Solicitud de desbaneo rechazada.');
    }
}
