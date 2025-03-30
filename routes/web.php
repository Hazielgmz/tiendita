<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\POSMenuController;
use App\Http\Controllers\AdminPanelController;

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

// Rutas directas a cada Blade

Route::view('/alta-productos', 'altaProductos')->name('altaProductos');
Route::view('/alta-proveedores', 'altaProveedores')->name('altaProveedores');
Route::view('/alta-usuarios', 'altaUsuarios')->name('altaUsuarios');

Route::view('/configuracion', 'configuracion')->name('configuracion');
Route::view('/corte-de-caja', 'corte_de_caja')->name('corteDeCaja');
Route::view('/merma-productos', 'mermaProductos')->name('mermaProductos');

Route::view('/pago', 'pago')->name('pago');

// Rutas para el panel de administración
Route::get('/admin-dashboard', [AdminPanelController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
Route::get('/admin/usuarios', [AdminPanelController::class, 'usuarios'])->name('admin.users'); // Cambiado a 'admin.users'
Route::get('/admin/productos', [AdminPanelController::class, 'productos'])->name('admin.products'); // Cambiado a 'admin.products'
Route::get('/admin/proveedores', [AdminPanelController::class, 'proveedores'])->name('admin.proveedores');
Route::get('/admin/ventas', [AdminPanelController::class, 'ventas'])->name('admin.ventas');
Route::get('/admin/mermas', [AdminPanelController::class, 'mermas'])->name('admin.waste'); // Cambiado a 'admin.waste'
Route::get('/admin/configuracion', [AdminPanelController::class, 'configuracion'])->name('admin.configuracion');
Route::get('/admin/estadisticas', [AdminPanelController::class, 'estadisticas'])->name('admin.statistics'); // Nueva ruta añadida

// Ruta de reportes
Route::view('/admin/reportes', 'Reportes')->name('admin.reports');
Route::get('/admin/reportes/ventas', [AdminPanelController::class, 'reporteVentas'])->name('admin.reports.ventas');
Route::get('/admin/reportes/mermas', [AdminPanelController::class, 'reporteMermas'])->name('admin.reports.mermas');
Route::get('/admin/reportes/usuarios', [AdminPanelController::class, 'reporteUsuarios'])->name('admin.reports.usuarios');
Route::get('/admin/reportes/proveedores', [AdminPanelController::class, 'reporteProveedores'])->name('admin.reports.proveedores');
Route::get('/admin/reportes/ventas/generar', [AdminPanelController::class, 'generarReporteVentas'])->name('admin.reports.ventas.generar');
Route::get('/admin/reportes/mermas/generar', [AdminPanelController::class, 'generarReporteMermas'])->name('admin.reports.mermas.generar');
Route::get('/admin/reportes/usuarios/generar', [AdminPanelController::class, 'generarReporteUsuarios'])->name('admin.reports.usuarios.generar');
