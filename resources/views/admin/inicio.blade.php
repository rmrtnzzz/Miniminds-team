@extends('layouts.admin')
@section('title', 'Panel general — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:24px">Panel general</h2>

<div class="row g-3 mb-4">
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800">{{ $metrica['usuarios'] }}</div>
            <div style="font-size:12px;opacity:.7">Usuarios</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800">{{ $metrica['especialistas'] }}</div>
            <div style="font-size:12px;opacity:.7">Especialistas</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800">{{ $metrica['admins'] }}</div>
            <div style="font-size:12px;opacity:.7">Admins</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800">{{ $metrica['pacientes'] }}</div>
            <div style="font-size:12px;opacity:.7">Pacientes</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800">{{ $metrica['citas'] }}</div>
            <div style="font-size:12px;opacity:.7">Citas</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4" style="border:1px solid #F5A623">
            <div style="font-size:28px;font-weight:800">{{ $metrica['solicitudes_pendientes'] }}</div>
            <div style="font-size:12px;opacity:.7">Solicitudes pend.</div>
        </div>
    </div>
</div>

<h6 style="font-weight:700;margin-bottom:10px">Últimas citas registradas</h6>
<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente</th><th>Profesional</th><th>Fecha</th><th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ultimasCitas as $c)
                <tr>
                    <td>{{ $c->paciente->nombre ?? '—' }} {{ $c->paciente->apellido ?? '' }}</td>
                    <td>{{ $c->profesional->nombre ?? '—' }} {{ $c->profesional->apellido ?? '' }}</td>
                    <td>{{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($c->estado) }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-3" style="opacity:.6">Aún no hay citas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
