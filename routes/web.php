<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\POSMenuController;

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
//JAJAJAJAJAJAJAJAJAJA

Route::view('/admin-dashboard', 'admin-dashboard')->name('admin-dashboard');
Route::view('/alta-proveedores', 'altaProveedores')->name('altaProveedores');
Route::view('/alta-usuarios', 'altaUsuarios')->name('altaUsuarios');

Route::view('/configuracion', 'configuracion')->name('configuracion');
Route::view('/corte-de-caja', 'corte_de_caja')->name('corteDeCaja');
Route::view('/merma-productos', 'mermaProductos')->name('mermaProductos');

Route::view('/pago', 'pago')->name('pago');
Route::view('/reportes', 'Reportes')->name('Reportes');

// Agrega esta ruta al final del archivo
Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
});