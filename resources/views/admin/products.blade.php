@extends('admin.layout')

@section('title', 'Gestión de Productos')
@section('header-title', 'Gestión de Productos')

@section('content')
    <div class="products-container">
        <div class="card">
            {{-- Encabezado --}}
            <div class="card-header">
                <div>
                    <h3 class="card-title">Gestión de Productos</h3>
                    <p class="card-description">Administra el catálogo de productos</p>
                </div>
                <div class="card-actions">
                    <a href="{{ route('admin.create-product') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                        Alta de Producto
                    </a>
                </div>
            </div>

            {{-- Buscador por código de barras --}}
            <div class="card-content">
                <form method="GET" class="search-form">
                    <div class="search-container">
                        <div class="search-input-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                                <path d="M17 17h-1l-4-4"></path>
                                <path d="M3 11h2a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H3v10a2 2 0 0 0 2 2h2"></path>
                                <rect width="6" height="10" x="13" y="5" rx="1"></rect>
                            </svg>
                            <input
                                type="text"
                                name="q"
                                value="{{ $q ?? '' }}"
                                placeholder="Buscar por código de barras..."
                                class="search-input"
                            >
                        </div>
                        <button type="submit" class="btn btn-primary search-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                            Buscar
                        </button>
                    </div>
                </form>

                {{-- Tabla con scroll --}}
                <div class="table-container">
                    @if($products->isEmpty())
                        <div class="empty-state">
                            <div class="empty-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.91 8.84 8.56 2.23a1.93 1.93 0 0 0-1.81 0L3.1 4.13a2.12 2.12 0 0 0-.05 3.69l12.22 6.93a2 2 0 0 0 1.94 0L21 12.51a2.12 2.12 0 0 0-.09-3.67Z"></path>
                                    <path d="m3.09 8.84 12.35-6.61a1.93 1.93 0 0 1 1.81 0l3.65 1.9a2.12 2.12 0 0 1 .1 3.69L8.73 14.75a2 2 0 0 1-1.94 0L3 12.51a2.12 2.12 0 0 1 .09-3.67Z"></path>
                                    <line x1="12" y1="22" x2="12" y2="13"></line>
                                    <path d="M20 13.5v3.37a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13.5"></path>
                                </svg>
                            </div>
                            <h3 class="empty-title">No hay productos registrados</h3>
                            <p class="empty-description">Agrega productos a tu catálogo para comenzar a gestionarlos.</p>
                        </div>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Código de barras</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="barcode-container">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="barcode-icon">
                                                    <path d="M3 5v14"></path>
                                                    <path d="M8 5v14"></path>
                                                    <path d="M12 5v14"></path>
                                                    <path d="M17 5v14"></path>
                                                    <path d="M21 5v14"></path>
                                                </svg>
                                                <span class="barcode-text">{{ $product->codigo_barras }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product-name">{{ $product->nombre_producto }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ route('productos.update', $product->id) }}"
                                                method="POST" class="product-form">
                                                @csrf
                                                @method('PATCH')
                                                <div class="input-with-icon price">
                                                    <span class="currency-symbol">$</span>
                                                    <input type="number"
                                                        name="precio_unitario"
                                                        step="0.01"
                                                        min="0"
                                                        value="{{ $product->precio_unitario }}"
                                                        class="form-input price-input"
                                                        required>
                                                </div>
                                        </td>
                                        <td>
                                                <div class="input-with-icon stock">
                                                    <input type="number"
                                                        name="stock"
                                                        min="0"
                                                        value="{{ $product->stock }}"
                                                        class="form-input stock-input"
                                                        required>
                                                    <span class="stock-label">uds.</span>
                                                </div>
                                        </td>
                                        <td class="actions-cell">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="btn-icon">
                                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                                        <polyline points="7 3 7 8 15 8"></polyline>
                                                    </svg>
                                                    Guardar
                                                </button>
                                            </form>
                                            <form action="{{ route('productos.destroy', $product->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Seguro de eliminar este producto?')"
                                                class="delete-form">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos mejorados para la página de productos */
        .products-container {
            width: 100%;
        }
        
        .card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Buscador mejorado */
        .search-form {
            margin-bottom: 1.5rem;
        }
        
        .search-container {
            display: flex;
            width: 100%; /* Ancho completo como en la versión original */
        }
        
        .search-input-wrapper {
            position: relative;
            flex: 1;
        }
        
        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            pointer-events: none;
        }
        
        .search-input {
            width: 100%;
            padding: 0.625rem 0.75rem 0.625rem 2.5rem;
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: 0.5rem 0 0 0.5rem;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: var(--input-bg);
            color: var(--text-primary);
        }
        
        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        
        .search-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 0 0.5rem 0.5rem 0;
            padding: 0.625rem 1rem;
            font-weight: 500;
        }
        
        /* Tabla mejorada */
        .table-container {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            overflow: hidden;
            max-height: 600px;
            overflow-y: auto;
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
        
        /* Código de barras */
        .barcode-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .barcode-icon {
            color: var(--text-secondary);
            flex-shrink: 0;
        }
        
        .barcode-text {
            font-family: monospace;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        /* Nombre de producto */
        .product-name {
            font-weight: 500;
            color: var(--text-primary);
        }
        
        /* Inputs mejorados */
        .input-with-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .input-with-icon.price {
            width: 120px;
        }
        
        .input-with-icon.stock {
            width: 100px;
        }
        
        .currency-symbol {
            position: absolute;
            left: 0.5rem;
            color: var(--text-secondary);
            font-weight: 500;
        }
        
        .stock-label {
            position: absolute;
            right: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.75rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: var(--input-bg);
            color: var(--text-primary);
        }
        
        .form-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }
        
        .price-input {
            padding-left: 1.5rem;
        }
        
        .stock-input {
            padding-right: 2.5rem;
            text-align: center;
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
        
        .product-form {
            margin-right: 0.5rem;
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
            
            .search-container {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .search-input {
                border-radius: 0.5rem;
                border-right: 1px solid var(--border-color);
            }
            
            .search-button {
                border-radius: 0.5rem;
                width: 100%;
                justify-content: center;
            }
            
            .actions-cell {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }
            
            .product-form {
                margin-right: 0;
                width: 100%;
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