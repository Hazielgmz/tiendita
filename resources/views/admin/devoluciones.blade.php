@extends('admin.layout')

@section('title', 'Gestión de Devoluciones')
@section('header-title', 'Gestión de Devoluciones')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Gestión de Devoluciones</h3>
                <p class="card-description">Administra las ventas y procesa sus devoluciones</p>
            </div>
        </div>

        <div class="card-content">
            <div class="table-container">
                @if($devoluciones->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"></path>
                                <line x1="16" y1="5" x2="22" y2="5"></line>
                                <line x1="19" y1="2" x2="19" y2="8"></line>
                                <circle cx="9" cy="9" r="2"></circle>
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                            </svg>
                        </div>
                        <h3 class="empty-title">No hay ventas para devolver</h3>
                        <p class="empty-description">Cuando haya ventas disponibles para devolución, aparecerán aquí.</p>
                    </div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devoluciones as $venta)
                                <tr>
                                    <td>
                                        <span class="id-badge">{{ $venta->id }}</span>
                                    </td>
                                    <td>
                                        <div class="cell-content">
                                            <span class="cell-main">{{ $venta->user->name ?? '—' }}</span>
                                            @if($venta->user && $venta->user->email)
                                                <span class="cell-secondary">{{ $venta->user->email }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-content">
                                            <span class="cell-main">{{ $venta->fecha->format('d/m/Y') }}</span>
                                            <span class="cell-secondary">{{ $venta->fecha->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="total-badge">${{ number_format($venta->total, 2) }}</span>
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            <form
                                                action="{{ route('admin.devoluciones.devolver', $venta->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Estás seguro que deseas devolver la venta #{{ $venta->id }}?');"
                                                class="devolver-form">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-warning btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn-icon">
                                                        <path d="M3 7v6h6"></path>
                                                        <path d="M21 17a9 9 0 0 0-9-9 9 9 0 0 0-6 2.3L3 13"></path>
                                                    </svg>
                                                    Devolver
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
        /* Estilos mejorados para la página de devoluciones */
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
        
        .cell-content {
            display: flex;
            flex-direction: column;
        }
        
        .cell-main {
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .cell-secondary {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }
        
        .id-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2rem;
            height: 1.5rem;
            padding: 0 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-primary);
            background-color: var(--badge-bg, rgba(0, 0, 0, 0.05));
            border-radius: 0.375rem;
        }
        
        .total-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--success);
            background-color: var(--success-light, rgba(16, 185, 129, 0.1));
            border-radius: 0.375rem;
        }
        
        .actions-cell {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .devolver-form {
            margin: 0;
        }
        
        .btn-warning {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--warning);
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .btn-warning:hover {
            background-color: var(--warning-hover, #e69009);
            transform: translateY(-1px);
        }
        
        .btn-warning:active {
            transform: translateY(0);
        }
        
        .btn-icon {
            flex-shrink: 0;
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
            background-color: var(--warning-light, rgba(245, 158, 11, 0.1));
            color: var(--warning);
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
            
            .actions-cell {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
            
            .btn-sm {
                width: 100%;
                justify-content: center;
            }
            
            .table th, 
            .table td {
                padding: 0.5rem;
            }
        }
    </style>
@endsection