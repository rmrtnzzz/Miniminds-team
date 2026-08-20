@extends('layouts.paciente')

@section('title', 'Agregar paciente — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">Agregar paciente</h2>

<div class="pt-card p-4" style="max-width:600px;">
    <form action="{{ route('paciente.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Género</label>
            <select name="genero" class="form-select">
                <option value="">Selecciona</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Edad</label>
            <input type="number" name="edad" class="form-control" min="0" max="17">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Foto (opcional)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-acento">Guardar paciente</button>
        <a href="{{ route('paciente.perfil') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
