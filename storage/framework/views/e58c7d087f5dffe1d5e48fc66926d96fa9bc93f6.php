<?php $__env->startSection('title', 'Mis Citas — Miniminds'); ?>

<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/paciente/citas.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
 <h2 style="font-weight:800;margin:0">Mis citas</h2>
</div>

<div style="background:#EDE8F8;color:#4A4063;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-size:13px">
 ℹ Las citas las agenda tu especialista asignado. Aquí puedes ver el estado de cada una.
</div>

<?php if(session('success')): ?>
 <div style="background:#DDF3E4;color:#1F9254;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:600">
 <?php echo e(session('success')); ?>

 </div>
<?php endif; ?>

<div class="pt-card p-3">
 <table class="citas-table">
 <thead>
 <tr>
 <th>Paciente</th>
 <th>Profesional</th>
 <th>Fecha</th>
 <th>Hora</th>
 <th>Estado</th>
 <th>Notas</th>
 </tr>
 </thead>
 <tbody>
 <?php $__empty_1 = true; $__currentLoopData = $citas ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <tr>
 <td><?php echo e($cita->paciente->nombre ?? '—'); ?> <?php echo e($cita->paciente->apellido ?? ''); ?></td>
 <td><?php echo e($cita->profesional->nombre ?? 'Sin asignar'); ?> <?php echo e($cita->profesional->apellido ?? ''); ?></td>
 <td><?php echo e(\Carbon\Carbon::parse($cita->fecha)->format('d/m/Y')); ?></td>
 <td><?php echo e(\Carbon\Carbon::parse($cita->hora)->format('H:i')); ?></td>
 <td><span class="estado-pill estado-<?php echo e($cita->estado); ?>"><?php echo e(ucfirst($cita->estado)); ?></span></td>
 <td style="color:#9a8fb8"><?php echo e($cita->notas ?? '—'); ?></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <tr>
 <td colspan="6" style="text-align:center;color:#9a8fb8;padding:32px">Todavía no tienes citas agendadas. Tu especialista te asignará una próximamente.
 </td>
 </tr>
 <?php endif; ?>
 </tbody>
 </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/paciente/citas.blade.php ENDPATH**/ ?>