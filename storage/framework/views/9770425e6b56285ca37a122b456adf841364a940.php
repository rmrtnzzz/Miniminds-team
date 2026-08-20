<?php
 // $height: alto del bloque. $showHeader: si muestra el título interno.
 $height = $height ?? '620px';
 $showHeader = $showHeader ?? true;
 $uid = 'cb-' . uniqid();
?>

<div id="<?php echo e($uid); ?>" class="cerebro-widget" style="--cb-h: <?php echo e($height); ?>;">

 <?php if($showHeader): ?>
 <div class="cb-header">
 <div>
 <h1>Mi Cerebro 3D</h1>
 <p>Arrastra para rotar · Rueda para zoom · Toca una zona o botón para descubrir qué hace</p>
 </div>
 </div>
 <?php endif; ?>

 <div class="cb-body">
 <div class="cb-canvas-wrap">
 <div class="cb-hover-tag"></div>
 <div class="cb-hint">Arrastra para explorar</div>
 </div>

 <div class="cb-info-panel">
 <div class="cb-idle">
 <span class="cb-big-emoji"><i class="fas fa-brain"></i></span>Toca una zona del cerebro o elegí un botón de abajo para descubrir qué función cumple.
 </div>
 <div class="cb-info-content">
 <div class="cb-info-close"><i class="fas fa-xmark"></i></div>
 <span class="cb-info-badge"></span>
 <h3 class="cb-info-title"></h3>
 <p class="cb-info-text"></p>
 </div>
 </div>
 </div>

 <div class="cb-fact-pills">
 <div class="cb-fact-pill" data-key="frontal">Lóbulo Frontal</div>
 <div class="cb-fact-pill" data-key="parietal">Lóbulo Parietal</div>
 <div class="cb-fact-pill" data-key="temporal">Lóbulo Temporal</div>
 <div class="cb-fact-pill" data-key="occipital">Lóbulo Occipital</div>
 <div class="cb-fact-pill" data-key="cerebelo">Cerebelo</div>
 <div class="cb-fact-pill" data-key="emociones">Sistema Límbico</div>
 </div>

</div>

<link href="<?php echo e(asset('css/frontend/carga.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/cerebro/brain-widget.css')); ?>" rel="stylesheet">

<?php if (! $__env->hasRenderedOnce('af885b47-d84f-46ad-8d20-e7279a5f5838')): $__env->markAsRenderedOnce('af885b47-d84f-46ad-8d20-e7279a5f5838'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
<?php endif; ?>

<?php if (! $__env->hasRenderedOnce('fcb987c5-6711-44cb-aca8-9b221e297558')): $__env->markAsRenderedOnce('fcb987c5-6711-44cb-aca8-9b221e297558'); ?>
<script src="<?php echo e(asset('js/cerebro/brain-widget.js')); ?>"></script>
<?php endif; ?>
<script>initCerebroBrain('<?php echo e($uid); ?>', '<?php echo e(asset('models/cerebro/cerebro.glb')); ?>', '<?php echo e(asset('IMG/carga/kelly.gif')); ?>');</script><?php /**PATH C:\Users\DELL\Desktop\panditas gang\resources\views/partials/cerebro-brain.blade.php ENDPATH**/ ?>