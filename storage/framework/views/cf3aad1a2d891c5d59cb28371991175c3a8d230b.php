<?php $__env->startSection('title', 'Compartir experiencia — Miniminds'); ?>

<?php $__env->startSection('content'); ?>
<h2 style="font-weight:800; margin-bottom:20px;"> Comparte tu experiencia</h2>

<div class="pt-card p-4">
 <form method="POST" action="<?php echo e(route('experiencias.store')); ?>">
 <?php echo csrf_field(); ?>

 <div class="mb-3">
 <label class="form-label">Título</label>
 <input type="text" name="titulo" class="form-control" value="<?php echo e(old('titulo')); ?>" maxlength="150" required>
 <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger" style="font-size:13px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
 </div>

 <div class="mb-3">
 <label class="form-label">Tu experiencia</label>
 <textarea name="contenido" class="form-control" rows="6" maxlength="3000" required><?php echo e(old('contenido')); ?></textarea>
 <?php $__errorArgs = ['contenido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger" style="font-size:13px;"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
 <div style="font-size:12px; color:#999; margin-top:4px;">Recuerda mantener un lenguaje respetuoso: el contenido pasa por un filtro automático de moderación.
 </div>
 </div>

 <button type="submit" class="btn btn-acento">Publicar</button>
 <a href="<?php echo e(route('experiencias.mias')); ?>" class="btn btn-outline-secondary">Cancelar</a>
 </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/experiencias/create.blade.php ENDPATH**/ ?>