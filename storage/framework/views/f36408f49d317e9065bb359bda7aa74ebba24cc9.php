<?php $__env->startSection('title', 'Recursos — Miniminds'); ?>

<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/paciente/recursos.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800; margin-bottom:8px;">¡Bienvenido/a, <?php echo e(auth()->user()->name ?? 'nombre'); ?>!</h2>

<div class="row g-3 mb-4 mt-3">
 <div class="col-md-4">
 <a href="<?php echo e(route('paciente.citas')); ?>" class="text-decoration-none">
 <div class="pt-card text-center py-4" style="border: 2px solid #F5C4D6;">
 <div style="font-size:14px; font-weight:700; color:#4A4063;">Mis citas</div>
 </div>
 </a>
 </div>
 <div class="col-md-4">
 <a href="#" class="text-decoration-none">
 <div class="pt-card text-center py-4" style="border: 2px solid #C4B5E8;">
 <div style="font-size:14px; font-weight:700; color:#4A4063;">Contenidos</div>
 </div>
 </a>
 </div>
 <div class="col-md-4">
 <a href="#" class="text-decoration-none">
 <div class="pt-card text-center py-4" style="border: 2px solid #A8D8C4;">
 <div style="font-size:14px; font-weight:700; color:#4A4063;">Profesionales</div>
 </div>
 </a>
 </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-2">
 <h6 style="font-weight:700; margin:0;">Actividad reciente</h6>
 <a href="<?php echo e(route('juegos.index')); ?>" style="font-size:13px; color:#F5A623; text-decoration:none;">Ver todo</a>
</div>

<div class="pt-card p-3">
 <table class="recursos-table">
 <thead>
 <tr>
 <th>Paciente</th>
 <th>Profesional</th>
 <th>Fecha</th>
 <th>Estado</th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 <?php $__empty_1 = true; $__currentLoopData = $actividad ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <tr>
 <td><?php echo e($item->paciente->nombre ?? '—'); ?> <?php echo e($item->paciente->apellido ?? ''); ?></td>
 <td><?php echo e($item->profesional->nombre ?? 'Sin asignar'); ?> <?php echo e($item->profesional->apellido ?? ''); ?></td>
 <td><?php echo e($item->fecha->format('d/m/Y')); ?></td>
 <td><span class="estado-pill estado-<?php echo e($item->estado === 'completada' ? 'completado' : ($item->estado === 'cancelada' ? 'cancelado' : 'pendiente')); ?>"><?php echo e(ucfirst($item->estado)); ?></span></td>
 <td><i class="fas fa-ellipsis-vertical" style="color:#9a8fb8;"></i></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <tr>
 <td colspan="5" style="text-align:center; color:#9a8fb8; padding:32px;">Todavía no hay actividad registrada.
 </td>
 </tr>
 <?php endif; ?>
 </tbody>
 </table>
</div>

<div class="mt-4">
 <h6 style="font-weight:700; margin-bottom:12px;">Juegos terapéuticos</h6>
 <div class="row g-3">
 <div class="col-md-4">
 <a href="<?php echo e(route('juegos.el_gran_orden')); ?>" class="text-decoration-none">
 <div class="pt-card p-3 text-center">
 <div style="font-size:32px;"><i class="fas fa-rocket" style="color:#F5A623;"></i></div>
 <div style="font-size:13px; font-weight:600; color:#4A4063; margin-top:6px;">Misión Control</div>
 </div>
 </a>
 </div>
 <div class="col-md-4">
 <a href="<?php echo e(route('juegos.ritmo_zen')); ?>" class="text-decoration-none">
 <div class="pt-card p-3 text-center">
 <div style="font-size:32px;"><i class="fas fa-magnifying-glass" style="color:#F5A623;"></i></div>
 <div style="font-size:13px; font-weight:600; color:#4A4063; margin-top:6px;">Detector de Contexto</div>
 </div>
 </a>
 </div>
 <div class="col-md-4">
 <a href="<?php echo e(route('juegos.volcan_interior')); ?>" class="text-decoration-none">
 <div class="pt-card p-3 text-center">
 <div style="font-size:32px;"><i class="fas fa-temperature-half" style="color:#F5A623;"></i></div>
 <div style="font-size:13px; font-weight:600; color:#4A4063; margin-top:6px;">Termómetro Interior</div>
 </div>
 </a>
 </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/paciente/recursos.blade.php ENDPATH**/ ?>