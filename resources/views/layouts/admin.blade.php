<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Miniminds — Administración')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/carga.css') }}" rel="stylesheet">
    @yield('extra_styles')
</head>
<body data-panel-theme-base="dark">

    @include('partials.pantalla-carga')

    <div class="pt-topbar">
        <a class="brand" href="{{ route('admin.inicio') }}">Miniminds! <span class="badge-rol">Admin</span></a>
        <div class="icons">
            <button id="theme-toggle-btn" class="theme-toggle-btn" type="button" title="Cambiar tema">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
            </button>
            <div style="position:relative; display:inline-block;">
                <a href="#" onclick="event.preventDefault(); document.getElementById('notif-dropdown').classList.toggle('open')">
                    <i class="fas fa-bell"></i>
                    @if(auth()->check() && auth()->user()->unreadNotifications->count())
                        <span class="notif-dot">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>
                <div class="notif-dropdown" id="notif-dropdown">
                    @forelse(auth()->user()->notifications()->latest()->limit(10)->get() as $n)
                        <a href="{{ route('admin.notificaciones.leer', $n->id) }}" class="notif-item" style="{{ $n->read_at ? 'opacity:.55' : '' }}">
                            <div class="titulo">{{ $n->data['titulo'] ?? 'Notificación' }}</div>
                            <div class="msg">{{ $n->data['mensaje'] ?? '' }}</div>
                        </a>
                    @empty
                        <div class="notif-empty">No tienes notificaciones.</div>
                    @endforelse
                </div>
            </div>
            <a href="{{ route('chat.index') }}" class="pt-home-link" title="Hablar con la IA">
                <i class="fas fa-comment-dots"></i>
            </a>
            <a href="{{ route('home') }}" class="pt-home-link" title="Salir al inicio" data-mm-loading>
                <i class="fas fa-house"></i>
            </a>
            <a href="{{ route('admin.perfil') }}" class="pt-user-chip">
                @if(auth()->check() && auth()->user()->foto)
                    <img class="avatar" src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Ccircle cx=%2715%27 cy=%2715%27 r=%2715%27 fill=%27%23cccccc%27/%3E%3Ccircle cx=%2715%27 cy=%2712%27 r=%275%27 fill=%27%23ffffff%27/%3E%3Cpath d=%27M4 27c2-7 8-10 11-10s9 3 11 10%27 fill=%27%23ffffff%27/%3E%3C/svg%3E';">
                @else
                    <i class="fas fa-user-circle fa-lg"></i>
                @endif
                <span class="pt-user-chip__name">{{ auth()->user()->name ?? '' }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" data-mm-loading style="display:inline">
                @csrf
                <button type="submit" class="pt-logout-btn"><i class="fas fa-right-from-bracket"></i> Salir</button>
            </form>
        </div>
    </div>

    <div class="pt-shell">
        <div class="pt-sidebar">
            <a href="{{ route('admin.inicio') }}" class="{{ request()->routeIs('admin.inicio') ? 'active' : '' }}"><i class="fas fa-gauge"></i> Panel general</a>
            <a href="{{ route('admin.usuarios') }}" class="{{ request()->routeIs('admin.usuarios') ? 'active' : '' }}"><i class="fas fa-users"></i> Usuarios</a>
            <a href="{{ route('admin.profesionales') }}" class="{{ request()->routeIs('admin.profesionales') ? 'active' : '' }}"><i class="fas fa-user-doctor"></i> Especialistas</a>
            <a href="{{ route('admin.pacientes') }}" class="{{ request()->routeIs('admin.pacientes') ? 'active' : '' }}"><i class="fas fa-user-injured"></i> Pacientes</a>
            <a href="{{ route('admin.citas') }}" class="{{ request()->routeIs('admin.citas') ? 'active' : '' }}"><i class="fas fa-calendar-days"></i> Citas</a>
            <a href="{{ route('admin.solicitudes') }}" class="{{ request()->routeIs('admin.solicitudes') ? 'active' : '' }}"><i class="fas fa-inbox"></i> Solicitudes</a>
            <a href="{{ route('admin.inbox') }}" class="{{ request()->routeIs('admin.inbox') ? 'active' : '' }}"><i class="fas fa-envelope-open-text"></i> Inbox</a>
            <a href="{{ route('admin.experiencias.index') }}" class="{{ request()->routeIs('admin.experiencias.*') ? 'active' : '' }}"><i class="fas fa-shield-halved"></i> Moderación</a>
            <a href="{{ route('experiencias.mias') }}" class="{{ request()->routeIs('experiencias.mias') ? 'active' : '' }}"><i class="fas fa-comments"></i> Mis publicaciones</a>
            <a href="{{ route('experiencias.create') }}" class="{{ request()->routeIs('experiencias.create') ? 'active' : '' }}"><i class="fas fa-pen"></i> Publicar</a>
        </div>

        <div class="pt-main">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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
