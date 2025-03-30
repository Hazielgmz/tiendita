@extends('admin.layout')

@section('header-title', 'Panel Principal')

@section('content')
    <div class="grid gap-6">
        <!-- Estadísticas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat Card 1 -->
            <div class="stat-card bg-white text-gray-800 shadow-md rounded-lg p-6">
                <div class="stat-card-header flex justify-between items-center">
                    <span class="stat-card-title text-lg font-bold">Ventas Totales</span>
                    <div class="stat-card-icon bg-gray-100 text-blue-500 p-3 rounded-full shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="8" cy="21" r="1"></circle>
                            <circle cx="19" cy="21" r="1"></circle>
                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                        </svg>
                    </div>
                </div>
                <div class="stat-card-value text-3xl font-bold mt-4">$45,231.89</div>
                <div class="stat-card-change text-green-500 font-medium mt-2">+20.1% del mes pasado</div>
            </div>

            <!-- Stat Card 2 -->
            <div class="stat-card bg-white text-gray-800 shadow-md rounded-lg p-6">
                <div class="stat-card-header flex justify-between items-center">
                    <span class="stat-card-title text-lg font-bold">Clientes</span>
                    <div class="stat-card-icon bg-gray-100 text-green-500 p-3 rounded-full shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                </div>
                <div class="stat-card-value text-3xl font-bold mt-4">+2,350</div>
                <div class="stat-card-change text-green-500 font-medium mt-2">+8.5% del mes pasado</div>
            </div>

            <!-- Stat Card 3 -->
            <div class="stat-card bg-white text-gray-800 shadow-md rounded-lg p-6">
                <div class="stat-card-header flex justify-between items-center">
                    <span class="stat-card-title text-lg font-bold">Productos</span>
                    <div class="stat-card-icon bg-gray-100 text-yellow-500 p-3 rounded-full shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7.5 4.27 9 5.15"></path>
                            <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>
                    </div>
                </div>
                <div class="stat-card-value text-3xl font-bold mt-4">1,245</div>
                <div class="stat-card-change text-green-500 font-medium mt-2">+12 nuevos productos</div>
            </div>

            <!-- Stat Card 4 -->
            <div class="stat-card bg-white text-gray-800 shadow-md rounded-lg p-6">
                <div class="stat-card-header flex justify-between items-center">
                    <span class="stat-card-title text-lg font-bold">Mermas</span>
                    <div class="stat-card-icon bg-gray-100 text-red-500 p-3 rounded-full shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        </svg>
                    </div>
                </div>
                <div class="stat-card-value text-3xl font-bold mt-4">$2,345</div>
                <div class="stat-card-change text-red-500 font-medium mt-2">-5% del mes pasado</div>
            </div>
        </div>

        <!-- Acciones rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Acciones Rápidas</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button class="bg-black text-white py-2 px-4 rounded-lg shadow hover:bg-gray-800">Generar Reporte</button>
                    <button class="bg-black text-white py-2 px-4 rounded-lg shadow hover:bg-gray-800">Alta de Usuario</button>
                    <button class="bg-black text-white py-2 px-4 rounded-lg shadow hover:bg-gray-800">Alta de Producto</button>
                    <button class="bg-black text-white py-2 px-4 rounded-lg shadow hover:bg-gray-800">Ver Estadísticas</button>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Resumen de Ventas</h3>
                <div class="flex items-center justify-center h-40 bg-gray-100 rounded-lg">
                    <span class="text-gray-400">[Gráfico Placeholder]</span>
                </div>
            </div>
        </div>
    </div>
@endsection