<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Recuperar contraseña — Miniminds</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth/auth.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<a href="<?php echo e(route('home')); ?>" class="auth-back-btn" title="Volver al inicio">
    <i class="fas fa-arrow-left"></i>
</a>

<button id="theme-toggle-btn" class="auth-toggle-btn" type="button" title="Cambiar tema">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
</button>

<div class="auth-card">
    <a href="<?php echo e(route('home')); ?>" class="auth-logo">
        <img src="<?php echo e(asset('/IMG/LOGO_NM.png')); ?>" alt="Miniminds">
    </a>
    <h1 class="auth-title">¿Olvidaste tu contraseña?</h1>
    <p class="auth-subtitle">Escribe tu correo y te enviaremos un enlace para restablecerla</p>

    <?php if(session('status')): ?>
        <div class="auth-status"><?php echo e(session('status')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="auth-errors">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>

        <div class="auth-field">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
        </div>

        <div class="auth-actions">
            <a class="auth-link" href="<?php echo e(route('login')); ?>">¿Ya la recordaste?</a>
            <button type="submit" class="auth-btn">Enviar enlace</button>
        </div>
    </form>

    <a href="<?php echo e(route('home')); ?>" class="auth-back-link">
        <i class="fas fa-arrow-left"></i> Volver al sitio
    </a>
</div>

<script src="<?php echo e(asset('js/shared/theme-toggle.js')); ?>"></script>
<script src="<?php echo e(asset('js/shared/auth-transitions.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>