@extends('layouts.especialista')
@section('title', 'Editar perfil — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:24px">Editar mi perfil</h2>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach
    </div>
@endif

<div class="pt-card p-4" style="max-width:600px">
    <form action="{{ route('especialista.perfil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $profesional->nombre ?? '') }}" required>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $profesional->apellido ?? '') }}" required>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $profesional->telefono ?? '') }}">
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $profesional->fecha_nacimiento ?? '') }}">
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Género</label>
                <select name="genero" class="form-control">
                    <option value="masculino" {{ ($profesional->genero ?? '')=='masculino'?'selected':'' }}>Masculino</option>
                    <option value="femenino" {{ ($profesional->genero ?? '')=='femenino'?'selected':'' }}>Femenino</option>
                    <option value="otro" {{ ($profesional->genero ?? '')=='otro'?'selected':'' }}>Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-control">
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('especialista.perfil') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-acento">Guardar cambios</button>
        </div>
    </form>
</div>
@endsection
