<?php
namespace App\Http\Controllers\Usuario;
use App\Http\Controllers\Controller;
use App\Models\SolicitudEspecialista;
use Illuminate\Http\Request;

class SolicitudEspecialistaController extends Controller
{
    public function index()
    {
        $solicitud = SolicitudEspecialista::where('user_id', auth()->id())->latest()->first();
        return view('paciente.solicitud_especialista.index', compact('solicitud'));
    }

    public function create()
    {
        $existente = SolicitudEspecialista::where('user_id', auth()->id())
            ->whereIn('estado', ['pendiente','aprobada'])->first();
        if ($existente) return redirect()->route('paciente.solicitud_especialista.index')
            ->with('info','Ya tienes una solicitud activa.');
        return view('paciente.solicitud_especialista.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_profesional' => 'required|string|max:100',
            'especialidad'       => 'required|string|max:100',
            'anios_experiencia'  => 'required|integer|min:0|max:50',
            'motivacion'         => 'required|string|min:50|max:1000',
            'formacion'          => 'required|string|min:30|max:1000',
            'respuestas'         => 'required|array|min:5',
        ]);

        $puntaje = $this->calcularPuntaje($request->respuestas);

        SolicitudEspecialista::create([
            'user_id'            => auth()->id(),
            'titulo_profesional' => $request->titulo_profesional,
            'especialidad'       => $request->especialidad,
            'anios_experiencia'  => $request->anios_experiencia,
            'motivacion'         => $request->motivacion,
            'formacion'          => $request->formacion,
            'puntaje_test'       => $puntaje,
        ]);

        return redirect()->route('paciente.solicitud_especialista.index')
            ->with('success','Solicitud enviada. El equipo la revisará pronto.');
    }

    private function calcularPuntaje(array $respuestas): int
    {
        $correctas = ['q1'=>'b','q2'=>'c','q3'=>'a','q4'=>'b','q5'=>'c','q6'=>'a','q7'=>'b'];
        $pts = 0;
        foreach ($correctas as $q => $r) {
            if (isset($respuestas[$q]) && $respuestas[$q] === $r) $pts += 14;
        }
        return min(100, $pts);
    }
}
