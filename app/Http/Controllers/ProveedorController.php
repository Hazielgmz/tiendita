<?php
namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Método para mostrar la lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores', compact('proveedores'));
    }

    // Método para almacenar un nuevo proveedor
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'estado' => 'nullable|string|max:50',
        ]);

        try {
            Proveedor::create($validatedData);
            return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear proveedor: ' . $e->getMessage()]);
        }
    }

    // Método para listar todos los proveedores
    public function getAll()
    {
        return Proveedor::all();
    }
}