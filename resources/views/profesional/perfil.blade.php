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
                    <img src="{{ $profesional->foto ? asset('storage/'.$profesional->foto) : 'https://via.placeholder.com/80' }}"
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