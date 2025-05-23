<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\POSMenuController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MermaController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\ReportController;

// Rutas para los controladores 
Route::resource('productos', ProductoController::class);
Route::resource('users', UserController::class);
Route::resource('mermas', MermaController::class);


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
Route::view('/admin/reports', 'admin.reports')->name('admin.reports');
Route::get('/admin/reports/ventas', [AdminPanelController::class, 'reporteVentas'])->name('admin.reports.ventas');
Route::get('/admin/reports/mermas', [AdminPanelController::class, 'reporteMermas'])->name('admin.reports.mermas');
Route::get('/admin/reports/usuarios', [AdminPanelController::class, 'reporteUsuarios'])->name('admin.reports.usuarios');
Route::get('/admin/reports/proveedores', [AdminPanelController::class, 'reporteProveedores'])->name('admin.reports.proveedores');
Route::get('/admin/reports/ventas/generar', [AdminPanelController::class, 'generarReporteVentas'])->name('admin.reports.ventas.generar');
Route::get('/admin/reports/mermas/generar', [AdminPanelController::class, 'generarReporteMermas'])->name('admin.reports.mermas.generar');
Route::get('/admin/reports/usuarios/generar', [AdminPanelController::class, 'generarReporteUsuarios'])->name('admin.reports.usuarios.generar');

// Ruta para mostrar la interfaz de "Alta de Usuario"
Route::get('/admin/create-user', function () {
    return view('admin.create-user');
})->name('admin.create-user');

// Route::post('/admin/create-user', function () {
//     return view('admin.create-user');
// })->name('admin.create-user');

Route::prefix('admin')->name('admin.')->group(function(){
    // Muestra el listado de usuarios
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    // Formulario de registro
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    // Procesa el registro
    Route::post('users', [UserController::class, 'store'])->name('users.store');
});

// Ruta para mostrar la interfaz de edición de un usuario
Route::get('/admin/users/{id}/edit', function ($id) {
    return view('admin.edit-user', ['id' => $id]);
})->name('admin.users.edit');

// Rutas para crear producto
Route::get('/admin/create-product', [ProductoController::class, 'create'])->name('admin.create-product'); // Ruta corregida
Route::post('/admin/store-product', [ProductoController::class, 'store'])->name('productos.store');

// Ruta para mostrar la interfaz de edición de un producto
Route::get('/admin/products/{id}/edit', function ($id) {
    return view('admin.edit-product', ['id' => $id]);
})->name('productos.edit');

// Ruta para mostrar la interfaz de "Registrar Merma"
Route::get('/admin/mermas/create', [MermaController::class, 'create'])
     ->name('admin.mermas.create');
     
Route::post('/admin/mermas',         [MermaController::class,'store'])
     ->name('admin.mermas.store');



// Ruta para proveedores
Route::prefix('admin')
     ->name('admin.')
     ->middleware('auth')
     ->group(function () {
         Route::resource('proveedores', ProveedorController::class)
              ->except(['show']);
     });

//Crear proveedores
Route::get('/admin/proveedores/create-proveedores', [ProveedorController::class, 'create']);

// Ruta para mostrar la interfaz de "Punto de Venta"
Route::get('/punto-de-venta', function () {
    $productos = Producto::all(); // Obtiene todos los productos de la base de datos
    return view('POSMenu', compact('productos')); // Envía la variable a la vista
})->name('punto-de-venta');

// Ruta para cerrar sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para mostrar la interfaz de clave
Route::get('/admin/password', function () {
    return view('admin.admin-password');
})->name('admin.password');

// Ruta para validar la clave ingresada
Route::post('/admin/password/check', [AuthController::class, 'checkPassword'])->name('admin.password.check');


Route::get('/admin/devoluciones', [DevolucionesController::class, 'index'])->name('admin.devoluciones');

Route::put('/admin/devoluciones/{id}/devolver', [DevolucionesController::class, 'devolver'])
     ->name('admin.devoluciones.devolver');


Route::get('/admin/reports/inventory', [ReportController::class, 'inventory'])
     ->name('admin.reports.inventory');