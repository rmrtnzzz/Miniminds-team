@extends('layouts.paciente')

@section('title', 'Editar paciente — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">Editar paciente</h2>

<div class="pt-card p-4" style="max-width:600px;">
    <form action="{{ route('paciente.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ $paciente->apellido }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento ? $paciente->fecha_nacimiento->format('Y-m-d') : '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Género</label>
            <select name="genero" class="form-select">
                <option value="">Selecciona</option>
                <option value="masculino" {{ $paciente->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ $paciente->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ $paciente->genero == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Edad</label>
            <input type="number" name="edad" class="form-control" min="0" max="17" value="{{ $paciente->edad }}">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Foto actual</label><br>
            @if($paciente->foto)
                <img src="{{ asset('storage/'.$paciente->foto) }}" style="width:70px; height:70px; border-radius:50%; object-fit:cover; margin-bottom:10px;">
            @endif
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-acento">Guardar cambios</button>
        <a href="{{ route('paciente.perfil') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>

        <form action="{{ route('paciente.destroy', $paciente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este paciente?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-outline-danger ms-2">Eliminar paciente</button>
        </form>
    </form>
</div>
@endsection
