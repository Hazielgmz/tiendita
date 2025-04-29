<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        // Buscar el producto por su ID
        $product = Producto::findOrFail($id);

        // Retornar la vista de edición con los datos del producto
        return view('admin.edit-product', compact('product'));
    }

    /**
     * Actualiza un producto en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'codigo' => 'required|string|max:255|unique:products,codigo,' . $id,
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Buscar el producto por su ID y actualizarlo
        $product = Producto::findOrFail($id);
        $product->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.products')->with('success', 'Producto actualizado correctamente.');
    }
}