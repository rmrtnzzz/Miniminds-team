@extends('layouts.paciente')
@section('title','El Gran Orden — Miniminds')
@section('extra_styles')
<link href="{{ asset('css/juegos/el-gran-orden.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="go-wrap">

  
  <div class="go-screen active" id="go-intro">
    <div style="font-size:60px;text-align:center">🧩</div>
    <h1>El Gran Orden</h1>
    <p>Todo está mezclado y necesitas encontrar el lugar correcto de cada cosa.<br>
    Arrastra cada objeto a donde pertenece antes de que se acabe el tiempo.</p>
    <div class="go-preview">
      <div class="go-preview-card"><div class="ico">🎒</div>Mochila escolar</div>
      <div class="go-preview-card"><div class="ico">🛏️</div>Cuarto</div>
      <div class="go-preview-card"><div class="ico">🍽️</div>Cocina</div>
      <div class="go-preview-card"><div class="ico">🛁</div>Baño</div>
    </div>
    <p style="font-size:13px;opacity:.55">Tip: Puedes arrastrar o hacer clic para seleccionar y luego clic en la zona destino</p>
    <button class="go-start-btn" onclick="goStart()">¡A ordenar todo!</button>
  </div>

  
  <div class="go-screen" id="go-game">
    <div class="go-hud">
      <div class="go-hud-box"><div class="lbl">Nivel</div><div class="val" id="go-level-val">1</div></div>
      <div class="go-hud-box"><div class="lbl">Puntos</div><div class="val" id="go-score-val">0</div></div>
      <div class="go-hud-box"><div class="lbl">Tiempo</div><div class="val" id="go-timer-val">60</div></div>
      <div class="go-hud-box"><div class="lbl">Correctos</div><div class="val" id="go-correct-val" style="color:#34d399">0</div></div>
    </div>

    <div class="go-level-dots" id="go-dots"></div>

    <div class="go-scene">
      <div class="go-scene-title">🌀 Todo mezclado — arrastra cada cosa a donde pertenece</div>
      <div class="go-chaos-zone" id="go-chaos"></div>
    </div>

    <div class="go-zones" id="go-zones"></div>

    <div class="go-level-complete" id="go-lvl-complete">
      <h3 id="go-lvl-msg">¡Nivel completado! 🎉</h3>
      <p id="go-lvl-sub">Muy bien organizado</p>
      <button class="go-next-btn" onclick="goNextLevel()">Siguiente nivel →</button>
    </div>
  </div>

  
  <div class="go-screen" id="go-end">
    <div style="font-size:64px;text-align:center">🏆</div>
    <h2>¡Todo ordenado!</h2>
    <div class="go-stats">
      <div class="go-stat"><div class="sv" id="go-end-score">0</div><div class="sl">Puntos</div></div>
      <div class="go-stat"><div class="sv" id="go-end-correct">0</div><div class="sl">Correctos</div></div>
      <div class="go-stat"><div class="sv" id="go-end-lvls">0</div><div class="sl">Niveles</div></div>
    </div>
    <div class="go-tip" id="go-end-tip"></div>
    <div class="go-end-btns">
      <button class="go-btn-replay" onclick="goStart()">Volver a jugar</button>
      <button class="go-btn-back" onclick="location.href='{{ route('juegos.index') }}'">Otros juegos</button>
    </div>
  </div>

</div>

<div class="go-float" id="go-float"></div>

<script src="{{ asset('js/juegos/el-gran-orden.js') }}"></script>
@endsection
