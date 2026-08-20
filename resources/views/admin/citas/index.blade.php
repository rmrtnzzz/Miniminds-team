@extends('layouts.admin')
@section('title', 'Citas — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Todas las citas</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente</th><th>Profesional</th><th>Fecha</th><th>Hora</th><th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($citas as $c)
                <tr>
                    <td>{{ $c->paciente->nombre ?? '—' }} {{ $c->paciente->apellido ?? '' }}</td>
                    <td>{{ $c->profesional->nombre ?? '—' }} {{ $c->profesional->apellido ?? '' }}</td>
                    <td>{{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($c->hora)->format('H:i') }}</td>
                    <td>{{ ucfirst($c->estado) }}</td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-3" style="opacity:.6">No hay citas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
