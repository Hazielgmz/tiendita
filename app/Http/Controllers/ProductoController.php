<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor; // Asegúrate de incluir el modelo Proveedor
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        $proveedores = Proveedor::all(); // Obtener todos los proveedores
        return view('admin.create-product', compact('proveedores')); // Pasar proveedores a la vista
    }

    // Método para almacenar el nuevo producto
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'codigo' => 'required|string|max:50|unique:producto,codigo_barras',
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen_url' => 'nullable|url',
            'costo' => 'nullable|numeric|min:0',
            'tipo' => 'nullable|string|max:50',
            'estado' => 'nullable|string|max:20',
            'proveedor_id' => 'required|exists:proveedor,id', // Validar la existencia del proveedor
        ]);

        // Crear el nuevo producto
        Producto::create([
            'codigo_barras' => $request->codigo,
            'nombre_producto' => $request->nombre,
            'precio_unitario' => $request->precio,
            'stock' => $request->stock,
            'imagen_url' => $request->imagen_url,
            'costo' => $request->costo,
            'tipo' => $request->tipo,
            'estado' => $request->estado ?? 'activo',
            'proveedor_id' => $request->proveedor_id, // Guardar el proveedor asociado
        ]);

        // Redirigir a /admin/reports con un mensaje de éxito
        return redirect('/admin/reports')->with('success', 'Producto creado correctamente.');
    }
}