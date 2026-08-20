@extends('layouts.paciente')
@section('title', 'Solicitar registro de paciente — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:6px">Solicitar registro de paciente</h2>
<p style="color:#6b6280;font-size:14px;margin-bottom:24px">
    Completa los datos del paciente. Un especialista revisará tu solicitud y lo registrará en el sistema.
</p>

@if($errors->any())
    <div style="background:#FBDDE3;color:#C23A52;padding:12px 18px;border-radius:10px;margin-bottom:16px">
        @foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach
    </div>
@endif

<div class="pt-card p-4" style="max-width:640px">
    <form action="{{ route('paciente.solicitudes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" max="{{ now()->toDateString() }}" required>
                <small id="edad-calculada" style="display:block;margin-top:4px;font-size:12px;color:#6b6280;"></small>
            </div>
            <div class="col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Género</label>
                <select name="genero" class="form-control">
                    <option value="">Selecciona…</option>
                    <option value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Foto (opcional)</label>
                <input type="file" name="foto" accept="image/*" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label" style="font-size:12px;font-weight:700;color:#9a8fb8;text-transform:uppercase">Motivo / notas para el especialista</label>
                <textarea name="motivo" rows="3" class="form-control" placeholder="Cuéntanos brevemente por qué solicitas el registro...">{{ old('motivo') }}</textarea>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('paciente.solicitudes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-acento" id="btn-enviar-solicitud">Enviar solicitud</button>
        </div>
    </form>
</div>

<script src="{{ asset('js/paciente/solicitud-registro-paciente.js') }}"></script>
@endsection
