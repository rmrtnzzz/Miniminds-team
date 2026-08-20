@php
 // $height: alto del bloque. $showHeader: si muestra el título interno.
 $height = $height ?? '620px';
 $showHeader = $showHeader ?? true;
 $uid = 'cb-' . uniqid();
@endphp

<div id="{{ $uid }}" class="cerebro-widget" style="--cb-h: {{ $height }};">

 @if($showHeader)
 <div class="cb-header">
 <div>
 <h1>🧠 Mi Cerebro 3D</h1>
 <p>Arrastra para rotar · Rueda para zoom · Toca una zona para descubrirla</p>
 </div>
 </div>
 @endif

 <div class="cb-body">
 <div class="cb-canvas-wrap">
 <div class="cb-hover-tag"></div>
 <div class="cb-hint">Arrastra para explorar</div>
 </div>

 <div class="cb-info-panel">
 <div class="cb-idle">
 <span class="cb-big-emoji"><i class="fas fa-brain"></i></span>Toca una parte del cerebro (o un botón de abajo) para descubrir qué hace.
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
 <div class="cb-fact-pill" data-key="frontal">🧠 Frontal</div>
 <div class="cb-fact-pill" data-key="parietal">📍 Parietal</div>
 <div class="cb-fact-pill" data-key="temporal">👂 Temporal</div>
 <div class="cb-fact-pill" data-key="occipital">👁️ Occipital</div>
 <div class="cb-fact-pill" data-key="cerebelo">⚙️ Cerebelo</div>
 <div class="cb-fact-pill" data-key="emociones">💜 Emociones</div>
 <div class="cb-fact-pill" data-key="neuronas">⚡ Neuronas</div>
 </div>

</div>

<link href="{{ asset('css/cerebro/brain-widget.css') }}" rel="stylesheet">

@once
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/loaders/GLTFLoader.js"></script>
@endonce

@once
<script src="{{ asset('js/cerebro/brain-widget.js') }}"></script>
@endonce
<script>initCerebroBrain('{{ $uid }}', '{{ asset('models/cerebro/cerebro.glb') }}');</script>