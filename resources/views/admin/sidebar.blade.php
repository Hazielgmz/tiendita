<!-- filepath: c:\xampp\htdocs\tiendita\resources\views\admin\sidebar.blade.php -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.reports') }}">Reportes</a>
    <a href="{{ route('admin.users') }}">Usuarios</a>
    <a href="{{ route('admin.products') }}">Productos</a>
    <a href="{{ route('admin.waste') }}">Mermas</a>
    <a href="{{ route('admin.statistics') }}">Estadísticas</a>
</div>