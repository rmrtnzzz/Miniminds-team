<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function show()
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();
<<<<<<< HEAD
        return view('especialista.perfil', compact('profesional'));
=======
        return view('profesional.perfil', compact('profesional'));
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }

    public function edit()
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();
<<<<<<< HEAD
        return view('especialista.perfil_editar', compact('profesional'));
=======
        return view('profesional.editar', compact('profesional'));
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }

    public function update(Request $request)
    {
        $profesional = Profesional::where('user_id', auth()->id())->first();

<<<<<<< HEAD
        $profesional->update($request->except(['foto', '_token', '_method']));
=======
        $profesional->update($request->except('foto'));
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $profesional->update(['foto' => $path]);
<<<<<<< HEAD
            auth()->user()->update(['foto' => $path]);
        }

        return redirect()->route('especialista.perfil')->with('success', 'Perfil actualizado correctamente');
    }
}
=======
        }

        return redirect()->route('profesional.perfil')->with('success', 'Perfil actualizado correctamente');
    }
}
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
