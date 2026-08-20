<?php
namespace App\Http\Controllers\Usuario;
use App\Http\Controllers\Controller;
use App\Models\SolicitudDesbaneo;
use Illuminate\Http\Request;

class SolicitudDesbaneController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        $hoy = now()->toDateString();
        $yaEnvioHoy = SolicitudDesbaneo::where('user_id',$user->id)->where('fecha_solicitud',$hoy)->exists();
        return view('errores.desbaneo', compact('yaEnvioHoy'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $hoy = now()->toDateString();
        if (SolicitudDesbaneo::where('user_id',$user->id)->where('fecha_solicitud',$hoy)->exists()) {
            return back()->with('error','Ya enviaste una solicitud hoy. Inténtalo mañana.');
        }
        $request->validate(['justificacion'=>'required|string|min:30|max:800']);
        SolicitudDesbaneo::create(['user_id'=>$user->id,'justificacion'=>$request->justificacion,'fecha_solicitud'=>$hoy]);
        return back()->with('success','Solicitud enviada. El equipo la revisará lo antes posible.');
    }
}
