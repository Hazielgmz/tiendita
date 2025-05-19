<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Producto;
use App\Models\Merma;
use App\Models\Proveedor;
use App\Models\Venta;
use App\Models\Reporte;
use Carbon\Carbon;   

class AdminPanelController extends Controller
{
   public function dashboard()
    {
        // 1) Estadísticas generales
        $totalVentas   = Venta::whereDate('fecha', Carbon::today())->sum('total');
        $transacciones = Venta::whereDate('fecha', Carbon::today())->count();
        $productos     = Producto::count();

        // 2) Datos para la gráfica: mes actual
        $desde = Carbon::today()->startOfMonth();
        $hasta = Carbon::today()->endOfMonth();
        
        // Obtener el nombre del mes actual en español
        $nombreMes = Carbon::now()->locale('es')->monthName;
        $nombreMes = ucfirst($nombreMes); // Primera letra en mayúscula

        // Obtener las ventas del mes agrupadas por día
        $ventasPorDia = Venta::select(
                DB::raw('DATE(fecha) as fecha'),
                DB::raw('SUM(total) as total')
            )
            ->whereBetween('fecha', [$desde, $hasta])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        // Total de ventas del mes
        $totalMes = $ventasPorDia->sum('total');

        // 3) Preparar datos para todos los días del mes
        $daysInMonth = Carbon::today()->daysInMonth;
        
        // Crear arrays con todos los días del mes
        $labels = collect();
        $data = collect();
        
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $labels->push(sprintf("%02d", $day)); // Formato "01", "02", etc.
            $data->push(0); // Inicializar con ceros
        }
        
        // Rellenar con datos reales donde existan
        foreach ($ventasPorDia as $venta) {
            $day = (int)Carbon::parse($venta->fecha)->format('d');
            $data[$day - 1] = $venta->total;
        }

        // 4) Pasar todo a la vista
        return view('admin.dashboard', compact(
            'totalVentas',
            'transacciones',
            'productos',
            'labels',
            'data',
            'nombreMes',
            'totalMes'
        ));
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

    public function productos(Request $request)
    {
         $q = $request->input('q');

        $products = Producto::when($q, function($query, $q) {
                $query->where('codigo_barras', 'like', "%{$q}%");
            })
            ->orderBy('nombre_producto', 'asc')
            ->get();

        return view('admin.products', compact('products', 'q'));
    }

    public function proveedores()
    {
        return view('admin.proveedores');
    }

    public function ventas()
    {
        return view('admin.ventas');
    }

    public function mermas()
    {
        $mermas = Merma::all();
        return view('admin.mermas', compact('mermas'));
    }

    public function estadisticas()
    {
        return view('admin.statistics');
    }
    
    public function configuracion()
    {
        return view('admin.configuracion');
    }
}