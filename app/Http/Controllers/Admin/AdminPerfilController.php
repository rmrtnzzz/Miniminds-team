<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPerfilController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();
        return view('admin.perfil', compact('usuario'));
    }

    public function edit()
    {
        $usuario = auth()->user();
        return view('admin.perfil_editar', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'foto'     => 'nullable|image|max:4096',
        ]);

        $usuario->update($request->only(['name', 'apellido', 'telefono']));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $usuario->update(['foto' => $path]);
        }

        return redirect()->route('admin.perfil')->with('success', 'Perfil actualizado correctamente');
    }
}
