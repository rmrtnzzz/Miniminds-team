@extends($layout)
@section('title', $experiencia->titulo . ' — Miniminds')

@section('content')
@if($experiencia->user_id === auth()->id())
    <a href="{{ route('experiencias.mias') }}" style="font-size:13px;">&larr; Volver a mis publicaciones</a>
@else
    <a href="{{ route('home') }}#comunidad" style="font-size:13px;">&larr; Volver al inicio</a>
@endif

<div class="pt-card p-4 mt-3">
    @if($experiencia->estado === 'bloqueada')
        <div class="alert alert-warning">
            Esta experiencia está bloqueada por el filtro de moderación ({{ $experiencia->motivo_bloqueo }})
            y solo la puede ver el autor y el equipo de administración.
        </div>
    @endif

    <h2 style="font-weight:800;">{{ $experiencia->titulo }}</h2>
    <p style="font-size:13px; color:#888;">
        Por {{ $experiencia->user->name ?? 'Usuario' }} · {{ $experiencia->created_at->format('d/m/Y H:i') }}
    </p>
    <p style="white-space:pre-wrap;">{{ $experiencia->contenido }}</p>

    @if($experiencia->user_id === auth()->id())
        <div class="mt-3">
            <a href="{{ route('experiencias.edit', $experiencia) }}" class="btn btn-acento btn-sm">Editar</a>
            <form method="POST" action="{{ route('experiencias.destroy', $experiencia) }}" style="display:inline;" onsubmit="return confirm('¿Eliminar esta experiencia?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
            </form>
        </div>
    @endif
</div>
@endsection
