@extends('layouts.paciente')
@section('title','Ritmo Zen — Miniminds')
@section('extra_styles')
<link href="{{ asset('css/juegos/ritmo-zen.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="rz-wrap">
  <canvas id="rz-canvas"></canvas>

  <div id="rz-start-panel">
    <h1>🎵 Ritmo Zen</h1>
    <p>Sigue el ritmo y aprende técnicas de relajación.<br>Presiona las teclas o toca los círculos cuando las notas lleguen.</p>
    <div class="rz-key-preview">
      <div class="rz-kp"><div class="circle" style="color:#ff6b9d;border-color:#ff6b9d;background:rgba(255,107,157,.15)">D</div><span>Rosa</span></div>
      <div class="rz-kp"><div class="circle" style="color:#a78bfa;border-color:#a78bfa;background:rgba(167,139,250,.15)">F</div><span>Lila</span></div>
      <div class="rz-kp"><div class="circle" style="color:#34d399;border-color:#34d399;background:rgba(52,211,153,.15)">J</div><span>Verde</span></div>
      <div class="rz-kp"><div class="circle" style="color:#fbbf24;border-color:#fbbf24;background:rgba(251,191,36,.15)">K</div><span>Dorado</span></div>
    </div>
    <button class="rz-start-btn" onclick="rzStart()">¡Empezar a relajarme!</button>
  </div>

  <div id="rz-breath-panel" style="display:none">
    <h2 id="rz-breath-title">Pausa de respiración 🌬️</h2>
    <p id="rz-breath-desc">Tomemos un momento para calmarnos</p>
    <div id="rz-breath-circle"></div>
    <div id="rz-breath-text">Inhala...</div>
    <button id="rz-breath-btn" onclick="rzEndBreath()">Continuar jugando →</button>
  </div>

  <div id="rz-end-panel">
    <h2>¡Sesión completada! 🌟</h2>
    <div class="rz-stat">Puntuación: <span id="rz-end-score">0</span></div>
    <div class="rz-stat">Precisión: <span id="rz-end-acc">0%</span></div>
    <div class="rz-stat">Combo máximo: <span id="rz-end-combo">0</span></div>
    <div class="rz-stat" style="color:#7dd3fc;font-style:italic;margin-top:12px" id="rz-end-msg"></div>
    <div class="rz-btns">
      <button class="rz-btns rz-btn-replay" onclick="rzReset()">Volver a jugar</button>
      <button class="rz-btns rz-btn-back" onclick="location.href='{{ route('juegos.index') }}'">Otros juegos</button>
    </div>
  </div>

  <div id="rz-ui">
    <div id="rz-header">
      <div id="rz-score-box"><div class="label">Puntos</div><div class="value" id="rz-score">0</div></div>
      <div id="rz-level-box" style="color:#fff;text-align:center"><div style="font-size:11px;opacity:.7">NIVEL</div><div style="font-size:20px;font-weight:800;color:#34d399" id="rz-level">1</div></div>
      <div id="rz-streak"><div class="label">Combo</div><div class="value" id="rz-combo-disp" style="font-size:24px;font-weight:800">0x</div></div>
    </div>

    <div id="rz-lane-area">
      <div class="rz-lane" id="rz-notes-layer"></div>
      <div style="display:flex;width:540px;gap:0;pointer-events:auto">
        <div class="rz-col"><div class="rz-hit-zone" id="hz0" onclick="rzTap(0)"><span>D</span><span class="rz-key-label" style="color:#ff6b9d">♥</span></div></div>
        <div class="rz-col"><div class="rz-hit-zone" id="hz1" onclick="rzTap(1)"><span>F</span><span class="rz-key-label" style="color:#a78bfa">✦</span></div></div>
        <div class="rz-col"><div class="rz-hit-zone" id="hz2" onclick="rzTap(2)"><span>J</span><span class="rz-key-label" style="color:#34d399">✿</span></div></div>
        <div class="rz-col"><div class="rz-hit-zone" id="hz3" onclick="rzTap(3)"><span>K</span><span class="rz-key-label" style="color:#fbbf24">★</span></div></div>
      </div>
      <div id="rz-combo-bar"><div id="rz-combo-fill"></div></div>
    </div>

    <div id="rz-feedback"></div>
  </div>
</div>

<script src="{{ asset('js/juegos/ritmo-zen.js') }}"></script>

@endsection