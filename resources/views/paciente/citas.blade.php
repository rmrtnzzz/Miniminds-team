@extends('layouts.paciente')
@section('title', 'Mis Citas — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/paciente/citas.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
 <h2 style="font-weight:800;margin:0">Mis citas</h2>
</div>

<div style="background:#EDE8F8;color:#4A4063;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-size:13px">
 ℹ Las citas las agenda tu especialista asignado. Aquí puedes ver el estado de cada una.
</div>

@if(session('success'))
 <div style="background:#DDF3E4;color:#1F9254;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:600">
 {{ session('success') }}
 </div>
@endif

<div class="pt-card p-3">
 <table class="citas-table">
 <thead>
 <tr>
 <th>Paciente</th>
 <th>Profesional</th>
 <th>Fecha</th>
 <th>Hora</th>
 <th>Estado</th>
 <th>Notas</th>
 </tr>
 </thead>
 <tbody>
 @forelse($citas ?? [] as $cita)
 <tr>
 <td>{{ $cita->paciente->nombre ?? '—' }} {{ $cita->paciente->apellido ?? '' }}</td>
 <td>{{ $cita->profesional->nombre ?? 'Sin asignar' }} {{ $cita->profesional->apellido ?? '' }}</td>
 <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
 <td>{{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}</td>
 <td><span class="estado-pill estado-{{ $cita->estado }}">{{ ucfirst($cita->estado) }}</span></td>
 <td style="color:#9a8fb8">{{ $cita->notas ?? '—' }}</td>
 </tr>
 @empty
 <tr>
 <td colspan="6" style="text-align:center;color:#9a8fb8;padding:32px">Todavía no tienes citas agendadas. Tu especialista te asignará una próximamente.
 </td>
 </tr>
 @endforelse
 </tbody>
 </table>
</div>
@endsection
