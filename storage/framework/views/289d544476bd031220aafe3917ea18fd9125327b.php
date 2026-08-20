<?php $__env->startSection('title', 'Mis avisos — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/paciente/avisos.css')); ?>" rel="stylesheet">

<h2 style="font-weight:800; margin-bottom:20px;">Mis avisos</h2>

<?php $__empty_1 = true; $__currentLoopData = $avisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aviso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div class="carta <?php echo e($aviso->read_at ? '' : 'no-leida'); ?>">
 <span class="icono">
 <?php if(($aviso->data['estado'] ?? '') === 'aviso'): ?> <i class="fas fa-triangle-exclamation"></i>
 <?php elseif(($aviso->data['estado'] ?? '') === 'temporal'): ?> <i class="fas fa-hourglass-half"></i>
 <?php elseif(($aviso->data['estado'] ?? '') === 'permanente'): ?> <i class="fas fa-ban"></i>
 <?php else: ?> <i class="fas fa-envelope"></i>
 <?php endif; ?>
 </span>
 <h5><?php echo e($aviso->data['titulo'] ?? 'Notificación'); ?></h5>
 <p><?php echo e($aviso->data['mensaje'] ?? ''); ?></p>
 <span class="fecha"><?php echo e($aviso->created_at->format('d/m/Y H:i')); ?></span>

 <?php if(!$aviso->read_at): ?>
 <form method="POST" action="<?php echo e(route('paciente.avisos.leer', $aviso->id)); ?>">
 <?php echo csrf_field(); ?>
 <button type="submit">Marcar como leída</button>
 </form>
 <?php endif; ?>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#777;">No tienes avisos por ahora </p>
<?php endif; ?>

<?php echo e($avisos->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/paciente/avisos/index.blade.php ENDPATH**/ ?>