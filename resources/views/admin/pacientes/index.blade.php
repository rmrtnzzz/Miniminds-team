@extends('layouts.admin')
@section('title', 'Pacientes — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Pacientes registrados</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente</th><th>Tutor</th><th>Especialista asignado</th><th>Edad</th><th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($pacientes as $p)
                <tr>
                    <td>{{ $p->nombre }} {{ $p->apellido }}</td>
                    <td>{{ $p->user->name ?? '—' }}</td>
                    <td>{{ $p->profesional->nombre ?? 'Sin asignar' }} {{ $p->profesional->apellido ?? '' }}</td>
                    <td>{{ $p->edad ?? '—' }}</td>
                    <td>
                        <form action="{{ route('admin.pacientes.destroy', $p->id) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar a {{ $p->nombre }} {{ $p->apellido }}? Esta acción no se puede deshacer.');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar paciente">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-3" style="opacity:.6">No hay pacientes registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
