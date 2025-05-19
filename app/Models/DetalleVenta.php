<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';

    // Columnas que se pueden asignar masivamente
    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    /**
     * Relación con la venta principal
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    /**
     * Relación con el producto vendido
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}