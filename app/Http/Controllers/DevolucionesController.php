<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class DevolucionesController extends Controller
{
    public function index()
    {
        // Trae las ventas con su usuario relacionado
         $devoluciones = Venta::with('user')
        ->orderBy('fecha', 'desc')
        ->get();

    return view('admin.devoluciones', compact('devoluciones'));
    }
    public function devolver($id)
    {
         // Encuentra la venta o falla con 404
        $venta = Venta::findOrFail($id);

        // Si necesitas eliminar también los detalles:
        // $venta->productos()->detach();

        // Borra la venta
        $venta->delete();

        return redirect()
            ->route('admin.devoluciones')
            ->with('success', "Venta #{$id} eliminada correctamente.");
    }
}
