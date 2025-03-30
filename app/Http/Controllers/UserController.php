<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Se espera un campo "password_confirmation"
        ]);
    
        $validated['password'] = Hash::make($validated['password']);
    
        User::create($validated);
    
        return redirect()->route('users.index')
                         ->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
        ];
    
        // Si se ingresa una nueva contraseña, se valida y se cifra.
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6|confirmed';
        }
    
        $validated = $request->validate($rules);
    
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
    
        $user->update($validated);
    
        return redirect()->route('users.index')
                         ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('users.index')
                     ->with('success', 'Usuario eliminado correctamente');
}

}
