<?php $__env->startSection('title', 'Editar perfil — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:24px">Editar mi perfil</h2>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div>• <?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<div class="pt-card p-4" style="max-width:600px">
    <form action="<?php echo e(route('especialista.perfil.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

        <div class="row g-3">
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo e(old('nombre', $profesional->nombre ?? '')); ?>" required>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo e(old('apellido', $profesional->apellido ?? '')); ?>" required>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo e(old('telefono', $profesional->telefono ?? '')); ?>">
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo e(old('fecha_nacimiento', $profesional->fecha_nacimiento ?? '')); ?>">
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Género</label>
                <select name="genero" class="form-control">
                    <option value="masculino" <?php echo e(($profesional->genero ?? '')=='masculino'?'selected':''); ?>>Masculino</option>
                    <option value="femenino" <?php echo e(($profesional->genero ?? '')=='femenino'?'selected':''); ?>>Femenino</option>
                    <option value="otro" <?php echo e(($profesional->genero ?? '')=='otro'?'selected':''); ?>>Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;color:#4a7d6f;text-transform:uppercase">Foto</label>
                <input type="file" name="foto" accept="image/*" class="form-control">
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="<?php echo e(route('especialista.perfil')); ?>" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-acento">Guardar cambios</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.especialista', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/especialista/perfil_editar.blade.php ENDPATH**/ ?>