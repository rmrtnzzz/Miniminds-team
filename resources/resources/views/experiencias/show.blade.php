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

<div class="pt-card p-4 mt-3">
    <h5 style="font-weight:800; margin-bottom:16px;">
        Comentarios ({{ $experiencia->comentarios->count() }})
    </h5>

    @if(session('error'))
        <div class="alert alert-danger py-2" style="font-size:13px;">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('experiencias.comentarios.store', $experiencia) }}" class="mb-4">
        @csrf
        <textarea
            name="contenido"
            rows="2"
            maxlength="600"
            placeholder="Escribe un comentario..."
            class="form-control"
            style="resize:vertical;"
            required
        >{{ old('contenido') }}</textarea>
        <button type="submit" class="btn btn-acento btn-sm mt-2">Comentar</button>
    </form>

    @forelse($experiencia->comentarios as $comentario)
        <div class="d-flex justify-content-between align-items-start py-2" style="border-top:1px solid rgba(0,0,0,0.06);">
            <div>
                <div style="font-weight:700; font-size:13px;">{{ $comentario->user->name ?? 'Usuario' }}</div>
                <div style="font-size:12px; color:#888; margin-bottom:4px;">{{ $comentario->created_at->diffForHumans() }}</div>
                <div style="font-size:14px; white-space:pre-wrap;">{{ $comentario->contenido }}</div>
            </div>
            @if($comentario->user_id === auth()->id() || auth()->user()->isAdmin())
                <form method="POST" action="{{ route('experiencias.comentarios.destroy', [$experiencia, $comentario]) }}" onsubmit="return confirm('¿Eliminar este comentario?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link btn-sm text-danger" style="font-size:12px;">Eliminar</button>
                </form>
            @endif
        </div>
    @empty
        <p style="color:#888; font-size:13px;">Todavía no hay comentarios. ¡Sé el primero en comentar!</p>
    @endforelse
</div>
@endsection
