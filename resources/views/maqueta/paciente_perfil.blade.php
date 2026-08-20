@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('views/paciente/css/perfil.css') }}">

<div class="perfil-container">
 <h1 class="perfil-titulo">Tu perfil</h1>

 <div class="row g-4">

 <!-- Sidebar izquierdo -->
 <div class="col-md-3">
 <div class="perfil-sidebar">
 <div class="perfil-tab activo" onclick="mostrarTab('cuenta')" id="tab-cuenta">Información de la cuenta
 </div>
 <div class="perfil-tab" onclick="mostrarTab('paciente')" id="tab-paciente">Información del paciente
 </div>
 </div>
 </div>

 <!-- Contenido principal -->
 <div class="col-md-9">

 <!-- TAB: Información de la cuenta -->
 <div id="seccion-cuenta" class="perfil-card">
 <h4>Información de la cuenta</h4>

 <div class="d-flex align-items-center gap-3 mb-4">
 <div class="foto-container">
 <img src="data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E" alt="Foto">
 <button class="foto-edit-btn"><i class="fas fa-pen"></i></button>
 </div>
 <span class="miembro-desde">Miembro desde: {{ auth()->check() ? auth()->user()->created_at->format('d/m/Y') : '—' }}
 </span>
 </div>

 <form action="#" method="POST" enctype="multipart/form-data">
 @csrf @method('PUT')

 <div class="campo-perfil">
 <span class="campo-label">NOMBRE:</span>
 <span class="campo-valor">{{ auth()->check() ? auth()->user()->name : '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">APELLIDO:</span>
 <span class="campo-valor">{{ auth()->check() ? (auth()->user()->apellido ?? '—') : '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">CORREO ELECTRÓNICO:</span>
 <span class="campo-valor">{{ auth()->check() ? auth()->user()->email : '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">CONTRASEÑA:</span>
 <span class="campo-valor">••••••••</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">NÚMERO DE TELÉFONO:</span>
 <span class="campo-valor">{{ auth()->check() ? (auth()->user()->telefono ?? '—') : '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">FECHA DE NACIMIENTO:</span>
 <span class="campo-valor">{{ auth()->check() ? (auth()->user()->fecha_nacimiento ?? '—') : '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">GÉNERO:</span>
 <span class="campo-valor">{{ auth()->check() ? (auth()->user()->genero ?? '—') : '—' }}</span>
 </div>

 <button type="submit" class="btn-guardar">Guardar</button>
 </form>
 </div>

 <!-- TAB: Información del paciente -->
 <div id="seccion-paciente" class="perfil-card" style="display:none;">
 <h4>Información del paciente</h4>

 @if(isset($pacientes) && count($pacientes) > 0)
 @foreach($pacientes as $paciente)
 <div class="d-flex align-items-center gap-3 mb-4">
 <div class="foto-container">
 <img src="{{ $paciente->foto ?? 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E' }}" alt="Foto">
 <button class="foto-edit-btn"><i class="fas fa-pen"></i></button>
 </div>
 <span class="miembro-desde">Miembro desde: {{ $paciente->created_at->format('d/m/Y') }}</span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">NOMBRE:</span>
 <span class="campo-valor">{{ $paciente->nombre }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">APELLIDO:</span>
 <span class="campo-valor">{{ $paciente->apellido }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">FECHA DE NACIMIENTO:</span>
 <span class="campo-valor">{{ $paciente->fecha_nacimiento ?? '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">GÉNERO:</span>
 <span class="campo-valor">{{ $paciente->genero ?? '—' }}</span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">EDAD:</span>
 <span class="campo-valor">{{ $paciente->edad ?? '—' }}</span>
 <span class="campo-edit"><i class="fas fa-pen"></i></span>
 </div>

 <button class="btn-guardar">Guardar</button>
 @endforeach
 @else
 <p class="text-muted">No hay pacientes registrados aún.</p>
 @endif

 <a href="#" class="btn-agregar-paciente">
 + Añadir nuevo paciente
 </a>
 </div>

 </div>
 </div>
</div>

<script>
function mostrarTab(tab) {
 document.getElementById('seccion-cuenta').style.display = 'none';
 document.getElementById('seccion-paciente').style.display = 'none';
 document.getElementById('tab-cuenta').classList.remove('activo');
 document.getElementById('tab-paciente').classList.remove('activo');

 document.getElementById('seccion-' + tab).style.display = 'block';
 document.getElementById('tab-' + tab).classList.add('activo');
}
</script>

@endsection