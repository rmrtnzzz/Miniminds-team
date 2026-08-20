@extends($layout)
@section('title', 'Editar experiencia — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:20px;"> Editar experiencia</h2>

@if($experiencia->estado === 'bloqueada')
 <div class="alert alert-warning">Esta experiencia está bloqueada ({{ $experiencia->motivo_bloqueo }}). Solo tú y el equipo de administración pueden verla.
 </div>
@endif

<div class="pt-card p-4">
 <form method="POST" action="{{ route('experiencias.update', $experiencia) }}">
 @csrf
 @method('PUT')

 <div class="mb-3">
 <label class="form-label">Título</label>
 <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $experiencia->titulo) }}" maxlength="150" required>
 @error('titulo') <div class="text-danger" style="font-size:13px;">{{ $message }}</div> @enderror
 </div>

 <div class="mb-3">
 <label class="form-label">Tu experiencia</label>
 <textarea name="contenido" class="form-control" rows="6" maxlength="3000" required>{{ old('contenido', $experiencia->contenido) }}</textarea>
 @error('contenido') <div class="text-danger" style="font-size:13px;">{{ $message }}</div> @enderror
 </div>

 <button type="submit" class="btn btn-acento">Guardar cambios</button>
 <a href="{{ route('experiencias.show', $experiencia) }}" class="btn btn-outline-secondary">Cancelar</a>
 </form>
</div>
@endsection
