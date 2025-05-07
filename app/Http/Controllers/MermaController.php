<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merma;
use App\Models\Producto; // Asegúrate de incluir el modelo Producto
use Illuminate\Support\Facades\DB;

class MermaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mermas = Merma::with('producto')
                   ->orderBy('created_at', 'desc')
                   ->get();

        // Pasamos al blade
        return view('admin.merma‍s', compact('mermas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // Trae todos los productos para poblar el <select>
        $productos = Producto::all();

        return view('admin.create-merma', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'cantidad'    => 'required|integer|min:1',
            'motivo'      => 'required|string',
        ]);
    
        DB::transaction(function() use ($data) {
            // 1) Registramos la merma
            Merma::create($data);

            // 2) Descontamos del stock del producto
            //    decrement() hace un UPDATE stock = stock - cantidad
            Producto::where('id', $data['producto_id'])
                    ->decrement('stock', $data['cantidad']);
        });
    
        return redirect()->route('admin.waste')
                         ->with('success', 'Merma registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
