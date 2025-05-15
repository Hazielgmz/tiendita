<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function inventory()
    {
        $productos = Producto::all();
        $pdf = Pdf::loadView('admin.reports.inventory', compact('productos'))
                  ->setPaper('a4', 'landscape');

        // Stream abre en el navegador, download fuerza descarga:
        return $pdf->stream('inventario_actual.pdf');
    }
}
