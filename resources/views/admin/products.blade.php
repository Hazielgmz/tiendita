@extends('admin.layout')

@section('header-title', 'Gestión de Productos')

@section('content')
    <div class="grid gap-6">
        <div class="card">
            <div class="card-header flex flex-row items-center justify-between">
                <div>
                    <h3 class="card-title">Gestión de Productos</h3>
                    <p class="card-description">Administra el catálogo de productos</p>
                </div>
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    Alta de Producto
                </button>
            </div>
            <div class="card-content">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->codigo_barras }}</td>
                                    <td>{{ $product->nombre_producto }}</td>
                                    <td>${{ $product->precio_unitario }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <!-- Botón de editar sin funcionalidad -->
                                            <button class="btn btn-outline">Editar</button>
                                            
                                            <!-- Botón de eliminar -->
                                            <form action="{{ route('productos.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($products->isEmpty())
                                <tr>
                                    <td colspan="5">No hay productos registrados.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
