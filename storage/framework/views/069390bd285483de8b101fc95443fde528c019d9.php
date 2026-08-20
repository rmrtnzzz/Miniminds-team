<?php $__env->startSection('title', 'Calendario — Miniminds'); ?>

<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/paciente/calendario.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 style="font-weight:800; margin:0;">Calendario</h2>
    <span style="font-weight:600; color:#6b6280;"><?php echo e($mesNombre); ?> <?php echo e($anio); ?></span>
</div>

<div class="pt-card p-4">
    <div class="cal-grid mb-2">
        <div class="cal-day-label">Lun</div>
        <div class="cal-day-label">Mar</div>
        <div class="cal-day-label">Mié</div>
        <div class="cal-day-label">Jue</div>
        <div class="cal-day-label">Vie</div>
        <div class="cal-day-label">Sáb</div>
        <div class="cal-day-label">Dom</div>
    </div>
    <div class="cal-grid">
        <?php for($i = 0; $i < $offset; $i++): ?>
            <div class="cal-cell empty"></div>
        <?php endfor; ?>

        <?php for($dia = 1; $dia <= $diasEnMes; $dia++): ?>
            <div class="cal-cell <?php echo e($dia === $diaHoy ? 'today' : ''); ?>">
                <div><?php echo e($dia); ?></div>
                <?php if(isset($citasPorDia[$dia])): ?>
                    <span class="cal-dot"></span>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/paciente/calendario.blade.php ENDPATH**/ ?>