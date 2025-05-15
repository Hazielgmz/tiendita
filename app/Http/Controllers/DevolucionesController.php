<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    public function index()
    {
        return view('admin.devoluciones'); // Asegúrate de que esta vista exista
    }
}
