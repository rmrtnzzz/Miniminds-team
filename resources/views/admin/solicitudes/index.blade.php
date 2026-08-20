@extends('layouts.admin')
@section('title', 'Solicitudes — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Solicitudes de registro de pacientes</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente propuesto</th><th>Solicitado por</th><th>Estado</th><th>Revisado por</th><th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse($solicitudes as $s)
                <tr>
                    <td>{{ $s->nombre }} {{ $s->apellido }}</td>
                    <td>{{ $s->user->name ?? '—' }}</td>
                    <td style="text-transform:capitalize">{{ $s->estado }}</td>
                    <td>{{ $s->profesional->nombre ?? '—' }}</td>
                    <td>{{ $s->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-3" style="opacity:.6">No hay solicitudes registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
