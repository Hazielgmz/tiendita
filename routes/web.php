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
