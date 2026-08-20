<?php $__env->startSection('title', 'Agenda de citas — Miniminds'); ?>

<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/especialista/citas.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
 <h2 style="font-weight:800;margin:0">Agenda de citas</h2>
 <button class="btn btn-acento" onclick="document.getElementById('modal-crear').classList.add('open')">+ Agendar cita</button>
</div>

<div class="pt-card p-3">
 <table class="citas-table">
 <thead>
 <tr>
 <th>Paciente</th><th>Fecha</th><th>Hora</th><th>Estado</th><th>Notas</th><th></th>
 </tr>
 </thead>
 <tbody>
 <?php $__empty_1 = true; $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
 <tr>
 <td><?php echo e($cita->paciente->nombre ?? '—'); ?> <?php echo e($cita->paciente->apellido ?? ''); ?></td>
 <td><?php echo e(\Carbon\Carbon::parse($cita->fecha)->format('d/m/Y')); ?></td>
 <td><?php echo e(\Carbon\Carbon::parse($cita->hora)->format('H:i')); ?></td>
 <td><span class="estado-pill estado-<?php echo e($cita->estado); ?>"><?php echo e(ucfirst($cita->estado)); ?></span></td>
 <td style="color:#7c9d92"><?php echo e($cita->notas ?? '—'); ?></td>
 <td class="text-end">
 <button class="btn btn-sm btn-outline-secondary" onclick="document.getElementById('modal-editar-<?php echo e($cita->id); ?>').classList.add('open')">Editar</button>
 <form action="<?php echo e(route('especialista.citas.destroy', $cita->id)); ?>" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar esta cita?')">
 <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
 <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
 </form>
 </td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
 <tr>
 <td colspan="6" style="text-align:center;color:#7c9d92;padding:32px">Todavía no has agendado ninguna cita.
 </td>
 </tr>
 <?php endif; ?>
 </tbody>
 </table>
</div>

<!-- Modal crear cita -->
<div class="modal-overlay" id="modal-crear">
 <div class="modal-box">
 <h4> Agendar nueva cita</h4>
 <form action="<?php echo e(route('especialista.citas.store')); ?>" method="POST">
 <?php echo csrf_field(); ?>
 <label>Paciente</label>
 <select name="paciente_id" required>
 <option value="">Selecciona un paciente</option>
 <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($p->id); ?>"><?php echo e($p->nombre); ?> <?php echo e($p->apellido); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 <label>Fecha</label>
 <input type="date" name="fecha" min="<?php echo e(date('Y-m-d')); ?>" required>
 <label>Hora</label>
 <input type="time" name="hora" required>
 <label>Estado</label>
 <select name="estado">
 <option value="pendiente">Pendiente</option>
 <option value="confirmada">Confirmada</option>
 </select>
 <label>Notas (opcional)</label>
 <textarea name="notas" rows="2" placeholder="Motivo o comentario..."></textarea>
 <div class="modal-btns">
 <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('modal-crear').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento">Confirmar cita</button>
 </div>
 </form>
 </div>
</div>

<?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal-overlay" id="modal-editar-<?php echo e($cita->id); ?>">
 <div class="modal-box">
 <h4> Editar cita — <?php echo e($cita->paciente->nombre ?? ''); ?></h4>
 <form action="<?php echo e(route('especialista.citas.update', $cita->id)); ?>" method="POST">
 <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
 <label>Fecha</label>
 <input type="date" name="fecha" value="<?php echo e(\Carbon\Carbon::parse($cita->fecha)->format('Y-m-d')); ?>" required>
 <label>Hora</label>
 <input type="time" name="hora" value="<?php echo e(\Carbon\Carbon::parse($cita->hora)->format('H:i')); ?>" required>
 <label>Estado</label>
 <select name="estado">
 <option value="pendiente" <?php echo e($cita->estado=='pendiente'?'selected':''); ?>>Pendiente</option>
 <option value="confirmada" <?php echo e($cita->estado=='confirmada'?'selected':''); ?>>Confirmada</option>
 <option value="cancelada" <?php echo e($cita->estado=='cancelada'?'selected':''); ?>>Cancelada</option>
 <option value="completada" <?php echo e($cita->estado=='completada'?'selected':''); ?>>Completada</option>
 </select>
 <label>Notas</label>
 <textarea name="notas" rows="2"><?php echo e($cita->notas); ?></textarea>
 <div class="modal-btns">
 <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('modal-editar-<?php echo e($cita->id); ?>').classList.remove('open')">Cancelar</button>
 <button type="submit" class="btn btn-acento">Guardar</button>
 </div>
 </form>
 </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/especialista/citas/index.blade.php ENDPATH**/ ?>