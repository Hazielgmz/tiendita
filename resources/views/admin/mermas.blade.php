@extends('admin.layout')

@section('title', 'Control de Mermas')
@section('header-title', 'Control de Mermas')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Control de Mermas</h3>
                <p class="card-description">Gestiona las mermas de productos</p>
            </div>
            <div class="card-actions">
                <a href="{{ route('admin.mermas.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Registrar Merma
                </a>
            </div>
        </div>

        <div class="card-content">
            @if(session('success'))
                <div class="alert alert-success">
                    <div class="alert-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="alert-content">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="table-container">
                @if($mermas->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            </svg>
                        </div>
                        <h3 class="empty-title">No hay mermas registradas</h3>
                        <p class="empty-description">Registra una nueva merma para comenzar a llevar el control.</p>
                    </div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Motivo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mermas as $merma)
                                <tr>
                                    <td>
                                        <div class="cell-content">
                                            <span class="cell-main">{{ $merma->created_at->format('d/m/Y') }}</span>
                                            <span class="cell-secondary">{{ $merma->created_at->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cell-content">
                                            <span class="cell-main">{{ $merma->producto->nombre_producto }}</span>
                                            <span class="cell-secondary">SKU: {{ $merma->producto->sku ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="quantity-badge">{{ $merma->cantidad }}</span>
                                    </td>
                                    <td>{{ $merma->motivo }}</td>
                                    <td>
                                        <span class="value-badge">
                                            ${{ number_format($merma->producto->precio_unitario * $merma->cantidad, 2) }}
                                        </span>
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
        /* Estilos mejorados para la página de mermas */
        .card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Alerta mejorada */
        .alert {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .alert-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }
        
        .alert-content {
            flex: 1;
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
        
        .quantity-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 2rem;
            height: 1.5rem;
            padding: 0 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            background-color: var(--primary-light);
            border-radius: 0.375rem;
        }
        
        .value-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--danger);
            background-color: var(--danger-light, rgba(239, 68, 68, 0.1));
            border-radius: 0.375rem;
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
            
            .table th, 
            .table td {
                padding: 0.5rem;
            }
        }
    </style>
@endsection