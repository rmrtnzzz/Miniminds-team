<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Crear cuenta — Miniminds</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth/auth.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<button id="theme-toggle-btn" class="auth-toggle-btn" type="button" title="Cambiar tema">
    <i class="fas fa-moon"></i>
    <i class="fas fa-sun"></i>
</button>

<div class="auth-card">
    <a href="<?php echo e(route('home')); ?>" class="auth-logo">
        <img src="<?php echo e(asset('/IMG/LOGO_NM.png')); ?>" alt="Miniminds">
    </a>
    <h1 class="auth-title">Crea tu cuenta</h1>
    <p class="auth-subtitle">Únete a la comunidad Miniminds</p>

    <?php if($errors->any()): ?>
        <div class="auth-errors">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <div class="auth-field">
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus autocomplete="name">
        </div>

        <div class="auth-field">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username">
        </div>

        <div class="auth-field">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>

        <div class="auth-field">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="auth-actions">
            <a class="auth-link" href="<?php echo e(route('login')); ?>">¿Ya tienes cuenta?</a>
            <button type="submit" class="auth-btn">Registrarme</button>
        </div>
    </form>

    <p class="auth-footer">¿Ya eres parte de Miniminds? <a href="<?php echo e(route('login')); ?>">Inicia sesión</a></p>
</div>

<script src="<?php echo e(asset('js/shared/theme-toggle.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/auth/register.blade.php ENDPATH**/ ?>