@extends($layout)
@section('title', 'Experiencias — Miniminds')

@section('content')
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
 <h2 style="font-weight:800; margin:0;">Experiencias de la comunidad</h2>
 <a href="{{ route('experiencias.create') }}" class="btn btn-acento btn-sm">+ Compartir mi experiencia</a>
</div>

@if(session('error'))
 <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@forelse ($experiencias as $experiencia)
 <div class="pt-card p-4 mb-3">
 <div style="display:flex; justify-content:space-between;">
 <h5 style="font-weight:700; margin-bottom:4px;">
 <a href="{{ route('experiencias.show', $experiencia) }}" style="text-decoration:none; color:inherit;">
 {{ $experiencia->titulo }}
 </a>
 </h5>
 @if($experiencia->user_id === auth()->id())
 <div>
 <a href="{{ route('experiencias.edit', $experiencia) }}" style="font-size:12px;">Editar</a>
 </div>
 @endif
 </div>
 <p style="font-size:13px; color:#888; margin-bottom:8px;">Por {{ $experiencia->user->name ?? 'Usuario' }} · {{ $experiencia->created_at->diffForHumans() }}
 </p>
 <p style="font-size:14px; margin:0;">{{ \Illuminate\Support\Str::limit($experiencia->contenido, 220) }}</p>
 <p style="font-size:12px; color:#7c6fa8; margin:8px 0 0;">
 <i class="fas fa-comment"></i> {{ $experiencia->comentarios_count }} {{ \Illuminate\Support\Str::plural('comentario', $experiencia->comentarios_count) }}
 </p>
 </div>
@empty
 <p style="color:#777;">Todavía no hay experiencias compartidas. ¡Sé el primero!</p>
@endforelse

{{ $experiencias->links() }}
@endsection
