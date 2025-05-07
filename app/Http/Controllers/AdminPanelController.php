<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto; // 
use App\Models\Merma; // Asegúrate de incluir el modelo Merma
use App\Models\Proveedor; // Asegúrate de incluir el modelo Proveedor
use App\Models\Venta; // Asegúrate de incluir el modelo Venta
use App\Models\Reporte; // Asegúrate de incluir el modelo Reporte

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
        $mermas = Merma::all();
        return view('admin.mermas', compact('mermas')); // Asegúrate de que este archivo exista
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