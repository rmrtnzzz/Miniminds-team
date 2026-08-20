<?php $__env->startSection('title', 'Mis pacientes — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:20px">Mis pacientes</h2>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="color:#4a7d6f;font-size:12px;text-transform:uppercase">
                <th>Paciente</th>
                <th>Tutor</th>
                <th>Edad</th>
                <th>Género</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="font-weight:700"><?php echo e($p->nombre); ?> <?php echo e($p->apellido); ?></td>
                    <td><?php echo e($p->user->name ?? '—'); ?></td>
                    <td><?php echo e($p->edad ?? '—'); ?></td>
                    <td><?php echo e(ucfirst($p->genero ?? '—')); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('especialista.pacientes.show', $p->id)); ?>" class="btn btn-sm btn-acento">Ver ficha</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center py-4" style="color:#7c9d92">
                        Todavía no tienes pacientes asignados. Revisa las solicitudes pendientes.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/especialista/pacientes/index.blade.php ENDPATH**/ ?>