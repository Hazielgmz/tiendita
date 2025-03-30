<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.users'); // Asegúrate de que este archivo exista
    }

    public function productos()
    {
        return view('admin.products'); // Asegúrate de que este archivo exista
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