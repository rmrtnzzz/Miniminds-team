@extends('layouts.especialista')
@section('title', 'Panel de consulta — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">
 ¡Bienvenido/a, {{ auth()->user()->name }}!
</h2>

@if(!$profesional)
 <div class="alert alert-warning">Tu cuenta es de tipo especialista pero todavía no tiene una ficha profesional asociada.
 Contacta a un administrador para completarla.
 </div>
@endif

<div class="row g-3 mb-4">
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #A8D8C4;">
 <div style="font-size:32px; font-weight:800;">{{ $totalPacientes }}</div>
 <div style="font-size:13px; color:#4a7d6f;">Pacientes a mi cargo</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #F5A623;">
 <div style="font-size:32px; font-weight:800;">{{ $solicitudesPendientes }}</div>
 <div style="font-size:13px; color:#4a7d6f;">Solicitudes pendientes</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #7C9ED9;">
 <div style="font-size:32px; font-weight:800;">{{ $citasHoy->count() }}</div>
 <div style="font-size:13px; color:#4a7d6f;">Citas de hoy</div>
 </div>
 </div>
</div>

<div class="row g-3">
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Citas de hoy</h6>
 @forelse($citasHoy as $c)
 <div style="padding:8px 0;border-bottom:1px solid rgba(0,0,0,.06);font-size:14px">
 {{ \Carbon\Carbon::parse($c->hora)->format('H:i') }} —
 {{ $c->paciente->nombre ?? '' }} {{ $c->paciente->apellido ?? '' }}
 <span style="color:#9a8fb8;font-size:12px">({{ ucfirst($c->estado) }})</span>
 </div>
 @empty
 <p style="color:#7c9d92;font-size:13px">No tienes citas agendadas para hoy.</p>
 @endforelse
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;"> Próximas citas</h6>
 @forelse($proximasCitas as $c)
 <div style="padding:8px 0;border-bottom:1px solid rgba(0,0,0,.06);font-size:14px">
 {{ \Carbon\Carbon::parse($c->fecha)->format('d/m') }} {{ \Carbon\Carbon::parse($c->hora)->format('H:i') }} —
 {{ $c->paciente->nombre ?? '' }} {{ $c->paciente->apellido ?? '' }}
 </div>
 @empty
 <p style="color:#7c9d92;font-size:13px">No hay próximas citas registradas.</p>
 @endforelse
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Solicitudes de registro</h6>
 <p style="font-size:13px; color:#4a7d6f;">Revisa las solicitudes de tutores para ingresar nuevos pacientes.</p>
 <a href="{{ route('especialista.solicitudes.index') }}" class="btn btn-acento btn-sm">Ver solicitudes</a>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;"> Gestionar agenda</h6>
 <p style="font-size:13px; color:#4a7d6f;">Agenda, edita o cancela citas de tus pacientes.</p>
 <a href="{{ route('especialista.citas.index') }}" class="btn btn-acento btn-sm">Ir a agenda</a>
 </div>
 </div>
</div>
@endsection
