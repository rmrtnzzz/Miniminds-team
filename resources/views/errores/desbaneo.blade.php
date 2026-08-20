<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Cuenta suspendida — Miniminds</title>
<link href="{{ asset('css/shared/error-desbaneo.css') }}" rel="stylesheet">
</head>
<body>
<div class="box">
 <div class="ico"><i class="fas fa-ban"></i></div>
 <h1>Cuenta suspendida</h1>
 <p>Tu cuenta ha sido suspendida por infracción a las normas de la comunidad Miniminds.</p>

 @php $motivo = $motivo ?? session('motivo'); $hasta = $hasta ?? session('hasta'); @endphp
 @if(isset($motivo) && $motivo)
 <div class="motivo"><b>Motivo:</b> {{ $motivo }}</div>
 @endif

 @if(isset($hasta) && $hasta)
 <p class="limite">⏰ Suspensión hasta: <b>{{ \Carbon\Carbon::parse($hasta)->format('d/m/Y H:i') }}</b></p>
 @else
 <p class="limite" style="color:#f87171">Esta suspensión es <b>permanente</b>.</p>
 @endif

 @if(session('success'))
 <div class="alert-ok"> {{ session('success') }}</div>
 @endif
 @if(session('error'))
 <div class="alert-err"> {{ session('error') }}</div>
 @endif

 @if($yaEnvioHoy ?? false)
 <div class="alert-err">Ya enviaste una solicitud hoy. Puedes intentarlo nuevamente mañana.</div>
 @else
 <p style="margin-bottom:14px;font-size:14px;opacity:.8">Puedes enviar <b>1 solicitud de desbaneo por día</b>. Explica al equipo por qué mereces una segunda oportunidad.</p>
 <form method="POST" action="{{ route('desbaneo.store') }}">
 @csrf
 <textarea name="justificacion" placeholder="Explica qué sucedió y por qué mereces que se levante la suspensión (mínimo 30 caracteres)..." required minlength="30"></textarea>
 @error('justificacion')<div class="alert-err" style="margin-bottom:10px">{{ $message }}</div>@enderror
 <button type="submit" class="btn">Enviar solicitud de desbaneo</button>
 </form>
 @endif

 <p style="margin-top:20px;font-size:12px;opacity:.45">Miniminds · Seguridad de la comunidad</p>
</div>
</body>
</html>
