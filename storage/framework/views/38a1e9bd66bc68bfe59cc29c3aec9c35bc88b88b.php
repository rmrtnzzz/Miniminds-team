<?php $__env->startSection('title', 'Mi perfil — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:24px">Mi perfil profesional</h2>

<?php if(!$profesional): ?>
    <div class="alert alert-warning">
        Todavía no tienes una ficha profesional asociada. Contacta a un administrador.
    </div>
<?php else: ?>
<div class="pt-card p-4" style="max-width:640px">
    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="<?php echo e($profesional->foto ? asset('storage/'.$profesional->foto) : 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E'); ?>" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E';"
             class="rounded-circle" width="80" height="80" style="object-fit:cover;border:3px solid #fff">
        <div>
            <div style="font-weight:800;font-size:18px"><?php echo e($profesional->nombre); ?> <?php echo e($profesional->apellido); ?></div>
            <div style="font-size:13px;color:#4a7d6f"><?php echo e($profesional->especialidad ?? 'Especialista'); ?></div>
            <div style="font-size:12px;color:#7c9d92">Miembro desde: <?php echo e($profesional->created_at->format('d/m/Y')); ?></div>
        </div>
    </div>

    <div style="font-size:14px">
        <div class="d-flex justify-content-between border-bottom py-2">
            <span style="color:#4a7d6f;font-weight:700">Correo</span>
            <span><?php echo e($profesional->user->email ?? '—'); ?></span>
        </div>
        <div class="d-flex justify-content-between border-bottom py-2">
            <span style="color:#4a7d6f;font-weight:700">Teléfono</span>
            <span><?php echo e($profesional->telefono ?? '—'); ?></span>
        </div>
        <div class="d-flex justify-content-between border-bottom py-2">
            <span style="color:#4a7d6f;font-weight:700">Fecha de nacimiento</span>
            <span><?php echo e($profesional->fecha_nacimiento ?? '—'); ?></span>
        </div>
        <div class="d-flex justify-content-between py-2">
            <span style="color:#4a7d6f;font-weight:700">Género</span>
            <span><?php echo e(ucfirst($profesional->genero ?? '—')); ?></span>
        </div>
    </div>

    <a href="<?php echo e(route('especialista.perfil.editar')); ?>" class="btn btn-acento mt-3">Editar perfil</a>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\asuichis\resources\views/especialista/perfil.blade.php ENDPATH**/ ?>