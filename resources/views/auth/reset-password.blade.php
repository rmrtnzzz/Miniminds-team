<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restablecer contraseña — Miniminds</title>
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

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
    <h1 class="auth-title">Restablecer contraseña</h1>
    <p class="auth-subtitle">Elige una nueva contraseña para tu cuenta</p>

    @if($errors->any())
        <div class="auth-errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <div class="auth-field">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email', request()->email) }}" required autofocus autocomplete="username">
        </div>

        <div class="auth-field">
            <label for="password">Nueva contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>

        <div class="auth-field">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="auth-actions">
            <span></span>
            <button type="submit" class="auth-btn">Guardar contraseña</button>
        </div>
    </form>

    <a href="{{ route('home') }}" class="auth-back-link">
        <i class="fas fa-arrow-left"></i> Volver al sitio
    </a>
</div>

<script src="{{ asset('js/shared/theme-toggle.js') }}"></script>
<script src="{{ asset('js/shared/auth-transitions.js') }}"></script>
</body>
</html>
