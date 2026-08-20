<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar sesión — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontend/carga.css') }}">
</head>
<body>

@include('partials.pantalla-carga')

<a href="{{ route('home') }}" class="auth-back-btn" title="Volver al inicio">
    <i class="fas fa-arrow-left"></i>
</a>

<button id="theme-toggle-btn" class="auth-toggle-btn" type="button" title="Cambiar tema">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
</button>

<div class="auth-card">
    <a href="{{ route('home') }}" class="auth-logo">
        <img src="{{ asset('/IMG/LOGO_NM.png') }}" alt="Miniminds">
    </a>
    <h1 class="auth-title">¡Bienvenido de nuevo!</h1>
    <p class="auth-subtitle">Inicia sesión para continuar en Miniminds</p>

    @if(session('status'))
        <div class="auth-status">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="auth-errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" data-mm-loading>
        @csrf

        <div class="auth-field">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
        </div>

        <div class="auth-field">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
        </div>

        <label class="auth-remember">
            <input type="checkbox" name="remember" id="remember_me">
            Recuérdame
        </label>

        <div class="auth-actions">
            @if(Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
            <button type="submit" class="auth-btn">Iniciar sesión</button>
        </div>
    </form>

    <p class="auth-footer">¿Todavía no tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
</div>

<script src="{{ asset('js/shared/theme-toggle.js') }}"></script>
<script src="{{ asset('js/shared/auth-transitions.js') }}"></script>
<script src="{{ asset('js/frontend/pantalla-carga.js') }}"></script>
</body>
</html>
