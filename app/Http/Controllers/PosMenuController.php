<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class POSMenuController extends Controller
{
    public function index()
    {
        // Lista de productos de ejemplo
        // Se obtienen los productos activos; si lo deseas, puedes aplicar más filtros
        $productos = Producto::where('estado', 'activo')->get();

        return view('POSMenu', compact('productos'));
    }
}
