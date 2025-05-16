<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Muestra el listado de proveedores.
     */
    public function index()
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('admin.proveedores', compact('proveedores'));
    }

    /**
     * Muestra el formulario para crear un nuevo proveedor.
     */
    public function create()
    {
        return view('admin.create-proveedores');
    }

    /**
     * Valida y almacena un nuevo proveedor.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'email'     => 'nullable|email|max:100',
            'telefono'  => 'nullable|string|max:20',
            'estado'    => 'required|string|max:100',  // Ahora es la entidad federativa
        ]);

        Proveedor::create($data);

        return redirect()
            ->route('admin.proveedores.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un proveedor existente.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('admin.edit-proveedores', compact('proveedor'));
    }

    /**
     * Valida y actualiza un proveedor existente.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'email'     => 'nullable|email|max:100',
            'telefono'  => 'nullable|string|max:20',
            'estado'    => 'required|string|max:100',  // Aquí también
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($data);

        return redirect()
            ->route('admin.proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * Elimina un proveedor.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()
            ->route('admin.proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
