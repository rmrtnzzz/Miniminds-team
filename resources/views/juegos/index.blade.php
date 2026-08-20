@extends('layouts.paciente')
@section('title','Juegos Terapéuticos — Miniminds')
@section('extra_styles')
<link href="{{ asset('css/juegos/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="jg-header">
  <h2>🎮 Juegos Terapéuticos</h2>
  <p>Explora, juega y aprende sobre tus emociones. Diseñados para niños de 9 a 12 años.</p>
</div>

<div class="jg-grid">

  <a href="{{ route('juegos.el_gran_orden') }}" class="jg-card">
    <div class="jg-card-img" style="background:linear-gradient(135deg,#1e1b4b,#312e81)">
      🧩<div class="jg-age">9–12 años</div>
    </div>
    <div class="jg-card-body">
      <h3>El Gran Orden</h3>
      <p>Ordena objetos en su lugar correcto antes de que se acabe el tiempo. 4 escenas con drag & drop.</p>
      <div>
        <span class="jg-badge" style="background:#e0daf5;color:#5b4b9a">Ansiedad</span>
        <span class="jg-badge" style="background:#dbeafe;color:#1d4ed8">Atención</span>
      </div>
      <span class="jg-play-btn" style="background:linear-gradient(135deg,#4f46e5,#818cf8)">▶ Jugar ahora</span>
    </div>
  </a>

  <a href="{{ route('juegos.volcan_interior') }}" class="jg-card">
    <div class="jg-card-img" style="background:linear-gradient(135deg,#2d0050,#7c3aed)">
      🌋<div class="jg-age">9–12 años</div>
    </div>
    <div class="jg-card-body">
      <h3>Mi Volcán Interior</h3>
      <p>Aprende a manejar emociones difíciles. 6 situaciones reales + módulo de dibujo libre.</p>
      <div>
        <span class="jg-badge" style="background:#fce7f3;color:#be185d">Emociones</span>
        <span class="jg-badge" style="background:#d1fae5;color:#065f46">Autocuidado</span>
        <span class="jg-badge" style="background:#e0daf5;color:#5b4b9a">Bloqueo</span>
      </div>
      <span class="jg-play-btn" style="background:linear-gradient(135deg,#7c3aed,#a78bfa)">▶ Jugar ahora</span>
    </div>
  </a>

  <a href="{{ route('juegos.ritmo_zen') }}" class="jg-card">
    <div class="jg-card-img" style="background:linear-gradient(135deg,#0a0015,#1a0035)">
      🎵<div class="jg-age">9–12 años</div>
    </div>
    <div class="jg-card-body">
      <h3>Ritmo Zen</h3>
      <p>Sigue el ritmo y aprende técnicas de respiración entre niveles. Fondo 3D inmersivo.</p>
      <div>
        <span class="jg-badge" style="background:#fef3c7;color:#92400e">Relajación</span>
        <span class="jg-badge" style="background:#dbeafe;color:#1d4ed8">Respiración</span>
      </div>
      <span class="jg-play-btn" style="background:linear-gradient(135deg,#6d28d9,#a78bfa)">▶ Jugar ahora</span>
    </div>
  </a>

</div>
@endsection
