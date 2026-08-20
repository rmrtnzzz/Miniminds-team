<?php $__env->startSection('title', 'Editar perfil — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800;margin-bottom:24px">Editar mi perfil</h2>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div>• <?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<div class="pt-card p-4" style="max-width:600px">
    <form action="<?php echo e(route('admin.perfil.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

        <div class="row g-3">
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;opacity:.7;text-transform:uppercase">Nombre</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $usuario->name)); ?>" required>
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;opacity:.7;text-transform:uppercase">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo e(old('apellido', $usuario->apellido)); ?>">
            </div>
            <div class="col-md-6">
                <label style="font-size:12px;font-weight:700;opacity:.7;text-transform:uppercase">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo e(old('telefono', $usuario->telefono)); ?>">
            </div>
            






<div class="col-md-6">
    <label style="font-size:12px;font-weight:700;opacity:.7;text-transform:uppercase">
        Foto
    </label>

    <!-- Botón para abrir la ventana -->
    <button type="button" class="selector-foto-btn" id="abrirSelectorFoto">
        <span>🖼️</span>
        Elegir foto
    </button>

    <!-- Input real que recibirá Laravel -->
    <input 
        type="file" 
        name="foto" 
        id="fotoInput"
        accept="image/*"
        hidden
    >
</div>

<!-- Ventana -->
<div class="foto-modal" id="fotoModal">

    <div class="foto-modal-contenido">

        <div class="foto-modal-header">
            <h3>Elegir una foto</h3>

            <button type="button" id="cerrarFotoModal">
                ✕
            </button>
        </div>

        <p class="foto-modal-descripcion">
            Elige una imagen predeterminada o sube una desde tu dispositivo.
        </p>

        <!-- Fondos predeterminados -->
        <div class="fotos-predeterminadas">

            <div class="foto-opcion" data-foto="/images/fondo1.jpg">
                <img src="/images/fondo1.jpg" alt="Fondo 1">
            </div>

            <div class="foto-opcion" data-foto="/images/fondo2.jpg">
                <img src="/images/fondo2.jpg" alt="Fondo 2">
            </div>

            <div class="foto-opcion" data-foto="/images/fondo3.jpg">
                <img src="/images/fondo3.jpg" alt="Fondo 3">
            </div>

            <div class="foto-opcion" data-foto="/images/fondo4.jpg">
                <img src="/images/fondo4.jpg" alt="Fondo 4">
            </div>

        </div>

        <!-- Subir imagen -->
        <label for="fotoInput" class="subir-foto">
            <span>📁</span>
            <div>
                <strong>Subir desde este dispositivo</strong>
                <small>PNG, JPG o JPEG</small>
            </div>
        </label>

        <!-- Vista previa -->
        <div class="foto-preview" id="fotoPreview">
            <img id="previewImagen" src="" alt="Vista previa">
        </div>

    </div>

</div>





        </div>

        <div class="d-flex gap-2 mt-4">
            <a href="<?php echo e(route('admin.perfil')); ?>" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-acento">Guardar cambios</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/admin/perfil_editar.blade.php ENDPATH**/ ?>