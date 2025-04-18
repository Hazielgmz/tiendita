<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Crear el usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.users')->with('success', 'Usuario registrado correctamente.');
    }
}