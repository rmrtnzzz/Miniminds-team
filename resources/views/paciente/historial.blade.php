@extends('layouts.paciente')

@section('title', 'Tu historial — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">Tu historial de actividad</h2>

<div class="pt-card p-4">
    @forelse($eventos as $evento)
        <div style="display:flex; gap:16px; align-items:flex-start; padding:14px 0; border-bottom:1px solid #eee;">
            <div style="width:38px; height:38px; flex-shrink:0; border-radius:50%; background:#EFE7FB; color:#7C4DBE; display:flex; align-items:center; justify-content:center;">
                <i class="fas {{ $evento['icono'] }}"></i>
            </div>
            <div style="flex:1;">
                @if($evento['url'])
                    <a href="{{ $evento['url'] }}" style="font-weight:700; color:#3d3350; text-decoration:none;">{{ $evento['titulo'] }}</a>
                @else
                    <div style="font-weight:700; color:#3d3350;">{{ $evento['titulo'] }}</div>
                @endif
                <div style="color:#7a7189; font-size:14px; margin-top:2px;">{{ $evento['detalle'] }}</div>
                <div style="color:#9a8fb8; font-size:12px; margin-top:4px;">{{ $evento['fecha']->format('d/m/Y H:i') }}</div>
            </div>
        </div>
    @empty
        <div style="text-align:center; color:#9a8fb8; padding:40px;">
            Todavía no tienes actividad registrada.
        </div>
    @endforelse
</div>
@endsection
