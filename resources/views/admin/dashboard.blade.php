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
                            <span>12% más que ayer</span>
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
                            <span>8% más que ayer</span>
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

            <!-- Clientes -->
            <div class="stat-card">
                <div class="stat-card-content">
                    <div class="stat-card-info">
                        <h3 class="stat-card-title">Clientes</h3>
                        <p class="stat-card-value">{{ number_format($clientes ?? 0) }}</p>
                        <div class="stat-card-trend stat-positive">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                <polyline points="16 7 22 7 22 13"></polyline>
                            </svg>
                            <span>3 nuevos hoy</span>
                        </div>
                    </div>
                    <div class="stat-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
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
                            <h3 class="card-title">Ventas Recientes</h3>
                            <p class="card-description">Resumen de ventas de los últimos días</p>
                        </div>
                        <div class="card-actions">
                            <select class="select-period">
                                <option>Hoy</option>
                                <option>Esta semana</option>
                                <option>Este mes</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="chart-container">
                            <div class="chart-mock">
                                <div class="chart-bar" style="height: 30%"></div>
                                <div class="chart-bar" style="height: 50%"></div>
                                <div class="chart-bar" style="height: 70%"></div>
                                <div class="chart-bar" style="height: 40%"></div>
                                <div class="chart-bar" style="height: 60%"></div>
                                <div class="chart-bar" style="height: 80%"></div>
                                <div class="chart-bar" style="height: 45%"></div>
                            </div>
                            <div class="chart-labels">
                                <span>Lun</span>
                                <span>Mar</span>
                                <span>Mié</span>
                                <span>Jue</span>
                                <span>Vie</span>
                                <span>Sáb</span>
                                <span>Dom</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link">Ver reporte completo →</a>
                    </div>
                </div>

                <!-- Últimas Transacciones -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-content">
                            <h3 class="card-title">Últimas Transacciones</h3>
                            <p class="card-description">Transacciones más recientes del sistema</p>
                        </div>
                        <div class="card-actions">
                            <a href="#" class="btn-refresh">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                    <path d="M3 3v5h5"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1234</td>
                                    <td>Cliente A</td>
                                    <td>Hoy, 10:30 AM</td>
                                    <td>$125.00</td>
                                    <td><span class="status-badge status-completed">Completada</span></td>
                                </tr>
                                <tr>
                                    <td>#1233</td>
                                    <td>Cliente B</td>
                                    <td>Hoy, 9:15 AM</td>
                                    <td>$85.50</td>
                                    <td><span class="status-badge status-completed">Completada</span></td>
                                </tr>
                                <tr>
                                    <td>#1232</td>
                                    <td>Cliente C</td>
                                    <td>Ayer, 3:45 PM</td>
                                    <td>$210.75</td>
                                    <td><span class="status-badge status-pending">Pendiente</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link">Ver todas las transacciones →</a>
                    </div>
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="dashboard-column side-column">
                <!-- Productos Populares -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-content">
                            <h3 class="card-title">Productos Populares</h3>
                            <p class="card-description">Los productos más vendidos</p>
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('admin.products') }}" class="card-link">Ver todos</a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="popular-products">
                            <div class="product-item">
                                <div class="product-info">
                                    <h4 class="product-name">Producto A</h4>
                                    <p class="product-category">Categoría 1</p>
                                </div>
                                <div class="product-stats">
                                    <div class="product-sales">145 ventas</div>
                                    <div class="stock-indicator">
                                        <div class="stock-bar stock-high" style="width: 80%"></div>
                                        <span>80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-info">
                                    <h4 class="product-name">Producto B</h4>
                                    <p class="product-category">Categoría 2</p>
                                </div>
                                <div class="product-stats">
                                    <div class="product-sales">98 ventas</div>
                                    <div class="stock-indicator">
                                        <div class="stock-bar stock-medium" style="width: 45%"></div>
                                        <span>45%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-info">
                                    <h4 class="product-name">Producto C</h4>
                                    <p class="product-category">Categoría 1</p>
                                </div>
                                <div class="product-stats">
                                    <div class="product-sales">67 ventas</div>
                                    <div class="stock-indicator">
                                        <div class="stock-bar stock-low" style="width: 15%"></div>
                                        <span>15%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                            <a href="#" class="quick-action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Nuevo Cliente</span>
                            </a>
                            <a href="#" class="quick-action-btn">
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
                grid-template-columns: repeat(4, 1fr);
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
            height: 250px;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .chart-mock {
            flex: 1;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 1rem;
            padding-bottom: 0.5rem;
        }

        .chart-bar {
            flex: 1;
            background-color: var(--primary);
            border-radius: 4px 4px 0 0;
            transition: height 0.3s ease;
        }

        .chart-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Table Styles */
        .dashboard-table {
            width: 100%;
            border-collapse: collapse;
        }

        .dashboard-table th {
            text-align: left;
            font-weight: 600;
            color: var(--text-secondary);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .dashboard-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.875rem;
        }

        .dashboard-table tr:last-child td {
            border-bottom: none;
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-completed {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-pending {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        /* Product Items */
        .popular-products {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .product-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: 0.375rem;
            background-color: rgba(0, 0, 0, 0.02);
        }

        .product-info {
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 0.875rem;
            font-weight: 600;
            margin: 0;
        }

        .product-category {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin: 0;
        }

        .product-stats {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .product-sales {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Stock Indicator */
        .stock-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stock-bar {
            height: 6px;
            border-radius: 3px;
            flex: 1;
        }

        .stock-high {
            background-color: var(--success);
        }

        .stock-medium {
            background-color: var(--warning);
        }

        .stock-low {
            background-color: var(--danger);
        }

        .stock-indicator span {
            font-size: 0.75rem;
            color: var(--text-secondary);
            min-width: 32px;
            text-align: right;
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

        /* Select Period */
        .select-period {
            padding: 0.375rem 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            background-color: var(--card-bg);
            color: var(--text-primary);
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

        /* Refresh Button */
        .btn-refresh {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 0.375rem;
            background-color: rgba(0, 0, 0, 0.02);
            color: var(--text-secondary);
            transition: all 0.2s;
        }

        .btn-refresh:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }
    </style>
@endsection