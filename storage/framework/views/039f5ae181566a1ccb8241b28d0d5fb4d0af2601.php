<?php $__env->startSection('title','Aplicar como Especialista — Miniminds'); ?>
<?php $__env->startSection('extra_styles'); ?>
<link href="<?php echo e(asset('css/paciente/solicitud-especialista-crear.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width:680px;margin:0 auto">
 <a href="<?php echo e(route('paciente.solicitud_especialista.index')); ?>" style="color:#9a8fb8;font-size:13px;text-decoration:none">← Volver</a>
 <h2 style="font-weight:900;margin:12px 0 4px">Solicitud para ser Especialista</h2>
 <p style="color:#9a8fb8;margin-bottom:20px;font-size:14px">Completa el formulario y el test de aptitud. El puntaje mínimo recomendado es 70/100.</p>

 <div class="se-progress"><div class="se-progress-fill" id="se-prog" style="width:0%"></div></div>

 <?php if($errors->any()): ?>
 <div style="background:#fee2e2;color:#991b1b;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px">
 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div>• <?php echo e($e); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
 <?php endif; ?>

 <form method="POST" action="<?php echo e(route('paciente.solicitud_especialista.store')); ?>" class="se-form" id="se-form">
 <?php echo csrf_field(); ?>

 <div class="se-section">
 <h4>Información profesional</h4>
 <label>Título profesional</label>
 <input type="text" name="titulo_profesional" placeholder="Ej: Psicólogo, Terapeuta ocupacional..." value="<?php echo e(old('titulo_profesional')); ?>" required>
 <label>Área de especialidad</label>
 <select name="especialidad" required>
 <option value="">Selecciona...</option>
 <?php $__currentLoopData = ['Psicología infantil','Neuropsicología','Terapia ocupacional','Fonoaudiología','Psicopedagogía','Trabajo social','Otra']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <option value="<?php echo e($e); ?>" <?php echo e(old('especialidad')===$e?'selected':''); ?>><?php echo e($e); ?></option>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </select>
 <label>Años de experiencia con niños</label>
 <input type="number" name="anios_experiencia" min="0" max="50" value="<?php echo e(old('anios_experiencia',0)); ?>" required>
 <label>Formación académica</label>
 <textarea name="formacion" rows="3" placeholder="Describe tu formación, títulos, certificaciones..." required><?php echo e(old('formacion')); ?></textarea>
 <label>¿Por qué quieres ser especialista en Miniminds?</label>
 <textarea name="motivacion" rows="3" placeholder="Cuéntanos tu motivación (mínimo 50 caracteres)..." required><?php echo e(old('motivacion')); ?></textarea>
 </div>

 <div class="se-section">
 <h4>Test de aptitud (7 preguntas)</h4>
 <p style="font-size:13px;color:#9a8fb8;margin-bottom:18px">Selecciona la respuesta más adecuada en cada caso clínico.</p>

 <?php
 $preguntas = [
 ['id'=>'q1','texto'=>'Un niño de 10 años con TDAH interrumpe constantemente en clase. La primera intervención más adecuada es:',
 'opts'=>['a'=>'Llamarle la atención frente a sus compañeros','b'=>'Hablar en privado y establecer señales no verbales de recordatorio','c'=>'Reportarlo inmediatamente con el director','d'=>'Ignorar el comportamiento completamente']],
 ['id'=>'q2','texto'=>'Una niña de 9 años presenta mutismo selectivo solo en la escuela. La estrategia más efectiva a corto plazo es:',
 'opts'=>['a'=>'Obligarla a participar oralmente en clase','b'=>'Enviarla a terapia intensiva inmediata','c'=>'Crear espacios seguros de comunicación alternativa y graduar la exposición','d'=>'Cambiarla de escuela']],
 ['id'=>'q3','texto'=>'¿Cuál de los siguientes es un indicador de alerta de autolesiones en un niño de 11 años?',
 'opts'=>['a'=>'Marcas inexplicables en brazos, cambios de humor bruscos y aislamiento social','b'=>'Disminución temporal del rendimiento académico','c'=>'Preferir jugar solo en el recreo','d'=>'Comer más de lo habitual']],
 ['id'=>'q4','texto'=>'En terapia con un niño con TEA nivel 1, la técnica de "Social Stories" busca principalmente:',
 'opts'=>['a'=>'Enseñar matemáticas de forma narrativa','b'=>'Explicar situaciones sociales con descripciones claras para mejorar la comprensión','c'=>'Reducir comportamientos repetitivos','d'=>'Mejorar la memoria de trabajo']],
 ['id'=>'q5','texto'=>'Un padre reporta que su hijo de 10 años tiene crisis de llanto intensas antes de ir a la escuela. El primer paso clínico es:',
 'opts'=>['a'=>'Recetar ansiolíticos de inmediato','b'=>'Recomendar fuerza de voluntad','c'=>'Realizar una evaluación funcional del comportamiento y entrevistar a los padres y la escuela','d'=>'Diagnosticar trastorno de ansiedad sin más evaluación']],
 ['id'=>'q6','texto'=>'¿Qué principio ético es FUNDAMENTAL al trabajar con menores de edad en salud mental?',
 'opts'=>['a'=>'Confidencialidad con límites claros: informar a los padres/tutores cuando hay riesgo para el niño','b'=>'Confidencialidad absoluta sin excepción','c'=>'Los padres tienen acceso total a todo lo que el niño dice','d'=>'El niño no tiene derecho a la privacidad']],
 ['id'=>'q7','texto'=>'Un niño con dislexia tiene dificultades para leer en voz alta. La adaptación más adecuada en el aula es:',
 'opts'=>['a'=>'Repetirle el texto hasta que lo lea correctamente','b'=>'Permitir lectura silenciosa, usar textos con fuentes adaptadas y dar más tiempo en evaluaciones','c'=>'Sacarlo del aula durante las clases de lenguaje','d'=>'Recomendar que repita el año escolar']],
 ];
 ?>

 <?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <div class="se-q">
 <p><?php echo e($i+1); ?>. <?php echo e($p['texto']); ?></p>
 <?php $__currentLoopData = $p['opts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $txt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <label class="se-opt" id="opt-<?php echo e($p['id']); ?>-<?php echo e($val); ?>">
 <input type="radio" name="respuestas[<?php echo e($p['id']); ?>]" value="<?php echo e($val); ?>" onchange="seSelectOpt('<?php echo e($p['id']); ?>','<?php echo e($val); ?>')">
 <span><?php echo e(strtoupper($val)); ?>) <?php echo e($txt); ?></span>
 </label>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </div>

 <button type="submit" class="se-submit">Enviar solicitud →</button>
 </form>
</div>

<script src="<?php echo e(asset('js/paciente/solicitud-especialista-crear.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abc\Desktop\Miniminds unido sophi y kelly\resources\views/paciente/solicitud_especialista/crear.blade.php ENDPATH**/ ?>