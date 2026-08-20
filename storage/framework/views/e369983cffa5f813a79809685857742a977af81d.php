<?php $__env->startSection('title', 'Solicitudes de registro — Miniminds'); ?>

<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/especialista/solicitudes.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:20px">Solicitudes de registro de pacientes</h2>

<h6 style="font-weight:700;margin-bottom:10px">Pendientes (<?php echo e($pendientes->count()); ?>)</h6>

<?php $__empty_1 = true; $__currentLoopData = $pendientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div class="solicitud-card d-flex justify-content-between align-items-center">
 <div>
 <div style="font-weight:700"><?php echo e($s->nombre); ?> <?php echo e($s->apellido); ?></div>
 <div style="font-size:12px;color:#6b6280">Solicitado por <?php echo e($s->user?->name ?? '—'); ?> · <?php echo e($s->created_at?->format('d/m/Y') ?? '—'); ?>

 <?php if($s->edad): ?> · <?php echo e($s->edad); ?> años <?php endif; ?>
 <?php if($s->genero): ?> · <?php echo e(ucfirst($s->genero)); ?> <?php endif; ?>
 </div>
 <?php if($s->motivo): ?>
 <div style="font-size:13px;color:#4A4063;margin-top:6px">"<?php echo e($s->motivo); ?>"</div>
 <?php endif; ?>
 </div>
 <div class="d-flex gap-2">
 <button class="btn btn-acento btn-sm" onclick="document.getElementById('modal-aprobar-<?php echo e($s->id); ?>').classList.add('open')">Aprobar</button>
 <button class="btn btn-outline-danger btn-sm" onclick="document.getElementById('modal-rechazar-<?php echo e($s->id); ?>').classList.add('open')">Rechazar</button>
 </div>
 </div>

 <div class="modal-overlay" id="modal-aprobar-<?php echo e($s->id); ?>">
 <div class="modal-box">
 <h5 style="font-weight:800">Aprobar e ingresar paciente</h5>
 <p style="font-size:13px;color:#6b6280">Se creará el registro de <strong><?php echo e($s->nombre); ?> <?php echo e($s->apellido); ?></strong> y quedará asignado a tu cartera de pacientes.
 </p>
 <form action="<?php echo e(route('especialista.solicitudes.aprobar', $s->id)); ?>" method="POST">
 <?php echo csrf_field(); ?>
 <textarea name="nota_revision" rows="2" placeholder="Nota (opcional)"></textarea>
 <div class="d-flex gap-2 justify-content-end mt-2">
 <button type="button" class="btn btn-outline-secondary btn-sm" onclick="document.getElementById('modal-aprobar-<?php echo e($s->id); ?>').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento btn-sm">Confirmar</button>
 </div>
 </form>
 </div>
 </div>

 <div class="modal-overlay" id="modal-rechazar-<?php echo e($s->id); ?>">
 <div class="modal-box">
 <h5 style="font-weight:800">Rechazar solicitud</h5>
 <form action="<?php echo e(route('especialista.solicitudes.rechazar', $s->id)); ?>" method="POST">
 <?php echo csrf_field(); ?>
 <textarea name="nota_revision" rows="2" placeholder="Explica el motivo del rechazo (obligatorio)" required></textarea>
 <div class="d-flex gap-2 justify-content-end mt-2">
 <button type="button" class="btn btn-outline-secondary btn-sm" onclick="document.getElementById('modal-rechazar-<?php echo e($s->id); ?>').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
 </div>
 </form>
 </div>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#4a7d6f;font-size:14px">No hay solicitudes pendientes </p>
<?php endif; ?>

<h6 style="font-weight:700;margin:26px 0 10px">Historial reciente</h6>
<?php $__empty_1 = true; $__currentLoopData = $resueltas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <div class="solicitud-card d-flex justify-content-between align-items-center">
 <div>
 <div style="font-weight:700"><?php echo e($s->nombre); ?> <?php echo e($s->apellido); ?></div>
 <div style="font-size:12px;color:#6b6280">Solicitado por <?php echo e($s->user?->name ?? '—'); ?> · revisado el <?php echo e($s->revisada_at?->format('d/m/Y') ?? '—'); ?>

 </div>
 </div>
 <span class="estado-pill estado-<?php echo e($s->estado); ?>"><?php echo e(ucfirst($s->estado)); ?></span>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <p style="color:#4a7d6f;font-size:14px">Aún no has resuelto ninguna solicitud.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/especialista/solicitudes/index.blade.php ENDPATH**/ ?>