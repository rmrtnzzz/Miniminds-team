<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Miniminds — Panel de consulta')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/especialista/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/carga.css') }}" rel="stylesheet">
    @yield('extra_styles')
</head>
<body data-panel-theme-base="light">

    @include('partials.pantalla-carga')

    <div class="pt-topbar">
        <a class="brand" href="{{ route('especialista.inicio') }}">Miniminds! <span class="badge-rol">Especialista</span></a>
        <div class="icons">
            <button id="theme-toggle-btn" class="theme-toggle-btn" type="button" title="Cambiar tema">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
            </button>
            <div style="position:relative">
                <a href="#" onclick="event.preventDefault(); document.getElementById('notif-dropdown').classList.toggle('open')">
                    <i class="fas fa-bell"></i>
                    @if(auth()->check() && auth()->user()->unreadNotifications->count())
                        <span class="notif-dot">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>
                <div class="notif-dropdown" id="notif-dropdown">
                    @if(auth()->check())
                        @forelse(auth()->user()->notifications()->latest()->limit(10)->get() as $n)
                            <a href="{{ route('especialista.notificaciones.leer', $n->id) }}" class="notif-item {{ $n->read_at ? 'leida' : '' }}">
                                <div class="titulo">{{ $n->data['titulo'] ?? 'Notificación' }}</div>
                                <div class="msg">{{ $n->data['mensaje'] ?? '' }}</div>
                            </a>
                        @empty
                            <div class="notif-empty">No tienes notificaciones.</div>
                        @endforelse
                    @endif
                </div>
            </div>
            <a href="{{ route('chat.index') }}" class="pt-home-link" title="Hablar con la IA">
                <i class="fas fa-comment-dots"></i>
            </a>
            <a href="{{ route('home') }}" class="pt-home-link" title="Salir al inicio" data-mm-loading>
                <i class="fas fa-house"></i>
            </a>
            <a href="{{ route('especialista.perfil') }}" class="pt-user-chip">
                @if(auth()->check() && auth()->user()->foto)
                    <img class="avatar" src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Ccircle cx=%2715%27 cy=%2715%27 r=%2715%27 fill=%27%23cccccc%27/%3E%3Ccircle cx=%2715%27 cy=%2712%27 r=%275%27 fill=%27%23ffffff%27/%3E%3Cpath d=%27M4 27c2-7 8-10 11-10s9 3 11 10%27 fill=%27%23ffffff%27/%3E%3C/svg%3E';">
                @else
                    <i class="fas fa-user-circle fa-lg"></i>
                @endif
                <span class="pt-user-chip__name">{{ auth()->user()->name ?? '' }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" data-mm-loading style="margin:0">
                @csrf
                <button type="submit" class="pt-logout-btn" title="Salir"><i class="fas fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>

    <div class="pt-shell">
        <div class="pt-sidebar">
            <a href="{{ route('especialista.inicio') }}" class="{{ request()->routeIs('especialista.inicio') ? 'active' : '' }}">
                <i class="fas fa-house"></i> Inicio
            </a>
            <a href="{{ route('especialista.solicitudes.index') }}" class="{{ request()->routeIs('especialista.solicitudes.*') ? 'active' : '' }}">
                <i class="fas fa-inbox"></i> Solicitudes
                @php 
                    $pendientesCount = \App\Models\SolicitudPaciente::where('estado', 'pendiente')->count(); 
                @endphp
                @if($pendientesCount)
                    <span class="badge-pill">{{ $pendientesCount }}</span>
                @endif
            </a>
            <a href="{{ route('especialista.pacientes.index') }}" class="{{ request()->routeIs('especialista.pacientes.*') ? 'active' : '' }}">
                <i class="fas fa-user-injured"></i> Mis pacientes
            </a>
            <a href="{{ route('especialista.citas.index') }}" class="{{ request()->routeIs('especialista.citas.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Agenda / Citas
            </a>
            <a href="{{ route('experiencias.mias') }}" class="{{ request()->routeIs('experiencias.mias') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> Mis publicaciones
            </a>
            <a href="{{ route('experiencias.create') }}" class="{{ request()->routeIs('experiencias.create') ? 'active' : '' }}">
                <i class="fas fa-pen"></i> Publicar
            </a>
            <div class="pt-sidebar-section" style="margin-top:18px;padding:0 24px 6px;font-size:11px;text-transform:uppercase;letter-spacing:.06em;color:#6ba895">Cuenta</div>
            <a href="{{ route('especialista.perfil') }}" class="{{ request()->routeIs('especialista.perfil') ? 'active' : '' }}">
                <i class="fas fa-id-badge"></i> Mi perfil
            </a>
        </div>

        <div class="pt-main">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/shared/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/frontend/pantalla-carga.js') }}"></script>
    @yield('extra_scripts')
</body>
</html>