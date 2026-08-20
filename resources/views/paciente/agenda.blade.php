@extends('layouts.paciente')

@section('title', 'Agenda — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/paciente/agenda.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">Agenda</h2>

<div class="pt-card p-2">
    @forelse($proximasCitas ?? [] as $cita)
        <div class="agenda-item">
            <div class="agenda-fecha">
                <span class="dia">{{ $cita->fecha->format('d') }}</span>
                <span class="mes">{{ $cita->fecha->locale('es')->isoFormat('MMM') }}</span>
            </div>
            <div class="agenda-info">
                <div class="titulo">{{ $cita->paciente->nombre ?? '—' }} con {{ $cita->profesional->nombre ?? 'profesional por asignar' }}</div>
                <div class="sub">{{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }} hrs · {{ ucfirst($cita->estado) }}</div>
            </div>
        </div>
    @empty
        <div style="text-align:center; color:#9a8fb8; padding:40px;">
            No tienes próximas citas en tu agenda.
        </div>
    @endforelse
</div>
@endsection
