<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::where('user_id', auth()->id())->get();
        return view('paciente.index', compact('pacientes'));
    }

    public function create()
    {
        return view('paciente.crear');
    }

    public function store(Request $request)
    {
        $data = $request->except('foto');
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $data['foto'] = $path;
        }

        Paciente::create($data);
        return redirect()->route('paciente.index')->with('success', 'Paciente agregado correctamente');
    }

    public function edit($id)
    {
        $paciente = Paciente::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('paciente.editar', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $paciente->update($request->except('foto'));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $paciente->update(['foto' => $path]);
        }

        return redirect()->route('paciente.index')->with('success', 'Paciente actualizado correctamente');
    }

    public function destroy($id)
    {
        $paciente = Paciente::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $paciente->delete();
        return redirect()->route('paciente.index')->with('success', 'Paciente eliminado correctamente');
    }
}