<!-- resources/views/admin/statistics.blade.php -->
@extends('admin.layout')

@section('header-title', 'Estadísticas de Venta')

@section('content')
    <div class="grid gap-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Estadísticas de Venta</h3>
                <p class="card-description">Análisis de ventas por período</p>
            </div>
            <div class="card-content">
                <div class="grid gap-6">
                    <div class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                        <div>
                            <h3 class="text-lg font-medium mb-2">Consulta por día específico</h3>
                            <div class="flex gap-2">
                                <button class="btn btn-outline">Selecciona una fecha</button>
                                <button class="btn btn-outline">Hoy</button>
                            </div>
                        </div>
                        <div class="flex-1 w-full md:w-auto">
                            <div class="relative">
                                <input type="search" placeholder="Buscar producto..." class="pl-8 w-full px-4 py-2 border rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-lg">Ventas del día 27 de marzo de 2025</h3>
                        </div>
                        <div class="card-content">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                <div class="bg-muted/50 p-4 rounded-lg">
                                    <h4 class="text-sm font-medium text-muted-foreground mb-2">Total Vendido</h4>
                                    <p class="text-2xl font-bold">$1,245.89</p>
                                </div>
                                <div class="bg-muted/50 p-4 rounded-lg">
                                    <h4 class="text-sm font-medium text-muted-foreground mb-2">Productos Vendidos</h4>
                                    <p class="text-2xl font-bold">50</p>
                                </div>
                                <div class="bg-muted/50 p-4 rounded-lg">
                                    <h4 class="text-sm font-medium text-muted-foreground mb-2">Transacciones</h4>
                                    <p class="text-2xl font-bold">10</p>
                                </div>
                            </div>
                            <h4 class="font-medium mb-3">Productos más vendidos este día</h4>
                            <div class="table-container">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Unidades</th>
                                            <th>Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Producto A</td>
                                            <td>120</td>
                                            <td>$1,558.80</td>
                                        </tr>
                                        <tr>
                                            <td>Producto B</td>
                                            <td>95</td>
                                            <td>$1,234.05</td>
                                        </tr>
                                        <tr>
                                            <td>Producto C</td>
                                            <td>87</td>
                                            <td>$1,130.13</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection