{{-- resources/views/admin/proveedores/index.blade.php --}}
@extends('admin.layout')

@section('title', 'Gestión de Proveedores')
@section('header-title', 'Gestión de Proveedores')

@section('content')
    <div class="card">
        <div class="card-header flex items-center justify-between">
            <div>
                <h3 class="card-title">Gestión de Proveedores</h3>
                <p class="card-description">Administra el catálogo de proveedores</p>
            </div>
            <div class="card-actions">
                <button 
                    onclick="window.location.href='{{ route('admin.proveedores.create') }}'" 
                    class="btn btn-primary"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Agregar Proveedor
                </button>
            </div>
        </div>

        <div class="card-content">
            <div class="table-container">
                <div class="max-h-[600px] overflow-y-auto">
                    <table class="table w-full">
                        <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Dirección</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Teléfono</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($proveedores as $prov)
                                <tr class="even:bg-gray-50">
                                    <td class="px-4 py-2">{{ $prov->nombre }}</td>
                                    <td class="px-4 py-2">{{ $prov->direccion }}</td>
                                    <td class="px-4 py-2">{{ $prov->email }}</td>
                                    <td class="px-4 py-2">{{ $prov->telefono }}</td>
                                    <td class="px-4 py-2 flex gap-2">
                                        <a 
                                            href="{{ route('admin.proveedores.edit', $prov->id) }}" 
                                            class="btn btn-primary btn-sm"
                                        >
                                            Editar
                                        </a>
                                        <form 
                                            action="{{ route('admin.proveedores.destroy', $prov->id) }}" 
                                            method="POST" 
                                            onsubmit="return confirm('¿Estás seguro de eliminar al proveedor {{ $prov->nombre }}?');"
                                            class="inline"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        No hay proveedores registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-container {
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            overflow: hidden;
        }
        .table-container .overflow-y-auto {
            max-height: 600px;
            overflow-y: auto;
        }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            text-align: left;
        }
        .table th {
            background-color: #f8fafc;
            position: sticky; top: 0; z-index: 10;
            font-size: 0.875rem; font-weight: 600;
            text-transform: uppercase; color: var(--text-secondary);
        }
        .table tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.02);
        }
        .table tr:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .table-container {
                overflow-x: auto;
            }
        }
    </style>
@endsection
