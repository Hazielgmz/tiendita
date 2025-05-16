{{-- resources/views/admin/reports.blade.php --}}
@extends('admin.layout')

@section('title', 'Reportes')
@section('header-title', 'Reportes')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">Reportes del Sistema</h3>
                <p class="card-description">Genera y visualiza reportes detallados sobre las operaciones del sistema.</p>
            </div>
        </div>

        <div class="card-content">
            <div class="reports-list">
                <!-- Reporte de Ventas (deshabilitado) -->
                <div class="report-item">
                    <div class="report-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" 
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"></path>
                            <path d="m19 9-5 5-4-4-3 3"></path>
                        </svg>
                    </div>
                    <div class="report-info">
                        <h4 class="report-title">Reporte de Ventas</h4>
                        <p class="report-description">Consulta las ventas realizadas en un período específico.</p>
                    </div>
                    <div class="report-action">
                        <a href="#" class="btn btn-primary btn-sm opacity-50 cursor-not-allowed" tabindex="-1">
                            Generar Reporte
                        </a>
                    </div>
                </div>

                <!-- Reporte de Usuarios (deshabilitado) -->
                <div class="report-item">
                    <div class="report-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="report-info">
                        <h4 class="report-title">Reporte de Usuarios</h4>
                        <p class="report-description">Obtén información sobre los usuarios registrados.</p>
                    </div>
                    <div class="report-action">
                        <a href="#" class="btn btn-primary btn-sm opacity-50 cursor-not-allowed" tabindex="-1">
                            Generar Reporte
                        </a>
                    </div>
                </div>

                <!-- Reporte de Inventario (activo) -->
                <div class="report-item">
                    <div class="report-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m7.5 4.27 9 5.15"></path>
                            <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>
                    </div>
                    <div class="report-info">
                        <h4 class="report-title">Reporte de Inventario</h4>
                        <p class="report-description">Consulta el estado actual del inventario.</p>
                    </div>
                    <div class="report-action">
                        <a href="{{ route('admin.reports.inventory') }}" class="btn btn-primary btn-sm">
                            Generar Reporte
                        </a>
                    </div>
                </div>

                <!-- Reporte de Mermas (deshabilitado) -->
                <div class="report-item">
                    <div class="report-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        </svg>
                    </div>
                    <div class="report-info">
                        <h4 class="report-title">Reporte de Mermas</h4>
                        <p class="report-description">Analiza las pérdidas y mermas registradas.</p>
                    </div>
                    <div class="report-action">
                        <a href="#" class="btn btn-primary btn-sm opacity-50 cursor-not-allowed" tabindex="-1">
                            Generar Reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos específicos para la página de reportes */
        .reports-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .report-item {
            display: flex;
            align-items: center;
            padding: 1.25rem;
            border-radius: 0.5rem;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }
        .report-item:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .report-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            background-color: var(--primary-light);
            color: var(--primary);
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .report-info {
            flex: 1;
        }
        .report-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 0.25rem 0;
        }
        .report-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin: 0;
        }

        .report-action {
            margin-left: 1rem;
        }

        .opacity-50 {
            opacity: 0.5;
        }
        .cursor-not-allowed {
            cursor: not-allowed;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .report-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .report-action {
                margin-left: 0;
                width: 100%;
            }

            .report-action .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection
