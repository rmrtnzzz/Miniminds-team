<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Mi Cerebro 3D — Miniminds</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link href="{{ asset('css/cerebro/page.css') }}" rel="stylesheet">
</head>
<body>

<div class="cb-topbar">
    <a href="{{ route('home') }}">&larr; Volver al inicio</a>
</div>

<div class="cb-page-wrap">
    @include('partials.cerebro-brain', ['height' => 'calc(100vh - 52px)'])
</div>

</body>
</html>
