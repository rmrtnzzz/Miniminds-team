@extends('layouts.admin')
@section('title','Inbox — Miniminds Admin')
@section('extra_styles')
<link href="{{ asset('css/admin/inbox.css') }}" rel="stylesheet">
@endsection

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:22px">
 <h2 style="font-weight:900;margin:0">Inbox</h2>
</div>

@if(session('success'))
 <div style="background:rgba(52,211,153,.15);border:1px solid #34d399;border-radius:10px;padding:12px 16px;color:#a7f3d0;margin-bottom:16px;font-size:13px;font-weight:600"> {{ session('success') }}</div>
@endif

<div class="inbox-tabs">
 <div class="inbox-tab active" onclick="showTab('tab-pacientes')">Solicitudes pacientes
 @if($solicitudesPaciente->where('estado','pendiente')->count())
 <span class="badge">{{ $solicitudesPaciente->where('estado','pendiente')->count() }}</span>
 @endif
 </div>
 <div class="inbox-tab" onclick="showTab('tab-especialistas')">Solicitudes especialista
 @if($solicitudesEspecialista->where('estado','pendiente')->count())
 <span class="badge">{{ $solicitudesEspecialista->where('estado','pendiente')->count() }}</span>
 @endif
 </div>
 <div class="inbox-tab" onclick="showTab('tab-desbaneo')">Desbaneos
 @if($solicitudesDesbaneo->where('estado','pendiente')->count())
 <span class="badge">{{ $solicitudesDesbaneo->where('estado','pendiente')->count() }}</span>
 @endif
 </div>
 <div class="inbox-tab" onclick="showTab('tab-infracciones')">
  Infracciones
 @if($infracciones->where('baneado',true)->count())
 <span class="badge">{{ $infracciones->where('baneado',true)->count() }}</span>
 @endif
 </div>
</div>

<div class="inbox-panel active pt-card" id="tab-pacientes">
 <table class="ib-table">
 <thead><tr><th>Paciente</th><th>Solicitado por</th><th>Estado</th><th>Revisado por</th><th>Fecha</th></tr></thead>
 <tbody>
 @forelse($solicitudesPaciente as $s)
 <tr>
 <td><b>{{ $s->nombre }} {{ $s->apellido }}</b></td>
 <td>{{ $s->user->name ?? '—' }}</td>
 <td><span class="pill {{ $s->estado==='pendiente'?'pill-pend':($s->estado==='aprobada'?'pill-ok':'pill-bad') }}">{{ ucfirst($s->estado) }}</span></td>
 <td>{{ $s->profesional->nombre ?? '—' }}</td>
 <td>{{ $s->created_at->format('d/m/Y') }}</td>
 </tr>
 @empty
 <tr><td colspan="5" style="text-align:center;opacity:.5;padding:24px">No hay solicitudes.</td></tr>
 @endforelse
 </tbody>
 </table>
</div>

<div class="inbox-panel pt-card" id="tab-especialistas">
 <table class="ib-table">
 <thead><tr><th>Usuario</th><th>Especialidad</th><th>Exp.</th><th>Puntaje test</th><th>Estado</th><th>Acciones</th></tr></thead>
 <tbody>
 @forelse($solicitudesEspecialista as $s)
 <tr>
 <td><b>{{ $s->user->name ?? '—' }}</b><br><span style="font-size:11px;opacity:.6">{{ $s->titulo_profesional }}</span></td>
 <td>{{ $s->especialidad }}</td>
 <td>{{ $s->anios_experiencia }} años</td>
 <td>
 <b style="color:{{ $s->puntaje_test>=70?'#34d399':'#fbbf24' }}">{{ $s->puntaje_test }}/100</b>
 <span class="puntaje-bar"><span class="puntaje-fill" style="width:{{ $s->puntaje_test }}%;background:{{ $s->puntaje_test>=70?'#34d399':'#fbbf24' }}"></span></span>
 </td>
 <td><span class="pill {{ $s->estado==='pendiente'?'pill-pend':($s->estado==='aprobada'?'pill-ok':'pill-bad') }}">{{ ucfirst($s->estado) }}</span></td>
 <td>
 @if($s->estado==='pendiente')
 <form method="POST" action="{{ route('admin.inbox.especialista.aprobar',$s) }}" style="display:inline">@csrf
 <button class="btn-sm btn-ok">Aprobar</button>
 </form>
 <button class="btn-sm btn-bad" onclick="openModal('modal-rechazar-esp-{{$s->id}}')">Rechazar</button>
 @else
 @if($s->notas_admin)<span style="font-size:11px;opacity:.6">{{ Str::limit($s->notas_admin,40) }}</span>@endif
 @endif
 </td>
 </tr>
 @if($s->estado==='pendiente')
 <div class="modal-overlay" id="modal-rechazar-esp-{{$s->id}}">
 <div class="modal-box">
 <h4>Rechazar solicitud de {{ $s->user->name }}</h4>
 <form method="POST" action="{{ route('admin.inbox.especialista.rechazar',$s) }}">@csrf
 <textarea name="notas_admin" rows="3" placeholder="Motivo del rechazo (opcional)..."></textarea>
 <div class="modal-btns">
 <button type="button" class="btn-sm" style="background:var(--pt-input-bg);color:var(--pt-text)" onclick="closeModal('modal-rechazar-esp-{{$s->id}}')">Cancelar</button>
 <button type="submit" class="btn-sm btn-bad">Confirmar rechazo</button>
 </div>
 </form>
 </div>
 </div>
 @endif
 @empty
 <tr><td colspan="6" style="text-align:center;opacity:.5;padding:24px">No hay solicitudes de especialista.</td></tr>
 @endforelse
 </tbody>
 </table>
</div>

<div class="inbox-panel pt-card" id="tab-desbaneo">
 <table class="ib-table">
 <thead><tr><th>Usuario</th><th>Justificación</th><th>Fecha</th><th>Estado</th><th>Acciones</th></tr></thead>
 <tbody>
 @forelse($solicitudesDesbaneo as $s)
 <tr>
 <td><b>{{ $s->user->name ?? '—' }}</b><br><span style="font-size:11px;opacity:.6">{{ $s->user->email ?? '' }}</span></td>
 <td style="max-width:240px">{{ Str::limit($s->justificacion, 80) }}</td>
 <td>{{ $s->fecha_solicitud->format('d/m/Y') }}</td>
 <td><span class="pill {{ $s->estado==='pendiente'?'pill-pend':($s->estado==='aprobada'?'pill-ok':'pill-bad') }}">{{ ucfirst($s->estado) }}</span></td>
 <td>
 @if($s->estado==='pendiente')
 <form method="POST" action="{{ route('admin.inbox.desbaneo.aprobar',$s) }}" style="display:inline">@csrf
 <button class="btn-sm btn-ok">Desbanear</button>
 </form>
 <button class="btn-sm btn-bad" onclick="openModal('modal-rechazar-desb-{{$s->id}}')">Rechazar</button>
 @else
 <span style="font-size:11px;opacity:.6">{{ Str::limit($s->respuesta_admin,40) }}</span>
 @endif
 </td>
 </tr>
 @if($s->estado==='pendiente')
 <div class="modal-overlay" id="modal-rechazar-desb-{{$s->id}}">
 <div class="modal-box">
 <h4>Rechazar desbaneo de {{ $s->user->name ?? '' }}</h4>
 <p style="font-size:13px;opacity:.7;margin-bottom:14px">Justificación del usuario: {{ $s->justificacion }}</p>
 <form method="POST" action="{{ route('admin.inbox.desbaneo.rechazar',$s) }}">@csrf
 <textarea name="respuesta_admin" rows="2" placeholder="Respuesta al usuario (opcional)..."></textarea>
 <div class="modal-btns">
 <button type="button" class="btn-sm" style="background:var(--pt-input-bg);color:var(--pt-text)" onclick="closeModal('modal-rechazar-desb-{{$s->id}}')">Cancelar</button>
 <button type="submit" class="btn-sm btn-bad">Confirmar rechazo</button>
 </div>
 </form>
 </div>
 </div>
 @endif
 @empty
 <tr><td colspan="5" style="text-align:center;opacity:.5;padding:24px">No hay solicitudes de desbaneo.</td></tr>
 @endforelse
 </tbody>
 </table>
</div>

<div class="inbox-panel pt-card" id="tab-infracciones">
 @forelse($infracciones as $u)
 <div class="inf-row">
 <div class="inf-avatar">{{ strtoupper(substr($u->name,0,1)) }}</div>
 <div style="flex:1">
 <div style="font-weight:700;font-size:14px">{{ $u->name }}</div>
 <div style="font-size:12px;opacity:.6">{{ $u->email }}</div>
 @if($u->motivo_baneo)<div style="font-size:12px;color:#fca5a5;margin-top:2px">Motivo: {{ $u->motivo_baneo }}</div>@endif
 </div>
 <div style="text-align:center;min-width:80px">
 <div style="font-size:11px;opacity:.6">Advertencias</div>
 <div style="font-size:20px;font-weight:900;color:#fbbf24">{{ $u->advertencias }}</div>
 </div>
 <div style="text-align:center;min-width:100px">
 @if($u->baneado)
 <span class="pill pill-bad">{{ $u->tipo_baneo === 'permanente' ? ' Permanente' : '⏰ Temporal' }}</span>
 @if($u->baneado_hasta)<div style="font-size:11px;opacity:.6;margin-top:4px">hasta {{ $u->baneado_hasta->format('d/m H:i') }}</div>@endif
 @else
 <span class="pill pill-ok">Activo</span>
 @endif
 </div>
 </div>
 @empty
 <div style="text-align:center;opacity:.5;padding:32px">No hay infracciones registradas.</div>
 @endforelse
</div>

<script src="{{ asset('js/admin/inbox.js') }}"></script>
@endsection
