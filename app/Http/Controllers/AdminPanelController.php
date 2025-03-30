<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto; // 

class AdminPanelController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Asegúrate de que la vista 'admin.dashboard' exista
    }

    public function index(Request $request)
    {
        $activeSection = $request->get('section', 'dashboard');
        return view('admin.index', compact('activeSection'));
    }

    public function usuarios()
    {
        $users = User::all();

        // Retorna la vista 'admin.users' (es decir, resources/views/admin/users.blade.php)
        // pasando la variable $users para que la vista pueda iterar sobre ella.
        return view('admin.users', compact('users'));
    }

    public function productos()
    {
        $products = Producto::all();
        return view('admin.products', compact('products')); // Asegúrate de que este archivo exista
    }

    public function proveedores()
    {
        return view('admin.proveedores'); // Asegúrate de que este archivo exista
    }

    public function ventas()
    {
        return view('admin.ventas'); // Asegúrate de que este archivo exista
    }

    public function mermas()
    {
        return view('admin.mermas'); // Asegúrate de que este archivo exista
    }

    public function estadisticas()
    {
        return view('admin.statistics'); // Asegúrate de que este archivo exista
    }
    
    public function configuracion()
    {
        return view('admin.configuracion'); // Asegúrate de que este archivo exista
    }
}