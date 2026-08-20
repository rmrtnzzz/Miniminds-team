@extends('layouts.admin')
@section('title', 'Especialistas — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Especialistas</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Nombre</th><th>Correo</th><th>Especialidad</th><th>Teléfono</th><th>Pacientes</th><th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($profesionales as $p)
                <tr>
                    <td>{{ $p->nombre }} {{ $p->apellido }}</td>
                    <td>{{ $p->user->email ?? '—' }}</td>
                    <td>{{ $p->especialidad ?? '—' }}</td>
                    <td>{{ $p->telefono ?? '—' }}</td>
                    <td>{{ $p->pacientes()->count() }}</td>
                    <td>
                        <form action="{{ route('admin.profesionales.destroy', $p->id) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar a {{ $p->nombre }} {{ $p->apellido }}? Sus pacientes quedarán sin asignar. Esta acción no se puede deshacer.');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar especialista">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center py-3" style="opacity:.6">No hay especialistas registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
