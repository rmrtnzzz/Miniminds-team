@extends($layout)
@section('title', 'Compartir experiencia — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:20px;"> Comparte tu experiencia</h2>

<div class="pt-card p-4">
 <form method="POST" action="{{ route('experiencias.store') }}">
 @csrf

 <div class="mb-3">
 <label class="form-label">Título</label>
 <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" maxlength="150" required>
 @error('titulo') <div class="text-danger" style="font-size:13px;">{{ $message }}</div> @enderror
 </div>

 <div class="mb-3">
 <label class="form-label">Tu experiencia</label>
 <textarea name="contenido" class="form-control" rows="6" maxlength="3000" required>{{ old('contenido') }}</textarea>
 @error('contenido') <div class="text-danger" style="font-size:13px;">{{ $message }}</div> @enderror
 <div style="font-size:12px; color:#999; margin-top:4px;">Recuerda mantener un lenguaje respetuoso: el contenido pasa por un filtro automático de moderación.
 </div>
 </div>

 <button type="submit" class="btn btn-acento">Publicar</button>
 <a href="{{ route('experiencias.mias') }}" class="btn btn-outline-secondary">Cancelar</a>
 </form>
</div>
@endsection
