<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; // Importa la clase Redirect

class POSMenuController extends Controller
{
    public function index()
    {
        $productos = Producto::where('estado', 'activo')->get();
        return view('POSMenu', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric',
            'fecha' => 'required|date',
            'productos' => 'required|json',
        ]);

        // Crear la venta
        $venta = Venta::create([
            'users_id' => Auth::id(),
            'total' => $request->total,
            'fecha' => $request->fecha,
        ]);

        $productos = json_decode($request->productos, true);
        foreach ($productos as $producto) {
            $venta->productos()->attach($producto['id'], [
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario'],
                'subtotal' => $producto['subtotal'],
            ]);
        }

        // Redirigir a la vista POSMenu
        return Redirect::route('ventas.index'); 
    }

    public function getProductosDelCarrito()
    {
        $productos = [];
        $carritoContenido = request()->input('carrito'); 

        foreach ($carritoContenido as $item) {
            $productos[] = [
                'id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario'],
                'subtotal' => $item['subtotal'],
            ];
        }

        return $productos; 
    }
}