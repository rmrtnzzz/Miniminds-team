@extends('layouts.paciente')

@section('title', 'Inicio — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">¡Bienvenido/a, {{ auth()->user()->name ?? 'nombre' }}!</h2>

@if(session('success'))
 <div style="background:#DDF3E4;color:#1F9254;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:600">
 {{ session('success') }}
 </div>
@endif

<div class="row g-3 mb-4">
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #F5C4D6;">
 <div style="font-size:32px; font-weight:800; color:#4A4063;">{{ $pacientes->count() }}</div>
 <div style="font-size:13px; color:#8b7fa8;">Pacientes registrados</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #C4B5E8;">
 <div style="font-size:32px; font-weight:800; color:#4A4063;">
 {{ $proximaCita ? \Carbon\Carbon::parse($proximaCita->fecha)->format('d/m') : '—' }}
 </div>
 <div style="font-size:13px; color:#8b7fa8;">Próxima cita</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #A8D8C4;">
 <div style="font-size:32px; font-weight:800; color:#4A4063;">{{ $solicitudesPendientes }}</div>
 <div style="font-size:13px; color:#8b7fa8;">Solicitudes pendientes</div>
 </div>
 </div>
</div>

<div class="row g-3">
 @if($proximaCita)
 <div class="col-md-12">
 <div class="pt-card p-4" style="border-left:4px solid #F5A623;">
 <h6 style="font-weight:700;"> Tu próxima cita</h6>
 <p style="font-size:14px; color:#4A4063; margin-bottom:0;">
 {{ $proximaCita->paciente->nombre ?? '' }} {{ $proximaCita->paciente->apellido ?? '' }}
 con {{ $proximaCita->profesional->nombre ?? 'un especialista' }}
 el {{ \Carbon\Carbon::parse($proximaCita->fecha)->translatedFormat('d \d\e F') }}
 a las {{ \Carbon\Carbon::parse($proximaCita->hora)->format('H:i') }}
 </p>
 </div>
 </div>
 @endif

 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Solicitar registro de paciente</h6>
 <p style="font-size:13px; color:#6b6280;">¿Aún no tienes un paciente registrado? Solicita su ingreso y un especialista lo revisará.</p>
 <a href="{{ route('paciente.solicitudes.crear') }}" class="btn btn-acento btn-sm">Solicitar</a>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Guía para padres</h6>
 <p style="font-size:13px; color:#6b6280;">Recibe tips sobre detección temprana y acompañamiento diario.</p>
 <a href="{{ route('paciente.recursos') }}" class="btn btn-acento btn-sm">Ver guía</a>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Mis citas</h6>
 <p style="font-size:13px; color:#6b6280;">Consulta el estado de tus citas agendadas por el especialista.</p>
 <a href="{{ route('paciente.citas') }}" class="btn btn-acento btn-sm">Ver citas</a>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Juegos y evaluación</h6>
 <p style="font-size:13px; color:#6b6280;">Explora actividades y juegos pensados para el desarrollo infantil.</p>
 <a href="{{ route('juegos.index') }}" class="btn btn-acento btn-sm">Ir a juegos</a>
 </div>
 </div>
</div>

@if($asignacionesActivas->count())
<h6 style="font-weight:700; margin:28px 0 12px;">Asignado por el especialista</h6>
<div class="row g-3 mb-3">
    @foreach($asignacionesActivas as $a)
    <div class="col-md-6">
        <div class="pt-card p-4 h-100">
            <span style="font-size:11px;font-weight:700;text-transform:uppercase;color:{{ $a->tipo === 'juego' ? '#6d5bd0' : '#F5A623' }}">
                {{ $a->tipo === 'juego' ? 'Juego recomendado' : 'Terapia' }} · {{ $a->paciente->nombre }}
            </span>
            <h6 style="font-weight:700;margin:4px 0 6px;">{{ $a->titulo }}</h6>
            @if($a->descripcion)
                <p style="font-size:13px; color:#6b6280;">{{ $a->descripcion }}</p>
            @endif
            @if($a->tipo === 'juego' && $a->juego_ruta)
                <a href="{{ route($a->juego_ruta) }}" class="btn btn-acento btn-sm">Jugar ahora</a>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
