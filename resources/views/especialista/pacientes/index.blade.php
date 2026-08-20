@extends('layouts.especialista')
@section('title', 'Mis pacientes — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Mis pacientes</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="color:#4a7d6f;font-size:12px;text-transform:uppercase">
                <th>Paciente</th>
                <th>Tutor</th>
                <th>Edad</th>
                <th>Género</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($pacientes as $p)
                <tr>
                    <td style="font-weight:700">{{ $p->nombre }} {{ $p->apellido }}</td>
                    <td>{{ $p->user->name ?? '—' }}</td>
                    <td>{{ $p->edad ?? '—' }}</td>
                    <td>{{ ucfirst($p->genero ?? '—') }}</td>
                    <td class="text-end">
                        <a href="{{ route('especialista.pacientes.show', $p->id) }}" class="btn btn-sm btn-acento">Ver ficha</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4" style="color:#7c9d92">
                        Todavía no tienes pacientes asignados. Revisa las solicitudes pendientes.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
