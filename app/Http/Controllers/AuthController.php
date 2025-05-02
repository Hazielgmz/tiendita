<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkPassword(Request $request)
    {
        $correctPassword = '1234'; // Cambia esto por la clave que desees

        if ($request->password === $correctPassword) {
            return redirect()->route('admin.dashboard'); // Redirige al panel de administración
        }

        return back()->withErrors(['password' => 'La clave ingresada es incorrecta.']);
    }

    /**
     * Muestra el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Retorna la vista del formulario de login
    }

    /**
     * Maneja la solicitud de login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email', // El campo email es obligatorio y debe ser un email válido
            'password' => 'required',     // El campo password es obligatorio
        ]);

        // Intentar autenticar al usuario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $request->session()->regenerate(); // Regenerar la sesión para prevenir fijación de sesión
            return redirect()->intended('/POSMenu'); // Redirigir al usuario a la ruta deseada
        }

        // Autenticación fallida
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->only('email')); // Redirigir de vuelta con un mensaje de error
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar la sesión del usuario

        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        return redirect('/'); // Redirigir al usuario a la página de inicio
    }
}