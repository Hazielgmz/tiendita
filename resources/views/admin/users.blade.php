@extends('admin.layout')

@section('title', 'Gestión de Usuarios')
@section('header-title', 'Gestión de Usuarios')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Gestión de Usuarios</h3>
                <p class="card-description">Administra los usuarios del sistema</p>
            </div>
            <div class="card-actions">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M19 8v6"></path>
                        <path d="M22 11h-6"></path>
                    </svg>
                    Alta de Usuario
                </a>
            </div>
        </div>

        <div class="card-content">
            <div class="table-container">
                @if($users->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3 class="empty-title">No hay usuarios registrados</h3>
                        <p class="empty-description">Crea un nuevo usuario para comenzar a gestionar el sistema.</p>
                    </div>
                @else
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
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                            </div>
                                            <span class="user-name">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="email-container">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="email-icon">
                                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                            </svg>
                                            <span class="email-text">{{ $user->email }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="role-badge {{ strtolower($user->role ?? 'user') }}">
                                            {{ $user->role ?? 'Usuario' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn-icon">
                                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Seguro de eliminar este usuario?')" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn-icon">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Estilos mejorados para la página de usuarios */
        .card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Tabla mejorada */
        .table-container {
            overflow-x: auto;
            max-height: 600px;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            background-color: var(--card-bg);
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th {
            background-color: var(--table-header-bg, #f8fafc);
            position: sticky;
            top: 0;
            z-index: 10;
            padding: 0.75rem 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border-color);
            text-align: left;
        }
        
        .table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 0.875rem;
        }
        
        .table tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        .table tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        /* Información de usuario */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .user-avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .user-name {
            font-weight: 500;
            color: var(--text-primary);
        }
        
        /* Email */
        .email-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .email-icon {
            color: var(--text-secondary);
            flex-shrink: 0;
        }
        
        .email-text {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        /* Badges de rol */
        .role-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 0.375rem;
        }
        
        .role-badge.admin {
            color: var(--primary);
            background-color: var(--primary-light);
        }
        
        .role-badge.user {
            color: var(--info, #3b82f6);
            background-color: var(--info-light, rgba(59, 130, 246, 0.1));
        }
        
        .role-badge.editor {
            color: var(--success);
            background-color: var(--success-light);
        }
        
        /* Botones de acción */
        .actions-cell {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .btn-sm {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.625rem;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
            border: none;
        }
        
        .btn-danger:hover {
            background-color: var(--danger-hover);
            transform: translateY(-1px);
        }
        
        .btn-icon {
            flex-shrink: 0;
        }
        
        .delete-form {
            margin: 0;
        }
        
        /* Estado vacío */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
            text-align: center;
        }
        
        .empty-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        
        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 0.5rem 0;
        }
        
        .empty-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin: 0;
            max-width: 400px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .card-actions {
                width: 100%;
            }
            
            .card-actions .btn {
                width: 100%;
                justify-content: center;
            }
            
            .actions-cell {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
                width: 100%;
            }
            
            .actions-cell .btn-sm,
            .actions-cell form {
                width: 100%;
            }
            
            .actions-cell .btn-sm {
                justify-content: center;
            }
            
            .table th, 
            .table td {
                padding: 0.5rem;
            }
        }
    </style>
@endsection