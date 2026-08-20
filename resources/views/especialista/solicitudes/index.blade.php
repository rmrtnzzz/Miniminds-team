@extends('layouts.especialista')
@section('title', 'Solicitudes de registro — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/especialista/solicitudes.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Solicitudes de registro de pacientes</h2>

<h6 style="font-weight:700;margin-bottom:10px">Pendientes ({{ $pendientes->count() }})</h6>

@forelse($pendientes as $s)
 <div class="solicitud-card d-flex justify-content-between align-items-center">
 <div>
 <div style="font-weight:700">{{ $s->nombre }} {{ $s->apellido }}</div>
 <div style="font-size:12px;color:#6b6280">Solicitado por {{ $s->user?->name ?? '—' }} · {{ $s->created_at?->format('d/m/Y') ?? '—' }}
 @if($s->edad) · {{ $s->edad }} años @endif
 @if($s->genero) · {{ ucfirst($s->genero) }} @endif
 </div>
 @if($s->motivo)
 <div style="font-size:13px;color:#4A4063;margin-top:6px">"{{ $s->motivo }}"</div>
 @endif
 </div>
 <div class="d-flex gap-2">
 <button class="btn btn-acento btn-sm" onclick="document.getElementById('modal-aprobar-{{ $s->id }}').classList.add('open')">Aprobar</button>
 <button class="btn btn-outline-danger btn-sm" onclick="document.getElementById('modal-rechazar-{{ $s->id }}').classList.add('open')">Rechazar</button>
 </div>
 </div>

 <div class="modal-overlay" id="modal-aprobar-{{ $s->id }}">
 <div class="modal-box">
 <h5 style="font-weight:800">Aprobar e ingresar paciente</h5>
 <p style="font-size:13px;color:#6b6280">Se creará el registro de <strong>{{ $s->nombre }} {{ $s->apellido }}</strong> y quedará asignado a tu cartera de pacientes.
 </p>
 <form action="{{ route('especialista.solicitudes.aprobar', $s->id) }}" method="POST">
 @csrf
 <textarea name="nota_revision" rows="2" placeholder="Nota (opcional)"></textarea>
 <div class="d-flex gap-2 justify-content-end mt-2">
 <button type="button" class="btn btn-outline-secondary btn-sm" onclick="document.getElementById('modal-aprobar-{{ $s->id }}').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento btn-sm">Confirmar</button>
 </div>
 </form>
 </div>
 </div>

 <div class="modal-overlay" id="modal-rechazar-{{ $s->id }}">
 <div class="modal-box">
 <h5 style="font-weight:800">Rechazar solicitud</h5>
 <form action="{{ route('especialista.solicitudes.rechazar', $s->id) }}" method="POST">
 @csrf
 <textarea name="nota_revision" rows="2" placeholder="Explica el motivo del rechazo (obligatorio)" required></textarea>
 <div class="d-flex gap-2 justify-content-end mt-2">
 <button type="button" class="btn btn-outline-secondary btn-sm" onclick="document.getElementById('modal-rechazar-{{ $s->id }}').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
 </div>
 </form>
 </div>
 </div>
@empty
 <p style="color:#4a7d6f;font-size:14px">No hay solicitudes pendientes </p>
@endforelse

<h6 style="font-weight:700;margin:26px 0 10px">Historial reciente</h6>
@forelse($resueltas as $s)
 <div class="solicitud-card d-flex justify-content-between align-items-center">
 <div>
 <div style="font-weight:700">{{ $s->nombre }} {{ $s->apellido }}</div>
 <div style="font-size:12px;color:#6b6280">Solicitado por {{ $s->user?->name ?? '—' }} · revisado el {{ $s->revisada_at?->format('d/m/Y') ?? '—' }}
 </div>
 </div>
 <span class="estado-pill estado-{{ $s->estado }}">{{ ucfirst($s->estado) }}</span>
 </div>
@empty
 <p style="color:#4a7d6f;font-size:14px">Aún no has resuelto ninguna solicitud.</p>
@endforelse
@endsection