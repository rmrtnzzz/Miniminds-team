<?php $__env->startSection('title','Ser Especialista — Miniminds'); ?>
<?php $__env->startSection('content'); ?>
<div style="max-width:640px;margin:0 auto">
 <h2 style="font-weight:900;margin-bottom:6px">Quiero ser Especialista</h2>
 <p style="color:#9a8fb8;margin-bottom:28px">Aplica para unirte al equipo de especialistas de Miniminds.</p>

 <?php if(session('success')): ?>
 <div style="background:#d1fae5;color:#065f46;padding:14px 18px;border-radius:12px;margin-bottom:20px;font-weight:600"> <?php echo e(session('success')); ?></div>
 <?php endif; ?>
 <?php if(session('info')): ?>
 <div style="background:#dbeafe;color:#1d4ed8;padding:14px 18px;border-radius:12px;margin-bottom:20px;font-weight:600">ℹ <?php echo e(session('info')); ?></div>
 <?php endif; ?>

 <?php if($solicitud): ?>
 <div class="pt-card p-4">
 <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px">
 <h4 style="font-weight:800;margin:0">Tu solicitud</h4>
 <?php
 $colores = ['pendiente'=>'#fef3c7|#92400e','aprobada'=>'#d1fae5|#065f46','rechazada'=>'#fee2e2|#991b1b'];
 [$bg,$cl] = explode('|', $colores[$solicitud->estado] ?? '#f3f4f6|#374151');
 ?>
 <span style="background:<?php echo e($bg); ?>;color:<?php echo e($cl); ?>;padding:5px 16px;border-radius:20px;font-size:12px;font-weight:700;text-transform:capitalize"><?php echo e($solicitud->estado); ?></span>
 </div>
 <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;font-size:14px">
 <div><span style="opacity:.6;font-size:12px">Título</span><br><b><?php echo e($solicitud->titulo_profesional); ?></b></div>
 <div><span style="opacity:.6;font-size:12px">Especialidad</span><br><b><?php echo e($solicitud->especialidad); ?></b></div>
 <div><span style="opacity:.6;font-size:12px">Experiencia</span><br><b><?php echo e($solicitud->anios_experiencia); ?> años</b></div>
 <div><span style="opacity:.6;font-size:12px">Puntaje test</span><br><b style="color:#6d28d9"><?php echo e($solicitud->puntaje_test); ?>/100</b></div>
 </div>
 <?php if($solicitud->notas_admin): ?>
 <div style="margin-top:16px;background:rgba(0,0,0,.04);border-radius:10px;padding:12px;font-size:13px">
 <b>Nota del admin:</b> <?php echo e($solicitud->notas_admin); ?>

 </div>
 <?php endif; ?>
 <?php if($solicitud->estado === 'rechazada'): ?>
 <a href="<?php echo e(route('paciente.solicitud_especialista.crear')); ?>" style="display:inline-block;margin-top:16px;padding:10px 24px;border-radius:50px;background:linear-gradient(135deg,#6d28d9,#a78bfa);color:#fff;font-weight:700;font-size:14px;text-decoration:none">Volver a aplicar</a>
 <?php endif; ?>
 </div>
 <?php else: ?>
 <div class="pt-card p-4" style="text-align:center">
 <div style="font-size:56px;margin-bottom:12px;color:#a78bfa"><i class="fas fa-graduation-cap"></i></div>
 <h4 style="font-weight:800">¿Tienes experiencia en salud mental infantil?</h4>
 <p style="color:#9a8fb8;font-size:14px;margin:10px 0 22px">Completa el formulario y test de aptitud. El equipo revisará tu solicitud.</p>
 <a href="<?php echo e(route('paciente.solicitud_especialista.crear')); ?>" style="display:inline-block;padding:14px 36px;border-radius:50px;background:linear-gradient(135deg,#6d28d9,#a78bfa);color:#fff;font-weight:800;font-size:15px;text-decoration:none">Aplicar ahora →</a>
 </div>
 <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/paciente/solicitud_especialista/index.blade.php ENDPATH**/ ?>