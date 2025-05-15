@extends('admin.layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/reports.css') }}">
@endpush

@section('header-title', 'Reportes')

@section('content')
    <div class="grid gap-6">
        <!-- Título principal -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold mb-4">Reportes del Sistema</h3>
            <p class="text-gray-600">Genera y visualiza reportes detallados sobre las operaciones del sistema.</p>
        </div>

        <!-- Opciones de reportes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Reporte de Ventas -->
            <div class="card bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                <div class="card-header flex items-center gap-4">
                    <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3h18v18H3z"></path>
                            <path d="M8 21V13h8v8"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Reporte de Ventas</h4>
                </div>
                <p class="text-gray-600 mt-2">Consulta las ventas realizadas en un período específico.</p>
                <button class="btn btn-primary mt-4 w-full">Generar Reporte</button>
            </div>

            <!-- Reporte de Usuarios -->
            <div class="card bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                <div class="card-header flex items-center gap-4">
                    <div class="bg-green-100 text-green-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M16 16v-2a4 4 0 0 0-8 0v2"></path>
                            <circle cx="12" cy="8" r="2"></circle>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Reporte de Usuarios</h4>
                </div>
                <p class="text-gray-600 mt-2">Obtén información sobre los usuarios registrados.</p>
                <button class="btn btn-primary mt-4 w-full">Generar Reporte</button>
            </div>

            <!-- Reporte de Inventario -->
            <div class="card bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                <div class="card-header flex items-center gap-4">
                    <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3h18v18H3z"></path>
                            <path d="M8 21V13h8v8"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Reporte de Inventario</h4>
                </div>
                <p class="text-gray-600 mt-2">Consulta el estado actual del inventario.</p>
                <a href="{{ route('admin.reports.inventory') }}" class="btn btn-primary mt-4 w-full">Generar Reporte</a>
            </div>

            <!-- Reporte de Mermas -->
            <div class="card bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
                <div class="card-header flex items-center gap-4">
                    <div class="bg-red-100 text-red-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold">Reporte de Mermas</h4>
                </div>
                <p class="text-gray-600 mt-2">Analiza las pérdidas y mermas registradas.</p>
                <button class="btn btn-primary mt-4 w-full">Generar Reporte</button>
            </div>
        </div>
    </div>
@endsection