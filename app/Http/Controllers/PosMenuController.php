<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; // Importa la clase Redirect
use Illuminate\Support\Facades\DB; // Importa la clase DB

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
    ]);

    try {
        DB::transaction(function () use ($request) {
            Venta::create([
                'users_id' => Auth::id(),
                'total' => $request->total,
                'fecha' => $request->fecha,
            ]);
        });
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }

    return Redirect::route('ventas.index'); 
}
}