@extends('layouts.paciente')

@section('title', 'Tu perfil — Miniminds')

@section('extra_styles')
<link href="{{ asset('css/paciente/perfil.css') }}" rel="stylesheet">
@endsection

@section('content')
<h2 style="font-weight:800; margin-bottom:24px;">Tu perfil</h2>

@if(session('success'))
 <div style="background:#DDF3E4;color:#1F9254;padding:12px 18px;border-radius:10px;margin-bottom:16px;font-weight:600">
 {{ session('success') }}
 </div>
@endif

<div class="row g-4">
 <div class="col-md-3">
 <div class="perfil-tabs">
 <button class="perfil-tab-btn activo" onclick="mostrarTab('cuenta', this)">Información de la cuenta</button>
 <button class="perfil-tab-btn" onclick="mostrarTab('paciente', this)">Mis pacientes</button>
 <button class="perfil-tab-btn" onclick="mostrarTab('solicitudes', this)">Mis solicitudes</button>
 </div>
 </div>

 <div class="col-md-9">

 
 <div id="seccion-cuenta" class="pt-card p-4">
 <h5 style="font-weight:700; margin-bottom:18px;">Información de la cuenta</h5>

 <form action="{{ route('paciente.update.cuenta') }}" method="POST" enctype="multipart/form-data">
 @csrf @method('PUT')

 <div class="d-flex align-items-center gap-3 mb-4">
 <div class="foto-container">
 <img src="{{ auth()->user()->foto ? asset('storage/'.auth()->user()->foto) : 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 70 70%27%3E%3Crect width=%2770%27 height=%2770%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2735%27 cy=%2728%27 r=%2712%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M10 63c5-16 18-23 25-23s20 7 25 23%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E' }}" alt="Foto" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 70 70%27%3E%3Crect width=%2770%27 height=%2770%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2735%27 cy=%2728%27 r=%2712%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M10 63c5-16 18-23 25-23s20 7 25 23%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E';">
 <label class="foto-edit-btn" for="foto-input"><i class="fas fa-pen"></i></label>
 <input type="file" id="foto-input" name="foto" accept="image/*" style="display:none;" onchange="this.form.submit()">
 </div>
 <span style="font-size:12px; color:#9a8fb8;">Miembro desde: {{ auth()->user()->created_at->format('d/m/Y') }}
 </span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">NOMBRE</span>
 <span class="campo-valor" data-static>{{ auth()->user()->name }}</span>
 <input type="text" name="name" value="{{ auth()->user()->name }}" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">APELLIDO</span>
 <span class="campo-valor" data-static>{{ auth()->user()->apellido ?? '—' }}</span>
 <input type="text" name="apellido" value="{{ auth()->user()->apellido }}" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">CORREO ELECTRÓNICO</span>
 <span class="campo-valor" data-static>{{ auth()->user()->email }}</span>
 <input type="email" name="email" value="{{ auth()->user()->email }}" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">CONTRASEÑA</span>
 <span class="campo-valor" data-static>••••••••</span>
 <input type="password" name="password" placeholder="Nueva contraseña" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">NÚMERO DE TELÉFONO</span>
 <span class="campo-valor" data-static>{{ auth()->user()->telefono ?? '—' }}</span>
 <input type="text" name="telefono" value="{{ auth()->user()->telefono }}" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">FECHA DE NACIMIENTO</span>
 <span class="campo-valor" data-static>{{ optional(auth()->user()->fecha_nacimiento)->format('d/m/Y') ?? '—' }}</span>
 <input type="date" name="fecha_nacimiento" value="{{ auth()->user()->fecha_nacimiento }}" class="campo-valor d-none" data-input>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <div class="campo-perfil">
 <span class="campo-label">GÉNERO</span>
 <span class="campo-valor" data-static>{{ ucfirst(auth()->user()->genero ?? '—') }}</span>
 <select name="genero" class="campo-valor d-none" data-input>
 <option value="femenino" {{ auth()->user()->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
 <option value="masculino" {{ auth()->user()->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
 <option value="otro" {{ auth()->user()->genero == 'otro' ? 'selected' : '' }}>Otro</option>
 </select>
 <span class="campo-edit" onclick="editarCampo(this)"><i class="fas fa-pen"></i></span>
 </div>

 <button type="submit" class="btn btn-acento mt-3">Guardar</button>
 </form>
 </div>

 
 <div id="seccion-paciente" class="pt-card p-4" style="display:none;">
 <h5 style="font-weight:700; margin-bottom:18px;">Mis pacientes</h5>

 @forelse($pacientes ?? [] as $paciente)
 <div class="d-flex align-items-center gap-3 mb-3 pb-3" style="border-bottom:1px solid rgba(0,0,0,0.06);">
 <div class="foto-container">
 <img src="{{ $paciente->foto ? asset('storage/'.$paciente->foto) : 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 70 70%27%3E%3Crect width=%2770%27 height=%2770%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2735%27 cy=%2728%27 r=%2712%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M10 63c5-16 18-23 25-23s20 7 25 23%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E' }}" alt="Foto paciente" onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 70 70%27%3E%3Crect width=%2770%27 height=%2770%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2735%27 cy=%2728%27 r=%2712%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M10 63c5-16 18-23 25-23s20 7 25 23%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E';">
 </div>
 <div class="flex-grow-1">
 <div style="font-weight:700;">{{ $paciente->nombre }} {{ $paciente->apellido }}</div>
 <div style="font-size:12px; color:#9a8fb8;">
 {{ optional($paciente->fecha_nacimiento)->format('d/m/Y') ?? 'Sin fecha' }}
 · {{ ucfirst($paciente->genero ?? '—') }}
 · {{ $paciente->edad ?? '—' }} años
 </div>
 <div style="font-size:12px; color:#7C5CBF; margin-top:2px;">Especialista: {{ $paciente->profesional->nombre ?? 'Sin asignar' }} {{ $paciente->profesional->apellido ?? '' }}
 </div>
 </div>
 </div>
 @empty
 <p style="color:#8b7fa8; font-size:14px;">Todavía no tienes ningún paciente registrado.</p>
 @endforelse

 <a href="{{ route('paciente.solicitudes.crear') }}" class="btn btn-acento mt-2">+ Solicitar registro de paciente</a>
 </div>

 
 <div id="seccion-solicitudes" class="pt-card p-4" style="display:none;">
 <h5 style="font-weight:700; margin-bottom:18px;">Mis solicitudes de registro</h5>

 @forelse($solicitudes ?? [] as $s)
 <div class="d-flex align-items-center gap-3 mb-3 pb-3" style="border-bottom:1px solid rgba(0,0,0,0.06);">
 <div class="flex-grow-1">
 <div style="font-weight:700;">{{ $s->nombre }} {{ $s->apellido }}</div>
 <div style="font-size:12px; color:#9a8fb8;">Enviada el {{ $s->created_at->format('d/m/Y') }}
 </div>
 @if($s->nota_revision)
 <div style="font-size:12px; color:#6b6280; margin-top:4px;">Nota del especialista: {{ $s->nota_revision }}
 </div>
 @endif
 </div>
 <span class="estado-pill estado-{{ $s->estado }}">{{ ucfirst($s->estado) }}</span>
 </div>
 @empty
 <p style="color:#8b7fa8; font-size:14px;">No has enviado ninguna solicitud todavía.</p>
 @endforelse

 <a href="{{ route('paciente.solicitudes.crear') }}" class="btn btn-acento mt-2">+ Nueva solicitud</a>
 </div>

 </div>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/paciente/perfil.js') }}"></script>
@endsection
