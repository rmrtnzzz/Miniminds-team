<?php $__env->startSection('title', 'Panel de consulta — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800; margin-bottom:24px;">
 ¡Bienvenido/a, <?php echo e(auth()->user()->name); ?>!
</h2>

<?php if(!$profesional): ?>
 <div class="alert alert-warning">Tu cuenta es de tipo especialista pero todavía no tiene una ficha profesional asociada.
 Contacta a un administrador para completarla.
 </div>
<?php endif; ?>

<div class="row g-3 mb-4">
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #A8D8C4;">
 <div style="font-size:32px; font-weight:800;"><?php echo e($totalPacientes); ?></div>
 <div style="font-size:13px; color:#4a7d6f;">Pacientes a mi cargo</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #F5A623;">
 <div style="font-size:32px; font-weight:800;"><?php echo e($solicitudesPendientes); ?></div>
 <div style="font-size:13px; color:#4a7d6f;">Solicitudes pendientes</div>
 </div>
 </div>
 <div class="col-md-4">
 <div class="pt-card text-center py-4" style="border: 2px solid #7C9ED9;">
 <div style="font-size:32px; font-weight:800;"><?php echo e($citasHoy->count()); ?></div>
 <div style="font-size:13px; color:#4a7d6f;">Citas de hoy</div>
 </div>
 </div>
</div>

<div class="row g-3">
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Citas de hoy</h6>
 <?php $__empty_1 = true; $__currentLoopData = $citasHoy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div style="padding:8px 0;border-bottom:1px solid rgba(0,0,0,.06);font-size:14px">
 <?php echo e(\Carbon\Carbon::parse($c->hora)->format('H:i')); ?> —
 <?php echo e($c->paciente->nombre ?? ''); ?> <?php echo e($c->paciente->apellido ?? ''); ?>

 <span style="color:#9a8fb8;font-size:12px">(<?php echo e(ucfirst($c->estado)); ?>)</span>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#7c9d92;font-size:13px">No tienes citas agendadas para hoy.</p>
 <?php endif; ?>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;"> Próximas citas</h6>
 <?php $__empty_1 = true; $__currentLoopData = $proximasCitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div style="padding:8px 0;border-bottom:1px solid rgba(0,0,0,.06);font-size:14px">
 <?php echo e(\Carbon\Carbon::parse($c->fecha)->format('d/m')); ?> <?php echo e(\Carbon\Carbon::parse($c->hora)->format('H:i')); ?> —
 <?php echo e($c->paciente->nombre ?? ''); ?> <?php echo e($c->paciente->apellido ?? ''); ?>

 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#7c9d92;font-size:13px">No hay próximas citas registradas.</p>
 <?php endif; ?>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;">Solicitudes de registro</h6>
 <p style="font-size:13px; color:#4a7d6f;">Revisa las solicitudes de tutores para ingresar nuevos pacientes.</p>
 <a href="<?php echo e(route('especialista.solicitudes.index')); ?>" class="btn btn-acento btn-sm">Ver solicitudes</a>
 </div>
 </div>
 <div class="col-md-6">
 <div class="pt-card p-4 h-100">
 <h6 style="font-weight:700;"> Gestionar agenda</h6>
 <p style="font-size:13px; color:#4a7d6f;">Agenda, edita o cancela citas de tus pacientes.</p>
 <a href="<?php echo e(route('especialista.citas.index')); ?>" class="btn btn-acento btn-sm">Ir a agenda</a>
 </div>
 </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/especialista/inicio.blade.php ENDPATH**/ ?>