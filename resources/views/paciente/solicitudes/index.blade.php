@extends('layouts.paciente')
@section('title', 'Mis solicitudes — Miniminds')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
    <h2 style="font-weight:800;margin:0">Mis solicitudes de registro</h2>
    <a href="{{ route('paciente.solicitudes.crear') }}" class="btn btn-acento">
        <i class="fas fa-plus me-1"></i> Nueva solicitud
    </a>
</div>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente propuesto</th>
                <th>Estado</th>
                <th>Revisado por</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse($solicitudes as $s)
                <tr>
                    <td>{{ $s->nombre }} {{ $s->apellido }}</td>
                    <td>
                        @php
                            $badgeColor = match($s->estado) {
                                'aprobada'  => '#2E7D32',
                                'rechazada' => '#C23A52',
                                default     => '#9a8fb8',
                            };
                        @endphp
                        <span style="text-transform:capitalize;font-weight:600;color:{{ $badgeColor }}">
                            {{ $s->estado }}
                        </span>
                    </td>
                    <td>{{ $s->profesional->nombre ?? '—' }}</td>
                    <td>{{ $s->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3" style="opacity:.6">
                        Aún no has enviado ninguna solicitud.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
