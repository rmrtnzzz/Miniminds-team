@extends('layouts.paciente')
@section('title', 'Mis avisos — Miniminds')

@section('content')
<link href="{{ asset('css/paciente/avisos.css') }}" rel="stylesheet">

<h2 style="font-weight:800; margin-bottom:20px;">Mis avisos</h2>

@forelse ($avisos as $aviso)
 <div class="carta {{ $aviso->read_at ? '' : 'no-leida' }}">
 <span class="icono">
 @if(($aviso->data['estado'] ?? '') === 'aviso') <i class="fas fa-triangle-exclamation"></i>
 @elseif(($aviso->data['estado'] ?? '') === 'temporal') <i class="fas fa-hourglass-half"></i>
 @elseif(($aviso->data['estado'] ?? '') === 'permanente') <i class="fas fa-ban"></i>
 @else <i class="fas fa-envelope"></i>
 @endif
 </span>
 <h5>{{ $aviso->data['titulo'] ?? 'Notificación' }}</h5>
 <p>{{ $aviso->data['mensaje'] ?? '' }}</p>
 <span class="fecha">{{ $aviso->created_at->format('d/m/Y H:i') }}</span>

 @if(!$aviso->read_at)
 <form method="POST" action="{{ route('paciente.avisos.leer', $aviso->id) }}">
 @csrf
 <button type="submit">Marcar como leída</button>
 </form>
 @endif
 </div>
@empty
 <p style="color:#777;">No tienes avisos por ahora </p>
@endforelse

{{ $avisos->links() }}
@endsection
