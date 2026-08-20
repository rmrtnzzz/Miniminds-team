@extends('layouts.admin')
@section('title', 'Mi perfil — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:24px">Mi perfil profesional</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="pt-card p-4" style="max-width:640px">
    <div class="d-flex align-items-center gap-3 mb-4">
        <img src="{{ $usuario->foto ? asset('storage/'.$usuario->foto) : 'data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23302852%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23c4b5fd%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23c4b5fd%27/%3E%3C/svg%3E' }}"
             onerror="this.onerror=null;this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 80 80%27%3E%3Crect width=%2780%27 height=%2780%27 fill=%27%23302852%27/%3E%3Ccircle cx=%2740%27 cy=%2732%27 r=%2714%27 fill=%27%23c4b5fd%27/%3E%3Cpath d=%27M12 72c5-18 20-26 28-26s23 8 28 26%27 fill=%27%23c4b5fd%27/%3E%3C/svg%3E';"
             class="rounded-circle" width="80" height="80" style="object-fit:cover;border:3px solid #fff">
        <div>
            <div style="font-weight:800;font-size:18px">{{ $usuario->name }} {{ $usuario->apellido }}</div>
            <div style="font-size:13px;opacity:.7">Administrador</div>
            <div style="font-size:12px;opacity:.55">Miembro desde: {{ $usuario->created_at->format('d/m/Y') }}</div>
        </div>
    </div>

    <div style="font-size:14px">
        <div class="d-flex justify-content-between border-bottom py-2">
            <span style="font-weight:700;opacity:.7">Correo</span>
            <span>{{ $usuario->email }}</span>
        </div>
        <div class="d-flex justify-content-between py-2">
            <span style="font-weight:700;opacity:.7">Teléfono</span>
            <span>{{ $usuario->telefono ?? '—' }}</span>
        </div>
    </div>

    <a href="{{ route('admin.perfil.editar') }}" class="btn btn-acento mt-3">Editar perfil</a>
</div>
@endsection
