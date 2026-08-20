@extends('layouts.especialista')
@section('title', 'Agenda de citas — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/especialista/citas.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
 <h2 style="font-weight:800;margin:0">Agenda de citas</h2>
 <button class="btn btn-acento" onclick="document.getElementById('modal-crear').classList.add('open')">+ Agendar cita</button>
</div>

<div class="pt-card p-3">
 <table class="citas-table">
 <thead>
 <tr>
 <th>Paciente</th><th>Fecha</th><th>Hora</th><th>Estado</th><th>Notas</th><th></th>
 </tr>
 </thead>
 <tbody>
 @forelse($citas as $cita)
 <tr>
 <td>{{ $cita->paciente->nombre ?? '—' }} {{ $cita->paciente->apellido ?? '' }}</td>
 <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
 <td>{{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}</td>
 <td><span class="estado-pill estado-{{ $cita->estado }}">{{ ucfirst($cita->estado) }}</span></td>
 <td style="color:#7c9d92">{{ $cita->notas ?? '—' }}</td>
 <td class="text-end">
 <button class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('modal-editar-{{ $cita->id }}').classList.add('open')">Editar</button>
 <form action="{{ route('especialista.citas.destroy', $cita->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar esta cita?')">
 @csrf @method('DELETE')
 <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
 </form>
 </td>
 </tr>
 @empty
 <tr>
 <td colspan="6" style="text-align:center;color:#7c9d92;padding:32px">Todavía no has agendado ninguna cita.
 </td>
 </tr>
 @endforelse
 </tbody>
 </table>
</div>

<!-- Modal crear cita -->
<div class="modal-overlay" id="modal-crear">
 <div class="modal-box">
 <h4> Agendar nueva cita</h4>
 <form action="{{ route('especialista.citas.store') }}" method="POST">
 @csrf
 <label>Paciente</label>
 <select name="paciente_id" required>
 <option value="">Selecciona un paciente</option>
 @foreach($pacientes as $p)
 <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->apellido }}</option>
 @endforeach
 </select>
 <label>Fecha</label>
 <input type="date" name="fecha" min="{{ date('Y-m-d') }}" required>
 <label>Hora</label>
 <input type="time" name="hora" required>
 <label>Estado</label>
 <select name="estado">
 <option value="pendiente">Pendiente</option>
 <option value="confirmada">Confirmada</option>
 </select>
 <label>Notas (opcional)</label>
 <textarea name="notas" rows="2" placeholder="Motivo o comentario..."></textarea>
 <div class="modal-btns">
 <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('modal-crear').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento">Confirmar cita</button>
 </div>
 </form>
 </div>
</div>

@foreach($citas as $cita)
<div class="modal-overlay" id="modal-editar-{{ $cita->id }}">
 <div class="modal-box">
 <h4> Editar cita — {{ $cita->paciente->nombre ?? '' }}</h4>
 <form action="{{ route('especialista.citas.update', $cita->id) }}" method="POST">
 @csrf @method('PUT')
 <label>Fecha</label>
 <input type="date" name="fecha" value="{{ \Carbon\Carbon::parse($cita->fecha)->format('Y-m-d') }}" required>
 <label>Hora</label>
 <input type="time" name="hora" value="{{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}" required>
 <label>Estado</label>
 <select name="estado">
 <option value="pendiente" {{ $cita->estado=='pendiente'?'selected':'' }}>Pendiente</option>
 <option value="confirmada" {{ $cita->estado=='confirmada'?'selected':'' }}>Confirmada</option>
 <option value="cancelada" {{ $cita->estado=='cancelada'?'selected':'' }}>Cancelada</option>
 <option value="completada" {{ $cita->estado=='completada'?'selected':'' }}>Completada</option>
 </select>
 <label>Notas</label>
 <textarea name="notas" rows="2">{{ $cita->notas }}</textarea>
 <div class="modal-btns">
 <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('modal-editar-{{ $cita->id }}').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento">Guardar</button>
 </div>
 </form>
 </div>
</div>
@endforeach
@endsection
