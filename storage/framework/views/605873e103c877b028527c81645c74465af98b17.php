<?php $__env->startSection('title', 'Mis solicitudes — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
    <h2 style="font-weight:800;margin:0">Mis solicitudes de registro</h2>
    <a href="<?php echo e(route('paciente.solicitudes.crear')); ?>" class="btn btn-acento">
        <i class="fas fa-plus me-1"></i> Nueva solicitud
    </a>
</div>

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente propuesto</th>
                <th>Estado</th>
                <th>Revisado por</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($s->nombre); ?> <?php echo e($s->apellido); ?></td>
                    <td>
                        <?php
                            $badgeColor = match($s->estado) {
                                'aprobada'  => '#2E7D32',
                                'rechazada' => '#C23A52',
                                default     => '#9a8fb8',
                            };
                        ?>
                        <span style="text-transform:capitalize;font-weight:600;color:<?php echo e($badgeColor); ?>">
                            <?php echo e($s->estado); ?>

                        </span>
                    </td>
                    <td><?php echo e($s->profesional->nombre ?? '—'); ?></td>
                    <td><?php echo e($s->created_at->format('d/m/Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center py-3" style="opacity:.6">
                        Aún no has enviado ninguna solicitud.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/paciente/solicitudes/index.blade.php ENDPATH**/ ?>