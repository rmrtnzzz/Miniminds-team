@extends('layouts.paciente')

@section('title', 'Mi historial — Miniminds')

@section('content')
<h2 style="font-weight:800; margin-bottom:6px;">Mi historial</h2>
<p style="font-size:13px; color:#7c9d92; margin-bottom:24px;">
    Un registro de tu actividad en Miniminds: publicaciones, comentarios y solicitudes, en orden cronológico.
</p>

<div class="pt-card p-4">
    @forelse($eventos as $evento)
        <div class="d-flex gap-3 py-3" style="border-bottom:1px solid rgba(0,0,0,0.06);">
            <div style="flex-shrink:0; width:38px; height:38px; border-radius:50%; background:#EFE9FB; display:flex; align-items:center; justify-content:center;">
                <i class="fas {{ $evento['icono'] }}" style="color:#7C5CBF; font-size:14px;"></i>
            </div>
            <div class="flex-grow-1">
                @if($evento['url'])
                    <a href="{{ $evento['url'] }}" style="font-weight:700; font-size:14px; text-decoration:none; color:inherit;">
                        {{ $evento['titulo'] }}
                    </a>
                @else
                    <div style="font-weight:700; font-size:14px;">{{ $evento['titulo'] }}</div>
                @endif

                @if($evento['detalle'])
                    <div style="font-size:13px; color:#7c9d92; margin-top:2px;">{{ $evento['detalle'] }}</div>
                @endif

                <div style="font-size:11px; color:#a99fc4; margin-top:4px;">
                    {{ $evento['fecha']->format('d/m/Y H:i') }} · {{ $evento['fecha']->diffForHumans() }}
                </div>
            </div>
        </div>
    @empty
        <p style="color:#8b7fa8; font-size:14px; margin:0;">
            Todavía no tienes actividad registrada. En cuanto publiques, comentes o envíes una solicitud, aparecerá aquí.
        </p>
    @endforelse
</div>
@endsection
