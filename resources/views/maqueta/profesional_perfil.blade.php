@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-3">
        <!-- Menú lateral -->
        <div class="card-miniminds p-3 mb-3">
            <p class="fw-bold" style="cursor:pointer">Información de la cuenta</p>
            <p style="cursor:pointer">Información del paciente</p>
        </div>
    </div>

    <div class="col-md-7">
        <!-- Foto y miembro desde -->
        <div class="card-miniminds p-4">
            <h2 class="fw-bold mb-4">Tu perfil</h2>

            <div class="d-flex align-items-center mb-4">
                <div style="position:relative; width:80px; height:80px;">
                    <img src="{{ $profesional->foto ? asset('storage/'.$profesional->foto) : 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23dcecea%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23a9c9c2%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23a9c9c2%27/%3E%3C/svg%3E' }}"
                        class="rounded-circle" width="80" height="80" style="object-fit:cover;">
                    <a href="{{ route('profesional.editar') }}" style="position:absolute; bottom:0; right:0;">
                        <i class="fas fa-pen-circle"></i>
                    </a>
                </div>
                <p class="ms-3 text-muted">Miembro desde: {{ $profesional->created_at->format('d/m/Y') }}</p>
            </div>

            <div class="row gy-3">
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">NOMBRE:</span>
                    <span>{{ $profesional->nombre }}</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">APELLIDO:</span>
                    <span>{{ $profesional->apellido }}</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">CORREO ELECTRÓNICO:</span>
                    <span>{{ $profesional->user->email }}</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">CONTRASEÑA:</span>
                    <span>********</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">NÚMERO DE TELÉFONO:</span>
                    <span>{{ $profesional->telefono }}</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">FECHA DE NACIMIENTO:</span>
                    <span>{{ $profesional->fecha_nacimiento }}</span>
                    <a href="{{ route('profesional.editar') }}"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-12 d-flex justify-content-between border-bottom pb-2">
                    <span class="fw-bold">GÉNERO:</span>
                    <span>{{ $profesional->genero }}</span>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn-acento">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection