<?php
// Configuración básica
date_default_timezone_set('America/Mexico_City');

// Determinar la sección activa
$activeSection = isset($_GET['section']) ? $_GET['section'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        :root {
            --primary: #3b82f6;
            --primary-hover: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --muted: #94a3b8;
            --border: #e2e8f0;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar mejorado */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: white;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-header svg {
            color: var(--primary);
        }

        .sidebar-brand {
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .sidebar-content {
            flex: 1;
            padding: 1rem 0;
            overflow-y: auto;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu-item {
            margin: 0.25rem 1rem;
        }

        .sidebar-menu-button {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-menu-button:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .sidebar-menu-button.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .sidebar-menu-button svg {
            margin-right: 0.75rem;
            width: 1.25rem;
            height: 1.25rem;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-footer button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .sidebar-footer button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-footer button svg {
            margin-right: 0.5rem;
        }

        /* Main content mejorado */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8fafc;
        }

        .header {
            height: 70px;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .content {
            flex: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        /* Cards mejoradas */
        .card {
            background-color: white;
            border-radius: 0.75rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--dark);
        }

        .card-description {
            color: var(--muted);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .card-content {
            padding: 1.5rem;
        }

        /* Grid system */
        .grid {
            display: grid;
            gap: 1.5rem;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        /* Stats cards */
        .stat-card {
            padding: 1.5rem;
            border-radius: 0.75rem;
            background: white;
            box-shadow: var(--card-shadow);
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-card-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-card-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .stat-card-icon.primary {
            background-color: var(--primary);
        }

        .stat-card-icon.success {
            background-color: var(--success);
        }

        .stat-card-icon.warning {
            background-color: var(--warning);
        }

        .stat-card-icon.danger {
            background-color: var(--danger);
        }

        .stat-card-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .stat-card-change {
            font-size: 0.875rem;
            display: flex;
            align-items: center;
        }

        .stat-card-change.positive {
            color: var(--success);
        }

        .stat-card-change.negative {
            color: var(--danger);
        }

        /* Botones mejorados */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            font-size: 0.875rem;
        }

        .btn svg {
            margin-right: 0.5rem;
            width: 1rem;
            height: 1rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: #f1f5f9;
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        /* Tablas mejoradas */
        .table-container {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 600px;
        }

        .table thead th {
            background-color: #f8fafc;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 1px solid var(--border);
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Quick actions */
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
            padding: 1.5rem 1rem;
            border-radius: 0.75rem;
            background-color: white;
            border: 1px solid var(--border);
            transition: all 0.2s ease;
            cursor: pointer;
            text-align: center;
        }

        .quick-action-btn:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }

        .quick-action-btn svg {
            width: 2rem;
            height: 2rem;
            margin-bottom: 0.75rem;
            color: var(--primary);
        }

        /* Gráfico placeholder */
        .chart-placeholder {
            height: 300px;
            background-color: white;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed var(--border);
            color: var(--muted);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }
            .sidebar-header span, 
            .sidebar-menu-button span,
            .sidebar-footer button span {
                display: none;
            }
            .sidebar-menu-button {
                justify-content: center;
                padding: 0.75rem;
            }
            .sidebar-menu-button svg {
                margin-right: 0;
            }
        }

        @media (max-width: 768px) {
            .grid-cols-4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            .content {
                padding: 1rem;
            }
        }

        @media (max-width: 640px) {
            .grid-cols-2, 
            .grid-cols-3,
            .grid-cols-4 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
            .quick-actions {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar mejorado -->
        <div class="sidebar">
            <div class="sidebar-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="8" cy="21" r="1"></circle>
                    <circle cx="19" cy="21" r="1"></circle>
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                </svg>
                <a href="#" class="sidebar-brand">Admin Panel</a>
            </div>
            <div class="sidebar-content">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="?section=dashboard" class="sidebar-menu-button <?= $activeSection === 'dashboard' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="?section=reports" class="sidebar-menu-button <?= $activeSection === 'reports' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                            </svg>
                            <span>Reportes</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="?section=users" class="sidebar-menu-button <?= $activeSection === 'users' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="?section=products" class="sidebar-menu-button <?= $activeSection === 'products' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m7.5 4.27 9 5.15"></path>
                                <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <path d="m3.3 7 8.7 5 8.7-5"></path>
                                <path d="M12 22V12"></path>
                            </svg>
                            <span>Productos</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="?section=waste" class="sidebar-menu-button <?= $activeSection === 'waste' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            </svg>
                            <span>Mermas</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="?section=statistics" class="sidebar-menu-button <?= $activeSection === 'statistics' ? 'active' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" x2="18" y1="20" y2="10"></line>
                                <line x1="12" x2="12" y1="20" y2="4"></line>
                                <line x1="6" x2="6" y1="20" y2="14"></line>
                            </svg>
                            <span>Estadísticas</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-footer">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <span>Configuración</span>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header class="header">
                <button class="md:hidden mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>
                <h1 class="header-title">
                    <?php
                    switch($activeSection) {
                        case 'dashboard': echo "Panel Principal"; break;
                        case 'reports': echo "Reportes"; break;
                        case 'users': echo "Gestión de Usuarios"; break;
                        case 'products': echo "Gestión de Productos"; break;
                        case 'waste': echo "Control de Mermas"; break;
                        case 'statistics': echo "Estadísticas de Venta"; break;
                        default: echo "Panel Principal";
                    }
                    ?>
                </h1>
            </header>
            <main class="content">
                <?php
                if ($activeSection === 'dashboard') {
                    echo '<div class="grid gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Stat Card 1 -->
                            <div class="stat-card">
                                <div class="stat-card-header">
                                    <span class="stat-card-title">Ventas Totales</span>
                                    <div class="stat-card-icon primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="8" cy="21" r="1"></circle>
                                            <circle cx="19" cy="21" r="1"></circle>
                                            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="stat-card-value">$45,231.89</div>
                                <div class="stat-card-change positive">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>
                                    +20.1% del mes pasado
                                </div>
                            </div>
                            
                            <!-- Stat Card 2 -->
                            <div class="stat-card">
                                <div class="stat-card-header">
                                    <span class="stat-card-title">Clientes</span>
                                    <div class="stat-card-icon success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="stat-card-value">+2,350</div>
                                <div class="stat-card-change positive">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>
                                    +8.5% del mes pasado
                                </div>
                            </div>
                            
                            <!-- Stat Card 3 -->
                            <div class="stat-card">
                                <div class="stat-card-header">
                                    <span class="stat-card-title">Productos</span>
                                    <div class="stat-card-icon warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m7.5 4.27 9 5.15"></path>
                                            <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                                            <path d="M12 22V12"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="stat-card-value">1,245</div>
                                <div class="stat-card-change positive">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                        <polyline points="16 7 22 7 22 13"></polyline>
                                    </svg>
                                    +12 nuevos productos
                                </div>
                            </div>
                            
                            <!-- Stat Card 4 -->
                            <div class="stat-card">
                                <div class="stat-card-header">
                                    <span class="stat-card-title">Mermas</span>
                                    <div class="stat-card-icon danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="stat-card-value">$2,345</div>
                                <div class="stat-card-change negative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                        <polyline points="16 17 22 17 22 11"></polyline>
                                    </svg>
                                    -5% del mes pasado
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Acciones Rápidas</h3>
                            </div>
                            <div class="card-content">
                                <div class="quick-actions">
                                    <div class="quick-action-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg>
                                        <span>Generar Reporte</span>
                                    </div>
                                    <div class="quick-action-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M19 8v6"></path>
                                            <path d="M22 11v6"></path>
                                        </svg>
                                        <span>Alta de Usuario</span>
                                    </div>
                                    <div class="quick-action-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                        <span>Alta de Producto</span>
                                    </div>
                                    <div class="quick-action-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 3v18h18"></path>
                                            <path d="M18 17V9"></path>
                                            <path d="M13 17V5"></path>
                                            <path d="M8 17v-3"></path>
                                        </svg>
                                        <span>Ver Estadísticas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sales Summary -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Resumen de Ventas</h3>
                                <p class="card-description">Ventas de los últimos 7 días</p>
                            </div>
                            <div class="card-content">
                                <div class="chart-placeholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-12 w-12 text-muted-foreground">
                                        <line x1="18" x2="18" y1="20" y2="10"></line>
                                        <line x1="12" x2="12" y1="20" y2="4"></line>
                                        <line x1="6" x2="6" y1="20" y2="14"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>';
                } elseif ($activeSection === 'reports') {
                    echo '<div class="grid gap-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Reportes</h3>
                                <p class="card-description">Genera y visualiza reportes del sistema</p>
                            </div>
                            <div class="card-content grid gap-4">
                                <button class="btn btn-outline justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                    Reporte de Ventas
                                </button>
                                <button class="btn btn-outline justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    Reporte de Usuarios
                                </button>
                                <button class="btn btn-outline justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m7.5 4.27 9 5.15"></path>
                                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                        <path d="m3.3 7 8.7 5 8.7-5"></path>
                                        <path d="M12 22V12"></path>
                                    </svg>
                                    Reporte de Inventario
                                </button>
                                <button class="btn btn-outline justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    </svg>
                                    Reporte de Mermas
                                </button>
                            </div>
                        </div>
                    </div>';
                } elseif ($activeSection === 'users') {
                    echo '<div class="grid gap-6">
                        <div class="card">
                            <div class="card-header flex flex-row items-center justify-between">
                                <div>
                                    <h3 class="card-title">Gestión de Usuarios</h3>
                                    <p class="card-description">Administra los usuarios del sistema</p>
                                </div>
                                <button class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M19 8v6"></path>
                                        <path d="M22 11v6"></path>
                                    </svg>
                                    Alta de Usuario
                                </button>
                            </div>
                            <div class="card-content">
                                <div class="table-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Usuario 1</td>
                                                <td>usuario1@ejemplo.com</td>
                                                <td>Administrador</td>
                                                <td>
                                                    <div class="flex gap-2">
                                                        <button class="btn btn-outline">Editar</button>
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Usuario 2</td>
                                                <td>usuario2@ejemplo.com</td>
                                                <td>Vendedor</td>
                                                <td>
                                                    <div class="flex gap-2">
                                                        <button class="btn btn-outline">Editar</button>
                                                        <button class="btn btn-danger">Eliminar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Usuario 3</td>
                                                <td>usuario3@ejemplo.com</td>
                                                <td>Administrador</td>
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
                    </div>';
                } elseif ($activeSection === 'products') {
                    echo '<div class="grid gap-6">
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
                    </div>';
                } elseif ($activeSection === 'waste') {
                    echo '<div class="grid gap-6">
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
                    </div>';
                } elseif ($activeSection === 'statistics') {
                    echo '<div class="grid gap-6">
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
                                                <button class="btn btn-outline">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" x2="16" y1="2" y2="6"></line>
                                                        <line x1="8" x2="8" y1="2" y2="6"></line>
                                                        <line x1="3" x2="21" y1="10" y2="10"></line>
                                                    </svg>
                                                    Selecciona una fecha
                                                </button>
                                                <button class="btn btn-outline">Hoy</button>
                                            </div>
                                        </div>
                                        <div class="flex-1 w-full md:w-auto">
                                            <div class="relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <path d="m21 21-4.3-4.3"></path>
                                                </svg>
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
                                    <div class="chart-placeholder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-16 w-16 text-muted-foreground">
                                            <line x1="18" x2="18" y1="20" y2="10"></line>
                                            <line x1="12" x2="12" y1="20" y2="4"></line>
                                            <line x1="6" x2="6" y1="20" y2="14"></line>
                                        </svg>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                        <div class="card">
                                            <div class="card-header pb-2">
                                                <h3 class="text-sm">Ventas Diarias</h3>
                                            </div>
                                            <div class="card-content">
                                                <div class="text-2xl font-bold">$1,245.89</div>
                                                <p class="text-xs text-muted-foreground">+5.2% del día anterior</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header pb-2">
                                                <h3 class="text-sm">Ventas Semanales</h3>
                                            </div>
                                            <div class="card-content">
                                                <div class="text-2xl font-bold">$8,942.50</div>
                                                <p class="text-xs text-muted-foreground">+12.5% de la semana anterior</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header pb-2">
                                                <h3 class="text-sm">Ventas Mensuales</h3>
                                            </div>
                                            <div class="card-content">
                                                <div class="text-2xl font-bold">$45,231.89</div>
                                                <p class="text-xs text-muted-foreground">+20.1% del mes anterior</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </main>
        </div>
    </div>
</body>
</html>