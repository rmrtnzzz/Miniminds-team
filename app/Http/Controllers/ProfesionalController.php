<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function show()
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();
        return view('profesional.perfil', compact('profesional'));
    }

    public function edit()
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();
        return view('profesional.editar', compact('profesional'));
    }

    public function update(Request $request)
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();

        $profesional->update($request->except('foto'));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $profesional->update(['foto' => $path]);
        }

        return redirect()->route('profesional.perfil')->with('success', 'Perfil actualizado correctamente');
    }
}