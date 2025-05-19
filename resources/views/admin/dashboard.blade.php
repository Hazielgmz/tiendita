@extends('admin.layout')

@section('title', 'Panel Principal')
@section('header-title', 'Panel Principal')

@section('content')
    <div class="dashboard">
        <!-- Resumen de estadísticas -->
        <div class="stats-grid">
            <!-- Ventas Totales -->
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Ventas Totales del día</h3>
                        <p class="stat-card-value">${{ number_format($totalVentas, 2) }}</p>
                        <div class="stat-card-trend stat-positive">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                <polyline points="16 7 22 7 22 13"></polyline>
                            </svg>
                            <span></span>
                        </div>
                    </div>
                    <div class="stat-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Transacciones -->
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Transacciones del día</h3>
                        <p class="stat-card-value">{{ number_format($transacciones) }}</p>
                        <div class="stat-card-trend stat-positive">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                <polyline points="16 7 22 7 22 13"></polyline>
                            </svg>
                            <span></span>
                        </div>
                    </div>
                    <div class="stat-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                            <line x1="2" x2="22" y1="10" y2="10"></line>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Productos</h3>
                        <p class="stat-card-value">{{ number_format($productos) }}</p>
                        <div class="stat-card-trend stat-neutral">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" x2="19" y1="12" y2="12"></line>
                            </svg>
                            <span>Sin cambios</span>
                        </div>
                    </div>
                    <div class="stat-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7.5 4.27 9 5.15"></path>
                            <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido principal del dashboard -->
        <div class="dashboard-main">
            <!-- Columna izquierda -->
            <div class="dashboard-column main-column">
                <!-- Gráfico de Ventas -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-content">
                            <h3 class="card-title">Ganancias del Mes</h3>
                            <p class="card-description">{{ $nombreMes }} {{ date('Y') }}</p>
                        </div>
                        <div class="card-actions">
                            <span class="total-month">Total: ${{ number_format($totalMes, 2) }}</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="chart-container">
                            <div class="chart-legend">
                                <div class="legend-item">
                                    <span class="legend-color" style="background-color: var(--primary)"></span>
                                    <span>Ganancias</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color" style="background-color: rgba(var(--primary-rgb), 0.3)"></span>
                                    <span>Promedio diario</span>
                                </div>
                            </div>
                            
                            @php
                                // Calcular el valor máximo para la escala del gráfico
                                $maxValue = $data->max() > 0 ? $data->max() : 1000;
                                // Redondear hacia arriba al siguiente múltiplo de 250 para tener valores "limpios"
                                $maxValue = ceil($maxValue / 250) * 250;
                                
                                // Calcular los valores para el eje Y
                                $yAxisValues = [
                                    $maxValue,
                                    $maxValue * 0.75,
                                    $maxValue * 0.5,
                                    $maxValue * 0.25,
                                    0
                                ];
                                
                                // Calcular el promedio diario
                                $promedioDiario = $data->filter()->avg() ?: 0;
                                $promedioPercentage = ($promedioDiario / $maxValue) * 100;
                            @endphp
                            
                            <div class="chart-grid">
                                <div class="chart-grid-line"></div>
                                <div class="chart-grid-line"></div>
                                <div class="chart-grid-line"></div>
                                <div class="chart-grid-line"></div>
                            </div>
                            
                            <div class="chart-values">
                                @foreach($yAxisValues as $value)
                                    <span>${{ number_format($value, 0) }}</span>
                                @endforeach
                            </div>
                            
                            <div class="chart-mock">
                                @foreach($data as $index => $value)
                                    @php
                                        $heightPercentage = ($value / $maxValue) * 100;
                                        $label = isset($labels[$index]) ? $labels[$index] : '';
                                        $isToday = $label == date('d');
                                    @endphp
                                    <div class="chart-column">
                                        <div class="chart-bar-wrapper">
                                            <div class="chart-bar {{ $isToday ? 'chart-bar-today' : '' }}" style="height: {{ $heightPercentage }}%">
                                                <span class="chart-bar-value">${{ number_format($value, 0) }}</span>
                                            </div>
                                            <div class="chart-target" style="bottom: {{ $promedioPercentage }}%"></div>
                                        </div>
                                        <span class="chart-label {{ $isToday ? 'chart-label-today' : '' }}">{{ $label }}</span>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="chart-trend-line"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.dashboard') }}" class="card-link">Ver reporte completo →</a>
                    </div>
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="dashboard-column side-column">
                <!-- Acciones Rápidas -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-content">
                            <h3 class="card-title">Acciones Rápidas</h3>
                            <p class="card-description">Accesos directos a funciones comunes</p>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="quick-actions">
                            <a href="{{ route('admin.create-product') }}" class="quick-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                                <span>Nuevo Producto</span>
                            </a>
                            <a href="{{ route('admin.reports') }}" class="quick-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                    <line x1="3" x2="21" y1="9" y2="9"></line>
                                    <line x1="9" x2="9" y1="21" y2="9"></line>
                                </svg>
                                <span>Generar Reporte</span>
                            </a>
                            <a href="/punto-de-venta" class="quick-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span>Punto de Venta</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Dashboard Styles */
        .dashboard {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
        }

        @media (min-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Stat Cards */
        .stat-card {
            background-color: var(--card-bg);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .stat-card-content {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            height: 100%;
        }

        .stat-card-info {
            flex: 1;
        }

        .stat-card-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 0.75rem;
        }

        .stat-card-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .stat-card-trend {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .stat-card-trend svg {
            width: 14px;
            height: 14px;
        }

        .stat-positive {
            color: var(--success);
        }

        .stat-negative {
            color: var(--danger);
        }

        .stat-neutral {
            color: var(--warning);
        }

        .stat-card-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background-color: var(--primary-light);
            color: var(--primary);
            border-radius: 0.5rem;
            flex-shrink: 0;
        }

        /* Dashboard Main Layout */
        .dashboard-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 1024px) {
            .dashboard-main {
                grid-template-columns: 2fr 1fr;
            }
        }

        .dashboard-column {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Card Styles */
        .card {
            background-color: var(--card-bg);
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header-content {
            flex: 1;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .card-description {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .card-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .total-month {
            font-size: 1rem;
            font-weight: 600;
            color: var(--success);
            background-color: rgba(16, 185, 129, 0.1);
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
        }

        .card-content {
            padding: 1.5rem;
            flex: 1;
        }

        .card-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* Chart Styles */
        .chart-container {
            height: 300px;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            position: relative;
            padding-left: 3rem;
            padding-bottom: 1.5rem;
            margin-top: 1rem;
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 2px;
        }

        .chart-grid {
            position: absolute;
            top: 0;
            left: 3rem;
            right: 0;
            bottom: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 0;
        }

        .chart-grid-line {
            width: 100%;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.05);
        }

        .chart-values {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
            padding-right: 0.5rem;
            font-size: 0.7rem;
            color: var(--text-secondary);
        }

        .chart-mock {
            flex: 1;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 0.5rem;
            position: relative;
            z-index: 1;
            padding-bottom: 0.5rem;
            height: 100%;
            overflow-x: auto;
        }

        .chart-column {
            flex: 0 0 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }

        .chart-bar-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            position: relative;
        }

        .chart-bar {
            width: 70%;
            background: linear-gradient(to top, var(--primary), #4f46e5);
            border-radius: 4px 4px 0 0;
            transition: height 0.3s ease;
            position: relative;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chart-bar-today {
            background: linear-gradient(to top, #10b981, #059669);
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.5);
        }

        .chart-bar-value {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
        }

        .chart-target {
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: rgba(var(--primary-rgb), 0.3);
            z-index: 2;
        }

        .chart-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
            text-align: center;
        }

        .chart-label-today {
            font-weight: 700;
            color: var(--success);
        }

        .chart-trend-line {
            position: absolute;
            top: 0;
            left: 3rem;
            right: 0;
            bottom: 2rem;
            pointer-events: none;
            z-index: 2;
            background-image: linear-gradient(to right, transparent, transparent),
                              linear-gradient(to right, rgba(79, 70, 229, 0.2) 0%, rgba(79, 70, 229, 0.2) 100%);
            background-size: 100% 100%, 100% 1px;
            background-position: 0 0, 0 65%;
            background-repeat: no-repeat;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            border-radius: 0.375rem;
            background-color: rgba(0, 0, 0, 0.02);
            color: var(--text-primary);
            text-decoration: none;
            transition: all 0.2s;
        }

        .quick-action-btn:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .quick-action-btn svg {
            width: 24px;
            height: 24px;
        }

        .quick-action-btn span {
            font-size: 0.75rem;
            font-weight: 500;
            text-align: center;
        }

        /* Links */
        .card-link {
            color: var(--primary);
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
        }

        .card-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection