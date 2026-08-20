<?php $__env->startSection('title', 'Experiencias — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
 <h2 style="font-weight:800; margin:0;">Experiencias de la comunidad</h2>
 <a href="<?php echo e(route('experiencias.create')); ?>" class="btn btn-acento btn-sm">+ Compartir mi experiencia</a>
</div>

<?php if(session('error')): ?>
 <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<?php $__empty_1 = true; $__currentLoopData = $experiencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experiencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div class="pt-card p-4 mb-3">
 <div style="display:flex; justify-content:space-between;">
 <h5 style="font-weight:700; margin-bottom:4px;">
 <a href="<?php echo e(route('experiencias.show', $experiencia)); ?>" style="text-decoration:none; color:inherit;">
 <?php echo e($experiencia->titulo); ?>

 </a>
 </h5>
 <?php if($experiencia->user_id === auth()->id()): ?>
 <div>
 <a href="<?php echo e(route('experiencias.edit', $experiencia)); ?>" style="font-size:12px;">Editar</a>
 </div>
 <?php endif; ?>
 </div>
 <p style="font-size:13px; color:#888; margin-bottom:8px;">Por <?php echo e($experiencia->user->name ?? 'Usuario'); ?> · <?php echo e($experiencia->created_at->diffForHumans()); ?>

 </p>
 <p style="font-size:14px; margin:0;"><?php echo e(\Illuminate\Support\Str::limit($experiencia->contenido, 220)); ?></p>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#777;">Todavía no hay experiencias compartidas. ¡Sé el primero!</p>
<?php endif; ?>

<?php echo e($experiencias->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/experiencias/index.blade.php ENDPATH**/ ?>