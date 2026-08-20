<!DOCTYPE html>
<html lang="es">
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
 <meta charset="UTF-8">
 <title>Acceso restringido - Miniminds</title>
 <link href="{{ asset('css/shared/error-restringido.css') }}" rel="stylesheet">
</head>
<body>
 <div class="card">
 <div class="icon"><i class="fas fa-lock"></i></div>
 <span class="badge">Acceso restringido</span>

 @if ($tipo === 'permanente')
 <h1>Cuenta baneada permanentemente</h1>
 <p>Tu acceso a Miniminds fue bloqueado de forma permanente por incumplir las normas de la comunidad, incluyendo el acceso desde esta red.</p>
 @else
 <h1>Cuenta suspendida temporalmente</h1>
 <p>Tu cuenta está suspendida
 @isset($hasta)
 hasta el <strong>{{ \Illuminate\Support\Carbon::parse($hasta)->format('d/m/Y H:i') }}</strong>.
 @endisset
 @isset($motivo)
 <br>Motivo: {{ $motivo }}
 @endisset
 </p>
 @endif
 </div>
</body>
</html>
