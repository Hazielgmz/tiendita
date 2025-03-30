<!-- resources/views/admin/mermas.blade.php -->
@extends('admin.layout')

@section('header-title', 'Control de Mermas')

@section('content')
    <div class="grid gap-6">
        <div class="card">
            <div class="card-header flex flex-row items-center justify-between">
                <div>
                    <h3 class="card-title">Control de Mermas</h3>
                    <p class="card-description">Gestiona las mermas de productos</p>
                </div>
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    Registrar Merma
                </button>
            </div>
            <div class="card-content">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Motivo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1/03/2025</td>
                                <td>Admin 1</td>
                                <td>Producto 1</td>
                                <td>2</td>
                                <td>Caducidad</td>
                                <td>$25.50</td>
                            </tr>
                            <tr>
                                <td>2/03/2025</td>
                                <td>Admin 2</td>
                                <td>Producto 2</td>
                                <td>4</td>
                                <td>Daño</td>
                                <td>$51.00</td>
                            </tr>
                            <tr>
                                <td>3/03/2025</td>
                                <td>Admin 3</td>
                                <td>Producto 3</td>
                                <td>6</td>
                                <td>Caducidad</td>
                                <td>$76.50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection