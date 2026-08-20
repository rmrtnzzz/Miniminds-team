@extends($layout)
@section('title', 'Mis publicaciones — Miniminds')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
 <h2 style="font-weight:800; margin:0;">Mis publicaciones</h2>
 <a href="{{ route('experiencias.create') }}" class="btn btn-acento btn-sm">+ Publicar</a>
</div>

@if(session('success'))
 <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
 <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@forelse ($experiencias as $experiencia)
 <div class="pt-card p-4 mb-3">
 <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
 <div>
 <h5 style="font-weight:700; margin-bottom:4px;">
 <a href="{{ route('experiencias.show', $experiencia) }}" style="text-decoration:none; color:inherit;">
 {{ $experiencia->titulo }}
 </a>
 </h5>
 <p style="font-size:13px; color:#888; margin-bottom:8px;">
 {{ $experiencia->created_at->diffForHumans() }}
 @if($experiencia->estado === 'bloqueada')
 · <span style="color:#dc3545; font-weight:700;">Bloqueada</span>
 @else
 · <span style="color:#2ba36b; font-weight:700;">Publicada</span>
 @endif
 </p>
 </div>
 <div style="display:flex; gap:8px; flex-shrink:0;">
 <a href="{{ route('experiencias.edit', $experiencia) }}" class="btn btn-outline-secondary btn-sm">Editar</a>
 <form method="POST" action="{{ route('experiencias.destroy', $experiencia) }}" onsubmit="return confirm('¿Eliminar esta publicación?');">
 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
 </form>
 </div>
 </div>
 @if($experiencia->estado === 'bloqueada')
 <p style="font-size:12px; color:#dc3545; margin:6px 0 0;">Motivo: {{ $experiencia->motivo_bloqueo }}</p>
 @endif
 <p style="font-size:14px; margin:10px 0 0;">{{ \Illuminate\Support\Str::limit($experiencia->contenido, 220) }}</p>
 </div>
@empty
 <p style="color:#777;">Todavía no has publicado nada. ¡Comparte tu primera experiencia!</p>
@endforelse

{{ $experiencias->links() }}
@endsection
