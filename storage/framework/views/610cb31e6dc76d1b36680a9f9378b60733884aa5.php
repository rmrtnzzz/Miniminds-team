<?php $__env->startSection('title', 'Citas — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:20px">Todas las citas</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente</th><th>Profesional</th><th>Fecha</th><th>Hora</th><th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($c->paciente->nombre ?? '—'); ?> <?php echo e($c->paciente->apellido ?? ''); ?></td>
                    <td><?php echo e($c->profesional->nombre ?? '—'); ?> <?php echo e($c->profesional->apellido ?? ''); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($c->fecha)->format('d/m/Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($c->hora)->format('H:i')); ?></td>
                    <td><?php echo e(ucfirst($c->estado)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="text-center py-3" style="opacity:.6">No hay citas registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/admin/citas/index.blade.php ENDPATH**/ ?>