<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Miniminds — Administración'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/admin/layout.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/frontend/carga.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('extra_styles'); ?>
</head>
<body data-panel-theme-base="dark">

    <?php echo $__env->make('partials.pantalla-carga', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="pt-topbar">
        <a class="brand" href="<?php echo e(route('admin.inicio')); ?>">Miniminds! <span class="badge-rol">Admin</span></a>
        <div class="icons">
            <button id="theme-toggle-btn" class="theme-toggle-btn" type="button" title="Cambiar tema">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
            </button>
            <div style="position:relative; display:inline-block;">
                <a href="#" onclick="event.preventDefault(); document.getElementById('notif-dropdown').classList.toggle('open')">
                    <i class="fas fa-bell"></i>
                    <?php if(auth()->check() && auth()->user()->unreadNotifications->count()): ?>
                        <span class="notif-dot"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
                    <?php endif; ?>
                </a>
                <div class="notif-dropdown" id="notif-dropdown">
                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications()->latest()->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('admin.notificaciones.leer', $n->id)); ?>" class="notif-item" style="<?php echo e($n->read_at ? 'opacity:.55' : ''); ?>">
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
            <a href="<?php echo e(route('home')); ?>" class="pt-home-link" title="Salir al inicio" data-mm-loading>
                <i class="fas fa-house"></i>
            </a>
            <a href="<?php echo e(route('admin.perfil')); ?>" class="pt-user-chip">
                <?php if(auth()->check() && auth()->user()->foto): ?>
                    <img class="avatar" src="<?php echo e(asset('storage/' . auth()->user()->foto)); ?>" alt="Foto de perfil" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Ccircle cx=%2715%27 cy=%2715%27 r=%2715%27 fill=%27%23cccccc%27/%3E%3Ccircle cx=%2715%27 cy=%2712%27 r=%275%27 fill=%27%23ffffff%27/%3E%3Cpath d=%27M4 27c2-7 8-10 11-10s9 3 11 10%27 fill=%27%23ffffff%27/%3E%3C/svg%3E';">
                <?php else: ?>
                    <i class="fas fa-user-circle fa-lg"></i>
                <?php endif; ?>
                <span class="pt-user-chip__name"><?php echo e(auth()->user()->name ?? ''); ?></span>
            </a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" data-mm-loading style="display:inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="pt-logout-btn"><i class="fas fa-right-from-bracket"></i> OLO</button>
            </form>
        </div>
    </div>

    <div class="pt-shell">
        <div class="pt-sidebar">
            <a href="<?php echo e(route('admin.inicio')); ?>" class="<?php echo e(request()->routeIs('admin.inicio') ? 'active' : ''); ?>"><i class="fas fa-gauge"></i> Panel general</a>
            <a href="<?php echo e(route('admin.usuarios')); ?>" class="<?php echo e(request()->routeIs('admin.usuarios') ? 'active' : ''); ?>"><i class="fas fa-users"></i> Usuarios</a>
            <a href="<?php echo e(route('admin.profesionales')); ?>" class="<?php echo e(request()->routeIs('admin.profesionales') ? 'active' : ''); ?>"><i class="fas fa-user-doctor"></i> Especialistas</a>
            <a href="<?php echo e(route('admin.pacientes')); ?>" class="<?php echo e(request()->routeIs('admin.pacientes') ? 'active' : ''); ?>"><i class="fas fa-user-injured"></i> Pacientes</a>
            <a href="<?php echo e(route('admin.citas')); ?>" class="<?php echo e(request()->routeIs('admin.citas') ? 'active' : ''); ?>"><i class="fas fa-calendar-days"></i> Citas</a>
            <a href="<?php echo e(route('admin.solicitudes')); ?>" class="<?php echo e(request()->routeIs('admin.solicitudes') ? 'active' : ''); ?>"><i class="fas fa-inbox"></i> Solicitudes</a>
            <a href="<?php echo e(route('admin.inbox')); ?>" class="<?php echo e(request()->routeIs('admin.inbox') ? 'active' : ''); ?>"><i class="fas fa-envelope-open-text"></i> Inbox</a>
            <a href="<?php echo e(route('admin.experiencias.index')); ?>" class="<?php echo e(request()->routeIs('admin.experiencias.*') ? 'active' : ''); ?>"><i class="fas fa-shield-halved"></i> Moderación</a>
            <a href="<?php echo e(route('experiencias.mias')); ?>" class="<?php echo e(request()->routeIs('experiencias.mias') ? 'active' : ''); ?>"><i class="fas fa-comments"></i> Mis publicaciones</a>
            <a href="<?php echo e(route('experiencias.create')); ?>" class="<?php echo e(request()->routeIs('experiencias.create') ? 'active' : ''); ?>"><i class="fas fa-pen"></i> Publicar</a>
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
    <script src="<?php echo e(asset('js/frontend/pantalla-carga.js')); ?>"></script>
    <?php echo $__env->yieldContent('extra_scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/layouts/admin.blade.php ENDPATH**/ ?>