<!-- resources/views/admin/header.blade.php -->
<header class="header">
    <h1 class="header-title">
        @switch($activeSection)
            @case('dashboard') Panel Principal @break
            @case('reports') Reportes @break
            @case('users') Gestión de Usuarios @break
            @case('products') Gestión de Productos @break
            @case('waste') Control de Mermas @break
            @case('statistics') Estadísticas de Venta @break
            @default Panel Principal
        @endswitch
    </h1>
</header>