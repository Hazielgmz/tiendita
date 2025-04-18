@extends('admin.layout')

@section('header-title', 'Gestión de Usuarios')

@section('content')
    <div class="grid gap-6">
        <div class="card">
            <div class="card-header flex flex-row items-center justify-between">
                <div>
                    <h3 class="card-title">Gestión de Usuarios</h3>
                    <p class="card-description">Administra los usuarios del sistema</p>
                </div>
                <button onclick="window.location.href='{{ route('admin.create-user') }}'" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
        <circle cx="9" cy="7" r="4"></circle>
        <path d="M19 8v6"></path>
        <path d="M22 11v6"></path>
    </svg>
    Alta de Usuario
</button>
            </div>
            <div class="card-content">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ?? 'N/A' }}</td>
                                    <td>
                                        <div class="flex gap-2">

                                         <!-- Botón de Editar -->
    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
        Editar
    </a>

                                      <!-- Botón de eliminar -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection