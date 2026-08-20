@extends('layouts.paciente')
@section('title','Mi Volcán Interior — Miniminds')
@section('extra_styles')
<link href="{{ asset('css/juegos/volcan-interior.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="vi-wrap">

  
  <div class="vi-screen active" id="vi-intro">
    <h1>🌋 Mi Volcán Interior</h1>
    <p>Cuando las emociones se acumulan, el volcán puede explotar.<br>Aprende a calmarte eligiendo respuestas saludables ante situaciones difíciles.</p>
    <div class="vi-volcano-wrap">
      <div class="vi-mountain"></div>
      <div class="vi-lava" id="vi-lava-demo"></div>
    </div>
    <button class="vi-start-btn" onclick="viStart()">¡Explorar mis emociones!</button>
  </div>

  
  <div class="vi-screen" id="vi-game">
    <div class="vi-progress" id="vi-progress"></div>

    <div class="vi-volcano-wrap">
      <div class="vi-mountain"></div>
      <div class="vi-lava" id="vi-lava"></div>
      <div class="vi-particles" id="vi-sparks"></div>
    </div>

    <div class="vi-stress-bar-wrap">
      <div class="vi-stress-label"><span>😌 Tranquilo</span><span id="vi-stress-pct">0%</span><span>😤 Volcán</span></div>
      <div class="vi-stress-track"><div class="vi-stress-fill" id="vi-stress-fill" style="width:20%;background:#34d399"></div></div>
    </div>

    <div class="vi-card" id="vi-situation-card">
      <div class="vi-situation-emoji" id="vi-emoji">🤔</div>
      <div class="vi-situation-text" id="vi-situation-text">Cargando...</div>
      <div class="vi-options" id="vi-options"></div>
    </div>

    <div class="vi-feedback-box" id="vi-feedback-box"></div>
    <button class="vi-next-btn" id="vi-next-btn" onclick="viNext()">Siguiente situación →</button>
  </div>

  
  <div class="vi-screen" id="vi-draw-screen">
    <h2>🎨 Espacio libre de expresión</h2>
    <p>¡Lo hiciste muy bien! Ahora dibuja cómo te sientes.<br>No hay nada correcto ni incorrecto — este espacio es tuyo.</p>
    <canvas id="vi-draw-canvas" width="580" height="340"></canvas>
    <div class="vi-draw-tools">
      <div id="vi-colors" style="display:flex;gap:8px">
        <div class="vi-color-btn active" style="background:#ef4444" onclick="viSetColor('#ef4444',this)"></div>
        <div class="vi-color-btn" style="background:#f97316" onclick="viSetColor('#f97316',this)"></div>
        <div class="vi-color-btn" style="background:#fbbf24" onclick="viSetColor('#fbbf24',this)"></div>
        <div class="vi-color-btn" style="background:#34d399" onclick="viSetColor('#34d399',this)"></div>
        <div class="vi-color-btn" style="background:#60a5fa" onclick="viSetColor('#60a5fa',this)"></div>
        <div class="vi-color-btn" style="background:#a78bfa" onclick="viSetColor('#a78bfa',this)"></div>
        <div class="vi-color-btn" style="background:#f9a8d4" onclick="viSetColor('#f9a8d4',this)"></div>
        <div class="vi-color-btn" style="background:#1e1e1e" onclick="viSetColor('#1e1e1e',this)"></div>
        <div class="vi-color-btn" style="background:#ffffff;border:1px solid rgba(255,255,255,.3)" onclick="viSetColor('#ffffff',this)"></div>
      </div>
      <button class="vi-size-btn active" onclick="viSetSize(4,this)" id="sz-s">S</button>
      <button class="vi-size-btn" onclick="viSetSize(10,this)" id="sz-m">M</button>
      <button class="vi-size-btn" onclick="viSetSize(22,this)" id="sz-l">L</button>
      <button class="vi-tool-btn" onclick="viToggleEraser(this)" id="vi-eraser-btn">🧹 Borrador</button>
      <button class="vi-tool-btn" onclick="viClearCanvas()">🗑️ Limpiar</button>
    </div>
    <div class="vi-draw-msg">Dibuja lo que sientes — tus emociones merecen un lugar seguro 💜</div>
    <button class="vi-start-btn" style="background:linear-gradient(135deg,#6d28d9,#a78bfa);box-shadow:0 8px 32px rgba(109,40,217,.4)" onclick="viShowEnd()">Ver mi resultado 🌟</button>
  </div>

  
  <div class="vi-screen" id="vi-end-screen">
    <div style="font-size:60px;text-align:center">🌟</div>
    <h2>¡Increíble trabajo!</h2>
    <div class="vi-stats">
      <div class="vi-stat-box"><div class="sv" id="vi-end-good">0</div><div class="sl">Elecciones saludables</div></div>
      <div class="vi-stat-box"><div class="sv" id="vi-end-pts">0</div><div class="sl">Puntos</div></div>
      <div class="vi-stat-box"><div class="sv" id="vi-end-stress">0%</div><div class="sl">Nivel de calma final</div></div>
    </div>
    <div class="vi-msg-box" id="vi-end-msg"></div>
    <div class="vi-end-btns">
      <button class="vi-btn-replay" onclick="viReset()">Volver a jugar</button>
      <button class="vi-btn-draw" onclick="viGoToDraw()">🎨 Seguir dibujando</button>
      <button class="vi-btn-back" onclick="location.href='{{ route('juegos.index') }}'">Otros juegos</button>
    </div>
  </div>

</div>

<script src="{{ asset('js/juegos/volcan-interior.js') }}"></script>
@endsection
