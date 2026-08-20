@extends('layouts.admin')
@section('title', 'Usuarios — Miniminds')

@section('content')
<h2 style="font-weight:800;margin-bottom:20px">Usuarios</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="pt-card p-3">
    <table class="table mb-0" style="font-size:14px">
        <thead>
            <tr style="font-size:11px;text-transform:uppercase;opacity:.6">
                <th>Nombre</th><th>Correo</th><th>Rol actual</th><th>Cambiar rol</th><th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
                <tr>
                    <td>{{ $u->name }} {{ $u->apellido }}</td>
                    <td>{{ $u->email }}</td>
                    <td><span style="text-transform:capitalize">{{ $u->role }}</span></td>
                    <td>
                        <form action="{{ route('admin.usuarios.rol', $u->id) }}" method="POST" class="d-flex gap-2">
                            @csrf @method('PUT')
                            <select name="role" class="form-select form-select-sm" style="width:auto">
                                <option value="usuario" {{ $u->role=='usuario'?'selected':'' }}>Usuario</option>
                                <option value="especialista" {{ $u->role=='especialista'?'selected':'' }}>Especialista</option>
                                <option value="admin" {{ $u->role=='admin'?'selected':'' }}>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-acento">Guardar</button>
                        </form>
                    </td>
                    <td>
                        @if($u->id !== auth()->id())
                            <form action="{{ route('admin.usuarios.destroy', $u->id) }}" method="POST"
                                  onsubmit="return confirm('¿Eliminar a {{ $u->name }} {{ $u->apellido }}? Esta acción no se puede deshacer.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar usuario">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
