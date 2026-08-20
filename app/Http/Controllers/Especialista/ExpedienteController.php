public function index()
{
    $expedientes = Paciente::with(['asignaciones.assignable', 'asignaciones.especialista'])
        ->get();

    return view('expedientes.index', compact('expedientes'));
}