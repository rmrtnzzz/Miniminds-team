<?php $incrustada = $incrustada ?? false; ?>

<div id="<?php echo e($id ?? 'pantalla-carga'); ?>" class="pantalla-carga <?php echo e($incrustada ? 'carga-incrustada' : ''); ?>">

    <div class="carga-caja">

        <div class="carga-emblema">

            <div class="carga-anillo"></div>

<img 
    id="carga-mascota"
    src="<?php echo e(asset('IMG/carga/kelly.gif')); ?>"
    alt=""
    class="carga-mascota"
    data-gifs='[
        "<?php echo e(asset("IMG/carga/kelly.gif")); ?>",
        "<?php echo e(asset("IMG/carga/kairo.gif")); ?>",
        "<?php echo e(asset("IMG/carga/luma.gif")); ?>"
    ]'
>
        </div>

        <p class="carga-texto">
            Cargando<span class="carga-puntos">
                <span>.</span>
                <span>.</span>
                <span>.</span>
            </span>
        </p>

    </div>

</div><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/partials/pantalla-carga.blade.php ENDPATH**/ ?>