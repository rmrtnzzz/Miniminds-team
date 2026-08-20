<?php $__env->startSection('title', 'Panel general — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:24px">Panel general</h2>

<div class="row g-3 mb-4">
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['usuarios']); ?></div>
            <div style="font-size:12px;opacity:.7">Usuarios</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['especialistas']); ?></div>
            <div style="font-size:12px;opacity:.7">Especialistas</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['admins']); ?></div>
            <div style="font-size:12px;opacity:.7">Admins</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['pacientes']); ?></div>
            <div style="font-size:12px;opacity:.7">Pacientes</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['citas']); ?></div>
            <div style="font-size:12px;opacity:.7">Citas</div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="pt-card text-center py-4" style="border:1px solid #F5A623">
            <div style="font-size:28px;font-weight:800"><?php echo e($metrica['solicitudes_pendientes']); ?></div>
            <div style="font-size:12px;opacity:.7">Solicitudes pend.</div>
        </div>
    </div>
</div>

<h6 style="font-weight:700;margin-bottom:10px">Últimas citas registradas</h6>
<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Paciente</th><th>Profesional</th><th>Fecha</th><th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $ultimasCitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($c->paciente->nombre ?? '—'); ?> <?php echo e($c->paciente->apellido ?? ''); ?></td>
                    <td><?php echo e($c->profesional->nombre ?? '—'); ?> <?php echo e($c->profesional->apellido ?? ''); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($c->fecha)->format('d/m/Y')); ?></td>
                    <td><?php echo e(ucfirst($c->estado)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="text-center py-3" style="opacity:.6">Aún no hay citas registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/admin/inicio.blade.php ENDPATH**/ ?>