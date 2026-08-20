@extends('layouts.especialista')
@section('title', $paciente->nombre.' — Ficha del paciente')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 style="font-weight:800;margin:0">{{ $paciente->nombre }} {{ $paciente->apellido }}</h2>
    <a href="{{ route('especialista.pacientes.edit', $paciente->id) }}" class="btn btn-acento btn-sm">Editar datos</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="pt-card p-4">
            <div style="font-size:12px;color:#4a7d6f;text-transform:uppercase;font-weight:700">Tutor</div>
            <div style="font-size:15px">{{ $paciente->user->name ?? '—' }}</div>
            <div style="font-size:12px;color:#4a7d6f">{{ $paciente->user->email ?? '' }}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="pt-card p-4">
            <div style="font-size:12px;color:#4a7d6f;text-transform:uppercase;font-weight:700">Edad / Género</div>
            <div style="font-size:15px">{{ $paciente->edad ?? '—' }} años · {{ ucfirst($paciente->genero ?? '—') }}</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="pt-card p-4">
            <div style="font-size:12px;color:#4a7d6f;text-transform:uppercase;font-weight:700">Fecha de nacimiento</div>
            <div style="font-size:15px">{{ optional($paciente->fecha_nacimiento)->format('d/m/Y') ?? '—' }}</div>
        </div>
    </div>
</div>

<h6 style="font-weight:700;margin-bottom:10px">Historial de citas</h6>
<div class="pt-card p-3 mb-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="color:#4a7d6f;font-size:12px;text-transform:uppercase">
                <th>Fecha</th><th>Hora</th><th>Estado</th><th>Notas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($paciente->citas as $c)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($c->hora)->format('H:i') }}</td>
                    <td>{{ ucfirst($c->estado) }}</td>
                    <td style="color:#7c9d92">{{ $c->notas ?? '—' }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-3" style="color:#7c9d92">Sin citas registradas todavía.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<a href="{{ route('especialista.citas.index') }}" class="btn btn-acento btn-sm">+ Agendar una cita para este paciente</a>

<h6 style="font-weight:700;margin:26px 0 10px">Plan de terapias y juegos</h6>

@if(session('success'))
    <div class="alert alert-success py-2" style="font-size:13px">{{ session('success') }}</div>
@endif

<div class="pt-card p-3 mb-3">
    @forelse($paciente->asignaciones as $a)
        <div class="d-flex justify-content-between align-items-start py-2" style="border-bottom:1px solid rgba(0,0,0,0.06)">
            <div>
                <span style="font-size:11px;font-weight:700;text-transform:uppercase;color:{{ $a->tipo === 'juego' ? '#6d5bd0' : '#4a7d6f' }}">
                    {{ $a->tipo === 'juego' ? 'Juego' : 'Terapia' }}
                </span>
                @if($a->estado === 'completada')
                    <span style="font-size:11px;color:#2ba36b;font-weight:700">· Completada</span>
                @endif
                <div style="font-weight:700;font-size:14px">{{ $a->titulo }}</div>
                @if($a->descripcion)
                    <div style="font-size:13px;color:#7c9d92">{{ $a->descripcion }}</div>
                @endif
                @if($a->tipo === 'juego' && $a->juego_ruta)
                    <a href="{{ route($a->juego_ruta) }}" target="_blank" style="font-size:12px" class="text-decoration-none">Ver juego →</a>
                @endif
            </div>
            <div class="d-flex gap-2">
                @if($a->estado === 'activa')
                    <form method="POST" action="{{ route('especialista.pacientes.asignaciones.completar', [$paciente->id, $a->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm">Marcar completada</button>
                    </form>
                @endif
                <form method="POST" action="{{ route('especialista.pacientes.asignaciones.destroy', [$paciente->id, $a->id]) }}" onsubmit="return confirm('¿Eliminar esta asignación?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <p style="color:#7c9d92;font-size:13px;margin:0">Todavía no le has asignado ninguna terapia o juego a este paciente.</p>
    @endforelse
</div>

<div class="pt-card p-3">
    <div style="font-weight:700;font-size:14px;margin-bottom:10px">Asignar algo nuevo</div>
    <form method="POST" action="{{ route('especialista.pacientes.asignaciones.store', $paciente->id) }}" id="form-asignacion">
        @csrf
        <div class="d-flex gap-2 mb-2">
            <label class="btn btn-outline-secondary btn-sm active">
                <input type="radio" name="tipo" value="terapia" checked onchange="toggleAsignacionTipo()" style="margin-right:4px"> Terapia
            </label>
            <label class="btn btn-outline-secondary btn-sm">
                <input type="radio" name="tipo" value="juego" onchange="toggleAsignacionTipo()" style="margin-right:4px"> Juego
            </label>
        </div>

        <div id="campos-terapia">
            <input type="text" name="titulo" class="form-control form-control-sm mb-2" placeholder="Título de la terapia (ej: Ejercicios de respiración diaria)">
        </div>

        <div id="campos-juego" style="display:none">
            <select name="juego_ruta" class="form-control form-control-sm mb-2">
                <option value="">Selecciona un juego…</option>
                @foreach(\App\Models\Asignacion::JUEGOS_DISPONIBLES as $ruta => $nombre)
                    <option value="{{ $ruta }}">{{ $nombre }}</option>
                @endforeach
            </select>
        </div>

        <textarea name="descripcion" class="form-control form-control-sm mb-2" rows="2" placeholder="Notas o instrucciones para el paciente/tutor (opcional)"></textarea>

        <button type="submit" class="btn btn-acento btn-sm">Asignar</button>
    </form>
</div>

<script src="{{ asset('js/especialista/paciente-show.js') }}"></script>
@endsection
