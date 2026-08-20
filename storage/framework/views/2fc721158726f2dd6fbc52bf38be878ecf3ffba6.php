<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title>Mi Cerebro 3D — Miniminds</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link href="<?php echo e(asset('css/cerebro/page.css')); ?>" rel="stylesheet">
</head>
<body>

<div class="cb-topbar">
    <a href="<?php echo e(route('home')); ?>">&larr; Volver al inicio</a>
</div>

<div class="cb-page-wrap">
    <?php echo $__env->make('partials.cerebro-brain', ['height' => 'calc(100vh - 52px)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

</body>
</html>
<?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/cerebro.blade.php ENDPATH**/ ?>