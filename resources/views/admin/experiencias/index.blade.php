@extends('layouts.admin')
@section('title', 'Moderación — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:20px;"> Moderación de experiencias</h2>

<h5 style="font-weight:700;">Bloqueadas por el filtro ({{ $bloqueadas->count() }})</h5>

@forelse ($bloqueadas as $experiencia)
 <div class="pt-card p-4 mb-3">
 <p style="font-size:12px; color:var(--pt-muted);">
 {{ $experiencia->user->name ?? 'Usuario #'.$experiencia->user_id }} ·
 {{ $experiencia->created_at->format('d/m/Y H:i') }}
 </p>
 <strong>{{ $experiencia->titulo }}</strong>
 <p style="font-size:13px; color:var(--pt-muted);">Motivo: {{ $experiencia->motivo_bloqueo }}</p>
 <div style="background:var(--pt-input-bg); border:1px solid var(--pt-input-border); border-radius:8px; padding:10px 14px; margin:8px 0; white-space:pre-wrap; color:var(--pt-text);">
 {{ $experiencia->contenido }}
 </div>
 <div>
 <form method="POST" action="{{ route('admin.experiencias.aprobar', $experiencia) }}" style="display:inline;">
 @csrf
 <button type="submit" class="btn btn-acento btn-sm">Aprobar y publicar</button>
 </form>
 <form method="POST" action="{{ route('admin.experiencias.destroy', $experiencia) }}" style="display:inline;" onsubmit="return confirm('¿Eliminar definitivamente?');">
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
 </form>
 </div>
 </div>
@empty
 <p style="color:var(--pt-muted);">No hay experiencias pendientes de revisión. </p>
@endforelse

<h5 style="font-weight:700; margin-top:32px;">Últimas publicadas</h5>
@forelse ($publicadas as $experiencia)
 <div class="pt-card p-3 mb-2">
 <strong>{{ $experiencia->titulo }}</strong>
 <span style="font-size:12px; color:var(--pt-muted);">— {{ $experiencia->user->name ?? '' }}</span>
 </div>
@empty
 <p style="color:var(--pt-muted);">Todavía no hay experiencias publicadas.</p>
@endforelse
@endsection
