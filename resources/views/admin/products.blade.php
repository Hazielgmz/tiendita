<!-- resources/views/admin/products.blade.php -->
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
                            <tr>
                                <td>PRD-0001</td>
                                <td>Producto 1</td>
                                <td>$10.99</td>
                                <td>15</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button class="btn btn-outline">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>PRD-0002</td>
                                <td>Producto 2</td>
                                <td>$21.98</td>
                                <td>30</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button class="btn btn-outline">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>PRD-0003</td>
                                <td>Producto 3</td>
                                <td>$32.97</td>
                                <td>45</td>
                                <td>
                                    <div class="flex gap-2">
                                        <button class="btn btn-outline">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection