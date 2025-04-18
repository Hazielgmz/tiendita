<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\POSMenuController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

// Rutas para los controladores 
Route::resource('productos', ProductoController::class);
Route::resource('users', UserController::class);

// Ruta para mostrar el formulario de login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para manejar la solicitud de login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta protegida (solo accesible para usuarios autenticados)
Route::get('/POSMenu', function () {
    return view('POSMenu');
})->middleware('auth');

Route::get('/POSMenu', [POSMenuController::class, 'index']);
Route::post('/POSMenu/search', [POSMenuController::class, 'searchProductByBarcode']);
Route::post('/POSMenu/continue', [POSMenuController::class, 'continueSale']);
Route::get('/ventas', [POSMenuController::class, 'index'])->name('ventas.index');
Route::post('/ventas', [POSMenuController::class, 'store'])->name('ventas.store');

// Rutas para el panel de administración
Route::get('/admin-dashboard', [AdminPanelController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
Route::get('/admin/usuarios', [AdminPanelController::class, 'usuarios'])->name('admin.users');
Route::get('/admin/productos', [AdminPanelController::class, 'productos'])->name('admin.products');
Route::get('/admin/proveedores', [AdminPanelController::class, 'proveedores'])->name('admin.proveedores');
Route::get('/admin/ventas', [AdminPanelController::class, 'ventas'])->name('admin.ventas');
Route::get('/admin/mermas', [AdminPanelController::class, 'mermas'])->name('admin.waste');
Route::get('/admin/configuracion', [AdminPanelController::class, 'configuracion'])->name('admin.configuracion');
Route::get('/admin/estadisticas', [AdminPanelController::class, 'estadisticas'])->name('admin.statistics');

// Ruta de reportes
Route::view('/admin/reportes', 'Reportes')->name('admin.reports');
Route::get('/admin/reportes/ventas', [AdminPanelController::class, 'reporteVentas'])->name('admin.reports.ventas');
Route::get('/admin/reportes/mermas', [AdminPanelController::class, 'reporteMermas'])->name('admin.reports.mermas');
Route::get('/admin/reportes/usuarios', [AdminPanelController::class, 'reporteUsuarios'])->name('admin.reports.usuarios');
Route::get('/admin/reportes/proveedores', [AdminPanelController::class, 'reporteProveedores'])->name('admin.reports.proveedores');
Route::get('/admin/reportes/ventas/generar', [AdminPanelController::class, 'generarReporteVentas'])->name('admin.reports.ventas.generar');
Route::get('/admin/reportes/mermas/generar', [AdminPanelController::class, 'generarReporteMermas'])->name('admin.reports.mermas.generar');
Route::get('/admin/reportes/usuarios/generar', [AdminPanelController::class, 'generarReporteUsuarios'])->name('admin.reports.usuarios.generar');


// Ruta para mostrar la interfaz de "Alta de Usuario"
Route::get('/admin/create-user', function () {
    return view('admin.create-user');
})->name('admin.create-user');


// Ruta para mostrar la interfaz de edición de un usuario
Route::get('/admin/users/{id}/edit', function ($id) {
    return view('admin.edit-user', ['id' => $id]);
})->name('admin.users.edit');


// Ruta para mostrar la interfaz de "Alta de Producto"
Route::get('/admin/create-product', function () {
    return view('admin.create-product');
})->name('admin.create-product');


// Ruta para mostrar la interfaz de edición de un producto
Route::get('/admin/products/{id}/edit', function ($id) {
    return view('admin.edit-product', ['id' => $id]);
})->name('productos.edit');


// Ruta para mostrar la interfaz de "Registrar Merma"
Route::get('/admin/mermas/create', function () {
    return view('admin.create-merma');
})->name('admin.mermas.create');


Route::get('/proveedores', function () {
    return view('admin.proveedores');
})->name('proveedores.index');


// Ruta para mostrar la interfaz de "Punto de Venta"
Route::get('/punto-de-venta', function () {
    $productos = Producto::all(); // Obtiene todos los productos de la base de datos
    return view('POSMenu', compact('productos')); // Envía la variable a la vista
})->name('punto-de-venta');

