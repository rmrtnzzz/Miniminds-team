<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Miniminds'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/paciente/layout.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('extra_styles'); ?>
</head>
<body data-panel-theme-base="light">

    <div class="pt-topbar">
        <a class="brand" href="<?php echo e(route('paciente.inicio')); ?>">Miniminds!</a>
        <span class="greeting">¡Bienvenido/a, <?php echo e(auth()->check() ? auth()->user()->name : 'invitado'); ?>!</span>
        <div class="icons">
            <button id="theme-toggle-btn" class="theme-toggle-btn" type="button" title="Cambiar tema">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
            </button>
            <div style="position:relative">
                <a href="#" onclick="event.preventDefault(); document.getElementById('notif-dropdown').classList.toggle('open')">
                    <i class="fas fa-bell"></i>
                    <?php if(auth()->check() && auth()->user()->unreadNotifications->count()): ?>
                        <span class="notif-dot"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                    <?php endif; ?>
                </a>
                <div class="notif-dropdown" id="notif-dropdown">
                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications()->latest()->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('paciente.avisos.index')); ?>" class="notif-item" style="<?php echo e($n->read_at ? 'opacity:.55' : ''); ?>">
                            <div class="titulo"><?php echo e($n->data['titulo'] ?? 'Notificación'); ?></div>
                            <div class="msg"><?php echo e($n->data['mensaje'] ?? ''); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="notif-empty">No tienes notificaciones.</div>
                    <?php endif; ?>
                </div>
            </div>
            <a href="<?php echo e(route('chat.index')); ?>" class="pt-home-link" title="Hablar con la IA">
                <i class="fas fa-comment-dots"></i>
            </a>
            <a href="<?php echo e(route('home')); ?>" class="pt-home-link" title="Salir al inicio">
                <i class="fas fa-house"></i>
            </a>
            <a href="<?php echo e(route('paciente.perfil')); ?>" class="pt-user-chip">
                <?php if(auth()->check() && auth()->user()->foto): ?>
                    <img class="avatar" src="<?php echo e(asset('storage/' . auth()->user()->foto)); ?>" alt="Foto de perfil" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Ccircle cx=%2715%27 cy=%2715%27 r=%2715%27 fill=%27%23cccccc%27/%3E%3Ccircle cx=%2715%27 cy=%2712%27 r=%275%27 fill=%27%23ffffff%27/%3E%3Cpath d=%27M4 27c2-7 8-10 11-10s9 3 11 10%27 fill=%27%23ffffff%27/%3E%3C/svg%3E';">
                <?php else: ?>
                    <i class="fas fa-user-circle fa-lg"></i>
                <?php endif; ?>
                <span class="pt-user-chip__name"><?php echo e(auth()->user()->name ?? ''); ?></span>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0">
                <?php echo csrf_field(); ?>
                <button type="submit" class="pt-logout-btn" title="Cerrar sesión"><i class="fas fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>

    <div class="pt-shell">
        <div class="pt-sidebar">
            <a href="<?php echo e(route('paciente.inicio')); ?>" class="<?php echo e(request()->routeIs('paciente.inicio') ? 'active' : ''); ?>">
                <i class="fas fa-house"></i> Inicio
            </a>
            <a href="<?php echo e(route('paciente.citas')); ?>" class="<?php echo e(request()->routeIs('paciente.citas') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-check"></i> Citas
            </a>
            <a href="<?php echo e(route('paciente.calendario')); ?>" class="<?php echo e(request()->routeIs('paciente.calendario') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-days"></i> Calendario
            </a>
            <a href="<?php echo e(route('paciente.agenda')); ?>" class="<?php echo e(request()->routeIs('paciente.agenda') ? 'active' : ''); ?>">
                <i class="fas fa-list-check"></i> Agenda
            </a>

            <div class="pt-sidebar-section">Comunidad</div>
            <a href="<?php echo e(route('experiencias.mias')); ?>" class="<?php echo e(request()->routeIs('experiencias.mias') ? 'active' : ''); ?>">
                <i class="fas fa-comments"></i> Mis publicaciones
            </a>
            <a href="<?php echo e(route('experiencias.create')); ?>" class="<?php echo e(request()->routeIs('experiencias.create') ? 'active' : ''); ?>">
                <i class="fas fa-pen"></i> Publicar
            </a>
            <a href="<?php echo e(route('paciente.avisos.index')); ?>" class="<?php echo e(request()->routeIs('paciente.avisos.*') ? 'active' : ''); ?>">
                <i class="fas fa-envelope"></i> Mis avisos
                <?php if(auth()->check() && auth()->user()->unreadNotifications->count()): ?>
                    <span class="badge-pill"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                <?php endif; ?>
            </a>

            <div class="pt-sidebar-section">Recursos</div>
            <a href="<?php echo e(route('juegos.index')); ?>" class="<?php echo e(request()->routeIs('juegos.*') ? 'active' : ''); ?>">
                <i class="fas fa-gamepad"></i> Juegos
            </a>
            <a href="<?php echo e(route('paciente.recursos')); ?>" class="<?php echo e(request()->routeIs('paciente.recursos') ? 'active' : ''); ?>">
                <i class="fas fa-book-open"></i> Recursos
            </a>

            <div class="pt-sidebar-section">Mi cuenta</div>
            <a href="<?php echo e(route('paciente.solicitudes.index')); ?>" class="<?php echo e(request()->routeIs('paciente.solicitudes.*') ? 'active' : ''); ?>">
                <i class="fas fa-file-medical"></i> Mis solicitudes
            </a>
            <a href="<?php echo e(route('paciente.solicitud_especialista.index')); ?>" class="<?php echo e(request()->routeIs('paciente.solicitud_especialista.*') ? 'active' : ''); ?>">
                <i class="fas fa-user-graduate"></i> Ser especialista
            </a>
        </div>

        <div class="pt-main">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('js/shared/theme-toggle.js')); ?>"></script>
    <?php echo $__env->yieldContent('extra_scripts'); ?>
</body>
</html><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/layouts/paciente.blade.php ENDPATH**/ ?>