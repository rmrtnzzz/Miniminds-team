@extends('layouts.paciente')

@section('title', 'Calendario — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/paciente/calendario.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 style="font-weight:800; margin:0;">Calendario</h2>
    <span style="font-weight:600; color:#6b6280;">{{ $mesNombre }} {{ $anio }}</span>
</div>

<div class="pt-card p-4">
    <div class="cal-grid mb-2">
        <div class="cal-day-label">Lun</div>
        <div class="cal-day-label">Mar</div>
        <div class="cal-day-label">Mié</div>
        <div class="cal-day-label">Jue</div>
        <div class="cal-day-label">Vie</div>
        <div class="cal-day-label">Sáb</div>
        <div class="cal-day-label">Dom</div>
    </div>
    <div class="cal-grid">
        @for($i = 0; $i < $offset; $i++)
            <div class="cal-cell empty"></div>
        @endfor

        @for($dia = 1; $dia <= $diasEnMes; $dia++)
            <div class="cal-cell {{ $dia === $diaHoy ? 'today' : '' }}">
                <div>{{ $dia }}</div>
                @if(isset($citasPorDia[$dia]))
                    <span class="cal-dot"></span>
                @endif
            </div>
        @endfor
    </div>
</div>
@endsection
