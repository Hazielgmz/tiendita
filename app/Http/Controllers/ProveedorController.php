<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json($proveedores);
        
    }

    public function create()
    {
        return view('admin.create-proveedores'); // Asegúrate de que esta vista exista
    }

    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('direccion', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('estado', 50)->nullable();
            $table->timestamps();
        });
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'nullable|string|max:50',
        ]);

        // Crear el proveedor
        Proveedor::create($validatedData);

        // Redirigir a la vista de creación de proveedores
        return view('admin.create-proveedores')->with('success', 'Proveedor creado con éxito');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        
        if ($proveedor) {
            $proveedor->delete();
            return response()->json(['message' => 'Proveedor eliminado con éxito.'], 200);
        }
        
        return response()->json(['message' => 'Proveedor no encontrado.'], 404);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:100',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'nullable|string|max:50',
        ]);

        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->update($validatedData);
            return response()->json(['message' => 'Proveedor actualizado con éxito.'], 200);
        }

        return response()->json(['message' => 'Proveedor no encontrado.'], 404);
    }
}