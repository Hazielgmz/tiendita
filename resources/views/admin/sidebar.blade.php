<!-- filepath: c:\xampp\htdocs\tiendita\resources\views\admin\sidebar.blade.php -->
<div class="sidebar">
<style>
.sidebar h2 {
    text-align: center; /* Centra el texto horizontalmente */
    font-size: 2rem; /* Tamaño más grande */
    font-weight: bold; /* Hace el texto más grueso */
    color: #ffffff; /* Cambia el color del texto a blanco */
    background-color: #1e3a8a; /* Fondo azul más oscuro */
    padding: 15px 0; /* Espaciado interno más amplio */
    border-radius: 10px; /* Bordes más redondeados */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
    margin-bottom: 25px; /* Espaciado inferior */
    text-transform: uppercase; /* Convierte el texto a mayúsculas */
    letter-spacing: 1px; /* Espaciado entre letras */
}
.menu-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    color: #ffffff;
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: background-color 0.2s;
}

.menu-link:hover {
    background-color: #1e3a8a; /* Azul más oscuro */
    border-radius: 4px;
}

.menu-link svg {
    width: 16px;
    height: 16px;
}
    </style>
        <h2>Admin Panel</h2>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.reports') }}">Reportes</a>
    <a href="{{ route('admin.users') }}">Usuarios</a>
    <a href="{{ route('admin.products') }}">Productos</a>
    <a href="{{ route('admin.waste') }}">Mermas</a>
    <a href="{{ route('admin.proveedores') }}">Proveedores</a>
<<<<<<< HEAD
 <a href="{{ route('admin.devoluciones') }}">Devoluciones</a>
  
=======
  <a href="{{ route('admin.devoluciones') }}" class="menu-link">
    Devoluciones
</a>

>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
    <a href="/punto-de-venta" class="menu-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 12l7-7v4h11v6H10v4z"></path>
    </svg>
    Volver al Punto de Venta
</a>
</div>